import { useEffect } from 'react';
import PageTitle from 'components/page-title';
import Layout from 'containers/layout/layout';
import TermsPageContent from 'containers/term/terms';

export default function FAQ() {
  return (
    <Layout style={{ height: 'auto' }}>
      <PageTitle title="Terms & Condition" />

      <div className="px-0">
        <TermsPageContent />
      </div>
    </Layout>
  );
}
