import { useEffect, useState } from 'react';
import { Link, useParams } from 'react-router-dom';
import PageTitle from 'components/page-title';
import AccountNavigation from 'containers/account-navigation';
import Layout from 'containers/layout/layout';
import { apiRequest } from 'helpers/api';

interface OrderItem {
  id: number;
  product_name: string;
  image_url: string;
  quantity: number;
  unit_price: string;
  subtotal: string;
}

interface CustomerOrder {
  id: number;
  order_number: string;
  total: string;
  subtotal: string;
  shipping_cost: string;
  discount: string;
  status: string;
  payment_status: string;
  payment_method: string;
  created_at: string;
  shipping_name: string;
  shipping_phone: string;
  shipping_address: string;
  items: OrderItem[];
}

function money(value: string | number): string {
  return `$${Number(value).toFixed(2)}`;
}

export default function OrderPage() {
  const { orderId } = useParams();
  const [order, setOrder] = useState<CustomerOrder | null>(null);
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    let cancelled = false;
    setLoading(true);
    setError('');
    apiRequest<{ order: CustomerOrder }>(`/account/orders/${orderId}`)
      .then((response) => {
        if (!cancelled) {
          setOrder(response.order);
        }
      })
      .catch((requestError) => {
        if (!cancelled) {
          setError(requestError.status === 404
            ? 'We could not find that order in your account.'
            : 'We could not load this order. Please try again.');
        }
      })
      .finally(() => {
        if (!cancelled) {
          setLoading(false);
        }
      });
    return () => {
      cancelled = true;
    };
  }, [orderId]);

  return (
    <Layout>
      <PageTitle title={order ? `Order ${order.order_number}` : 'Order details'} />
      <main className="mx-auto max-w-6xl py-8 md:py-12">
        <div className="mb-6">
          <Link to="/account" className="text-sm font-semibold text-primary hover:underline">← Back to my account</Link>
        </div>
        <div className="grid items-start gap-6 lg:grid-cols-[240px_minmax(0,1fr)]">
          <AccountNavigation />
          <div className="min-w-0">
            {loading && <p className="rounded-20px border border-gray-300 bg-white p-8 text-center text-gray-600" role="status">Loading order details…</p>}
            {error && <p className="rounded border border-red-200 bg-red-50 p-4 text-sm text-red-700" role="alert">{error}</p>}
            {order && (
              <>
                <div className="mb-6 flex flex-wrap items-start justify-between gap-4">
                  <div>
                    <p className="mb-2 text-xs font-bold uppercase tracking-widest text-primary">Order details</p>
                    <h1 className="break-all text-24px font-bold text-gray-900 md:text-30px">{order.order_number}</h1>
                    <p className="mt-2 text-sm text-gray-600">Placed {new Intl.DateTimeFormat(undefined, { dateStyle: 'medium', timeStyle: 'short' }).format(new Date(order.created_at))}</p>
                  </div>
                  <span className="rounded-full bg-primary/5 px-4 py-2 text-sm font-semibold capitalize text-primary">{order.status}</span>
                </div>
                <div className="grid items-start gap-6 xl:grid-cols-[minmax(0,1.4fr)_minmax(260px,0.8fr)]">
                  <section className="overflow-hidden rounded-20px border border-gray-300 bg-white shadow-float">
                    <div className="border-b border-gray-300 px-5 py-5 md:px-7">
                      <h2 className="text-21px font-bold text-gray-900">Items ordered</h2>
                    </div>
                    <div className="divide-y divide-gray-300">
                      {order.items.map((item) => (
                        <div key={item.id} className="flex items-center justify-between gap-4 px-5 py-5 md:px-7">
                          <div className="flex min-w-0 items-center gap-4">
                            <img
                              src={item.image_url}
                              alt=""
                              loading="lazy"
                              className="h-16 w-16 shrink-0 rounded-lg border border-gray-300 bg-gray-100 object-contain p-1"
                            />
                            <div className="min-w-0">
                              <p className="break-words font-semibold text-gray-900">{item.product_name}</p>
                              <p className="mt-1 text-sm text-gray-600">{item.quantity} × {money(item.unit_price)}</p>
                            </div>
                          </div>
                          <strong className="shrink-0 text-gray-900">{money(item.subtotal)}</strong>
                        </div>
                      ))}
                    </div>
                    <dl className="grid gap-3 px-5 py-5 text-sm md:px-7">
                      <div className="flex justify-between gap-4"><dt className="text-gray-600">Subtotal</dt><dd className="font-semibold text-gray-900">{money(order.subtotal)}</dd></div>
                      <div className="flex justify-between gap-4"><dt className="text-gray-600">Shipping</dt><dd className="font-semibold text-gray-900">{money(order.shipping_cost)}</dd></div>
                      {Number(order.discount) > 0 && <div className="flex justify-between gap-4"><dt className="text-gray-600">Discount</dt><dd className="font-semibold text-green-700">−{money(order.discount)}</dd></div>}
                      <div className="mt-2 flex justify-between gap-4 border-t border-gray-300 pt-4 text-base"><dt className="font-bold text-gray-900">Total</dt><dd className="font-bold text-gray-900">{money(order.total)}</dd></div>
                    </dl>
                  </section>
                  <section className="overflow-hidden rounded-20px border border-gray-300 bg-white shadow-float">
                    <div className="border-b border-gray-300 px-5 py-5 md:px-7">
                      <h2 className="text-21px font-bold text-gray-900">Delivery information</h2>
                    </div>
                    <dl className="grid grid-cols-[110px_minmax(0,1fr)] gap-x-4 gap-y-4 px-5 py-5 text-sm md:px-7">
                      <dt className="text-gray-600">Name</dt><dd className="break-words font-semibold text-gray-900">{order.shipping_name}</dd>
                      <dt className="text-gray-600">Phone</dt><dd className="break-words font-semibold text-gray-900">{order.shipping_phone}</dd>
                      <dt className="text-gray-600">Address</dt><dd className="break-words font-semibold text-gray-900">{order.shipping_address}</dd>
                      <dt className="text-gray-600">Payment</dt><dd className="break-words font-semibold capitalize text-gray-900">{order.payment_method === 'cod' ? 'Cash on delivery' : order.payment_method}</dd>
                      <dt className="text-gray-600">Payment status</dt><dd className="break-words font-semibold capitalize text-gray-900">{order.payment_status}</dd>
                    </dl>
                  </section>
                </div>
              </>
            )}
          </div>
        </div>
      </main>
    </Layout>
  );
}
