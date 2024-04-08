@include('layouts.header')

<!-- Hero -->
<section class="hero-section">
    <div id="hero-slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="3" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="4" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="5" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="6" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <video class="img-fluid carousel-vid" autoplay muted>
                    <source src="./assets/videos/myobituaryapp.mp4" type="video/mp4" />
                </video>
            </div>
            <div class="carousel-item ">
                <img src="./assets/images/img-8.jpg" class="d-block w-100" alt="">
                <div class="carousel-text">
                    <h1>Serving Families</h1>
                    <p>For over 30 years, Innovative Headstones has been making memories last forever with
                        premium-quality personalized memorials and
                        unmatched customer care.</p>
                    <a href="{{ url('/store') }}" class="learn-more">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/img-13.jpg" class="d-block w-100" alt="">
                <div class="carousel-text">
                    <h1>Memories Are Made Of</h1>
                    <p>Our collection of cremation jewelry and personalized keepsakes are a beautiful way to cherish your loved one.</p>
                    <a href="{{ url('/store') }}" class="learn-more">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/img-15.jpg" class="d-block w-100" alt="">
                <div class="carousel-text">
                    <h1>Serving Families</h1>
                    <p>For over 30 years, Innovative Headstones has been making memories last forever with
                        premium-quality personalized
                        memorials and
                        unmatched customer care.</p>
                    <a href="{{ url('/store') }}" class="learn-more">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/img-12.jpg" class="d-block w-100" alt="">
                <div class="carousel-text">
                    <h1>Serving Families</h1>
                    <p>For over 30 years, Innovative Headstones has been making memories last forever with
                        premium-quality personalized
                        memorials and
                        unmatched customer care.</p>
                    <a href="{{ url('/store') }}" class="learn-more">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/img-18.jpg" class="d-block w-100" alt="">
                <div class="carousel-text">
                    <h1>Serving Families</h1>
                    <p>For over 30 years, Innovative Headstones has been making memories last forever with
                        premium-quality personalized
                        memorials and
                        unmatched customer care.</p>
                    <a href="{{ url('/store') }}" class="learn-more">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/img-20.jpg" class="d-block w-100" alt="">
                <div class="carousel-text">
                    <h1>Serving Families</h1>
                    <p>For over 30 years, Innovative Headstones has been making memories last forever with
                        premium-quality personalized
                        memorials and
                        unmatched customer care.</p>
                    <a href="{{ url('/store') }}" class="learn-more">
                        Learn More
                    </a>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Products -->
<section class="products">
    <div class="products-overlay"></div>
    <div class="container">
        <div class="products-grid">
            <div class="product-heading">
                <h2>
                    Our Most Popular Styles of Headstones
                </h2>
                <a href="{{ asset('/store') }}" class="products-link">
                    View All Products
                </a>
            </div>
            <div class="products-list">
                <a class="products-list-link" href="{{ asset('/product-category/flat-headstones') }}">
                    <img src="{{ asset('assets/images/flat-hs.jpg') }}" alt="">
                </a>

                <a class="products-list-link" href="{{ asset('/product-category/pillow-top-headstones') }}">
                    <img src="{{ asset('assets/images/pillow-hs.jpg') }}" alt="">
                </a>
                <a class="products-list-link" href="{{ asset('/product-category/serp-top-slant-headstones') }}">
                    <img src="{{ asset('assets/images/24inch_x_10inch_x_16inch_Serp_Top_Slant_Headstone_polished_front_and_back_in_Imperial_Red_with_design_B-21_Sanded_Panel-380x268.jpg') }}" alt="">
                </a>
                <a class="products-list-link" href="{{ asset('/product-category/serp-top-upright-headstones') }}">
                    <img src="{{ asset('assets/images/serp-top-hs.jpg') }}" alt="">
                </a>
            </div>
        </div>


    </div>

</section>

<!-- Videos -->
<section class="video-sec">
    <div class="container">
        <div class="video-sec-grid">
            <video class="video-item" src="./assets/videos/vide02.mp4" autoplay loop muted></video>
            <video class="video-item" src="./assets/videos/vide03.mp4" autoplay loop muted></video>
        </div>
    </div>

</section>

<!-- Testimonial Start -->
<section class="testimonials">
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-center">
                <h2 class="heading-h2">What Our Customers are Saying</h2>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <!-- <img class="img-fluid flex-shrink-0" src="./assets/images/user-img.jpg" style="width: 80px; height: 80px;"> -->
                        <div style="margin-left: 0 !important;" class="ms-4">
                            <h5 class="mb-1">{{ $testimonial->user_name }}</h5>
                            <!-- <p class="m-0">Profession</p> -->
                        </div>
                    </div>
                    <p class="mb-0">{{ $testimonial->rating_message }}</p>

                </div>
                @endforeach
                <!-- <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="./assets/images/user-img.jpg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita
                        erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="./assets/images/user-img.jpg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita
                        erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="./assets/images/user-img.jpg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita
                        erat ipsum et lorem et sit.</p>
                </div> -->
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="services">
    <div class="container">
        <div class="services-inner">
            <div class="services-grid">
                <div class="services-grid-item">
                    <div class="serives-grid-item-icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <a href="{{ asset('/store') }}" class="services-grid-item-link">Free Shipping</a>
                    <b>No Changes</b>
                    <p>
                        *When does product charges calculate during the purchase process? We will
                        give you a standard price to add for all orders, which is T.B.D
                    </p>
                </div>
                <div class="services-grid-item">
                    <div class="serives-grid-item-icon">
                        <i class="fa-solid fa-calculator"></i>
                    </div>
                    <a href="{{ asset('/store') }}" class="services-grid-item-link">Sales Tax Included</a>
                    <b>No Changes</b>
                    <p>
                        *When does product charges calculate during the purchase process? We will
                        give you a standard % price to add to all orders, which is T.B.D
                    </p>
                </div>
                <div class="services-grid-item">
                    <div class="serives-grid-item-icon">
                        <i class="fa-solid fa-swatchbook"></i>
                    </div>
                    <a href="{{ asset('/store') }}" class="services-grid-item-link">Personalize</a>
                    <p id="personalize-sec" style="display: -webkit-box;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 3;
    -webkit-box-orient: vertical;">
                        Our innovative QR Code design process is unique to every customer; allowing
                        them to incorporate pictures, videos, music, and a biography to tell their life
                        story.
                        Headstone markers are no different. You can select a premium custom granite
                        headstone from our products list and then utilize our custom design-your-own
                        headstone system which allows you to select from 10 different colors and 100s
                        of designs in several styles and sizes to choose from. Single and companion
                        headstone options are available for most headstone sizes.
                        All headstones created with the online designer will be professionally prepared
                        and carved to incorporate the exact text and graphics that you select while
                        using our online ordering process from the comfort of your home or business.
                        You also have the option of adding our GPS Tracking System-technology
                        feature that allows you to locate your loved one's grave site marker with ease,
                        using step-by-step guidance within your local cemetery.
                        Whatever high-quality memorial products you choose, the process of creating
                        and designing your innovative keepsake will take you through an easy and user-
                        friendly pròcess.
                    </p>
                    <button class=" btn" style="color: white;" id="show-more-personalize" onclick="showMore('p#personalize-sec','button#show-more-personalize','button#show-less-personalize')"> Show more..</button>
                    <button id="show-less-personalize" style="display: none;color: white;" class="btn" onclick="showLess('p#personalize-sec','button#show-more-personalize','button#show-less-personalize')">Show less</button>
                </div>

                <div class="services-grid-item">
                    <div class="serives-grid-item-icon">
                        <i class="fa-solid fa-qrcode"></i>
                    </div>
                    <a href="{{ asset('/plans') }}" class="services-grid-item-link">QR Code Technology</a>
                    <p id="qr-code-sec" style="display: -webkit-box;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 3;
    -webkit-box-orient: vertical;">
                        Our new patent-pendant QR Code technology affords you the opportunity to
                        design custom-made QR Code bereavement memorabilia endeavoring to tell
                        your life story.
                        Our interactive QR codes can be personalized by registering to use a safe and
                        secure account on Bio My Life; giving you the ability to upload photos, videos,
                        music, and a personal autobiography that showcases the life story, civic
                        attributes, and cherished memories of your loved one through our innovative
                        QR Code technology.
                        Our scannable QR Codes can be engraved and embedded on headstone
                        markers straight from the factory by our manufacturer, or self-installed on urns,
                        sentimental memorabilia, and pre-existing headstones as an "upgrade," to
                        honor the life and legacy of loved ones who have transitioned in life.
                        Our QR Codes are designed to offer a 21st century, easy-access, online
                        experience through the use of a smartphone; during gravesite visits for a time
                        of reflection and to share across social media platforms worldwide.
                        We also offer a GPS Tracking System-technology feature that allows you to
                        locate your loved one's grave site marker with ease, using step-by-step
                        guidance within your local cemetery.
                    </p>
                    <button class=" btn" style="color: white;" id="show-more-qr" onclick="showMore('p#qr-code-sec','button#show-more-qr','button#show-less-qr')"> Show more..</button>
                    <button id="show-less-qr" style="display: none; color: white;" class="btn" onclick="showLess('p#qr-code-sec','button#show-more-qr','button#show-less-qr')">Show less</button>
                </div>
            </div>
            <div class="services-sub">
                <h2 class="heading-h2">
                    At Your Service Online
                </h2>
                <div class="services-sub-grid">
                    <div class="services-sub-grid-left">
                        <img src="./assets/images/stone-2.jpg" alt="">
                    </div>
                    <div class="services-subcontent">
                        <p>
                            Our mission is to offer families an opportunity to keep their loved one's memory
                            alive through interactive gravesite headstones, QR Codes, and memorabilia,
                            through the clouds of technology. We will always strive to provide you with the
                            best value in quality, affordable headstones, memorials, monuments and
                            personalized keepsakes.
                        </p>
                        <p>
                            Ordering with us cuts out the middleman – giving you direct access to design
                            customized memorabilia.
                        </p>
                        <p>
                            For headstones, we offer two ordering processes: 1). "Design Your Own,"
                            utilizing our state of the art online designers or 2). "Selecting from our
                            Extensive Catalog," of headstones, memorials, monuments and personalized
                            keepsakes.
                        </p>
                        <p>
                            Our manufacturer uses top quality stone and materials to produce superior
                            quality masterpieces. Your finished headstone will be professionally designed
                            and carved, incorporating the text and graphics you select, on a gorgeous
                            piece of natural granite.
                        </p>
                        <p>
                            For interactive QR Codes, we are an industry leader and the best in our field.
                            WHY, because we offer the highest quality of technology and the most creative
                            options to help preserve and keep your loved ones' memories alive for
                            generations to come.
                        </p>
                        <p>
                            Either way, our virtual designers work with you to create the perfect design that
                            you and your family can be proud of.
                            Are you ready to begin?
                        </p>
                    </div>
                </div>

            </div>

            <div class="get-started-div">
                <a href="{{ asset('/plans') }}" class="get-started-btn">
                    Click Here to Get Started
                </a>
            </div>

            <div class="services-sub-2">
                <div class="services-sub-2-item">
                    <div class="services-sub-2-item-inner">
                        <h3 class="services-sub-2-item-heading">Cemetery Checklist</h3>
                        <b>
                            Use honor Life's Current Checklist along with:
                        </b>
                        <li>
                            Adding the following Disclaimers AND Acknowledgement statements, with a
                            check box suggesting that the customer has read and acknowledges:
                        </li>
                        <ol>
                            <li>
                                I assume responsibility to ensure that "purchases," are allowed from external
                                monument vendors.
                            </li>
                            <li>
                                I assume responsibility to make sure external "monument shipments are
                                accepted," by the cemetery.
                            </li>
                            <li>
                                I acknowledge that I have read, adhere, and agree to all terms suggested on
                                the "cemetery checklist," to confirm external monument vendor purchases are
                                accepted and allowed re: Size, Color, Marker Attachments & Enhancements
                                (i.e., flush self-installation metal plates can be added on monument and etc.).
                            </li>
                            <li>
                                I acknowledge that The Innovative Headstone Company has a strict 'No
                                Refund," policy on all purchases. I agree that once I approve my customized
                                artwork, design, order, and complete the processing of my payment "all sales
                                are final."
                            </li>
                            <li>
                                I acknowledge that it will be my responsibility to bear any/all costs
                                associated with undeliverable and/or returned headstones, markers, products,
                                or merchandise if a delivery is refused, sent back, or abandoned by the
                                receiving entity. I agree to not hold The Innovative Headstone Company, its
                                Headstone Manufacturer, and any/all third-party affiliates liable for the cost or
                                invoicing of returned shipments.
                            </li>
                        </ol>
                        <p>
                            *As a reminder, we would like to have several acknowledgement pop-up check
                            boxes to serve as reminders to customers as they maneuver through the
                            ordering process. All acknowledgement boxes must be checked before they
                            can place and/or checkout to pay their Monument & QR Code Order.
                        </p>
                    </div>
                    <a class="learn-more-btn" href="{{ url('/questions-to-ask-a-cemetry') }}">Learn More&nbsp;<i class="fa-solid fa-angles-right"></i></a>
                </div>
                <div class="services-sub-2-item">
                    <div class="services-sub-2-item-inner">
                        <h3 style="margin: 0;" class="services-sub-2-item-heading">Design, Customize, & Add QR Code to Headstones</h3>
                        <p>
                            Our innovative QR Code design process is unique to every customer; allowing
                            them to incorporate pictures, videos, music, and a biography to tell their life
                            story.
                        </p>
                        <p>
                            Headstone markers are no different. You can select a premium custom granite
                            headstone from our products list and then utilize our custom design-your-own
                            headstone system which allows you to select from 10 different colors and 100s
                            of designs in several styles and sizes to choose from. Single and companion
                            headstone marker options are available for most headstone sizes.
                        </p>
                        <p>
                            All headstones created with the online designer will be professionally prepared
                            and carved to incorporate the exact text and graphics that you select while
                            using our online ordering process from the comfort of your home or business.
                        </p>
                        <p>
                            You also have the option of adding our GPS Tracking System-technology
                            feature that allows you to locate your loved one's grave site marker with ease,
                            using step-by-step guidance within your local cemetery.
                        </p>
                        <p>
                            You can count on us to guide you along the way while customizing your
                            personalized product.
                        </p>
                        <p>
                            Are you ready to begin?
                        </p>
                    </div>
                    <a class="learn-more-btn" href="{{ asset('/plans') }}">Start Now&nbsp;<i class="fa-solid fa-angles-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quotes -->
<section class="quotes">
    <div class="quotes-overlay"></div>
    <div class="container">
        <div class="quotes-div">
            <p class="quotes-p">
                "Your legacy becomes a sum total of your beliefs, values, traditions, reputation, and life experiences...leave a footprint in the world that gets passed down from generation-to-generation."
            </p>
        </div>
    </div>
</section>

<!-- Bashing -->
<section class="bash-sec">
    <div class="container">
        <div class="bash-inner">
            <div class="bash-grid">
                <!-- <div class="bash-grid-item">
                    <div class="bash-grid-item-subitem">
                        <img src="./assets/images/carved-stone-1.jpg" class="bash-img" alt="">
                    </div>
                    <div class="bash-grid-item-subitem bash-subitem-text">
                        <div class="bash-item-icon">
                            <i class="fa-solid fa-pen-nib"></i>
                        </div>
                        <h3>Innovative Rayzist Engraving</h3>
                        <p>Our cutting-edge process is your guarantee of exceptional beauty, accuracy and detail.
                        </p>
                    </div>

                </div> -->
                <div class="bash-grid-item ">
                    <div class="bash-grid-item-subitem bash-subitem-text">
                        <div class="bash-item-icon">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                        </div>
                        <h3>Customer Care</h3>
                        <p>We’ll stop at nothing to honor your loved one’s memory and help you in your time of need.
                        </p>
                    </div>
                    <div class="bash-grid-item-subitem">
                        <img src="./assets/images/customer-spprt.jpg" class="bash-img" alt="">
                    </div>


                </div>
                <div class="bash-grid-item">
                    <div class="bash-grid-item-subitem">
                        <img src="./assets/images/aboutus-dummy.jpeg" class="bash-img" alt="">
                    </div>
                    <div class="bash-grid-item-subitem bash-subitem-text">
                        <div class="bash-item-icon">
                        <i class="fa-regular fa-address-card"></i>
                        </div>
                        <h3>About Us</h3>
                        <p>
                        Welcome to the Innovative Headstone Company, we are the creator & industry leader of Bio My Life's technology-driven QR Codes and GPSTracking designed for Headstones, Urns, Niches, Cemeteries & Keepsake Memorabilia. 
                        </p>
                        <br/>
                        <p>
                        We don't just design beautiful headstones, we design "interactive," products to help keep your loved one's memory alive for generations to come. Our products are custom-made, with our "new" QR Code patent-pendant technology, endeavoring to tell your life story, through photos, videos, and an autobiography. 
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(".testimonial-carousel").owlCarousel({
        autoplay: false,
        smartSpeed: 1000,
        center: true,
        dots: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    function showMore(id, showmore, showless) {
        document.querySelector(id).style.display = 'block';
        document.querySelector(showmore).style.display = 'none';
        document.querySelector(showless).style.display = 'block';
    }

    function showLess(id, showmore, showless) {
        document.querySelector(id).style.display = '-webkit-box';
        document.querySelector(showmore).style.display = 'block';
        document.querySelector(showless).style.display = 'none';
    }
</script>

@include('layouts.footer')