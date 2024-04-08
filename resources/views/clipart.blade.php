@include('layouts.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        type="text/css" media="screen" />
<!-- Clipart -->
<div class="clipart">
    <div class="container">
        <div class="clipart-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    {{ucfirst($type)}}
                </h1>
                <p>
                    We have provided an extensive gallery of angels clip art and emblems to help you to find just the right image to
                    represent your loved one. When you have selected a graphic, make a note of the name. When using our Online Designers you
                    will have the option to add the angels clip art directly onto your design. If you would prefer, just let us know in your
                    order comments what angels image you would like to add. If you don’t find the angels clip art that you are looking for
                    please Contact Us. We can help. All granite headstones include unlimited artwork at no charge.
                </p>
            </div>

            <div class="clipart-grid">
                <aside class="clipart-grid-left">
                    <ul class="clipart-sidemenu">

                        @foreach($category as $cat)
                        <li class="clipart-sidemenu-item">
                            <a class="clipart-sidemenu-item-link {{ (request()->type == $cat)?'active':'' }}" href="{{url('clip-art/')}}/{{$cat}}">{{ucfirst($cat)}}</a>
                        </li>
                        @endforeach

                    </ul>
                </aside>
                <div class="clipart-grid-right">
                    <div class="clipart-grid-right-inner">

                        @if(count($data) > 0)
                        @foreach($data as $key => $val)
                        <a id="" class="clipart-grid-right-link" href="{{asset('clipart/'.$type)}}/{{$val->image}}" data-fancybox="group">
                            <img src="{{asset('clipart/'.$type)}}/{{$val->image}}" alt="" />
                        </a>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function() {
        $(".clipart-grid-right-inner a").fancybox();
    });
</script>

@include('layouts.footer')