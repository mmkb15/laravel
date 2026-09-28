/**
 * Simple dismissible alerts.
 * Works without Bootstrap's alert plugin so the markup stays plain.
 */
(function () {
    'use strict';

    var HIDDEN_CLASS = 'is-dismissed';

    function dismiss(alertEl) {
        if (!alertEl || alertEl.classList.contains(HIDDEN_CLASS)) {
            return;
        }

        alertEl.classList.add(HIDDEN_CLASS);

        window.setTimeout(function () {
            if (alertEl.parentNode) {
                alertEl.parentNode.removeChild(alertEl);
            }
        }, 220);
    }

    document.addEventListener('click', function (event) {
        var button = event.target.closest('[data-alert-close]');

        if (!button) {
            return;
        }

        event.preventDefault();
        dismiss(button.closest('.ecom-alert'));
    });

    // Success messages fade out on their own; errors stay until dismissed.
    document.addEventListener('DOMContentLoaded', function () {
        var autoHide = document.querySelectorAll('.ecom-alert-success');

        Array.prototype.forEach.call(autoHide, function (alertEl) {
            window.setTimeout(function () {
                dismiss(alertEl);
            }, 5000);
        });
    });
})();
