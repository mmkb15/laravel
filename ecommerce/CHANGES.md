# CHANGES.md

## 1. Product edit — "can't change primary image" — FIXED
- `app/Http/Controllers/ProductController.php`: `update()` now accepts `primary_image_id`, and `syncPrimaryImage()` takes an optional preferred image so your choice actually wins instead of always keeping whatever was already primary.
- `resources/views/admin/pages/product/edit.blade.php`: each existing image now has a **"Set as primary"** radio button next to the Remove checkbox.

## 2. Sidebar — Admin card + Quick Actions removed
- `resources/views/admin/layouts/sidebar.blade.php`: removed the "Admin User / Admin account" card and the "Quick Actions" block. (Your header dropdown already shows the logged-in user, profile link, and logout — this was duplicated.)

## 3. Flash message design — readable + closable
- `resources/views/admin/layouts/master.blade.php`: success/error messages are now a colored card with an icon, bold readable text, and an X button to dismiss (uses Bootstrap's built-in alert-dismiss JS, already loaded — no extra script needed).
- New styles added to the bottom of `public/assets/css/admin-fixes.css` under `.ecom-flash`.

## 4. Category & Brand — image upload/edit/list — ADDED
- New migration: `database/migrations/2026_09_20_140000_add_image_to_categories_and_brands_tables.php` — adds an `image` column to both tables. **Run `php artisan migrate`.**
- `app/Models/Category.php` and `app/Models/Brand.php`: added `image` to `$fillable` and an `image_url` accessor (same pattern your `Product`/`User` models already use).
- `app/Http/Controllers/CategoryController.php` and `BrandController.php`: `store`/`update` now handle image upload, replace (deletes the old file), and a "remove current image" checkbox.
- Create/edit views (`category/create.blade.php`, `category/edit.blade.php`, `brand/form.blade.php`): added a FilePond image upload field, matching your Product/User image sections.
- Index views (`category/index.blade.php`, `brand/index.blade.php`): show the uploaded thumbnail instead of the placeholder icon when an image exists.

## 5. Inline validation messages
- Every required field across Category, Brand, Product (create + edit), and User forms now shows its own `@error()` message under the field, instead of one generic banner at the top. The `required` HTML attribute still gives instant browser-side feedback for a blank field; the `@error()` block covers everything server-side validation catches (duplicate SKU, bad number ranges, etc).

## 6. Product view (show) page — ADDED
- `routes/web.php`: `products` resource route now includes `show` again (was excluded).
- `app/Http/Controllers/ProductController.php`: added `show()`.
- New view: `resources/views/admin/pages/product/show.blade.php` — built in the same "detail grid" style as your existing Order show page (gallery + description on the left, SKU/category/brand/pricing/stock/status on the right).
- `resources/views/admin/pages/product/index.blade.php`: added an eye icon linking to the new show page, next to Edit/Delete.

## What you need to do after unzipping
1. Replace your project folder (or copy these changed files over) with this one.
2. Run:
   ```
   php artisan migrate
   ```
   This adds the `image` column to `categories` and `brands`. It's additive — your existing data is untouched.
3. Clear cached views if you had the server running:
   ```
   php artisan view:clear
   ```
4. Test: edit a product and confirm you can now switch which image is primary; add an image to a category/brand; try submitting a form with a blank required field and confirm the message appears under that field; open a product's eye icon to see the new view page; check the flash message on any create/update action.
