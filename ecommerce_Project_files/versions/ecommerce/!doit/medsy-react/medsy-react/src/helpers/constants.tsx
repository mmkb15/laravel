// CONSTANTS
export const CURRENCY = '$';

// 114900 -> 114,900 ; 1573.98 -> 1,573.98
export const formatPrice = (value: number | string) =>
  Number(value).toLocaleString('en-US', { maximumFractionDigits: 2 });
export const productKeys = [
  'id',
  'name',
  'description',
  'image',
  'price',
  'manufacturer',
  'type',
  'quantity',
  'dosage',
  'substance',
  'category_ids',
];

export const categoryKeys = ['id', 'name', 'slug', 'image_icon_url'];
