import React, { ReactElement } from 'react';
import { useCategory } from 'contexts/category/use-category';
interface Props {
  imageUrl: string;
  name: string;
  id: string;
}

export default function CategoryCard({
  imageUrl,
  name,
  id,
}: Props): ReactElement {
  const { category, setCategory } = useCategory();
  function handleCategoryClick() {
    if (category !== id) {
      setCategory(id);
    } else {
      setCategory('');
    }
  }
  return (
    <button
      type="button"
      aria-pressed={category === id}
      className={`flex h-full w-full min-w-0 flex-col items-center rounded-md border p-4 text-center transition-all duration-200 ease-out focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 ${
        category === id
          ? 'border-primary bg-primary/5 shadow-cart'
          : 'border-gray-300 hover:border-primary/70 hover:bg-primary/5 hover:shadow-cart'
      }`}
      onClick={handleCategoryClick}
    >
      <div className="relative mx-auto aspect-square w-full max-w-[120px]">
        <img
          src={imageUrl ?? ''}
          alt={name}
          className="absolute inset-0 h-full w-full object-contain"
        />
      </div>
      <p className="w-full whitespace-normal break-words text-12px font-semibold leading-4 text-gray-900">
        {name}
      </p>
    </button>
  );
}
