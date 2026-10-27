import { useContext } from 'react';
import { Link } from 'react-router-dom';
import { Scrollbar } from 'components/scrollbar';
import ActiveLink from 'components/active-link';
import { DrawerContext } from 'contexts/drawer/drawer.provider';
import CloseIcon from 'assets/icons/close';
import Logo from 'assets/icons/logo';
import { STORE_NAME, STORE_PHONE } from 'helpers/constants';
import { useAuth } from 'contexts/auth/auth-context';
import { getAdminDashboardUrl, getBackendLoginUrl } from 'helpers/api';
import {
  Facebook,
  Twitter,
  Youtube,
  Github,
  Instagram,
  Linkedin,
} from 'assets/icons/social-icons';

const menus = [
  {
    id: 1,
    pathname: '/',
    title: 'Home',
  },
  {
    id: 4,
    pathname: '/faq',
    title: 'FAQ',
  },
  {
    id: 5,
    pathname: '/terms',
    title: 'Terms & Conditions',
  },
];

const social = [
  {
    id: 0,
    link: '/',
    icon: <Facebook />,
    className: 'facebook',
    title: 'facebook',
  },
  {
    id: 1,
    link: '/',
    icon: <Twitter />,
    className: 'twitter',
    title: 'twitter',
  },
  {
    id: 2,
    link: '/',
    icon: <Youtube />,
    className: 'youtube',
    title: 'youtube',
  },
  {
    id: 3,
    link: '/',
    icon: <Github />,
    className: 'github',
    title: 'github',
  },
  {
    id: 4,
    link: '/',
    icon: <Instagram />,
    className: 'instagram',
    title: 'instagram',
  },
  {
    id: 5,
    link: '/',
    icon: <Linkedin />,
    className: 'linkedin',
    title: 'linkedin',
  },
];

export default function DrawerMenu() {
  const { dispatch } = useContext(DrawerContext);
  const { user } = useAuth();
  const hideMenu = () => {
    dispatch({
      type: 'OPEN_MENU',
      payload: {
        menu: false,
      },
    });
  };

  return (
    <>
      <div className="flex flex-col w-full h-full">
        <div className="w-full h-90px bg-gray-100 flex justify-start items-center relative px-30px flex-shrink-0">
          <Link to="/" className="flex" onClick={hideMenu}>
            <span className="sr-only">{STORE_NAME}</span>
            <Logo width="100px" id="menu-logo" />
          </Link>

          <div className="flex items-center justify-end ml-auto pl-30px pr-50px text-gray-700 flex-shrink-0 lg:hidden">
            {/* <PhoneIcon /> */}
            <span className="font-semibold text-base text-14px ml-3">
              {STORE_PHONE}
            </span>
          </div>

          <button
            className="w-30px h-30px flex items-center justify-center text-gray-500 absolute right-25px focus:outline-none"
            onClick={hideMenu}
            aria-label="close"
          >
            <CloseIcon />
          </button>
        </div>

        <Scrollbar className="menu-scrollbar flex-grow">
          <div className="flex flex-col py-60px pb-40px lg:pb-60px">
            {menus.map((menu, index) => (
              <ActiveLink
                href={menu.pathname}
                activeClassName="font-semibold active"
                key={index}
                className="menu-item relative text-gray-900 pl-30px pr-4 mb-8 transition duration-300 ease-in-out last:mb-0 hover:text-gray-900"
                onClick={hideMenu}
              >
                {menu.title}
              </ActiveLink>
            ))}
            {user?.role === 'admin' ? (
              <a
                href={getAdminDashboardUrl()}
                className="menu-item relative mb-8 pl-30px pr-4 text-gray-900 transition duration-300 ease-in-out hover:text-gray-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary lg:hidden"
                onClick={hideMenu}
              >
                Admin dashboard
              </a>
            ) : user ? (
              <Link
                to="/account"
                className="menu-item relative mb-8 pl-30px pr-4 text-gray-900 transition duration-300 ease-in-out hover:text-gray-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary lg:hidden"
                onClick={hideMenu}
              >
                My account
              </Link>
            ) : (
              <a
                href={getBackendLoginUrl()}
                className="menu-item relative mb-8 pl-30px pr-4 text-gray-900 transition duration-300 ease-in-out hover:text-gray-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary lg:hidden"
                onClick={hideMenu}
              >
                Sign in / account
              </a>
            )}
          </div>
        </Scrollbar>

        <div className="flex items-center justify-start border-t border-gray-300 bg-gray-100 h-12 px-30px flex-shrink-0 lg:hidden">
          {social.map((item, index) => (
            <a
              href={item.link}
              className={`social ${item.className}`}
              target="_blank"
              rel="noreferrer"
              key={index}
            >
              <span className="sr-only">{item.title}</span>
              {item.icon}
            </a>
          ))}
        </div>
      </div>
    </>
  );
}
