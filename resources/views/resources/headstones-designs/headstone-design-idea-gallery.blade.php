@include('layouts.header')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>
<section class="design-sec">
    <div class="container">
        <div class="design-sec-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    Headstone Design Idea Gallery
                </h1>
            </div>

            <div class="design-main">

                <aside class="design-right-menu">
                    <h4 class="design-right-menu-heading">
                        <span>Category: </span>
                        <span>{{ $dataArr[0]->type }} Designs</span>
                    </h4>
                    <ul class="design-right-menu-ul">
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'Book')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/Book')}}" class="design-right-menu-ul-li-link">Book</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/Book')}}" class="design-right-menu-ul-li-link">Book</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'Border')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/Border')}}" class="design-right-menu-ul-li-link">Border</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/Border')}}" class="design-right-menu-ul-li-link">Border</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'catholic')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/catholic')}}" class="design-right-menu-ul-li-link">Catholic</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/catholic')}}" class="design-right-menu-ul-li-link">Catholic</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'children')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/children')}}" class="design-right-menu-ul-li-link">Children</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/children')}}" class="design-right-menu-ul-li-link">Children</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'cross')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/cross')}}" class="design-right-menu-ul-li-link">Cross</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/cross')}}" class="design-right-menu-ul-li-link">Cross</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'cultural')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/cultural')}}" class="design-right-menu-ul-li-link">Culture</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/cultural')}}" class="design-right-menu-ul-li-link">Culture</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'custom')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/custom')}}" class="design-right-menu-ul-li-link">Custom</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/custom')}}" class="design-right-menu-ul-li-link">Custom</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'floral')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/floral')}}" class="design-right-menu-ul-li-link">Floral</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/floral')}}" class="design-right-menu-ul-li-link">Floral</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'jewish')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/jewish')}}" class="design-right-menu-ul-li-link">Jewish</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/jewish')}}" class="design-right-menu-ul-li-link">Jewish</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'mormon')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/mormon')}}" class="design-right-menu-ul-li-link">Mormon</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/mormon')}}" class="design-right-menu-ul-li-link">Mormon</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'musical')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/musical')}}" class="design-right-menu-ul-li-link">Musical</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/musical')}}" class="design-right-menu-ul-li-link">Musical</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'pet')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/pet')}}" class="design-right-menu-ul-li-link">Pet</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/pet')}}" class="design-right-menu-ul-li-link">Pet</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'religious')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/religious')}}" class="design-right-menu-ul-li-link">Religious</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/religious')}}" class="design-right-menu-ul-li-link">Religious</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'scenic')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/scenic')}}" class="design-right-menu-ul-li-link">Scenic</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/scenic')}}" class="design-right-menu-ul-li-link">Scenic</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'scroll')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/scroll')}}" class="design-right-menu-ul-li-link">Scroll</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/scroll')}}" class="design-right-menu-ul-li-link">Scroll</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'sport')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/sport')}}" class="design-right-menu-ul-li-link">Sport</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/sport')}}" class="design-right-menu-ul-li-link">Sport</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'transportation')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/transportation')}}" class="design-right-menu-ul-li-link">Transportation</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/transportation')}}" class="design-right-menu-ul-li-link">Transportation</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'tropical')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/tropical')}}" class="design-right-menu-ul-li-link">Tropical</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/tropical')}}" class="design-right-menu-ul-li-link">Tropical</a>
                            @endif
                        </li>
                        <li class="design-right-menu-ul-li">
                            @if($dataArr[0]->type == 'western')
                            <a style="color: var(--green-shade);font-weight: 700;" href="{{asset('/headstone-design-idea-gallery/western')}}" class="design-right-menu-ul-li-link">Western</a>
                            @else
                            <a href="{{asset('/headstone-design-idea-gallery/western')}}" class="design-right-menu-ul-li-link">Western</a>
                            @endif
                        </li>
                    </ul>
                </aside>

                <div class="design-left">
                    <div class="design-main-p">
                        <p>
                            We have provided an extensive gallery of {{ strtolower($dataArr[0]->type) }} headstone designs to help you find just the right image to represent your loved one. When you have selected a {{ strtolower($dataArr[0]->type) }} design, make a note of the name and let us know what the template number is when you place your order.
                        </p>
                    </div>


                    <div class="design-result-grid">
                        @foreach($dataArr as $data)

                        <div class="gallery design-result-grid-item">
                            <a href="{{asset('/headstoneDesignImages/'.$data->image)}}">
                                <img class="img-fluid" src="{{asset('/headstoneDesignImages/'.$data->image)}}">
                                <p class="design-name">
                                    {{ $data->title }}
                                </p>
                            </a>
                        </div>

                        @endforeach
                        <!-- <div class="design-result-grid-item">
                            <a href="./assets/images/tropical-hs-design.jpg" data-toggle="lightbox" data-gallery="gallery" class=" lightbox">
                                <img src="./assets/images/tropical-hs-design.jpg" class="img-fluid" alt="">
                                <p class="design-name">
                                    B-13[c]
                                </p>
                            </a>
                        </div> -->
                        <!-- <div class="design-result-grid-item">
                            <img src="./assets/images/book-design-idea.jpg" alt="" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            <p class="design-name">
                                B-13[c]
                            </p>
                        </div>

                        <div class="design-result-grid-item">
                            <img src="./assets/images/book-design-idea.jpg" alt="" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            <p class="design-name">
                                B-13[c]
                            </p>
                        </div>
                        <div class="design-result-grid-item">
                            <img src="./assets/images/book-design-idea.jpg" alt="" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            <p class="design-name">
                                B-13[c]
                            </p>
                        </div>
                        <div class="design-result-grid-item">
                            <img src="./assets/images/book-design-idea.jpg" alt="" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            <p class="design-name">
                                B-13[c]
                            </p>
                        </div>
                        <div class="design-result-grid-item">
                            <img src="./assets/images/book-design-idea.jpg" alt="" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            <p class="design-name">
                                B-13[c]
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>
<script>
    // baguetteBox.run('.design-result-grid');
    $(document).ready(function() {
        // add all to same gallery
        $(".gallery a").attr("data-fancybox", "mygallery");
        // assign captions and title from alt-attributes of images:
        $(".gallery a").each(function() {
            $(this).attr("data-caption", $(this).find("img").attr("alt"));
            $(this).attr("title", $(this).find("img").attr("alt"));
        });
        // start fancybox:
        $(".gallery a").fancybox();
    });
</script>
<style>
    .fancybox-thumbs__list a:before {
        border: 6px solid var(--green-shade);
    }

    .fancybox-progress {
        background: var(--green-shade);
    }
</style>

@include('layouts.footer')