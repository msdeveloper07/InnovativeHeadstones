@include('layouts.header')
<section class="photos-sec">
    <div class="container">
        <div class="photos-sec-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    Are pictures allowed on a headstone?
                </h1>
                <p>
                    Ceramic photos are permanent kiln fired digital images. Any original photo or scanned image can be reproduced and
                    permanently fired into a variety of oval, square and rectangular size ceramic tiles that will withstand the test of
                    time. When we place your ceramic on your headstone we sandcarve the granite to the shape and depth of the ceramic so it
                    is inlaid flush with the surface. This processes further protects your ceramic from the elements and a prevention
                    against vandalism.
                </p>
            </div>

            <div class="qtac-hs-pics-grid">
                <div class="qtac-hs-pics-grid-item">
                    <img src="./assets/images/qtac-ceramic-portrait-original-photo.png" alt="">
                    <h4 class="qtac-hs-pics-filter">
                        Original Photo
                    </h4>
                </div>
                <div class="qtac-hs-pics-grid-item">
                    <img src="./assets/images/qtac-ceramic-portrait-1.png" alt="">
                    <h4 class="qtac-hs-pics-filter">
                        Sepia Photo
                    </h4>
                </div>
                <div class="qtac-hs-pics-grid-item">
                    <img src="./assets/images/qtac-ceramic-portrait-bw.png" alt="">
                    <h4 class="qtac-hs-pics-filter">
                        Black and White Photo
                    </h4>
                </div>
                <div class="qtac-hs-pics-grid-item">
                    <img src="./assets/images/qtac-ceramic-portrait-color.png" alt="">
                    <h4 class="qtac-hs-pics-filter">
                        Color Photo
                    </h4>
                </div>
            </div>
            <div class="qtac-pics-note">
                <p class="qtac-pics-note-p">
                    <span>
                        NOTE:
                    </span>
                    Ceramic orders usually take 4 weeks to produce.
                </p>
                <a href="{{ asset('/product-category/ceramic-headstone-pictures') }}" class="qtac-learn-more-link">
                    View More
                </a>
            </div>

        </div>
    </div>
</section>

<section class="qtac-etch">
    <div class="container">
        <div class="qtac-etch-main">
            <div class="qtac-etch-grid">
                <div class="qtac-etch-grid-item">
                    <div class="qtac-etech-grid-item-text">
                        <h3 class="qtac-hs-req-head-h1">
                            If so, are Etched or Ceramic pictures allowed?
                        </h3>
                        <p>
                            In order to sandblast (engrave) a photo consisting of many different tones, shades and colors we must convert it into a
                            halftone image. Halftone artwork is used to reproduce grayscale images by breaking the image into small dots (like
                            photos in the newspaper).
                        </p>
                    </div>
                </div>
                <div class="qtac-etch-grid-item qtac-etch-img-grid">
                    <div class="qtac-etch-grid-item-img-div">
                        <img src="./assets/images/qtac-halftone_screen-small-1.jpg" alt="">
                    </div>
                    <div class="qtac-etch-grid-item-img-div">
                        <img src="./assets/images/qtac-dots-image.jpg" alt="">
                    </div>
                </div>
                <div class="qtac-etch-grid-item qtac-etch-img-grid">
                    <div class="qtac-etch-grid-item-img-div">
                        <img src="./assets/images/qtac-mezo-small-1.jpg" alt="">
                    </div>
                    <div class="qtac-etch-grid-item-img-div">
                        <img src="./assets/images/qtac-mezo-snippet.jpg" alt="">
                    </div>
                </div>
                <div class="qtac-etch-grid-item">
                    <div class="qtac-etech-grid-item-text">
                        <p>
                            These dots will vary in size to represent the tonal areas of the artwork, giving the illusion of a grayscale image.
                        </p>
                        <p>
                            The first engraved photo up to an 8″x10″ is Free on an Imperial Black marker.
                        </p>
                        <p>
                            Picture Ordering Process
                        </p>
                        <p>
                            Place your order today:
                        <ul class="qtac-po-links">
                            <li>
                                <a href="mailto:">E-Mail: info@innovativeheadstones.com</a>
                            </li>
                            <li>
                                <a href="tel:">Tel: (800) 123-9999</a>
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')