import { STORE_NAME } from 'helpers/constants';

type LogoProps = {
  width?: string;
  id?: string;
};

const Logo = ({ width, id }: LogoProps) => (
  <span
    id={id}
    className="inline-flex shrink-0 items-center gap-2 whitespace-nowrap"
    style={width ? { width } : undefined}
  >
    <span className="flex h-9 w-9 shrink-0 items-center justify-center rounded-[10px] bg-gradient-to-br from-primary to-brand-purple text-18px font-extrabold text-white">
      C
    </span>
    <span className="font-bold text-21px tracking-tight text-gray-900">
      {STORE_NAME}
    </span>
  </span>
);

export default Logo;
