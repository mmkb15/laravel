import { FormEvent, useEffect, useState } from 'react';
import { Link, Navigate, useLocation, useNavigate, useSearchParams } from 'react-router-dom';
import Button from 'components/button';
import AuthPage from 'containers/auth-page';
import { ApiError, apiRequest, getAdminDashboardUrl } from 'helpers/api';
import { useAuth } from 'contexts/auth/auth-context';

const demoAccounts = [
  {
    label: 'Try Admin Demo',
    email: import.meta.env.VITE_DEMO_ADMIN_EMAIL?.trim(),
    password: import.meta.env.VITE_DEMO_ADMIN_PASSWORD,
  },
  {
    label: 'Try Customer Demo',
    email: import.meta.env.VITE_DEMO_CUSTOMER_EMAIL?.trim(),
    password: import.meta.env.VITE_DEMO_CUSTOMER_PASSWORD,
  },
].filter(
  (account): account is { label: string; email: string; password: string } =>
    Boolean(account.email && account.password)
);

function FormError({ children }: { children: React.ReactNode }) {
  return (
    <p className="mt-1 text-sm text-red-600" role="alert">
      {children}
    </p>
  );
}

function TextField({
  id,
  label,
  type = 'text',
  value,
  onChange,
  autoComplete,
  error,
}: {
  id: string;
  label: string;
  type?: string;
  value: string;
  onChange: (value: string) => void;
  autoComplete?: string;
  error?: string;
}) {
  return (
    <div>
      <label htmlFor={id} className="mb-2 block text-sm font-semibold text-gray-800">
        {label}
      </label>
      <input
        id={id}
        name={id}
        type={type}
        value={value}
        onChange={(event) => onChange(event.target.value)}
        autoComplete={autoComplete}
        aria-invalid={Boolean(error)}
        aria-describedby={error ? `${id}-error` : undefined}
        className="w-full rounded border border-gray-400 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20"
        required
      />
      {error && <span id={`${id}-error`}><FormError>{error}</FormError></span>}
    </div>
  );
}

function fieldError(error: unknown, field: string): string | undefined {
  if (error instanceof ApiError) {
    return error.errors[field]?.[0];
  }

  return undefined;
}

function requestError(error: unknown): string {
  if (error instanceof ApiError) {
    return error.message;
  }

  return 'We could not connect to the store. Please try again.';
}

export function LoginPage() {
  const { user, loading, error, signIn } = useAuth();
  const navigate = useNavigate();
  const location = useLocation();
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [remember, setRemember] = useState(true);
  const [formError, setFormError] = useState('');
  const [errors, setErrors] = useState<Record<string, string>>({});
  const [submitting, setSubmitting] = useState(false);

  function fillDemoAccount(email: string, password: string) {
    setEmail(email);
    setPassword(password);
    setRemember(false);
    setFormError('');
    setErrors({});
  }

  useEffect(() => {
    if (user?.role === 'admin') {
      window.location.replace(getAdminDashboardUrl());
    }
  }, [user]);

  if (loading) {
    return <AuthPage eyebrow="Account" title="Checking your account" description="Please wait a moment." />;
  }
  if (user?.role === 'admin') {
    return <AuthPage eyebrow="Account" title="Opening admin dashboard" description="Please wait a moment." />;
  }
  if (user) {
    return <Navigate to="/account" replace />;
  }

  async function submit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setSubmitting(true);
    setFormError('');
    setErrors({});
    try {
      const result = await signIn(email, password, remember);
      if (result.role === 'admin') {
        window.location.assign(result.redirect_url);
        return;
      }
      const destination = location.state?.from;
      navigate(
        typeof destination === 'string' &&
          destination.startsWith('/') &&
          !destination.startsWith('//')
          ? destination
          : result.redirect_url,
        { replace: true }
      );
    } catch (submitError) {
      setFormError(requestError(submitError));
      setErrors({
        email: fieldError(submitError, 'email') || '',
        password: fieldError(submitError, 'password') || '',
      });
    } finally {
      setSubmitting(false);
    }
  }

  return (
    <AuthPage eyebrow="Welcome back" title="Sign in" description="Sign in with your customer or admin account. We will open the right dashboard for your role.">
      {error && (
        <div className="mb-5 rounded border border-red-200 bg-red-50 p-3 text-sm text-red-700" role="alert">
          {error}
        </div>
      )}
      {formError && (
        <div className="mb-5 rounded border border-red-200 bg-red-50 p-3 text-sm text-red-700" role="alert">
          {formError}
        </div>
      )}
      {demoAccounts.length > 0 && (
        <section className="mb-5 grid gap-3" aria-label="Demo accounts">
          <p className="text-sm font-semibold text-gray-700">Explore with a demo account</p>
          <div className="grid gap-3 sm:grid-cols-2">
            {demoAccounts.map((account) => (
              <button
                key={account.label}
                type="button"
                onClick={() => fillDemoAccount(account.email, account.password)}
                className="rounded border border-gray-300 px-4 py-3 text-sm font-semibold text-gray-800 transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary"
              >
                {account.label}
              </button>
            ))}
          </div>
          <p className="text-xs text-gray-500">Selecting a role fills the sign-in form. Then click Sign in.</p>
        </section>
      )}
      <form className="grid gap-5" onSubmit={submit}>
        <TextField id="email" label="Email address" type="email" value={email} onChange={setEmail} autoComplete="email" error={errors.email} />
        <div>
          <TextField id="password" label="Password" type="password" value={password} onChange={setPassword} autoComplete="current-password" error={errors.password} />
          <div className="mt-3 flex items-center justify-between gap-3">
            <label className="flex items-center gap-2 text-sm text-gray-600">
              <input type="checkbox" checked={remember} onChange={(event) => setRemember(event.target.checked)} />
              Remember me
            </label>
            <Link to="/forgot-password" className="text-sm font-semibold text-primary hover:underline">
              Forgot password?
            </Link>
          </div>
        </div>
        <Button type="submit" disabled={submitting} loading={submitting} className="w-full">
          Sign in
        </Button>
      </form>
      <p className="mt-6 text-center text-sm text-gray-600">
        New to our store?{' '}
        <Link to="/register" className="font-semibold text-primary hover:underline">
          Create an account
        </Link>
      </p>
      <p className="mt-4 text-center text-xs leading-5 text-gray-500">
        Prefer not to sign in?
      </p>
      <Link
        to="/"
        className="mt-2 inline-flex w-full items-center justify-center rounded border border-gray-300 px-4 py-3 text-sm font-semibold text-gray-800 transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary"
      >
        Continue as guest
      </Link>
    </AuthPage>
  );
}

export function RegisterPage() {
  const { user, loading, register } = useAuth();
  const navigate = useNavigate();
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [passwordConfirmation, setPasswordConfirmation] = useState('');
  const [formError, setFormError] = useState('');
  const [errors, setErrors] = useState<Record<string, string>>({});
  const [submitting, setSubmitting] = useState(false);

  if (loading) {
    return <AuthPage eyebrow="Customer account" title="Getting things ready" description="Please wait a moment." />;
  }
  if (user) {
    return <Navigate to="/account" replace />;
  }

  async function submit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setSubmitting(true);
    setFormError('');
    setErrors({});
    try {
      const result = await register(name, email, password, passwordConfirmation);
      navigate(result.redirect_url, { replace: true });
    } catch (submitError) {
      setFormError(requestError(submitError));
      setErrors({
        name: fieldError(submitError, 'name') || '',
        email: fieldError(submitError, 'email') || '',
        password: fieldError(submitError, 'password') || '',
      });
    } finally {
      setSubmitting(false);
    }
  }

  return (
    <AuthPage eyebrow="Join our store" title="Create your account" description="Save your details and keep your orders together.">
      {formError && (
        <div className="mb-5 rounded border border-red-200 bg-red-50 p-3 text-sm text-red-700" role="alert">
          {formError}
        </div>
      )}
      <form className="grid gap-5" onSubmit={submit}>
        <TextField id="name" label="Full name" value={name} onChange={setName} autoComplete="name" error={errors.name} />
        <TextField id="email" label="Email address" type="email" value={email} onChange={setEmail} autoComplete="email" error={errors.email} />
        <TextField id="password" label="Password (at least 8 characters)" type="password" value={password} onChange={setPassword} autoComplete="new-password" error={errors.password} />
        <TextField id="password_confirmation" label="Confirm password" type="password" value={passwordConfirmation} onChange={setPasswordConfirmation} autoComplete="new-password" />
        <Button type="submit" disabled={submitting} loading={submitting} className="w-full">
          Create customer account
        </Button>
      </form>
      <p className="mt-6 text-center text-sm text-gray-600">
        Already have an account?{' '}
        <Link to="/login" className="font-semibold text-primary hover:underline">
          Sign in
        </Link>
      </p>
      <p className="mt-4 text-center text-sm text-gray-600">
        Want to shop without an account?{' '}
        <Link to="/" className="font-semibold text-primary hover:underline">
          Continue as guest
        </Link>
      </p>
    </AuthPage>
  );
}

export function ForgotPasswordPage() {
  const [email, setEmail] = useState('');
  const [message, setMessage] = useState('');
  const [error, setError] = useState('');
  const [submitting, setSubmitting] = useState(false);

  async function submit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setSubmitting(true);
    setMessage('');
    setError('');
    try {
      const result = await apiRequest<{ message: string }>(
        '/auth/forgot-password',
        { method: 'POST', body: JSON.stringify({ email }) },
        true
      );
      setMessage(result.message);
    } catch (requestError) {
      setError(requestError instanceof ApiError ? requestError.message : 'We could not connect to the store. Please try again.');
    } finally {
      setSubmitting(false);
    }
  }

  return (
    <AuthPage eyebrow="Account recovery" title="Reset your password" description="Enter the email address for your account. We will send recovery instructions if it is registered.">
      {message && <div className="mb-5 rounded border border-green-200 bg-green-50 p-3 text-sm text-green-800" role="status">{message}</div>}
      {error && <div className="mb-5 rounded border border-red-200 bg-red-50 p-3 text-sm text-red-700" role="alert">{error}</div>}
      <form className="grid gap-5" onSubmit={submit}>
        <TextField id="email" label="Email address" type="email" value={email} onChange={setEmail} autoComplete="email" />
        <Button type="submit" disabled={submitting} loading={submitting} className="w-full">
          Send reset link
        </Button>
      </form>
      <p className="mt-6 text-center text-sm text-gray-600">
        Remembered your password? <Link to="/login" className="font-semibold text-primary hover:underline">Sign in</Link>
      </p>
    </AuthPage>
  );
}

export function ResetPasswordPage() {
  const { setUser } = useAuth();
  const navigate = useNavigate();
  const [searchParams] = useSearchParams();
  const [email, setEmail] = useState(searchParams.get('email') || '');
  const [password, setPassword] = useState('');
  const [passwordConfirmation, setPasswordConfirmation] = useState('');
  const [error, setError] = useState('');
  const [errors, setErrors] = useState<Record<string, string>>({});
  const [submitting, setSubmitting] = useState(false);
  const token = searchParams.get('token') || '';

  async function submit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setSubmitting(true);
    setError('');
    setErrors({});
    try {
      const result = await apiRequest<{
        user: import('contexts/auth/auth-context').AuthUser | null;
        redirect_url: string;
      }>(
        '/auth/reset-password',
        {
          method: 'POST',
          body: JSON.stringify({
            token,
            email,
            password,
            password_confirmation: passwordConfirmation,
          }),
        },
        true
      );
      if (result.user) {
        setUser(result.user);
      }
      if (result.user?.role === 'admin') {
        window.location.assign(result.redirect_url);
      } else {
        navigate(result.redirect_url, { replace: true });
      }
    } catch (requestError) {
      setError(requestError instanceof ApiError ? requestError.message : 'We could not connect to the store. Please try again.');
      setErrors({
        email: fieldError(requestError, 'email') || '',
        password: fieldError(requestError, 'password') || '',
      });
    } finally {
      setSubmitting(false);
    }
  }

  return (
    <AuthPage eyebrow="Account recovery" title="Choose a new password" description="Choose a strong password you have not used before.">
      {!token && <div className="mb-5 rounded border border-red-200 bg-red-50 p-3 text-sm text-red-700" role="alert">This password reset link is missing or invalid. Request a new link.</div>}
      {error && <div className="mb-5 rounded border border-red-200 bg-red-50 p-3 text-sm text-red-700" role="alert">{error}</div>}
      <form className="grid gap-5" onSubmit={submit}>
        <TextField id="email" label="Email address" type="email" value={email} onChange={setEmail} autoComplete="email" error={errors.email} />
        <TextField id="password" label="New password (at least 8 characters)" type="password" value={password} onChange={setPassword} autoComplete="new-password" error={errors.password} />
        <TextField id="password_confirmation" label="Confirm new password" type="password" value={passwordConfirmation} onChange={setPasswordConfirmation} autoComplete="new-password" />
        <Button type="submit" disabled={submitting || !token} loading={submitting} className="w-full">
          Update password
        </Button>
      </form>
      <p className="mt-6 text-center text-sm text-gray-600">
        <Link to="/forgot-password" className="font-semibold text-primary hover:underline">Request another reset link</Link>
      </p>
    </AuthPage>
  );
}
