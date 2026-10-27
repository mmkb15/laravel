# Medsy – plain React (Vite) version

Run:
    npm install
    npm run dev        # http://localhost:5173

## Connect to your Laravel backend
1. Edit `.env` -> `VITE_API_URL=http://localhost:8000/api`
2. In Laravel `routes/api.php` create:
   - GET  /products    -> [{ id, name, description, image, price, manufacturer, type, quantity, dosage, substance, category_ids }]
   - GET  /categories  -> [{ id, name, slug, image_icon_url }]
   - POST /orders      -> body: { items, address, phone_number, email, bill_amount }  (return HTTP 200 on success)
3. Allow CORS for http://localhost:5173 in `config/cors.php`.
Field mapping lives in `src/helpers/api.ts`.

## What changed from the Next.js template
- next/link -> react-router-dom Link, next/router -> useLocation
- next/image -> <img>, next/head -> components/page-title.tsx
- pages/_app.tsx -> src/App.tsx (providers + routes), pages/index.tsx -> src/pages/home.tsx
- getServerSideProps -> useEffect + fetch to Laravel
- Removed Google Sheets / nodemailer / pages/api (server-only)
