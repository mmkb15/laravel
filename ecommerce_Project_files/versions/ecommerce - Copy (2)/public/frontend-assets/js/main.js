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

  // Qty +/- buttons
  document.querySelectorAll('.qty').forEach((q) => {
    const input = q.querySelector('input');
    const minus = q.querySelector('[data-act="-"]');
    const plus  = q.querySelector('[data-act="+"]');
    const submitCartQuantity = () => {
      if (q.hasAttribute('data-submit-on-change')) input.form?.requestSubmit();
    };
    minus && minus.addEventListener('click', () => {
      input.value = Math.max(Number(input.min) || 1, parseInt(input.value || 1) - 1);
      submitCartQuantity();
    });
    plus && plus.addEventListener('click', () => {
      input.value = Math.min(Number(input.max) || Infinity, parseInt(input.value || 1) + 1);
      submitCartQuantity();
    });
    input && input.addEventListener('change', submitCartQuantity);
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
})();
