import clsx from 'clsx';
import { Link, useLocation } from 'react-router-dom';

const ActiveLink = ({
  children,
  className,
  activeClassName,
  href,
  ...props
}: any) => {
  const { pathname } = useLocation();
  const isActive = pathname === href;

  return (
    <Link
      {...props}
      to={href}
      className={clsx(className, isActive && activeClassName)}
    >
      {children}
    </Link>
  );
};

export default ActiveLink;
