@include('layouts.header')

<!--  -->
<section class="testimonial-sec">
    <div class="container">
        <div class="testimonial-sec-main">

            <div class="hs-store-heading">
                <h1 class="common-heading">
                    Testimonials
                </h1>
                <h3>
                    Here are just of few of the many testimonials that Innovative Headstones Life has received from families that we have been able to help:
                </h3>
            </div>

            <div class="testimonial-sec-grid">
                @foreach($testimonials as $key => $testimonial)
                <div class="testimonial-sec-grid-item">
                    <div class="testimonial-sec-grid-item-inner">

                        <div class="testimonial-sec-grid-item-inner-grid">
                            <div class="testimonial-img">
                                <img src="./assets/images/Headstone_Testimonial_Organ-225x300.jpg" alt="">
                            </div>
                            <div>
                                <div>
                                    <b>{{ $testimonial->user_name }}</b>
                                </div>
                                <div class="testimonial-sec-grid-item-ratings">
                                    @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->star_count)
                                    <i class="fa-solid fa-star" style="color: #FDCC0D;"></i>
                                    @else
                                    <i class="fa-solid fa-star"></i>
                                    @endif
                                    @endfor
                                </div>
                            </div>
                        </div>


                        <!-- <div class="testimonial-sec-grid-item-p-highlight">
                            <p>
                                "I will be recommending you to any one needing that kind of service."
                            </p>
                        </div> -->
                        <div class="testimonial-sec-grid-item-p" id="message-div-{{ $key }}">
                            <p>
                                "{{ $testimonial->rating_message }}"
                            </p>
                        </div>
                        <div class="testimonial-sec-grid-item-name">
                            <button class="btn" id="show-more-{{ $key }}" onclick="showMore('{{ $key }}')"> Show more..</button>
                            <button id="show-less-{{ $key }}" style="display: none;" class="btn" onclick="showLess('{{ $key }}')">Show less</button>
                            <p>
                                - {{ $testimonial->user_name }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="testimonial-sec-grid-item">
                    <div class="testimonial-sec-grid-item-inner">

                        <div class="testimonial-sec-grid-item-inner-grid">
                            <div class="testimonial-img">
                                <img src="./assets/images/Headstone_Testimonial_Organ-225x300.jpg" alt="">
                            </div>
                            <div class="testimonial-sec-grid-item-ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>


                        <div class="testimonial-sec-grid-item-p-highlight">
                            <p>
                                "I will be recommending you to any one needing that kind of service."
                            </p>
                        </div>
                        <div class="testimonial-sec-grid-item-p">
                            Good morning, just wanted to let you know I received the grave marker yesterday. It was just what I wanted,
                            you did a
                            great job with it. I thank you very much for all the assistance you gave me.
                        </div>
                        <div class="testimonial-sec-grid-item-name">
                            <p>
                                -J.C. from Dalton, Illinois
                            </p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-sec-grid-item">
                    <div class="testimonial-sec-grid-item-inner">

                        <div class="testimonial-sec-grid-item-inner-grid">
                            <div class="testimonial-img">
                                <img src="./assets/images/Headstone_Testimonial_Organ-225x300.jpg" alt="">
                            </div>
                            <div class="testimonial-sec-grid-item-ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>


                        <div class="testimonial-sec-grid-item-p-highlight">
                            <p>
                                "I will be recommending you to any one needing that kind of service."
                            </p>
                        </div>
                        <div class="testimonial-sec-grid-item-p">
                            Good morning, just wanted to let you know I received the grave marker yesterday. It was just what I wanted,
                            you did a
                            great job with it. I thank you very much for all the assistance you gave me.
                        </div>
                        <div class="testimonial-sec-grid-item-name">
                            <p>
                                -J.C. from Dalton, Illinois
                            </p>
                        </div>
                    </div>
                </div> -->

            </div>

        </div>
    </div>
</section>
<script>
    function showMore(value) {
        document.querySelector('div#message-div-' + value).style.display = 'block';
        document.querySelector('button#show-more-' + value).style.display = 'none';
        document.querySelector('button#show-less-' + value).style.display = 'block';
    }

    function showLess(value) {
        document.querySelector('div#message-div-' + value).style.display = '-webkit-box';
        document.querySelector('button#show-more-' + value).style.display = 'block';
        document.querySelector('button#show-less-' + value).style.display = 'none';
    }
</script>
@include('layouts.footer')