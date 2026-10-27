export const API_URL = '/api';

function getBackendBaseUrl(): URL {
  const backendUrl = import.meta.env.VITE_BACKEND_URL || import.meta.env.VITE_API_URL || '/';

  return new URL('/', new URL(backendUrl, window.location.origin));
}

export function getBackendLoginUrl(): string {
  return new URL('/login', getBackendBaseUrl()).toString();
}

export function getAdminDashboardUrl(): string {
  return new URL('/dashboard', getBackendBaseUrl()).toString();
}

export async function getCsrfHeaders(): Promise<Record<string, string>> {
  const response = await fetch('/sanctum/csrf-cookie', {
    credentials: 'include',
    headers: { Accept: 'application/json' },
  });

  if (!response.ok) {
    throw new Error(`Unable to initialize checkout security: ${response.status}`);
  }

  const csrfCookie = document.cookie
    .split('; ')
    .find((cookie) => cookie.startsWith('XSRF-TOKEN='));

  if (!csrfCookie) {
    throw new Error('The checkout security cookie was not set.');
  }

  return {
    'X-XSRF-TOKEN': decodeURIComponent(
      csrfCookie.substring('XSRF-TOKEN='.length)
    ),
  };
}

export class ApiError extends Error {
  constructor(
    message: string,
    public readonly status: number,
    public readonly errors: Record<string, string[]> = {}
  ) {
    super(message);
    this.name = 'ApiError';
  }
}

export async function apiRequest<T>(
  path: string,
  options: RequestInit = {},
  csrf = false
): Promise<T> {
  const csrfHeaders = csrf ? await getCsrfHeaders() : {};
  const response = await fetch(`${API_URL}${path}`, {
    ...options,
    credentials: 'include',
    headers: {
      Accept: 'application/json',
      ...(options.body ? { 'Content-Type': 'application/json' } : {}),
      ...csrfHeaders,
      ...options.headers,
    },
  });

  const json = await response.json();
  if (!response.ok) {
    if (response.status === 401) {
      window.dispatchEvent(new Event('auth:unauthorized'));
    }

    throw new ApiError(
      json.message || `Request failed: ${response.status}`,
      response.status,
      json.errors || {}
    );
  }

  return json as T;
}

async function get(path: string) {
  const json = await apiRequest<any>(path);
  // supports both [..] and { data: [..] } (Laravel resources)
  return Array.isArray(json) ? json : json.data ?? [];
}

// Expected product shape (map your Laravel fields here if different):
// { id, name, description, image, price, regular_price, brand, category_name, sku, stock, category_ids }
export const getProducts = () => get('/products');

// Expected category shape: { id, name, slug, image_icon_url }
export const getCategories = () => get('/categories');
