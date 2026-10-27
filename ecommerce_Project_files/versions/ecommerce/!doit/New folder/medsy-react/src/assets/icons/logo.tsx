import { STORE_NAME } from 'helpers/constants';

// Simple text logo. Change STORE_NAME in helpers/constants.tsx
const Logo = (_props: any) => (
  <span className="inline-flex items-center">
    <span className="flex items-center justify-center w-30px h-30px rounded bg-green text-white font-bold text-18px mr-2">
      {STORE_NAME.charAt(0)}
    </span>
    <span className="font-bold text-21px text-gray-900 tracking-tight">
      {STORE_NAME}
    </span>
  </span>
);

export default Logo;
