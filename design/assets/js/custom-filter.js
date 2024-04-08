
(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
    * Initiate glightbox 
    */
    const glightbox = GLightbox({
        selector: '.glightbox'
    });


    /**
     * Porfolio isotope and filter
     */
    window.addEventListener('load', () => {
        let fonthsContainer = select('.font-hs-container');
        if (fonthsContainer) {
            let fontsIsotope = new Isotope(fonthsContainer, {
                itemSelector: '.font-hs-item',
                layoutMode: 'fitRows'
            });

            let portfolioFilters = select('#font-hs-filters li', true);

            on('click', '#font-hs-filters li', function (e) {
                e.preventDefault();
                portfolioFilters.forEach(function (el) {
                    el.classList.remove('filter-active');
                });
                this.classList.add('filter-active');

                fontsIsotope.arrange({
                    filter: this.getAttribute('data-filter')
                });
                fontsIsotope.on('arrangeComplete', function () {
                    AOS.refresh()
                });
            }, true);
        }

    });

    /**
     * Initiate portfolio lightbox 
     */
    const portfolioLightbox = GLightbox({
        selector: '.font-hs-lightbox'
    });

    /**
     * Portfolio details slider
     */
    new Swiper('.portfolio-details-slider', {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    });

})()