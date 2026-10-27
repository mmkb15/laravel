import { useEffect, useState } from 'react';
import Layout from 'containers/layout/layout';
import HeroBlock from 'containers/hero-block';
import Products from 'containers/products';
import CallToAction from 'containers/call-to-action';
import HowItWorks from 'containers/how-it-works';
import Categories from 'containers/categories';
import PageTitle from 'components/page-title';
import { STORE_NAME } from 'helpers/constants';
import { useRefScroll } from 'helpers/use-ref-scroll';
import { useSearch } from 'contexts/search/use-search';
import { useCategory } from 'contexts/category/use-category';
import { getProducts, getCategories } from 'helpers/api';

export default function Home() {
  const [products, setProducts] = useState<any[]>([]);
  const [categories, setCategories] = useState<any[]>([]);

  const { elRef, scroll } = useRefScroll({
    percentOfElement: 0,
    percentOfContainer: 0,
    offsetPX: -100,
  });
  const { searchTerm } = useSearch();
  const { category } = useCategory();

  // replaces Next.js getServerSideProps
  useEffect(() => {
    getProducts().then(setProducts).catch(console.error);
    getCategories().then(setCategories).catch(console.error);
  }, []);

  useEffect(() => {
    if (searchTerm || category) return scroll();
  }, [searchTerm, category, scroll]);

  return (
    <Layout>
      <PageTitle title={`${STORE_NAME} - Electronics Store`} />
      <HeroBlock />
      <Categories data={categories} ref={elRef} />
      <Products items={products} />
      <HowItWorks />
      <CallToAction />
    </Layout>
  );
}
