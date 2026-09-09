(() => {
    const images = document.querySelectorAll('main img:not([data-no-skeleton])');

    images.forEach((image) => {
        const container = image.parentElement;

        if (!container) return;

        const reveal = () => {
            image.classList.remove('abe-image-loading');
            image.classList.add('abe-image-loaded');
            container.classList.remove('abe-image-skeleton');
        };

        image.classList.add('abe-image-loading');
        container.classList.add('abe-image-skeleton');

        if (image.complete) {
            reveal();
        } else {
            image.addEventListener('load', reveal, { once: true });
            image.addEventListener('error', reveal, { once: true });
        }
    });

    const carousel = document.querySelector('[data-abe-hero]');

    if (!carousel) {
        return;
    }

    const slides = [...carousel.querySelectorAll('.abe-hero-slide')];
    const dots = [...carousel.querySelectorAll('[data-abe-hero-dot]')];
    const previous = carousel.querySelector('[data-abe-hero-prev]');
    const next = carousel.querySelector('[data-abe-hero-next]');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    let activeIndex = 0;
    let timer;

    const showSlide = (index) => {
        activeIndex = (index + slides.length) % slides.length;

        slides.forEach((slide, slideIndex) => {
            slide.classList.toggle('is-active', slideIndex === activeIndex);
        });

        dots.forEach((dot, dotIndex) => {
            const isActive = dotIndex === activeIndex;
            dot.classList.toggle('is-active', isActive);

            if (isActive) {
                dot.setAttribute('aria-current', 'true');
            } else {
                dot.removeAttribute('aria-current');
            }
        });
    };

    const stop = () => window.clearInterval(timer);
    const start = () => {
        stop();

        if (!reducedMotion.matches && !document.hidden) {
            timer = window.setInterval(() => showSlide(activeIndex + 1), 5500);
        }
    };

    previous?.addEventListener('click', () => {
        showSlide(activeIndex - 1);
        start();
    });

    next?.addEventListener('click', () => {
        showSlide(activeIndex + 1);
        start();
    });

    dots.forEach((dot) => {
        dot.addEventListener('click', () => {
            showSlide(Number(dot.dataset.abeHeroDot));
            start();
        });
    });

    carousel.addEventListener('mouseenter', stop);
    carousel.addEventListener('mouseleave', start);
    carousel.addEventListener('focusin', stop);
    carousel.addEventListener('focusout', start);
    document.addEventListener('visibilitychange', start);
    reducedMotion.addEventListener?.('change', start);
    start();
})();
