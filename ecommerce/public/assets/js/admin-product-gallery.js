/**
 * Product edit gallery.
 * - Clicking an image selects it as the primary photo.
 * - Ticking "Remove" greys the card out and releases the primary selection.
 */
(function () {
    'use strict';

    function items(gallery) {
        return Array.prototype.slice.call(gallery.querySelectorAll('[data-gallery-item]'));
    }

    function syncPrimaryState(gallery) {
        items(gallery).forEach(function (item) {
            var radio = item.querySelector('[data-gallery-primary]');
            item.classList.toggle('is-primary', !!(radio && radio.checked));
        });
    }

    function setPrimary(gallery, item) {
        var radio = item.querySelector('[data-gallery-primary]');
        var remove = item.querySelector('[data-gallery-remove]');

        // An image queued for removal can't be the main photo.
        if (!radio || radio.disabled || (remove && remove.checked)) {
            return;
        }

        radio.checked = true;
        syncPrimaryState(gallery);
    }

    function syncRemoveState(gallery, item) {
        var remove = item.querySelector('[data-gallery-remove]');
        var radio = item.querySelector('[data-gallery-primary]');
        var marked = !!(remove && remove.checked);

        item.classList.toggle('is-removing', marked);

        if (radio) {
            radio.disabled = marked;

            if (marked && radio.checked) {
                radio.checked = false;
            }
        }

        syncPrimaryState(gallery);
    }

    function init(gallery) {
        gallery.addEventListener('click', function (event) {
            var figure = event.target.closest('[data-gallery-pick]');

            if (!figure || !gallery.contains(figure)) {
                return;
            }

            setPrimary(gallery, figure.closest('[data-gallery-item]'));
        });

        gallery.addEventListener('change', function (event) {
            var item = event.target.closest('[data-gallery-item]');

            if (!item) {
                return;
            }

            if (event.target.matches('[data-gallery-remove]')) {
                syncRemoveState(gallery, item);
            }

            if (event.target.matches('[data-gallery-primary]')) {
                syncPrimaryState(gallery);
            }
        });

        items(gallery).forEach(function (item) {
            syncRemoveState(gallery, item);
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        Array.prototype.forEach.call(
            document.querySelectorAll('[data-gallery]'),
            init
        );
    });
})();
