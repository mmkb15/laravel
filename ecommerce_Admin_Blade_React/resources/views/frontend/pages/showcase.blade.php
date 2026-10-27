@extends('admin.layouts.single')

@section('title', 'Choose Your Storefront')

@section('content')
<main class="showcase">
    <header class="showcase-header">
        <a href="{{ route('showcase') }}" class="showcase-brand" aria-label="Carto presentation home">
            <span class="showcase-brand-mark">C</span>
            Carto
        </a>
        <a class="showcase-sign-in" href="{{ route('login') }}">Customer sign in</a>
    </header>

    <section class="showcase-hero" aria-labelledby="showcase-title">
        <p class="showcase-kicker">Storefront presentation</p>
        <h1 id="showcase-title">One store. Two ways to shop.</h1>
        <p>Explore the original Blade experience or compare it with the newer React storefront. Staff can sign in to the admin dashboard separately.</p>
    </section>

    <section class="showcase-options" aria-label="Choose a site">
        <article class="showcase-card">
            <div class="showcase-card-top">
                <span class="showcase-number">01</span>
                <span class="showcase-tag">Original</span>
            </div>
            <div>
                <p class="showcase-card-label">Laravel</p>
                <h2>Blade storefront</h2>
                <p class="showcase-card-copy">The original server-rendered store, built with Laravel Blade.</p>
            </div>
            <a class="showcase-button showcase-button-light" href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">
                Explore Blade
                <span aria-hidden="true">&rarr;</span>
            </a>
        </article>

        <article class="showcase-card showcase-card-featured">
            <div class="showcase-card-top">
                <span class="showcase-number">02</span>
                <span class="showcase-tag showcase-tag-bright">New experience</span>
            </div>
            <div>
                <p class="showcase-card-label">React</p>
                <h2>React storefront</h2>
                <p class="showcase-card-copy">A modern, interactive storefront powered by React.</p>
            </div>
            @if (filled(config('app.react_frontend_url')))
                <a class="showcase-button showcase-button-bright" href="{{ config('app.react_frontend_url') }}" target="_blank" rel="noopener noreferrer">
                    Explore React
                    <span aria-hidden="true">&rarr;</span>
                </a>
            @else
                <p class="showcase-unavailable" role="status">React storefront is not configured for this environment.</p>
            @endif
        </article>

        <article class="showcase-card">
            <div class="showcase-card-top">
                <span class="showcase-number">03</span>
                <span class="showcase-tag showcase-tag-staff">Staff only</span>
            </div>
            <div>
                <p class="showcase-card-label">Management</p>
                <h2>Admin dashboard</h2>
                <p class="showcase-card-copy">Manage products, orders, customers, and store operations.</p>
            </div>
            <a class="showcase-button showcase-button-dark" href="{{ route('admin.login') }}">
                Admin sign in
                <span aria-hidden="true">&rarr;</span>
            </a>
        </article>
    </section>

    <footer class="showcase-footer">
        <span>Carto store presentation</span>
        <a href="{{ route('login') }}">Already have an account? Sign in</a>
    </footer>
</main>
@endsection

@section('style')
<style>
    .showcase { min-height: 100vh; padding: 0 7vw; color: #172033; background: #f5f7fb; font-family: "Plus Jakarta Sans", sans-serif; }
    .showcase-header, .showcase-footer { display: flex; align-items: center; justify-content: space-between; gap: 20px; }
    .showcase-header { min-height: 70px; }
    .showcase-brand { display: inline-flex; align-items: center; gap: 10px; color: #172033; font-size: 20px; font-weight: 800; text-decoration: none; }
    .showcase-brand-mark { display: grid; width: 38px; height: 38px; place-items: center; border-radius: 12px; background: #5145e5; color: white; }
    .showcase-sign-in, .showcase-footer a { color: #5145e5; font-size: 14px; font-weight: 700; text-decoration: none; }
    .showcase-sign-in:hover, .showcase-footer a:hover { text-decoration: underline; }
    .showcase-hero { max-width: 760px; margin: 24px auto 36px; text-align: center; }
    .showcase-kicker { margin: 0 0 14px; color: #5145e5; font-size: 12px; font-weight: 800; letter-spacing: .16em; text-transform: uppercase; }
    .showcase-hero h1 { margin: 0; color: #172033; font-size: clamp(34px, 5vw, 56px); font-weight: 800; letter-spacing: -.045em; line-height: 1.1; }
    .showcase-hero > p:last-child { max-width: 630px; margin: 18px auto 0; color: #64748b; font-size: 16px; line-height: 1.7; }
    .showcase-options { display: grid; max-width: 1180px; margin: 0 auto; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; align-items: stretch; }
    .showcase-card { display: flex; min-height: 280px; flex-direction: column; justify-content: space-between; gap: 24px; padding: 24px; border: 1px solid #e1e7f0; border-radius: 20px; background: white; box-shadow: 0 16px 40px #15233b0a; }
    .showcase-card-featured { border-color: #5145e5; background: linear-gradient(145deg, #30268f, #5145e5 68%, #7167f4); color: white; box-shadow: 0 20px 48px #5145e52e; }
    .showcase-card-top { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
    .showcase-number { color: #a0aabd; font-size: 13px; font-weight: 800; letter-spacing: .08em; }
    .showcase-card-featured .showcase-number { color: #d8d4ff; }
    .showcase-tag { padding: 7px 10px; border-radius: 999px; background: #f0efff; color: #5145e5; font-size: 10px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }
    .showcase-tag-bright { background: #ffffff24; color: white; }
    .showcase-tag-staff { background: #eef2f7; color: #475569; }
    .showcase-card-label { margin: 0 0 8px; color: #5145e5; font-size: 12px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
    .showcase-card-featured .showcase-card-label { color: #ddd9ff; }
    .showcase-card h2 { margin: 0; color: #172033; font-size: 24px; font-weight: 800; letter-spacing: -.03em; }
    .showcase-card-featured h2 { color: white; }
    .showcase-card-copy { margin: 10px 0 0; color: #64748b; font-size: 14px; line-height: 1.65; }
    .showcase-card-featured .showcase-card-copy { color: #eeecff; }
    .showcase-button { display: flex; min-height: 48px; align-items: center; justify-content: space-between; gap: 16px; padding: 0 16px; border-radius: 11px; font-size: 14px; font-weight: 800; text-decoration: none; transition: transform .18s ease, box-shadow .18s ease; }
    .showcase-button:hover { transform: translateY(-2px); }
    .showcase-button-light { border: 1px solid #dce3ed; background: white; color: #172033; }
    .showcase-button-bright { background: white; color: #4438c6; box-shadow: 0 8px 20px #20146e38; }
    .showcase-button-dark { background: #172033; color: white; }
    .showcase-unavailable { margin: 0; padding: 12px; border: 1px solid #ffffff4d; border-radius: 10px; color: #eeecff; font-size: 13px; line-height: 1.5; }
    .showcase-footer { max-width: 1180px; margin: 30px auto 0; padding: 20px 0 28px; border-top: 1px solid #e1e7f0; color: #8490a3; font-size: 12px; }
    @media (max-width: 900px) { .showcase { padding: 0 5vw; } .showcase-options { grid-template-columns: 1fr; max-width: 560px; } .showcase-card { min-height: 260px; } .showcase-hero { margin-top: 28px; } }
    @media (max-width: 480px) { .showcase { padding: 0 20px; } .showcase-header { min-height: 72px; } .showcase-hero h1 { font-size: 36px; } .showcase-footer { align-items: flex-start; flex-direction: column; gap: 10px; } }
</style>
@endsection
