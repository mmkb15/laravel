import {
  createContext,
  PropsWithChildren,
  useCallback,
  useContext,
  useEffect,
  useMemo,
  useState,
} from 'react';
import { apiRequest, ApiError } from 'helpers/api';

export interface AuthUser {
  id: number;
  name: string;
  email: string;
  role: 'admin' | 'customer';
  phone: string | null;
  address: string | null;
}

interface AuthContextValue {
  user: AuthUser | null;
  loading: boolean;
  error: string | null;
  refreshUser: () => Promise<void>;
  setUser: (user: AuthUser) => void;
  signIn: (
    email: string,
    password: string,
    remember: boolean
  ) => Promise<{ redirect_url: string; role: AuthUser['role'] }>;
  register: (
    name: string,
    email: string,
    password: string,
    passwordConfirmation: string
  ) => Promise<{ redirect_url: string }>;
  signOut: () => Promise<void>;
}

const AuthContext = createContext<AuthContextValue | null>(null);

export function AuthProvider({ children }: PropsWithChildren) {
  const [user, setUser] = useState<AuthUser | null>(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const handleUnauthorized = () => {
      setUser(null);
      setError(null);
    };

    window.addEventListener('auth:unauthorized', handleUnauthorized);
    return () => window.removeEventListener('auth:unauthorized', handleUnauthorized);
  }, []);

  const refreshUser = useCallback(async () => {
    setLoading(true);
    setError(null);
    try {
      const result = await apiRequest<{ user: AuthUser }>('/auth/user');
      setUser(result.user);
    } catch (requestError) {
      if (requestError instanceof ApiError && requestError.status === 401) {
        setUser(null);
      } else {
        setError('We could not check your sign-in status. Please try again.');
      }
    } finally {
      setLoading(false);
    }
  }, []);

  useEffect(() => {
    void refreshUser();
  }, [refreshUser]);

  const signIn = useCallback(
    async (email: string, password: string, remember: boolean) => {
      const result = await apiRequest<{
        user: AuthUser;
        redirect_url: string;
      }>(
        '/auth/login',
        {
          method: 'POST',
          body: JSON.stringify({ email, password, remember }),
        },
        true
      );
      setUser(result.user);
      return { redirect_url: result.redirect_url, role: result.user.role };
    },
    []
  );

  const register = useCallback(
    async (
      name: string,
      email: string,
      password: string,
      passwordConfirmation: string
    ) => {
      const result = await apiRequest<{
        user: AuthUser;
        redirect_url: string;
      }>(
        '/auth/register',
        {
          method: 'POST',
          body: JSON.stringify({
            name,
            email,
            password,
            password_confirmation: passwordConfirmation,
          }),
        },
        true
      );
      setUser(result.user);
      return { redirect_url: result.redirect_url };
    },
    []
  );

  const signOut = useCallback(async () => {
    await apiRequest('/auth/logout', { method: 'POST' }, true);
    setUser(null);
  }, []);

  const value = useMemo(
    () => ({
      user,
      loading,
      error,
      refreshUser,
      setUser,
      signIn,
      register,
      signOut,
    }),
    [user, loading, error, refreshUser, signIn, register, signOut]
  );

  return <AuthContext.Provider value={value}>{children}</AuthContext.Provider>;
}

export function useAuth(): AuthContextValue {
  const context = useContext(AuthContext);
  if (!context) {
    throw new Error('useAuth must be used inside AuthProvider.');
  }

  return context;
}
