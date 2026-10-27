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
    gradient: 'linear-gradient(135deg, #2563EB, #60A5FA)',
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
      className="relative flex flex-col justify-center w-full h-[250px] rounded overflow-hidden px-8 text-white"
      style={{ background: gradient }}
    >
      <h2 className="text-white text-30px font-bold mb-2">{title}</h2>
      <p className="text-16px mb-6 max-w-[60%]">{text}</p>
      <a
        href="#myScrollToElement"
        className="inline-block self-start bg-white text-gray-900 font-semibold px-6 py-3 rounded shadow-float"
      >
        {button}
      </a>
      <div className="absolute right-8 top-1/2 -translate-y-1/2 w-[130px] h-[130px] text-white opacity-80">
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
