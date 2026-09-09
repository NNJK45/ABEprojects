(function () {
    'use strict';

    const loadingClass = 'abe-is-loading';

    function getSubmitControls(form) {
        return Array.from(form.querySelectorAll('button[type="submit"], input[type="submit"], button:not([type])'));
    }

    function rememberButtonValue(form, button) {
        if (!button || !button.name || button.disabled) return;
        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = button.name;
        hidden.value = button.value;
        hidden.dataset.abeSubmitValue = 'true';
        form.appendChild(hidden);
    }

    function setLoading(form, submitter) {
        form.dataset.abeSubmitting = 'true';
        form.setAttribute('aria-busy', 'true');
        rememberButtonValue(form, submitter);
        getSubmitControls(form).forEach(function (button) {
            button.dataset.abeOriginalHtml = button.innerHTML;
            button.disabled = true;
            button.setAttribute('aria-disabled', 'true');
            if (button === submitter) {
                button.classList.add(loadingClass);
                button.innerHTML = '<span class="abe-button-spinner" aria-hidden="true"></span><span>Traitement...</span>';
            }
        });
    }

    function resetLoading(form) {
        delete form.dataset.abeSubmitting;
        form.removeAttribute('aria-busy');
        form.querySelectorAll('[data-abe-submit-value]').forEach(function (input) { input.remove(); });
        getSubmitControls(form).forEach(function (button) {
            if (button.dataset.abeOriginalHtml !== undefined) {
                button.innerHTML = button.dataset.abeOriginalHtml;
                delete button.dataset.abeOriginalHtml;
            }
            button.disabled = false;
            button.removeAttribute('aria-disabled');
            button.classList.remove(loadingClass);
        });
    }

    document.addEventListener('submit', function (event) {
        const form = event.target;
        if (!(form instanceof HTMLFormElement) || form.dataset.abeNoLoader !== undefined) return;
        if (form.dataset.abeSubmitting === 'true') {
            event.preventDefault();
            event.stopImmediatePropagation();
            return;
        }
        const submitter = event.submitter || document.activeElement;
        setLoading(form, submitter && form.contains(submitter) ? submitter : getSubmitControls(form)[0]);
    });

    window.addEventListener('pageshow', function () {
        document.querySelectorAll('form[data-abe-submitting="true"]').forEach(resetLoading);
    });
}());
