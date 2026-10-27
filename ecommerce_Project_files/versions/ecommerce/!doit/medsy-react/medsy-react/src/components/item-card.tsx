import { CURRENCY, formatPrice } from 'helpers/constants';
import {
  ItemCardBase,
  ItemCardContent,
  ItemCardPrice,
} from './utils/theme';

interface ItemProps {
  image: string;
  name: string;
  price: number;
}

interface ItemCardProps {
  item: ItemProps;
  onClick?: (e: any) => void;
}

export default function ItemCard({ item, onClick }: ItemCardProps) {
  const regularPrice = Number((item as any).regular_price);
  const hasDiscount = regularPrice > Number(item.price);
  const outOfStock = Number((item as any).stock) <= 0;

  return (
    <div className={ItemCardBase} onClick={onClick}>
      <div className="flex relative aspect-square items-center justify-center w-full rounded overflow-hidden bg-white border border-gray-300 p-4">
        <img
          src={item.image}
          alt={item.name}
          loading="lazy"
          className="w-full h-full object-contain"
        />
        {outOfStock && (
          <span className="absolute top-2 left-2 bg-gray-900 text-white text-11px px-2 py-1 rounded">
            Out of stock
          </span>
        )}
      </div>

      <div className={ItemCardContent}>
        <span className={ItemCardPrice}>
          {CURRENCY}
          {formatPrice(item.price)}
          {hasDiscount && (
            <span className="ml-2 text-13px font-normal text-gray-500 line-through">
              {CURRENCY}
              {formatPrice(regularPrice)}
            </span>
          )}
        </span>
        <span className="text-13px line-clamp-2">{item.name}</span>
      </div>
    </div>
  );
}
