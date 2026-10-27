import { PropsWithChildren, useEffect } from 'react';
import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';
import { CartProvider } from 'contexts/cart/cart.provider';
import { DrawerProvider } from 'contexts/drawer/drawer.provider';
import { SearchProvider } from 'contexts/search/use-search';
import { CategoryProvider } from 'contexts/category/use-category';
import Home from 'pages/home';
import Faq from 'pages/faq';
import Terms from 'pages/terms';
import { AuthProvider } from 'contexts/auth/auth-context';
import { ForgotPasswordPage, ResetPasswordPage } from 'pages/auth';
import AccountPage from 'pages/account';
import OrderPage from 'pages/account/order';
import { useAuth } from 'contexts/auth/auth-context';
import { getAdminDashboardUrl, getBackendLoginUrl } from 'helpers/api';

function BackendAuthRedirect({ path }: { path: string }) {
  useEffect(() => {
    window.location.replace(new URL(path, getBackendLoginUrl()).toString());
  }, [path]);

  return <main className="p-10 text-center text-gray-600" role="status">Opening sign-in…</main>;
}

function CustomerRoute({ children }: PropsWithChildren) {
  const { user, loading, error, refreshUser } = useAuth();

  useEffect(() => {
    if (user?.role === 'admin') {
      window.location.replace(getAdminDashboardUrl());
    }
  }, [user]);

  if (loading) {
    return <main className="p-10 text-center text-gray-600" role="status">Checking your account…</main>;
  }
  if (error) {
    return (
      <main className="mx-auto max-w-lg p-10 text-center">
        <p className="mb-4 text-sm text-red-700" role="alert">{error}</p>
        <button type="button" onClick={() => void refreshUser()} className="rounded bg-primary px-5 py-3 font-semibold text-white">
          Try again
        </button>
      </main>
    );
  }
  if (!user) {
    return <Navigate to="/login" state={{ from: window.location.pathname }} replace />;
  }
  if (user.role !== 'customer') {
    return <main className="p-10 text-center text-gray-600" role="status">Opening admin dashboard…</main>;
  }

  return children;
}

export default function App() {
  return (
    <AuthProvider>
      <SearchProvider>
        <CategoryProvider>
          <DrawerProvider>
            <CartProvider>
              <BrowserRouter>
                <Routes>
                  <Route path="/" element={<Home />} />
                  <Route path="/faq" element={<Faq />} />
                  <Route path="/terms" element={<Terms />} />
                  <Route path="/login" element={<BackendAuthRedirect path="/login" />} />
                  <Route path="/register" element={<BackendAuthRedirect path="/register" />} />
                  <Route path="/forgot-password" element={<ForgotPasswordPage />} />
                  <Route path="/reset-password" element={<ResetPasswordPage />} />
                  <Route path="/account" element={<CustomerRoute><AccountPage /></CustomerRoute>} />
                  <Route path="/account/orders/:orderId" element={<CustomerRoute><OrderPage /></CustomerRoute>} />
                  <Route path="*" element={<Home />} />
                </Routes>
              </BrowserRouter>
            </CartProvider>
          </DrawerProvider>
        </CategoryProvider>
      </SearchProvider>
    </AuthProvider>
  );
}
