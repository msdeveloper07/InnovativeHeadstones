@include('layouts.header')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen" />
<!-- Person Details -->
<section class="pd">
    <div class="container">
        <div class="pd-main">
            <div class="hs-store-heading biography-head">
                <h1 class="common-heading">
                    Person's Biography
                </h1>
                <div class="downloadbtn-div">
                    
                    <i class="fa-solid fa-volume-high play"  onclick = "pauseaudio()" style="display:none"></i>                                        
                    <i class="fa-solid fa-volume-xmark pause" onclick = "playaudio()" ></i>                   
                    @if(!empty($qr->is_new))
                    @if($qr->is_new == "existing")
                    <button id="captureButton">Download QR</button>
                    @endif
                    @endif

                </div>
            </div>

            <!-- autoplay -->
            <audio id="myAudio" loop> 
                <source src="{{asset('/assets/audio/audio-'.$qr->audio_id.'.mp3')}}" type="audio/mpeg">
                <source src="{{asset('/assets/audio/audio-'.$qr->audio_id.'.mp3')}}" type="audio/ogg">
            </audio>

            <button id="playButton" style="display:none;"></button>
            <div class="pd-div-top-grid-item-left" style="opacity: 0; height: 0px;">
                <p class="pd-qr-img" id="elementToCapture">
                    {!! $qrCode !!}
                </p>
            </div>
            <div class="pd-div">
                <div class="pd-div-top-div">
                    @if(!empty($qr->bg_image))
                    <img class="pd-div-top-img-bg" src="../qr_detail/bg/{{$qr->bg_image}}" alt="">
                    @else
                    <img class="pd-div-top-img-bg" alt="">
                    @endif

                    @if(!empty($qr->profile_image))
                    <img class="pd-div-top-profile-img" src="../qr_detail/profile/{{$qr->profile_image}}" alt="">
                    @else
                    <img class="pd-div-top-profile-img" alt="">
                    @endif
                </div>
                <div class="pd-div-top-grid">

                    <div class="pd-div-top-grid-item-right">
                        <div class="mb-3">
                            <p class="input-fields-34">
                                {{$qr->first_name}} {{$qr->last_name}}
                            </p>
                            <!-- <label for="formGroupExampleInput" class="form-label">First Name</label>
                                <p class="input-fields-3">
                                    {{$qr->first_name}}
                                </p>                             -->
                        </div>
                        <!-- <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Last Name</label>
                                <p class="input-fields-3">
                                    {{$qr->last_name}}
                                </p>
                            </div> -->
                    </div>
                </div>

                <div id="tabs" class="pd-tabs-div">
                    <ul>
                        <li class="pd-tabs biography-tab"><a class="pd-tabs-links" href="#pd-bio-tab">Biography</a></li>
                        <li class="pd-tabs"><a class="pd-tabs-links" href="#pd-photos-tab">Photos</a></li>
                        <li class="pd-tabs"><a class="pd-tabs-links" href="#pd-videos-tab">Videos</a></li>
                    </ul>
                    <div id="pd-bio-tab">
                        <div class="pd-bio-tab-inner">
                            <div class="pd-biography mb-3">
                                <div class="biography-text">
                                    <p class="biography-text-p">
                                        {{$qr->biography}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="pd-photos-tab">
                        <div class="pd-photos-tab-inner">
                            <!-- @if(count($qr->images)>0)
                                        @foreach($qr->images as $image)
                                        <a id="" class="pd-photos-tab-item" href="{{url('/')}}{{$image->image_url}}" data-fancybox="group">
                                            <img src="{{url('/')}}{{$image->image_url}}" alt="">
                                        </a>
                                        @endforeach
                                    @endif -->

                            <div class="owl-carousel pd-photo-gallery-carousel wow fadeInUp" data-wow-delay="0.1s">
                                @if(count($qr->images)>0)
                                @foreach($qr->images as $image)
                                <div class="pd-photo-item p-4 ">
                                    <a id="" class="pd-photos-tab-item" href="{{url('/')}}{{$image->image_url}}" data-fancybox="group">
                                        <img src="{{url('/')}}{{$image->image_url}}" alt="">
                                    </a>
                                </div>
                                @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                    <div id="pd-videos-tab">
                        <div class="pd-videos-tab-inner">
                            <div class="pd-videos-tab-item">
                                @if(count($qr->videos)>0)
                                <div class="owl-carousel video-slider">
                                    @foreach($qr->videos as $video)
                                    <div class="item">
                                        <video class="gallery-video" controls autoplay>
                                            <source src="{{url('/')}}{{$video->video_url}}" type="video/mp4">
                                        </video>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{asset('/assets/js/main.js')}}"></script>

<!-- Download Image using Canvas Lib -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


<script>
    $(function() {
        $("#tabs").tabs();
    });

    // (document.querySelector('body')).addEventListener("click", function() {
    //     document.getElementById('myAudio').play();                
    // });

        var a = document.getElementById("myAudio");
		function playaudio() {
			a.play();
            $('.play').show();
            $('.pause').hide();
		}
		function pauseaudio() {
			a.pause();
            $('.play').hide();
            $('.pause').show();
		}
		// function stopaudio() {
		// 	a.pause();
		// 	a.currentTime = 0;
		// }

        //$('.pause').show();
    //     $('.play').hide();
    
    $(document).ready(function() {        
        //playaudio();
        //$('.pause').trigger('click');
        $(".pd-photos-tab-inner a").fancybox();
    });

    $('[data-fancybox]').fancybox({
        // Options will go here
        buttons: [
            'close'
        ],
        wheel: false,
        transitionEffect: "slide",
        // thumbs          : false,
        // hash            : false,
        loop: true,
        // keyboard        : true,
        toolbar: false,
        // animationEffect : false,
        // arrows          : true,
        clickContent: false
    });

    $(document).ready(function() {
        $('#captureButton').click(function() {
            html2canvas(document.querySelector('#elementToCapture')).then(function(canvas) {
                canvas.toBlob(function(blob) {
                    saveAs(blob, 'qr.png'); // Set the desired filename
                });
            });
        });
    });

    $(".pd-photo-gallery-carousel").owlCarousel({
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
                items: 1
            },
            992: {
                items: 2
            }
        }
    });

    $(document).ready(function() {
        
        setTimeout(() => {
            $('.biography-tab').click();    
        }, 100);
        

        var owl = $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            autoplay: false,
            autoplayTimeout: 5000
        });

        var videos = $('.gallery-video');

        videos.on('ended', function() {
            owl.trigger('next.owl.carousel');
        });

        owl.owlCarousel();
    });

    // document.body.addEventListener("mousemove", function () {
    //     document.getElementById('myAudio').play();
    // })


</script>
@include('layouts.footer')