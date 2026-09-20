# Mursalin Ecommerce Admin

Single-store Laravel ecommerce admin panel built directly on the supplied Remos ecommerce admin template.

## Design
The supplied template is the source of the admin Blade layout and static assets:
- Header
- Sidebar
- Footer
- Login
- Register
- 404 page
- Dashboard visual system
- Product/category forms and list styling

No Vite build is required for the admin pages because the template CSS/JS is served directly from `public/assets`.

## Scope
- Single store only
- No vendor module
- No multivendor logic
- No commission
- No public storefront
- Admin authentication
- Dashboard
- Products
- Categories
- Brands
- Orders
- Users
- Reports
- Profile

## Demo admin
- Email: admin@example.com
- Password: password

## Setup
```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

Open `/login` or `/admin/login` if you add that alias later. The current login route is `/login`.
