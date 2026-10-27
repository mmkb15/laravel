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
    <div
      className={`p-4 flex flex-col border rounded-md text-center ${
        category === id ? 'border-gray-900' : ' border-gray-300'
      }`}
      onClick={handleCategoryClick}
      role="button"
    >
      <div className="aspect-[2/2] max-w-[120px] mx-auto w-full relative">
        <img
          src={imageUrl ?? ''}
          alt={name}
          className="absolute inset-0 w-full h-full object-cover"
        />
      </div>
      <p className="font-semibold text-gray-900 truncate">{name}</p>
    </div>
  );
}
