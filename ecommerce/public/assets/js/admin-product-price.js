/**
 * Product form — Regular Price / Sale Price live check.
 *
 * The "$" prefix sits over the input visually; this makes the real numbers
 * explicit as you type, so there's never any doubt about what's actually
 * in each field when the sale-price validation fires.
 */
(function () {
    'use strict';

    function money(value) {
        var n = parseFloat(value);
        return isNaN(n) ? null : n;
    }

    function init() {
        var price = document.getElementById('price');
        var salePrice = document.getElementById('sale_price');
        var hint = document.getElementById('sale-price-hint');

        if (!price || !salePrice || !hint) {
            return;
        }

        function sync() {
            var regular = money(price.value);
            var sale = money(salePrice.value);

            if (regular === null) {
                hint.textContent = 'Enter the regular price first.';
                hint.classList.remove('is-warning');
                return;
            }

            if (sale === null) {
                hint.textContent = 'Regular price is $' + regular.toFixed(2) + '.';
                hint.classList.remove('is-warning');
                return;
            }

            if (sale > regular) {
                hint.textContent = 'Sale price ($' + sale.toFixed(2) + ') is higher than the regular price ($' + regular.toFixed(2) + ').';
                hint.classList.add('is-warning');
            } else {
                hint.textContent = 'Regular price is $' + regular.toFixed(2) + '.';
                hint.classList.remove('is-warning');
            }
        }

        price.addEventListener('input', sync);
        salePrice.addEventListener('input', sync);
        sync();
    }

    document.addEventListener('DOMContentLoaded', init);
})();
