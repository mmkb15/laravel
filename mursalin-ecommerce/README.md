# Mursalin eCommerce

Laravel 13 Single-Vendor eCommerce application built from the supplied admin template and the supplied Laravel eCommerce project as functional references.

## Architecture

- Laravel 13 + PHP 8.3+
- MySQL
- Blade + Eloquent
- Bootstrap 5
- Supplied Remos admin template assets
- Single vendor only
- Admin and Customer roles
- Session-based cart, so no cart/cart_items tables are added because those tables were commented out in the supplied ERD.

The supplied ERD is used for the database structure. The Vendor role/table and `products.vendor_id` are intentionally omitted because the application requirement is explicitly single-vendor.

## Requirements

- PHP 8.3 or newer
- Composer
- MySQL 8+
- PHP extensions required by Laravel 13

Node/npm is not required for the supplied implementation because the admin template assets are already included under `public/admin`.

## Installation

```bash
git clone <repository>
cd mursalin-ecommerce

composer install

cp .env.example .env
php artisan key:generate
```

Create a MySQL database named `mursalin_ecommerce`, or change the DB values in `.env`.

Then:

```bash
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Open:

`http://127.0.0.1:8000`

## Demo accounts

### Admin
- Email: `admin@example.com`
- Password: `password`

### Customer
- Email: `customer@example.com`
- Password: `password`

## Main features

### Admin
- Dashboard with database-backed statistics
- Category CRUD
- Brand CRUD
- Product CRUD
- Product SKU, price, stock and image
- Attributes and attribute values
- Customer management
- Coupon management
- Order management and status updates
- Review management
- Reusable delete confirmation modal
- Laravel pagination
- Validation and flash messages

### Customer
- Home page
- Product search
- Category and brand filters
- Product details
- SKU stock and price
- Session cart
- Checkout
- Coupon validation
- Cash on Delivery, Bkash, Nagad and Card payment method records
- Order history
- Wishlist
- One review per user/product
- 1-5 star ratings

## Storage

Product images are stored in:

```text
storage/app/public/products
```

Run:

```bash
php artisan storage:link
```

## Database

The schema includes:

- roles
- users
- addresses
- categories
- brands
- products
- product_skus
- attributes
- attribute_values
- sku_attribute_values
- coupons
- orders
- order_items
- payments
- shipments
- reviews
- wishlists

The ERD uniqueness constraints for reviews and wishlists are enforced at the database level.

## Important

This is a single-vendor store. There is no vendor registration, vendor login, vendor dashboard, vendor shop, commission, withdrawal or seller management.
