// Base URL of your Laravel API (set in .env -> VITE_API_URL)
export const API_URL: string =
  (import.meta as any).env.VITE_API_URL || 'http://localhost:8000/api';

async function get(path: string) {
  const res = await fetch(`${API_URL}${path}`, {
    headers: { Accept: 'application/json' },
  });
  if (!res.ok) throw new Error(`Request failed: ${res.status}`);
  const json = await res.json();
  // supports both [..] and { data: [..] } (Laravel resources)
  return Array.isArray(json) ? json : json.data ?? [];
}

// Expected product shape (map your Laravel fields here if different):
// { id, name, description, image, price, manufacturer, type, quantity, dosage, substance, category_ids }
export const getProducts = () => get('/products');

// Expected category shape: { id, name, slug, image_icon_url }
export const getCategories = () => get('/categories');
