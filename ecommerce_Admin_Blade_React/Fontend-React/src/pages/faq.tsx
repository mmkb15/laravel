import PageTitle from 'components/page-title';
import Layout from 'containers/layout/layout';
import Accordion from 'components/accordion';

const accordionData = [
  {
    id: '1',
    label: 'How long does delivery take?',
    children:
      'Orders inside the city are usually delivered within 1-2 working days. Other areas may take 3-5 working days.',
  },
  {
    id: '2',
    label: 'Are the products genuine and do they have a warranty?',
    children:
      'Yes. All products are original and come with the brand warranty. Warranty details are printed on the invoice.',
  },
  {
    id: '3',
    label: 'What payment methods do you accept?',
    children:
      'You can pay with Cash on Delivery. Bank transfer is also available on request.',
  },
  {
    id: '4',
    label: 'Can I return or replace a product?',
    children:
      'If a product arrives damaged or faulty, contact us within 7 days of delivery and we will arrange a replacement or refund.',
  },
];

export default function FAQ() {
  return (
    <Layout>
      <PageTitle title="F.A.Q" />

      <div className="py-35px px-0">
        <h3 className="w-full flex justify-center mb-30px text-24px text-gray-900 text-center font-semibold">
          F.A.Q
        </h3>
        <Accordion items={accordionData} />
      </div>
    </Layout>
  );
}
