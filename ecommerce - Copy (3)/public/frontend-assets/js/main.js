// Sprylo — light interaction (no framework)
(function () {
  // Mobile drawer
  const drawer = document.getElementById('drawer');
  const toggle = document.querySelector('.nav-toggle');
  const close  = document.querySelector('.drawer-close');

  function setDrawer(open) {
    if (!drawer || !toggle) return;
    drawer.classList.toggle('is-open', open);
    drawer.setAttribute('aria-hidden', String(!open));
    toggle.setAttribute('aria-expanded', String(open));
    document.body.style.overflow = open ? 'hidden' : '';
  }
  toggle && toggle.addEventListener('click', () => setDrawer(!drawer.classList.contains('is-open')));
  close  && close.addEventListener('click', () => setDrawer(false));
  drawer && drawer.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => setDrawer(false)));
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer && drawer.classList.contains('is-open')) setDrawer(false);
  });

  // Trending tabs filter the product cards by their database category.
  document.querySelectorAll('.tabs').forEach((tablist) => {
    const tabs = tablist.querySelectorAll('.tab');
    const productGrid = document.querySelector('[data-trending-products]');
    const productCards = productGrid ? productGrid.querySelectorAll('[data-trending-card]') : [];
    const emptyMessage = document.querySelector('[data-trending-empty]');

    tabs.forEach((tab) => {
      tab.addEventListener('click', () => {
        tabs.forEach((t) => {
          t.classList.remove('is-active');
          t.setAttribute('aria-selected', 'false');
        });
        tab.classList.add('is-active');
        tab.setAttribute('aria-selected', 'true');

        const categoryFilter = tab.dataset.categoryFilter;
        if (!productGrid || !categoryFilter) return;

        let visibleCount = 0;
        productCards.forEach((card, index) => {
          const isVisible = categoryFilter === 'all'
            ? index < 5
            : card.dataset.categorySlug === categoryFilter;

          card.hidden = !isVisible;
          visibleCount += Number(isVisible);
        });

        if (emptyMessage) emptyMessage.hidden = visibleCount > 0;
      });
    });
  });

  // Product gallery thumbnails
  const thumbs = document.querySelectorAll('.gallery-thumbs button');
  const mainImg = document.querySelector('.gallery-main img');
  thumbs.forEach((t) => {
    t.addEventListener('click', () => {
      thumbs.forEach((x) => x.classList.remove('is-active'));
      t.classList.add('is-active');
      const src = t.querySelector('img')?.src;
      if (src && mainImg) mainImg.src = src.replace(/w=\d+/, 'w=900');
    });
  });

  document.addEventListener('click', (event) => {
    const button = event.target.closest('.qty button[data-act]');
    if (!button) return;

    const input = button.closest('.qty').querySelector('input');
    const currentQuantity = Number.parseInt(input.value, 10) || 1;
    const minimum = Number(input.min) || 1;
    const maximum = Number(input.max) || Number.MAX_SAFE_INTEGER;
    const change = button.dataset.act === '+' ? 1 : -1;

    input.value = String(Math.min(maximum, Math.max(minimum, currentQuantity + change)));
    input.dispatchEvent(new Event('change', { bubbles: true }));
  });

  // Color swatches & option pills (visual switch)
  document.querySelectorAll('.color-swatches, .option-pills').forEach((group) => {
    group.querySelectorAll('button').forEach((b) => {
      b.addEventListener('click', () => {
        group.querySelectorAll('button').forEach((x) => x.classList.remove('is-active'));
        b.classList.add('is-active');
      });
    });
  });

  const cartStorageKey = 'carto_cart_v1';

  function readCart() {
    try {
      const storedCart = JSON.parse(window.localStorage.getItem(cartStorageKey) || '{}');

      return Object.fromEntries(Object.entries(storedCart).filter(([productId, quantity]) => {
        return /^\d+$/.test(productId) && Number.isInteger(Number(quantity)) && Number(quantity) > 0;
      }).map(([productId, quantity]) => [productId, Number(quantity)]));
    } catch {
      return {};
    }
  }

  function saveCart(cart) {
    try {
      window.localStorage.setItem(cartStorageKey, JSON.stringify(cart));
    } catch {
      document.querySelectorAll('[data-cart-message]').forEach((message) => {
        message.textContent = 'Your browser could not save the cart. Check local storage settings and try again.';
        message.hidden = false;
      });
    }

    updateCartCount(cart);
    window.dispatchEvent(new Event('cart:updated'));
  }

  function updateCartCount(cart = readCart()) {
    const count = Object.values(cart).reduce((total, quantity) => total + quantity, 0);
    document.querySelectorAll('[data-cart-count]').forEach((counter) => {
      counter.textContent = String(count);
    });
  }

  function formatPrice(amount) {
    return `৳${new Intl.NumberFormat('en-BD', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(amount)}`;
  }

  document.addEventListener('click', (event) => {
    const button = event.target.closest('[data-add-to-cart]');
    if (!button) return;

    const purchasePanel = button.closest('[data-product-purchase]');
    const productId = button.dataset.productId || purchasePanel?.dataset.productId;
    if (!productId) return;

    const quantityInput = purchasePanel?.querySelector('input[name="quantity"]');
    const maximum = Number(quantityInput?.max) || Number.MAX_SAFE_INTEGER;
    const requestedQuantity = Math.min(maximum, Math.max(1, Number.parseInt(quantityInput?.value || '1', 10) || 1));
    const cart = readCart();
    cart[productId] = (cart[productId] || 0) + requestedQuantity;
    saveCart(cart);

    const originalLabel = button.textContent;
    button.textContent = 'Added to cart';
    button.disabled = true;
    window.setTimeout(() => {
      button.textContent = originalLabel;
      button.disabled = false;
    }, 1200);
  });

  updateCartCount();
  window.addEventListener('storage', (event) => {
    if (event.key === cartStorageKey) updateCartCount();
  });

  const cartPage = document.querySelector('[data-cart-page]');
  if (cartPage) {
    const cartView = cartPage.querySelector('[data-cart-view]');
    const checkoutView = cartPage.querySelector('[data-checkout-view]');
    const rowsContainer = cartPage.querySelector('[data-cart-items]');
    const emptyState = cartPage.querySelector('[data-cart-empty]');
    const summary = cartPage.querySelector('[data-cart-summary]');
    const message = cartPage.querySelector('[data-cart-message]');
    const itemCount = document.querySelector('[data-cart-item-count]');
    const subtotalLabel = cartPage.querySelector('[data-cart-subtotal]');
    const totalLabel = cartPage.querySelector('[data-cart-total]');
    const checkoutSummary = cartPage.querySelector('[data-checkout-summary]');
    const checkoutTotal = cartPage.querySelector('[data-checkout-total]');
    const checkoutItems = cartPage.querySelector('[data-checkout-items]');
    const checkoutForm = cartPage.querySelector('[data-checkout-form]');
    const productsById = new Map();

    function showMessage(text) {
      message.textContent = text;
      message.hidden = !text;
    }

    function updateCheckoutSummary(cart) {
      let subtotal = 0;
      checkoutSummary.replaceChildren();

      Object.entries(cart).forEach(([productId, quantity]) => {
        const product = productsById.get(productId);
        if (!product) return;

        const lineSubtotal = product.price * quantity;
        subtotal += lineSubtotal;
        const line = document.createElement('div');
        line.className = 'cart-line';
        const name = document.createElement('span');
        name.textContent = `${product.name} × ${quantity}`;
        const price = document.createElement('span');
        price.textContent = formatPrice(lineSubtotal);
        line.append(name, price);
        checkoutSummary.append(line);
      });

      checkoutTotal.textContent = formatPrice(subtotal);
      return subtotal;
    }

    function renderCart() {
      const cart = readCart();
      const availableItems = Object.entries(cart).filter(([productId]) => productsById.has(productId));
      const totalQuantity = availableItems.reduce((total, [, quantity]) => total + quantity, 0);
      const subtotal = availableItems.reduce((total, [productId, quantity]) => {
        return total + productsById.get(productId).price * quantity;
      }, 0);

      rowsContainer.replaceChildren();
      itemCount.textContent = `${totalQuantity} ${totalQuantity === 1 ? 'item' : 'items'} in your cart.`;
      subtotalLabel.textContent = formatPrice(subtotal);
      totalLabel.textContent = formatPrice(subtotal);
      emptyState.hidden = availableItems.length > 0;
      summary.hidden = availableItems.length === 0;

      availableItems.forEach(([productId, quantity]) => {
        const product = productsById.get(productId);
        const row = document.createElement('article');
        row.className = 'cart-row';

        const picture = document.createElement('div');
        picture.className = 'pic';
        const image = document.createElement('img');
        image.src = product.image;
        image.alt = product.name;
        picture.append(image);

        const info = document.createElement('div');
        info.className = 'info';
        const productLink = document.createElement('a');
        productLink.className = 'name';
        productLink.href = product.url;
        productLink.textContent = product.name;
        const stock = document.createElement('div');
        stock.className = 'variant';
        stock.textContent = `${product.stock} available`;
        info.append(productLink, stock);

        const quantityControl = document.createElement('div');
        quantityControl.className = 'qty cart-quantity';
        const decrease = document.createElement('button');
        decrease.type = 'button';
        decrease.dataset.act = '-';
        decrease.setAttribute('aria-label', `Decrease quantity for ${product.name}`);
        decrease.textContent = '−';
        decrease.disabled = quantity <= 1;
        const quantityInput = document.createElement('input');
        quantityInput.type = 'number';
        quantityInput.min = '1';
        quantityInput.max = String(product.stock);
        quantityInput.value = String(quantity);
        quantityInput.setAttribute('aria-label', `Quantity for ${product.name}`);
        quantityInput.dataset.cartQuantity = productId;
        const increase = document.createElement('button');
        increase.type = 'button';
        increase.dataset.act = '+';
        increase.setAttribute('aria-label', `Increase quantity for ${product.name}`);
        increase.textContent = '+';
        increase.disabled = quantity >= product.stock;
        quantityControl.append(decrease, quantityInput, increase);

        const lineSubtotal = document.createElement('span');
        lineSubtotal.className = 'subtotal';
        lineSubtotal.textContent = formatPrice(product.price * quantity);

        const remove = document.createElement('button');
        remove.type = 'button';
        remove.className = 'remove';
        remove.setAttribute('aria-label', `Remove ${product.name}`);
        remove.dataset.removeProduct = productId;
        remove.textContent = '×';

        row.append(picture, info, quantityControl, lineSubtotal, remove);
        rowsContainer.append(row);
      });

      updateCheckoutSummary(cart);
      updateCartCount(cart);
    }

    function setCheckoutMode(showCheckout, updateAddress = true) {
      if (showCheckout && rowsContainer.children.length === 0) {
        showMessage('Add a product before proceeding to checkout.');
        return;
      }

      showMessage('');
      cartView.hidden = showCheckout;
      checkoutView.hidden = !showCheckout;

      if (updateAddress) {
        const url = new URL(window.location.href);
        if (showCheckout) url.searchParams.set('checkout', '1');
        else url.searchParams.delete('checkout');
        window.history.replaceState({}, '', url);
      }
    }

    cartPage.addEventListener('click', (event) => {
      if (event.target.closest('[data-open-checkout]')) {
        setCheckoutMode(true);
      }

      if (event.target.closest('[data-back-to-cart]')) {
        setCheckoutMode(false);
      }

      const removeButton = event.target.closest('[data-remove-product]');
      if (removeButton) {
        const cart = readCart();
        delete cart[removeButton.dataset.removeProduct];
        saveCart(cart);
        renderCart();
      }
    });

    cartPage.addEventListener('change', (event) => {
      const input = event.target.closest('[data-cart-quantity]');
      if (!input) return;

      const product = productsById.get(input.dataset.cartQuantity);
      const quantity = Number.parseInt(input.value, 10);
      if (!product || !Number.isInteger(quantity) || quantity < 1 || quantity > product.stock) {
        renderCart();
        showMessage('Choose a quantity within the available stock.');
        return;
      }

      const cart = readCart();
      cart[input.dataset.cartQuantity] = quantity;
      saveCart(cart);
      renderCart();
    });

    checkoutForm.addEventListener('submit', (event) => {
      const cart = readCart();
      const items = Object.entries(cart).filter(([productId, quantity]) => {
        const product = productsById.get(productId);
        return product && quantity > 0 && quantity <= product.stock;
      });

      if (items.length === 0) {
        event.preventDefault();
        showMessage('Your cart is empty or contains an unavailable product.');
        setCheckoutMode(false);
        return;
      }

      checkoutItems.replaceChildren();
      items.forEach(([productId, quantity], index) => {
        [['product_id', productId], ['quantity', quantity]].forEach(([field, value]) => {
          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = `items[${index}][${field}]`;
          input.value = String(value);
          checkoutItems.append(input);
        });
      });
    });

    async function loadCart() {
      const url = new URL(window.location.href);
      let cart = readCart();
      if (url.searchParams.get('ordered') === '1') {
        cart = {};
        saveCart(cart);
        url.searchParams.delete('ordered');
        url.searchParams.delete('checkout');
        window.history.replaceState({}, '', url);
      }

      if (Object.keys(cart).length === 0) {
        renderCart();
        setCheckoutMode(false, false);
        return;
      }

      const query = new URLSearchParams();
      Object.keys(cart).forEach((productId) => query.append('ids[]', productId));

      try {
        const response = await fetch(`${cartPage.dataset.productsUrl}?${query.toString()}`, {
          headers: { Accept: 'application/json' },
        });
        if (!response.ok) throw new Error('Could not load cart products.');

        const products = await response.json();
        products.forEach((product) => productsById.set(String(product.id), product));

        const availableCart = Object.fromEntries(Object.entries(cart).filter(([productId]) => productsById.has(productId)));
        if (Object.keys(availableCart).length !== Object.keys(cart).length) {
          saveCart(availableCart);
          showMessage('Unavailable products were removed from your cart.');
        }

        Object.entries(availableCart).forEach(([productId, quantity]) => {
          const stock = productsById.get(productId).stock;
          if (stock > 0 && quantity > stock) availableCart[productId] = stock;
        });
        saveCart(availableCart);
        renderCart();
        const showCheckout = cartPage.dataset.showCheckout === '1' || new URLSearchParams(window.location.search).has('checkout');
        setCheckoutMode(showCheckout, false);
      } catch {
        showMessage('Cart items could not be loaded. Reload the page and try again.');
      }
    }

    loadCart();
  }
})();
