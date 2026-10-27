import { CURRENCY, formatPrice } from 'helpers/constants';
import {
  ItemCardBase,
  ItemCardContent,
  ItemCardPrice,
} from './utils/theme';
import ArrowRight from 'assets/icons/arrow-right';

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
    <button
      type="button"
      className={`${ItemCardBase} group rounded text-left focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2`}
      onClick={onClick}
      aria-label={`View ${item.name} details`}
    >
      <div className="flex relative aspect-square items-center justify-center w-full rounded overflow-hidden bg-white border border-gray-300 p-4 transition-colors duration-200 group-hover:border-primary/60">
        <img
          src={item.image}
          alt={item.name}
          loading="lazy"
          className="w-full h-full object-contain motion-safe:transition-transform motion-safe:duration-300 group-hover:scale-[1.03]"
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
        <span className="mt-2 inline-flex items-center gap-2 text-12px font-semibold text-primary">
          View details
          <span className="transition-transform duration-200 group-hover:translate-x-1">
            <ArrowRight width="12px" height="10px" />
          </span>
        </span>
      </div>
    </button>
  );
}
