# Medsy – plain React (Vite) version

Run:
    npm install
    npm run dev        # http://ecommerce.test:5173

## Connect to your Laravel backend
1. Set `VITE_API_URL` in `.env` to your Laravel API origin, for example `http://ecommerce.test/api`.
2. Start Laravel Herd and run `npm run dev` from this folder. For login and logout, open `http://ecommerce.test:5173` (not `localhost:5173`). This keeps the session cookie available when admins are sent to Laravel's dashboard at `http://ecommerce.test/dashboard`.
3. In Laravel, set `FRONTEND_URL=http://ecommerce.test:5173` for local password-reset links. In production, serve the React storefront on the same site as Laravel and set `FRONTEND_URL` to that storefront origin.
4. Laravel's API uses Sanctum session cookies and CSRF protection; do not disable either to work around a login problem.

Laravel serves the login and registration pages. Admins are redirected to the Blade dashboard; customer accounts and order details are shown in React. Guest checkout remains available.
Field mapping lives in `src/helpers/api.ts`.

## Demo sign-in buttons
The Laravel sign-in page shows buttons that fill demo admin and customer credentials. In local development, they use the accounts created by `DatabaseSeeder`; run `php artisan db:seed` if those accounts are missing. To configure separate demo accounts, set `DEMO_ADMIN_EMAIL`, `DEMO_ADMIN_PASSWORD`, `DEMO_CUSTOMER_EMAIL`, and `DEMO_CUSTOMER_PASSWORD` in Laravel's `.env`.

Selecting a demo button only fills the form; the visitor still clicks **Login**. These credentials are visible in the browser. Use only disposable demo accounts and an isolated/resettable demo database; never expose a real administrator password or connect public demo admin access to important/live data. **Continue as guest** opens the storefront without signing in; guests can shop and check out without an account.

## What changed from the Next.js template
- next/link -> react-router-dom Link, next/router -> useLocation
- next/image -> <img>, next/head -> components/page-title.tsx
- pages/_app.tsx -> src/App.tsx (providers + routes), pages/index.tsx -> src/pages/home.tsx
- getServerSideProps -> useEffect + fetch to Laravel
- Removed Google Sheets / nodemailer / pages/api (server-only)
