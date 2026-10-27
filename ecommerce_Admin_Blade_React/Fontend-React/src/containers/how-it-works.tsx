import React from 'react';
import FeatureBlock from 'components/feature-block';

const data = [
  {
    id: 1,
    background: '#feeec8',
    title: 'Place Your Order',
    description: 'Add gadgets to your cart, enter your details and confirm.',
  },
  {
    id: 2,
    background: '#ceeffe',
    title: 'Order Confirmed',
    description:
      'We confirm your order and check that every item is in stock.',
  },
  {
    id: 3,
    background: '#d4f8c4',
    title: 'Quality Check & Packing',
    description: 'Each product is tested, safely packed and sent to our courier.',
  },
  {
    id: 4,
    background: '#d8dafe',
    title: 'Fast Delivery',
    description:
      'Your order is on the way and will reach your door soon.',
  },
];

export default function HowItWorks() {
  return (
    <div className="flex w-full px-20px md:p-30px py-40px rounded border border-gray-300 bg-white">
      <div className="feature-block-wrapper w-full grid grid-cols-1 gap-x-30px gap-y-40px md:grid-cols-2 xl:grid-cols-4 xxl:gap-30px">
        {data.map((item, index) => (
          <FeatureBlock
            key={item.id}
            title={item.title}
            description={item.description}
            counterBg={item.background}
            counter={index + 1}
            className="feature-block group motion-safe:transition-transform motion-safe:duration-200 hover:-translate-y-1"
          />
        ))}
      </div>
    </div>
  );
}
