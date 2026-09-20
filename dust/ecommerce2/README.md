# Mursalin Ecommerce

A Laravel 13 Blade-based single-vendor ecommerce starter built from the uploaded project and its existing admin template.

## Current scope

Authentication is intentionally **not implemented yet**.

Implemented now:

- Existing admin template preserved
- Dynamic dashboard
- Category CRUD
- Brand CRUD
- Product CRUD
- Primary SKU management with price, stock and image
- Product search and pagination
- Admin order list/details/status update
- Customer storefront
- Product details
- Session cart
- Checkout
- Order creation with database transaction
- Stock reduction after checkout
- Order confirmation

Vendor/multivendor functionality is not included.

## Requirements

- PHP 8.3+
- Composer
- MySQL 8+
- Node.js/npm is optional for this version because the existing template assets are already included.

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Configure MySQL in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=
```

For a fresh copy of this development project:

```bash
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

Open:

- Admin: `http://127.0.0.1:8000/`
- Store: `http://127.0.0.1:8000/shop`
- Categories: `http://127.0.0.1:8000/categories`
- Brands: `http://127.0.0.1:8000/brands`
- Products: `http://127.0.0.1:8000/products`
- Orders: `http://127.0.0.1:8000/orders`

## First working flow

1. Open `/categories` and create a category.
2. Open `/brands` and create a brand.
3. Open `/products` and create a product with its first SKU, price, stock and image.
4. Open `/shop`.
5. Open the product and add it to the cart.
6. Go to checkout.
7. Place the order.
8. Open `/orders` in the admin panel.
9. Open the order and change its status.

Stock is checked and reduced inside a database transaction during checkout.

## Important

Run `migrate:fresh --seed` on this development copy because the original uploaded project had earlier product/category migrations whose structure was replaced to match the current single-vendor direction.

Authentication, reviews, wishlist, coupons, payments, shipments and multi-SKU/attribute management are intentionally left for the next phase rather than pretending they are complete.
