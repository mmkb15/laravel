import React, { useContext } from 'react';
import ItemCard from 'components/item-card';
import { DrawerContext } from 'contexts/drawer/drawer.provider';
import { useSearch } from 'contexts/search/use-search';
import { useSearchable } from 'helpers/use-searchable';
import NotFound from 'assets/icons/not-found';
import { useCategory } from 'contexts/category/use-category';

const Products = React.forwardRef(
  ({ items }: any, ref: React.RefObject<HTMLDivElement>) => {
    const { dispatch } = useContext(DrawerContext);

    const { searchTerm, setSearchTerm } = useSearch();
    const { category, setCategory } = useCategory();
    const searchableItems = useSearchable(
      items,
      category,
      searchTerm,
      (item) => [item.name]
    );

    const showDetails = (item) => {
      dispatch({
        type: 'STORE_PRODUCT_DETAIL',
        payload: {
          item: item,
        },
      });

      dispatch({
        type: 'SLIDE_CART',
        payload: {
          open: true,
        },
      });

      dispatch({
        type: 'TOGGLE_PRODUCT_DETAIL',
        payload: {
          showDetails: true,
        },
      });
    };

    return (
      <div
        className="w-full scroll-mt-[110px] py-10"
        ref={ref}
        id="myScrollToElement"
      >
        <div className="mb-6">
          <h2 className="text-21px font-semibold text-gray-900">
            {searchTerm ? 'Search results' : category ? 'Filtered products' : 'Shop all products'}
          </h2>
          {searchableItems.length > 0 && (
            <p className="mt-1 text-13px text-gray-600" role="status" aria-live="polite">
              Showing {searchableItems.length}{' '}
              {searchableItems.length === 1 ? 'product' : 'products'}
            </p>
          )}
        </div>
        {searchableItems?.length ? (
          <div className="grid grid-cols-2 gap-x-3 gap-y-6 md:grid-cols-3 md:gap-x-4 md:gap-y-8 lg:grid-cols-4 lg:gap-x-4 lg:gap-y-10 xxl:grid-cols-4 xxl:gap-x-4 xxl:gap-y-12 2xxl:grid-cols-6 2xxl:gap-x-5 2xxl:gap-y-12">
            {searchableItems.map((item) => (
              <ItemCard
                key={item.id}
                item={item}
                onClick={() => showDetails(item)}
              />
            ))}
          </div>
        ) : (
          <div className="pt-10px md:pt-40px lg:pt-20px pb-40px">
            <NotFound width="100%" />
            <h3 className="text-24px text-gray-900 font-bold mt-35px mb-0 text-center">
              No products match your search
            </h3>
            <p className="mt-2 text-center text-gray-600">
              Try another search or clear your filters to see all products.
            </p>
            {(searchTerm || category) && (
              <button
                type="button"
                className="mx-auto mt-4 block rounded border border-gray-400 px-4 py-2 text-13px font-semibold text-gray-900 transition-colors hover:bg-gray-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                onClick={() => {
                  setSearchTerm('');
                  setCategory('');
                }}
              >
                Clear filters
              </button>
            )}
          </div>
        )}
      </div>
    );
  }
);

export default Products;
