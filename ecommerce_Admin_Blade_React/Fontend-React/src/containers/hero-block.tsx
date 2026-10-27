import React from 'react';
import Carousel from 'components/carousel/carousel';

const iconProps = {
  viewBox: '0 0 64 64',
  fill: 'none',
  stroke: 'currentColor',
  strokeWidth: 2.5,
  strokeLinecap: 'round' as const,
  strokeLinejoin: 'round' as const,
};

const TruckIcon = () => (
  <svg {...iconProps}>
    <rect x="4" y="16" width="32" height="26" rx="2" />
    <path d="M36 24h12l9 10v8H36z" />
    <circle cx="16" cy="46" r="5" />
    <circle cx="46" cy="46" r="5" />
  </svg>
);

const TagIcon = () => (
  <svg {...iconProps}>
    <path d="M6 6h22l28 28-22 22L6 28z" />
    <circle cx="19" cy="19" r="3" />
  </svg>
);

const GamepadIcon = () => (
  <svg {...iconProps}>
    <rect x="4" y="18" width="56" height="28" rx="14" />
    <path d="M20 26v12M14 32h12" />
    <circle cx="42" cy="29" r="2" />
    <circle cx="48" cy="35" r="2" />
  </svg>
);

const PhoneIcon = () => (
  <svg {...iconProps}>
    <rect x="18" y="4" width="28" height="56" rx="5" />
    <path d="M28 10h8M29 54h6" />
  </svg>
);

const banners = [
  {
    id: 1,
    title: 'Fast Delivery',
    text: 'Genuine gadgets delivered to your door',
    button: 'Shop Now',
    gradient: 'linear-gradient(135deg, #4F46E5, #7C3AED)',
    Icon: TruckIcon,
  },
  {
    id: 2,
    title: 'Best Deals',
    text: 'Great discounts on laptops and accessories',
    button: 'View Deals',
    gradient: 'linear-gradient(135deg, #7C3AED, #A78BFA)',
    Icon: TagIcon,
  },
  {
    id: 3,
    title: 'Gaming Gear',
    text: 'Keyboards, mice and headsets for gamers',
    button: 'View Products',
    gradient: 'linear-gradient(135deg, #111827, #4B5563)',
    Icon: GamepadIcon,
  },
  {
    id: 4,
    title: 'Latest Smartphones',
    text: 'Flagship phones from top brands',
    button: 'View Products',
    gradient: 'linear-gradient(135deg, #0D9488, #5EEAD4)',
    Icon: PhoneIcon,
  },
];

const data = banners.map(({ id, title, text, button, gradient, Icon }) => ({
  id,
  title,
  content: (
    <div
      className="group relative flex flex-col justify-center w-full h-[220px] rounded overflow-hidden px-5 text-white sm:h-[250px] sm:px-8"
      style={{ background: gradient }}
    >
      <h2 className="text-24px font-bold text-white mb-2 sm:text-30px">{title}</h2>
      <p className="mb-4 max-w-[70%] text-14px sm:mb-6 sm:max-w-[60%] sm:text-16px">{text}</p>
      <a
        href="#myScrollToElement"
        className="inline-block self-start rounded bg-white px-5 py-3 font-semibold text-gray-900 shadow-float transition-colors duration-200 hover:bg-indigo-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900 sm:px-6"
      >
        {button}
      </a>
      <div className="absolute right-4 top-1/2 h-[90px] w-[90px] -translate-y-1/2 text-white opacity-30 motion-safe:transition-transform motion-safe:duration-300 group-hover:translate-x-1 group-hover:scale-105 sm:right-8 sm:h-[130px] sm:w-[130px] sm:opacity-80">
        <Icon />
      </div>
    </div>
  ),
}));

export default function HeroBlock() {
  return (
    <div className="w-full relative my-35px">
      <Carousel data={data} itemClass="px-5px" />
    </div>
  );
}
