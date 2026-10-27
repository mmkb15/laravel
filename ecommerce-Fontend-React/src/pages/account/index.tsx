import { FormEvent, useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import Button from 'components/button';
import PageTitle from 'components/page-title';
import AccountNavigation from 'containers/account-navigation';
import Layout from 'containers/layout/layout';
import { ApiError, apiRequest } from 'helpers/api';
import { useAuth } from 'contexts/auth/auth-context';

interface OrderSummary {
  id: number;
  order_number: string;
  total: string;
  status: string;
  payment_status: string;
  created_at: string;
}

interface PaginatedOrders {
  data: OrderSummary[];
  current_page: number;
  last_page: number;
  total: number;
}

function formatDate(value: string): string {
  return new Intl.DateTimeFormat(undefined, {
    dateStyle: 'medium',
    timeStyle: 'short',
  }).format(new Date(value));
}

function formatMoney(value: string | number): string {
  return `$${Number(value).toFixed(2)}`;
}

function statusClass(status: string): string {
  if (status === 'delivered' || status === 'completed') {
    return 'bg-green-100 text-green-800';
  }
  if (status === 'cancelled') {
    return 'bg-red-100 text-red-700';
  }
  if (status === 'pending' || status === 'processing') {
    return 'bg-amber-100 text-amber-800';
  }
  return 'bg-gray-200 text-gray-700';
}

export default function AccountPage() {
  const { user, setUser } = useAuth();
  const [orders, setOrders] = useState<PaginatedOrders | null>(null);
  const [page, setPage] = useState(1);
  const [name, setName] = useState(user?.name || '');
  const [phone, setPhone] = useState(user?.phone || '');
  const [address, setAddress] = useState(user?.address || '');
  const [loadingOrders, setLoadingOrders] = useState(true);
  const [ordersError, setOrdersError] = useState('');
  const [profileError, setProfileError] = useState('');
  const [profileMessage, setProfileMessage] = useState('');
  const [profileLoading, setProfileLoading] = useState(false);

  useEffect(() => {
    let cancelled = false;
    setLoadingOrders(true);
    setOrdersError('');
    apiRequest<{ orders: PaginatedOrders }>(`/account/orders?page=${page}`)
      .then((response) => {
        if (!cancelled) {
          setOrders(response.orders);
        }
      })
      .catch(() => {
        if (!cancelled) {
          setOrdersError('We could not load your orders. Please try again.');
        }
      })
      .finally(() => {
        if (!cancelled) {
          setLoadingOrders(false);
        }
      });
    return () => {
      cancelled = true;
    };
  }, [page]);

  useEffect(() => {
    setName(user?.name || '');
    setPhone(user?.phone || '');
    setAddress(user?.address || '');
  }, [user]);

  async function saveProfile(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setProfileError('');
    setProfileMessage('');
    setProfileLoading(true);
    try {
      const response = await apiRequest<{ message: string; user: typeof user }>(
        '/account/profile',
        {
          method: 'PUT',
          body: JSON.stringify({ name, phone, address }),
        },
        true
      );
      if (response.user) {
        setUser(response.user);
      }
      setProfileMessage(response.message);
    } catch (error) {
      setProfileError(
        error instanceof ApiError
          ? error.errors.name?.[0] || error.errors.phone?.[0] || error.errors.address?.[0] || error.message
          : 'We could not save your details. Please try again.'
      );
    } finally {
      setProfileLoading(false);
    }
  }

  return (
    <Layout>
      <PageTitle title="My account" />
      <main className="mx-auto max-w-6xl py-8 md:py-12">
        <div className="mb-8 flex flex-wrap items-end justify-between gap-4">
          <div>
            <p className="mb-2 text-xs font-bold uppercase tracking-widest text-primary">Your account</p>
            <h1 className="text-30px font-bold text-gray-900 md:text-36px">Hello, {user?.name}</h1>
            <p className="mt-2 text-sm text-gray-600">View your purchases and keep your delivery details up to date.</p>
          </div>
          <Link to="/" className="text-sm font-semibold text-primary hover:underline">Continue shopping</Link>
        </div>

        <div className="grid items-start gap-6 lg:grid-cols-[240px_minmax(0,1fr)]">
          <AccountNavigation />
          <div className="grid min-w-0 gap-6">
            <section className="overflow-hidden rounded-20px border border-gray-300 bg-white shadow-float">
              <div className="flex items-center justify-between border-b border-gray-300 px-5 py-5 md:px-7">
                <div>
                  <p className="text-xs font-bold uppercase tracking-widest text-primary">Purchase history</p>
                  <h2 className="mt-1 text-21px font-bold text-gray-900">Your orders</h2>
                </div>
                {orders && <span className="rounded-full bg-primary/5 px-3 py-1 text-sm font-semibold text-primary">{orders.total}</span>}
              </div>
              {ordersError && <p className="m-5 rounded bg-red-50 p-4 text-sm text-red-700" role="alert">{ordersError}</p>}
              {loadingOrders ? (
                <p className="p-8 text-center text-sm text-gray-600" role="status">Loading your orders…</p>
              ) : orders && orders.data.length > 0 ? (
                <>
                  <div className="divide-y divide-gray-300">
                    {orders.data.map((order) => (
                      <Link
                        key={order.id}
                        to={`/account/orders/${order.id}`}
                        className="grid grid-cols-[minmax(0,1fr)_auto] items-center gap-3 px-5 py-5 transition hover:bg-gray-100 md:grid-cols-[minmax(0,1fr)_auto_auto_16px] md:px-7"
                      >
                        <span className="min-w-0">
                          <strong className="block truncate text-sm text-gray-900">{order.order_number}</strong>
                          <small className="mt-1 block text-gray-600">{formatDate(order.created_at)}</small>
                        </span>
                        <span className={`w-fit rounded-full px-3 py-1 text-xs font-semibold capitalize ${statusClass(order.status)}`}>
                          {order.status}
                        </span>
                        <strong className="text-sm text-gray-900">{formatMoney(order.total)}</strong>
                        <span className="hidden text-xl text-gray-500 md:block" aria-hidden="true">›</span>
                      </Link>
                    ))}
                  </div>
                  {orders.last_page > 1 && (
                    <div className="flex items-center justify-between border-t border-gray-300 px-5 py-4 md:px-7">
                      <button
                        type="button"
                        onClick={() => setPage((current) => Math.max(1, current - 1))}
                        disabled={page <= 1}
                        className="rounded border border-gray-400 px-3 py-2 text-sm font-semibold text-gray-700 disabled:cursor-not-allowed disabled:opacity-50"
                      >
                        Previous
                      </button>
                      <span className="text-sm text-gray-600">Page {orders.current_page} of {orders.last_page}</span>
                      <button
                        type="button"
                        onClick={() => setPage((current) => Math.min(orders.last_page, current + 1))}
                        disabled={page >= orders.last_page}
                        className="rounded border border-gray-400 px-3 py-2 text-sm font-semibold text-gray-700 disabled:cursor-not-allowed disabled:opacity-50"
                      >
                        Next
                      </button>
                    </div>
                  )}
                </>
              ) : !ordersError ? (
                <div className="px-6 py-12 text-center">
                  <div className="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-primary/5 text-xl text-primary" aria-hidden="true">🛍</div>
                  <h3 className="text-lg font-bold text-gray-900">No orders yet</h3>
                  <p className="mx-auto mt-2 max-w-sm text-sm text-gray-600">When you place an order, you can follow its status here. You can also shop as a guest.</p>
                  <Link to="/" className="mt-5 inline-flex rounded bg-primary px-5 py-3 text-sm font-semibold text-white transition hover:bg-primary-hover">Explore the store</Link>
                </div>
              ) : null}
            </section>

            <section className="overflow-hidden rounded-20px border border-gray-300 bg-white shadow-float">
              <div className="border-b border-gray-300 px-5 py-5 md:px-7">
                <p className="text-xs font-bold uppercase tracking-widest text-primary">Personal details</p>
                <h2 className="mt-1 text-21px font-bold text-gray-900">Delivery information</h2>
              </div>
              <form onSubmit={saveProfile} className="grid gap-5 p-5 md:grid-cols-2 md:p-7">
                {profileMessage && <p className="rounded border border-green-200 bg-green-50 p-3 text-sm text-green-800 md:col-span-2" role="status">{profileMessage}</p>}
                {profileError && <p className="rounded border border-red-200 bg-red-50 p-3 text-sm text-red-700 md:col-span-2" role="alert">{profileError}</p>}
                <label className="grid gap-2 text-sm font-semibold text-gray-800">
                  Full name
                  <input value={name} onChange={(event) => setName(event.target.value)} autoComplete="name" required maxLength={255} className="w-full rounded border border-gray-400 px-4 py-3 font-normal outline-none focus:border-primary focus:ring-2 focus:ring-primary/20" />
                </label>
                <label className="grid gap-2 text-sm font-semibold text-gray-800">
                  Email address
                  <input value={user?.email || ''} type="email" disabled className="w-full cursor-not-allowed rounded border border-gray-300 bg-gray-100 px-4 py-3 font-normal text-gray-600" />
                </label>
                <label className="grid gap-2 text-sm font-semibold text-gray-800">
                  Phone number
                  <input value={phone} onChange={(event) => setPhone(event.target.value)} autoComplete="tel" maxLength={50} className="w-full rounded border border-gray-400 px-4 py-3 font-normal outline-none focus:border-primary focus:ring-2 focus:ring-primary/20" />
                </label>
                <label className="grid gap-2 text-sm font-semibold text-gray-800 md:col-span-2">
                  Shipping address
                  <textarea value={address} onChange={(event) => setAddress(event.target.value)} autoComplete="street-address" rows={3} maxLength={2000} className="w-full resize-y rounded border border-gray-400 px-4 py-3 font-normal outline-none focus:border-primary focus:ring-2 focus:ring-primary/20" />
                </label>
                <div className="md:col-span-2">
                  <Button type="submit" disabled={profileLoading} loading={profileLoading}>
                    Save details
                  </Button>
                </div>
              </form>
            </section>
          </div>
        </div>
      </main>
    </Layout>
  );
}
