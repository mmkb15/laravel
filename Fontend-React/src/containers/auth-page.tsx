import { PropsWithChildren } from 'react';
import Layout from 'containers/layout/layout';
import PageTitle from 'components/page-title';
import { STORE_NAME } from 'helpers/constants';

interface AuthPageProps extends PropsWithChildren {
  eyebrow: string;
  title: string;
  description: string;
}

export default function AuthPage({
  eyebrow,
  title,
  description,
  children,
}: AuthPageProps) {
  return (
    <Layout>
      <PageTitle title={`${title} | ${STORE_NAME}`} />
      <div className="mx-auto grid max-w-5xl gap-8 py-8 md:grid-cols-[1fr_0.85fr] md:items-center md:py-14">
        <section className="mx-auto w-full max-w-md rounded-20px border border-gray-300 bg-white p-6 shadow-float md:p-9">
          <p className="mb-2 text-12px font-bold uppercase tracking-widest text-primary">
            {eyebrow}
          </p>
          <h1 className="mb-2 text-30px font-bold text-gray-900">{title}</h1>
          <p className="mb-7 text-sm leading-6 text-gray-600">{description}</p>
          {children}
        </section>

        <aside className="hidden rounded-20px bg-gray-900 p-9 text-white md:block">
          <p className="mb-3 text-12px font-bold uppercase tracking-widest text-indigo-200">
            Shop with confidence
          </p>
          <h2 className="mb-6 text-30px font-bold leading-tight text-white">
            Your orders, all in one place.
          </h2>
          <ul className="grid gap-5 text-sm leading-6 text-gray-200">
            <li>
              <strong className="text-white">Track your purchases</strong>
              <br />
              See order status and delivery details whenever you need them.
            </li>
            <li>
              <strong className="text-white">Faster checkout</strong>
              <br />
              Keep your contact details ready for your next order.
            </li>
            <li>
              <strong className="text-white">Your choice</strong>
              <br />
              You can still check out as a guest without creating an account.
            </li>
          </ul>
        </aside>
      </div>
    </Layout>
  );
}
