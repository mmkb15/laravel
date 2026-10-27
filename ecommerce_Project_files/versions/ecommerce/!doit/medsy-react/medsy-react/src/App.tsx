import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { CartProvider } from 'contexts/cart/cart.provider';
import { DrawerProvider } from 'contexts/drawer/drawer.provider';
import { SearchProvider } from 'contexts/search/use-search';
import { CategoryProvider } from 'contexts/category/use-category';
import Home from 'pages/home';
import Faq from 'pages/faq';
import Terms from 'pages/terms';

export default function App() {
  return (
    <SearchProvider>
      <CategoryProvider>
        <DrawerProvider>
          <CartProvider>
            <BrowserRouter>
              <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/faq" element={<Faq />} />
                <Route path="/terms" element={<Terms />} />
              </Routes>
            </BrowserRouter>
          </CartProvider>
        </DrawerProvider>
      </CategoryProvider>
    </SearchProvider>
  );
}
