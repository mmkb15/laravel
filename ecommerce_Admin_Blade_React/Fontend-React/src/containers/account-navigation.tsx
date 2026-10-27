import { FormEvent, useState } from 'react';
import { Link, NavLink } from 'react-router-dom';
import Button from 'components/button';
import { useAuth } from 'contexts/auth/auth-context';
import { getBackendLoginUrl } from 'helpers/api';

export default function AccountNavigation() {
  const { user, signOut } = useAuth();
  const [error, setError] = useState('');
  const [signingOut, setSigningOut] = useState(false);

  async function submitSignOut(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setError('');
    setSigningOut(true);
    try {
      await signOut();
      window.location.assign(getBackendLoginUrl());
    } catch {
      setError('We could not sign you out. Check your connection and try again.');
    } finally {
      setSigningOut(false);
    }
  }

  return (
    <aside className="h-fit rounded-20px border border-gray-300 bg-white p-5 shadow-float">
      <div className="mb-5 border-b border-gray-300 pb-5">
        <p className="text-xs font-semibold uppercase tracking-widest text-primary">Customer account</p>
        <p className="mt-2 break-words font-semibold text-gray-900">{user?.name}</p>
        <p className="break-words text-sm text-gray-600">{user?.email}</p>
      </div>
      <nav className="grid gap-2" aria-label="Account navigation">
        <NavLink
          end
          to="/account"
          className={({ isActive }) =>
            `rounded px-3 py-2 text-sm font-semibold ${
              isActive ? 'bg-primary/5 text-primary' : 'text-gray-700 hover:bg-gray-100'
            }`
          }
        >
          Overview & orders
        </NavLink>
        <Link
          to="/"
          className="rounded px-3 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100"
        >
          Continue shopping
        </Link>
      </nav>
      <form onSubmit={submitSignOut} className="mt-5 border-t border-gray-300 pt-5">
        {error && <p className="mb-3 text-sm text-red-600" role="alert">{error}</p>}
        <Button type="submit" variant="secondary" disabled={signingOut} loading={signingOut} className="w-full">
          Sign out
        </Button>
      </form>
    </aside>
  );
}
