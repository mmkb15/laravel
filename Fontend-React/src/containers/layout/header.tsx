import { useContext } from 'react';
import { Link } from 'react-router-dom';
import PhoneIcon from 'assets/icons/phone';
import CartIcon from 'assets/icons/cart-icon';
import Logo from 'assets/icons/logo';
import { STORE_NAME, STORE_PHONE } from 'helpers/constants';
import Search from 'components/search';
import { DrawerContext } from 'contexts/drawer/drawer.provider';
import { useCart } from 'contexts/cart/cart.provider';
import { useAuth } from 'contexts/auth/auth-context';
import { getAdminDashboardUrl, getBackendLoginUrl } from 'helpers/api';

export default function Header() {
  const { dispatch }: any = useContext(DrawerContext);
  const { itemsCount } = useCart();
  const { user } = useAuth();

  const showMenu = () => {
    dispatch({
      type: 'OPEN_MENU',
      payload: {
        menu: true,
      },
    });
  };

  const showCart = () => {
    dispatch({
      type: 'SLIDE_CART',
      payload: {
        open: true,
      },
    });
    dispatch({
      type: 'TOGGLE_CART_VIEW',
      payload: {
        showCart: true,
      },
    });
  };

  return (
    <header className="flex items-center shadow-mobile text-gray-700 body-font fixed bg-white w-full h-90px z-20 lg:shadow-header pr-20px md:pr-30px lg:pr-40px">
      <button
        aria-label="Menu"
        className="menuBtn flex flex-col items-center justify-center w-50px flex-shrink-0 h-full outline-none focus:outline-none lg:w-90px"
        onClick={showMenu}
      >
        <span className="menuIcon">
          <span className="bar" />
          <span className="bar" />
          <span className="bar" />
        </span>
      </button>

      <Link to="/" className="flex flex-shrink-0 lg:mr-10" aria-label={`${STORE_NAME} home`}>
        <Logo width="110px" id="header-logo" />
      </Link>

      <div className="w-full ml-10px mr-20px lg:mr-10 lg:ml-auto lg:flex lg:justify-center">
        <Search />
      </div>

      <div className="hidden items-center text-gray-900 mr-10 flex-shrink-0 lg:flex">
        <PhoneIcon />
        <span className="font-semibold text-base text-14px ml-3">
          {STORE_PHONE}
        </span>
      </div>

      {user?.role === 'admin' ? (
        <a
          href={getAdminDashboardUrl()}
          className="mr-4 hidden flex-shrink-0 text-sm font-medium text-gray-600 underline-offset-4 transition-colors hover:text-gray-900 hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary lg:inline-flex"
        >
          Admin dashboard
        </a>
      ) : user ? (
        <Link
          to="/account"
          className="mr-4 hidden flex-shrink-0 text-sm font-medium text-gray-600 underline-offset-4 transition-colors hover:text-gray-900 hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary lg:inline-flex"
        >
          My account
        </Link>
      ) : (
        <a
          href={getBackendLoginUrl()}
          className="mr-4 hidden flex-shrink-0 text-sm font-medium text-gray-600 underline-offset-4 transition-colors hover:text-gray-900 hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary lg:inline-flex"
        >
          Sign in / account
        </a>
      )}

      <button
        className="flex items-center justify-center flex-shrink-0 h-auto relative focus:outline-none"
        onClick={showCart}
        aria-label="cart-button"
      >
        <CartIcon width="20px" height="20px" />
        <span
          className="w-18px h-18px flex items-center justify-center bg-gray-900 text-white absolute rounded-full"
          style={{ fontSize: '10px', top: '-10px', right: '-10px' }}
        >
          {itemsCount}
        </span>
      </button>
    </header>
  );
}
