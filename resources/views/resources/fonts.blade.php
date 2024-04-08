@include('layouts.header')
<section class="font-sec">
    <div class="container">
        <div class="font-sec-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    Engraving Fonts
                </h1>
            </div>
            <div class="portfolio__main-content">
                <div class="portfolio__main-content__inner">

                    <div class="row">
                        <div class="col-lg-12 d-flex">
                            <ul id="font-hs-filters">
                                <li class="font-hs-filter filter-active" data-filter="*">
                                    All
                                </li>
                                <li class="font-hs-filter" data-filter=".filter-popular">
                                    Popular
                                </li>
                                <li class="font-hs-filter" data-filter=".filter-handdrawn">
                                    Handdrawn
                                </li>
                                <li class="font-hs-filter" data-filter=".filter-script">
                                    Script
                                </li>
                                <li class="font-hs-filter" data-filter=".filter-serif">
                                    Serif
                                </li>
                                <li class="font-hs-filter" data-filter=".filter-italic">
                                    Italic
                                </li>
                                <li class="font-hs-filter" data-filter=".filter-sans-serif">
                                    Sans-Serif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row font-hs-container row-cols-lg-2 gy-4 gx-4">

                        @foreach($fonts as $font)
                        <div class="col font-hs-item {{ $font->font_class }} col-lg-4 col-md-6 col-sm-12 ">
                            <div class="font-hs-item-inner">
                                <a class="font-hs-lightbox preview-link" href="{{ asset($font->font_image) }}" data-gallery="portfolioGallery" title="">
                                    <img src="{{ asset($font->font_image) }}" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <p class="design-name">
                                        {{ $font->font_name }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col font-hs-item filter-handdrawn col-lg-4 col-md-6 col-sm-12 ">
                            <div class="font-hs-item-inner">
                                <a class="font-hs-lightbox preview-link" href="./assets/images/engraved-font.png" data-gallery="portfolioGallery" title="">
                                    <img src="./assets/images/engraved-font.png" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <p class="design-name">
                                            B-13[c]
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col font-hs-item filter-script col-lg-4 col-md-6 col-sm-12 ">
                            <div class="font-hs-item-inner">
                                <a class="font-hs-lightbox preview-link" href="./assets/images/engraved-font.png" data-gallery="portfolioGallery" title="">
                                    <img src="./assets/images/engraved-font.png" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <p class="design-name">
                                            B-13[c]
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col font-hs-item filter-serif col-lg-4 col-md-6 col-sm-12 ">
                            <div class="font-hs-item-inner">
                                <a class="font-hs-lightbox preview-link" href="./assets/images/engraved-font.png" data-gallery="portfolioGallery" title="">
                                    <img src="./assets/images/engraved-font.png" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <p class="design-name">
                                            B-13[c]
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col font-hs-item filter-italic col-lg-4 col-md-6 col-sm-12 ">
                            <div class="font-hs-item-inner">
                                <a class="font-hs-lightbox preview-link" href="./assets/images/engraved-font.png" data-gallery="portfolioGallery" title="">
                                    <img src="./assets/images/engraved-font.png" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <p class="design-name">
                                            B-13[c]
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col font-hs-item filter-sans-serif col-lg-4 col-md-6 col-sm-12 ">
                            <div class="font-hs-item-inner">
                                <a class="font-hs-lightbox preview-link" href="./assets/images/engraved-font.png" data-gallery="portfolioGallery" title="">
                                    <img src="./assets/images/engraved-font.png" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <p class="design-name">
                                            B-13[c]
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<script src='https://isotope.metafizzy.co/isotope.pkgd.js'></script>
<script>
    (function() {
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

                on('click', '#font-hs-filters li', function(e) {
                    e.preventDefault();
                    portfolioFilters.forEach(function(el) {
                        el.classList.remove('filter-active');
                    });
                    this.classList.add('filter-active');

                    fontsIsotope.arrange({
                        filter: this.getAttribute('data-filter')
                    });
                    fontsIsotope.on('arrangeComplete', function() {
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
</script>
@include('layouts.footer')