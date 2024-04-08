@include('layouts.header')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Felipa&display=swap" rel="stylesheet">

<!-- Section -->
<section class="flat-hs-detail-sec">
    <div class="container">
        <div class="flat-hs-detail-sec-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    {{ $dataArr[0]->name }}
                </h1>
            </div>

            <div class="custom-sec" style="display:none;">
                <div class="custom-sec-edit">
                    <div class="custom-sec-edit-top-bar">
                        <!-- <div class="custom-sec-edit-top-bar-icon">
                            <i class="fa-solid fa-rotate-left"></i>
                        </div>
                        <div class="custom-sec-edit-top-bar-icon">
                            <i class="fa-solid fa-rotate-right"></i>
                        </div>
                        <div class="custom-sec-edit-top-bar-icon">
                            <i class="fa-solid fa-print"></i>
                        </div>
                        <div class="custom-sec-edit-top-bar-icon">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div> -->
                        <div class="custom-sec-edit-top-bar-icon">
                            <i class="fa-regular fa-circle-down" onclick="download()"></i>
                        </div>
                        <!-- <div class="custom-sec-edit-top-bar-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="custom-sec-edit-top-bar-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="custom-sec-edit-top-bar-icon">
                            <i class="fa-solid fa-magnet"></i>
                        </div> -->
                    </div>

                    <!-- <canvas id="custom-sec-canvas" width="1000" height="650" >

                    </canvas> -->

                    <div class="custom-sec-edit-inner" id="containerDiv">
                        <!-- <img src="{{asset('/assets/images/qrcode-white-backgroung.png')}}" alt="" id="art-work-insert"> -->
                        <img src="{{asset('/assets/images/qrcode-white-backgroung.png')}}" alt="" id="hs-qr-code" style="display:none;">
                        <div id="artwork_drop"></div>
                        <img class="custom-sec-edit-img" src="{{asset('/assets/images/hs-color-1.jpeg')}}" alt="">
                        <div class="custom-sec-edit-details">
                            <p id="endearment-custom"></p>
                        </div>
                        <div class="custom-sec-edit-details">
                            <p id="name-custom"></p>
                        </div>
                        <div class="custom-sec-edit-details">
                            <p id="date-custom"></p>
                        </div>
                        <div class="custom-sec-edit-details">
                            <p id="epitaph-custom"></p>
                        </div>
                    </div>
                </div>

                <div id="tabs">
                    <ul class="custom-options-tab-list">
                        <!-- <li class="custom-options-tab col-3"><a class="custom-options-tab-link" href="#tabs-1"><i class="fa-solid fa-grip"></i>Select Design</a></li> -->
                        <li class="custom-options-tab col-3"><a class="custom-options-tab-link" href="#tabs-2"><i class="fa-solid fa-image"></i>Add Artwork</a></li>
                        <!-- <li class="custom-options-tab col-3"><a class="custom-options-tab-link" href="#tabs-3"><i class="fa-solid fa-camera"></i>Add Image</a></li> -->
                        <!-- <li class="custom-options-tab col-3"><a class="custom-options-tab-link" href="#tabs-4"><i class="fa-solid fa-font"></i>Add Text</a></li> -->
                    </ul>
                    <!-- <div id="tabs-1">

                    </div> -->
                    <div id="tabs-2">
                        <div class="main-my-div" style="display: none;">
                            <div class="backbtn-div">
                                <button class="back-btn" onclick="showSubtab()">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </button>
                            </div>
                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['angels'] as $key => $angel)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/angels')}}/{{$angel->image}}" alt="{{$angel->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['animals'] as $key => $animal)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/animals')}}/{{$animal->image}}" alt="{{$animal->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['aquatic'] as $key => $aquati)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/aquatic')}}/{{$aquati->image}}" alt="{{$aquati->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['automobiles'] as $key => $automobile)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/automobiles')}}/{{$automobile->image}}" alt="{{$automobile->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['banners'] as $key => $banner)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/banners')}}/{{$banner->image}}" alt="{{$banner->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['bibles'] as $key => $bible)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/bibles')}}/{{$bible->image}}" alt="{{$bible->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['birds'] as $key => $bird)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/birds')}}/{{$bird->image}}" alt="{{$bird->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['borders'] as $key => $border)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/borders')}}/{{$border->image}}" alt="{{$border->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['buildings'] as $key => $building)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/buildings')}}/{{$building->image}}" alt="{{$building->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['catholic'] as $key => $catholi)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/catholic')}}/{{$catholi->image}}" alt="{{$catholi->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['children'] as $key => $child)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/children')}}/{{$child->image}}" alt="{{$child->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['christian'] as $key => $christian)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/christian')}}/{{$christian->image}}" alt="{{$christian->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['crosses'] as $key => $cross)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/crosses')}}/{{$cross->image}}" alt="{{$cross->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['emblems'] as $key => $emblem)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/emblems')}}/{{$emblem->image}}" alt="{{$emblem->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['floral'] as $key => $floral)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/floral')}}/{{$floral->image}}" alt="{{$floral->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['jesus'] as $key => $jesus)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/jesus')}}/{{$jesus->image}}" alt="{{$jesus->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['jewish'] as $key => $jewish)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/jewish')}}/{{$jewish->image}}" alt="{{$jewish->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['marriage'] as $key => $marriage)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/marriage')}}/{{$marriage->image}}" alt="{{$marriage->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['symbols'] as $key => $symbol)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/symbols')}}/{{$symbol->image}}" alt="{{$symbol->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['saints'] as $key => $saint)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/saints')}}/{{$saint->image}}" alt="{{$saint->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['roses'] as $key => $rose)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/roses')}}/{{$rose->image}}" alt="{{$rose->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['rosaries'] as $key => $rosary)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/rosaries')}}/{{$rosary->image}}" alt="{{$rosary->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['mary'] as $key => $mary)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/mary')}}/{{$mary->image}}" alt="{{$mary->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['dogs'] as $key => $dog)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/dogs')}}/{{$dog->image}}" alt="{{$dog->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['cats'] as $key => $cat)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/cats')}}/{{$cat->image}}" alt="{{$cat->title}}">
                                </div>
                                @endforeach
                            </div>

                            <div class="artwork-main my-div" style="display: none;">
                                @foreach($cliparts['category']['boats'] as $key => $boat)
                                <div class="artwork-inner-div-item">
                                    <img id="draggable" class="artwork ui-widget-content" src="{{asset('clipart/boats')}}/{{$boat->image}}" alt="{{$boat->title}}">
                                </div>
                                @endforeach
                            </div>


                        </div>


                        <div class="subtab">
                            <div class="subtab-grid">
                                @foreach($clipart_categories as $key => $category)
                                <button class="artwork-inner-div {{ $category }}" onclick="toggleDiv('my-div', '{{$key +1}}')">{{ $category }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- <div id="tabs-3">
                        <div class="custom-image-notice">
                            <p>
                                <span><i class="fa-solid fa-triangle-exclamation"></i></span>
                                <span>" Note: Minimum Artwork Charge is $75. Additional charges may apply."</span>

                            </p>
                        </div>
                        <div class="custom-image-upload">
                            <input class="custom-image-upload-input" type="file" name="" id="" />
                            <p>
                                Click or Drop Images Here
                            </p>
                        </div>
                    </div>
                    <div id="tabs-4">
                        <textarea class="custom-text-area" name="" id="" cols="30" rows="5" placeholder="Type Your Message..."></textarea>
                        <button class="add-custom-text">Add Text</button>
                    </div> -->
                </div>
            </div>

            <div class="flat-hs-detail-sec-grid">
                <div class="flat-hs-detail-sec-grid-left-item">
                    <div class="flat-hs-detail-message" style="display:none;">
                        <p class="flat-hs-detail-message-p-1">
                            <span>
                                <i class="fa-solid fa-square-check"></i>
                            </span>
                            <span>
                                Remember to follow the Cemetery Checklist. Requirements may vary cemetery to cemetery. Failure to comply with cemetery regulations may result in refusal of your stone.
                            </span>
                        </p>

                        <p class="flat-hs-detail-message-p-2">
                            If you have not done so already you can select the color of the headstone you would like. To proceed onto the next step, click Add to Cart.
                        </p>
                    </div>
                    <div class="product-imgs">
                        <div class="img-display">
                            <div class="product-showcase">
                                <!-- <img class="product-img active" src="{{asset('./assets/images/flat-hs-1.jpg')}}" alt="">
                                <img class="product-img" src="{{asset('./assets/images/flat-hs-2.jpg')}}" alt="">
                                <img class="product-img" src="{{asset('./assets/images/flat-hs-3.jpg')}}" alt="">
                                <img class="product-img" src="{{asset('./assets/images/flat-hs-4.jpg')}}" alt="">
                                <img class="product-img" src="{{asset('./assets/images/flat-hs-5.jpg')}}" alt="">
                                <img class="product-img" src="{{asset('./assets/images/flat-hs-6.jpg')}}" alt="">
                                <img class="product-img" src="{{asset('./assets/images/flat-hs-7.jpg')}}" alt="">
                                <img class="product-img" src="{{asset('./assets/images/flat-hs-8.jpg')}}" alt="">
                                <img class="product-img" src="{{asset('./assets/images/flat-hs-9.jpg')}}" alt=""> -->
                                @foreach($dataArr[0]->images as $image)
                                <img class="product-img" src="{{asset('/'.explode('-',$image)[0].'/'.$image)}}" alt="">
                                @endforeach
                            </div>
                        </div>

                        <div class="color-options-heading">
                            <h5>
                                Stone Colors : <span>Grey</span>
                            </h5>
                        </div>
                        <div class="color-option-grid">
                            <!-- <a class="color-options-link active" href="#" data-id="1">
                                <img class="color-options-img" src="{{asset('./assets/images/flat-hs-option-1.jpg')}}" alt="">
                            </a>

                            <a class="color-options-link" href="#" data-id="2">
                                <img class="color-options-img" src="{{asset('./assets/images/flat-hs-option-2.jpg')}}" alt="">
                            </a>
                            <a class="color-options-link" href="#" data-id="3">
                                <img class="color-options-img" src="{{asset('./assets/images/flat-hs-option-3.jpg')}}" alt="">
                            </a>
                            <a class="color-options-link" href="#" data-id="4">
                                <img class="color-options-img" src="{{asset('./assets/images/flat-hs-option-4.jpg')}}" alt="">
                            </a>
                            <a class="color-options-link" href="#" data-id="5">
                                <img class="color-options-img" src="{{asset('./assets/images/flat-hs-option-5.jpg')}}" alt="">
                            </a>
                            <a class="color-options-link" href="#" data-id="6">
                                <img class="color-options-img" src="{{asset('./assets/images/flat-hs-option-6.jpg')}}" alt="">
                            </a>
                            <a class="color-options-link" href="#" data-id="7">
                                <img class="color-options-img" src="{{asset('./assets/images/flat-hs-option-7.jpg')}}" alt="">
                            </a>
                            <a class="color-options-link" href="#" data-id="8">
                                <img class="color-options-img" src="{{asset('./assets/images/flat-hs-option-8.jpg')}}" alt="">
                            </a>
                            <a class="color-options-link" href="#" data-id="9">
                                <img class="color-options-img" src="{{asset('./assets/images/flat-hs-option-9.jpg')}}" alt="">
                            </a> -->
                            <?php

                            use Illuminate\Support\Facades\Auth;

                            $colorArr = ['Grey', 'Imperial Black', 'Imperial Grey', 'Mahogany', 'Imperial Red', 'Blue Pearl', 'Desert Pink', 'Emerald Pearl', 'Bahama Blue'];

                            $colorArr = array_combine(range(1, count($colorArr)), $colorArr)

                            ?>
                            @foreach($dataArr[0]->images as $key => $image)
                            @if($key == 1)
                            <a class="color-options-link active" href="#" data-id="{{$key}}" data-color="{{$colorArr[$key]}}" data-oldPrice="{{ $dataArr[0]->old_price[$key] }}" data-newPrice="{{ $dataArr[0]->new_price[$key] }}" data-weight="{{ $dataArr[0]->weight[$key] }}">
                                <img class="color-options-img" src="{{asset('/assets/images/hs-color-'.$key.'.jpeg')}}" alt="">
                            </a>
                            @else
                            <a class="color-options-link" href="#" data-id="{{$key}}" data-color="{{$colorArr[$key]}}" data-oldPrice="{{ $dataArr[0]->old_price[$key] }}" data-newPrice="{{ $dataArr[0]->new_price[$key] }}" data-weight="{{ $dataArr[0]->weight[$key] }}">
                                <img class="color-options-img" src="{{asset('/assets/images/hs-color-'.$key.'.jpeg')}}" alt="">
                            </a>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flat-hs-detail-sec-grid-right-item">
                    <div class="flat-hs-detail-sec-grid-right-item-inner">

                        <div class="product-price">
                            <p class="product-label">Price :</p>
                            <p class="product-price-p">
                                <span class="old-price">${{ $dataArr[0]->old_price[1] }}.00</span>
                                <span class="new-price">${{ $dataArr[0]->new_price[1] }}.00</span>
                            </p>
                            <p class="free-ship-p">
                                & FREE Shipping
                            </p>
                        </div>

                        <div class="product-price">
                            <p class="product-label">You Save :</p>
                            <p class="product-price-p">
                                <span class="save-price">${{ $dataArr[0]->old_price[1] - $dataArr[0]->new_price[1] }}.00</span>
                            </p>
                        </div>

                        <div class="product-price">
                            <p class="product-label">Ships In :</p>
                            <p class="product-price-p">
                                <span class="save-price">6 to 20 weeks</span>
                            </p>
                        </div>

                        <div class="quantity-grp">
                            <label for="" class="mb-2 product-label">Quantity :</label>
                            <input class="quantity-field" onkeydown="return event.keyCode != 109 && event.keyCode != 189 && event.keyCode != 96 && event.keyCode != 48 && event.keyCode != 69" placeholder="1" type="number" min="1" value="1" />
                        </div>

                        <div class="personalize-btn-div">
                            <button class="btn personalize-btn">
                                Personalize
                            </button>

                            <a href="javascript:;" style="display: none;" class="cart-btn" onclick="addToCart()">
                                Add to Cart
                            </a>
                        </div>


                    </div>
                </div>
            </div>

            <div class="personalize-detail">
                <div class="personalize-detail-top">
                    <h1 class="common-heading">
                        Step 1
                    </h1>
                    <p>
                        Please fill out the form below to begin personalizing your headstone. The information that you enter will be added
                        to
                        your headstone design in the next step.
                    </p>
                    <p>
                        <strong>NOTE:</strong> All engraved text is included, no per-letter or per-word charges!
                    </p>
                </div>

                <form class="personalize-detail-form">
                    <div class="mb-3">
                        <label for="" class="form-label">Endearment</label>
                        <select onchange="endearmentSelect(this.value)" id="endearment-value" class="form-select cmmn-field-class" aria-label="Default select example">
                            <option value="" selected></option>
                            <option value="custom">Write your own endearment</option>
                            <option value="Loving Mother">Loving Mother</option>
                            <option value="Loving Father">Loving Father</option>
                            <option value="Beloved Wife">Beloved Wife</option>
                            <option value="Beloved Husband">Beloved Husband</option>
                            <option value="Our Beloved Baby">Our Beloved Baby</option>
                            <option value="Beloved Father and Mother">Beloved Father and Mother</option>
                            <option value="Loving Wife">Loving Wife</option>
                            <option value="Loving Wife and Mother">Loving Wife and Mother</option>
                            <option value="Loving Husband">Loving Husband</option>
                            <option value="Loving Husband and Father">Loving Husband and Father</option>
                            <option value="Husband and Father">Husband and Father</option>
                            <option value="Wife and Mother">Wife and Mother</option>
                            <option value="Beloved Husband and Father">Beloved Husband and Father</option>
                            <option value="Beloved Wife and Mother">Beloved Wife and Mother</option>
                            <option value="Beloved Wife and Daughter">Beloved Wife and Daughter</option>
                            <option value="Beloved Husband and Son">Beloved Husband and Son</option>
                            <option value="Beloved Son">Beloved Son</option>
                            <option value="Beloved Daughter">Beloved Daughter</option>
                            <option value="Beloved Son and Brother">Beloved Son and Brother</option>
                        </select>
                    </div>
                    <div class="mb-3" id="custom-endearment-textarea">
                        <label for="custom-endearment" class="form-label">Write Your Own Endearment</label>
                        <textarea class="form-control cmmn-field-class" id="custom-endearment" rows="3" maxlength="150" minlength="0"></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control cmmn-field-class" id="first-name" placeholder="First name*" aria-label="First name" minlength="0" maxlength="15">
                            <span class="error name-error"></span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="last-name" class="form-control cmmn-field-class" placeholder="Last name*" aria-label="Last name" minlength="0" maxlength="15">
                            <span class="error lname-error"></span>
                        </div>
                    </div>

                    <div class="personalize-check-grp mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" onchange="dateOptions()">
                            <label class="form-check-label" for="gridCheck1">
                                More Date Options
                            </label>
                        </div>
                        <div class="form-check" id="custom-date-checkbox">
                            <input class="form-check-input" type="checkbox" id="gridCheck2" onchange="customDateSection()">
                            <label class="form-check-label" for="gridCheck2">
                                Enter Custom Dates
                            </label>
                        </div>
                        <div class="form-check" id="single-date-checkbox">
                            <input class="form-check-input" type="checkbox" id="gridCheck3" onchange="singleDate()">
                            <label class="form-check-label" for="gridCheck3">
                                Single Date
                            </label>
                        </div>
                    </div>

                    <div class="row mb-3" id="date-section">
                        <div class="col-md-4 mb-3">
                            <label for="date-dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control cmmn-field-class " id="date-dob" max="" />
                            <span class="error dob-error"></span>
                        </div>
                        <div class="col-md-4 mb-3" id="dod">
                            <label for="date-dod" class="form-label">Date of Death</label>
                            <input type="date" class="form-control cmmn-field-class " id="date-dod" max="" />
                            <span class="error dod-error"></span>

                        </div>
                        <div class="col-md-4">
                            <label for="date-df" class="form-label">Date Format</label>
                            <select class="form-select cmmn-field-class" aria-label="Default select example" id="date-format">
                                <option selected value="custom">Use Format from Design</option>
                                <option value="MMMM D, YYYY">September 21, 2015</option>
                                <option value="MMM D, YYYY">Sept 21, 2015</option>
                                <option value="MMMM YYYY">September 2015</option>
                                <option value="YYYY">2015</option>
                                <option value="M/D/YYYY">9/21/2015</option>
                                <option value="MM/DD/YYYY">09/21/2015</option>
                                <option value="M-D-YYYY">9-21-2015</option>
                                <option value="D MMMM YYYY">21 September 2015</option>
                                <option value="D MMM YYYY">21 Sept 2015</option>
                                <option value="MM/DD/YY">Locale Date</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3" id="custom-date-section">
                        <div class="col-md-6 mb-3">
                            <label for="date-dob" class="form-label">Date of Birth (Custom)</label>
                            <input type="text" class="form-control cmmn-field-class " id="date-dob-custom" placeholder="" />
                        </div>
                        <div class="col-md-6 mb-3" id="custom-dod">
                            <label for="date-dod" class="form-label">Date of Death (Custom)</label>
                            <input type="text" class="form-control cmmn-field-class " id="date-dod-custom" placeholder="" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Epitaph</label>
                        <select onchange="epitaphSelect(this.value)" id="epitaph-value" class="form-select cmmn-field-class" aria-label="Default select example">
                            <option selected value=""></option>
                            <option value="custom">Write your own epitaph</option>
                            <option value="Absent from the body, present with the Lord.">Absent from the body, present with the Lord.</option>
                            <option value="I will dwell in the house of the Lord forever.">I will dwell in the house of the Lord forever.</option>
                            <option value="I am the resurrection and the life. He that believeth in Me, though he were dead, yet shall he live.">I am the resurrection and the life. He that believeth in Me, though he were dead, yet shall he live.</option>
                            <option value="I go to prepare a place for you that where I am, there you may also be.">I go to prepare a place for you that where I am, there you may also be.</option>
                            <option value="Neither height, nor depth, nor anything else in all creation, will separate us from the love of God, that is in Christ Jesus our Lord.">Neither height, nor depth, nor anything else in all creation, will separate us from the love of God, that is in Christ Jesus our Lord.</option>
                            <option value="I give them eternal life, and they shall never perish; no one can snatch them out of My hand.">I give them eternal life, and they shall never perish; no one can snatch them out of My hand.</option>
                            <option value="Our brief partings on earth will appear one day as nothing beside the joy of eternity together.">Our brief partings on earth will appear one day as nothing beside the joy of eternity together.</option>
                            <option value="After the night comes the morning, bidding all darkness cease... After life's cares and sorrows, His comfort, sweetness and peace.">After the night comes the morning, bidding all darkness cease... After life's cares and sorrows, His comfort, sweetness and peace.</option>
                            <option value="But many that are first shall be last and the last shall be first.">But many that are first shall be last and the last shall be first.</option>
                            <option value="He lived life to the fullest.">He lived life to the fullest.</option>
                            <option value="She filled every second of her life with laughter, love and happiness.">She filled every second of her life with laughter, love and happiness.</option>
                            <option value="Their greatest peace was found in nature...and those moments spent crossing the next mountain.">Their greatest peace was found in nature...and those moments spent crossing the next mountain.</option>
                            <option value="He was filled with a zest for life that never grew old, and kept him eternally young.">He was filled with a zest for life that never grew old, and kept him eternally young.</option>
                            <option value="She is not far away.">She is not far away.</option>
                            <option value="While he lives cherished in our memories, he is never far away.">While he lives cherished in our memories, he is never far away.</option>
                            <option value="They loved their Lord with all their hearts, with all their minds and with all their spirits.">They loved their Lord with all their hearts, with all their minds and with all their spirits.</option>
                            <option value="A godly man who served the Lord all his days.">A godly man who served the Lord all his days.</option>
                            <option value="May God be with you and comfort you.">May God be with you and comfort you.</option>
                            <option value="In God's care.">In God's care.</option>
                            <option value="The Lord is my Shepherd.">The Lord is my Shepherd.</option>
                            <option value="May heaven's eternal joy be thine.">May heaven's eternal joy be thine.</option>
                            <option value="Love is eternal.">Love is eternal.</option>
                            <option value="Where there is great love, there are always miracles.">Where there is great love, there are always miracles.</option>
                            <option value="May she rest in peace with God.">May she rest in peace with God.</option>
                            <option value="Not my will but thine be done.">Not my will but thine be done.</option>
                            <option value="Blessed sleep to which we all return.">Blessed sleep to which we all return.</option>
                            <option value="Sweet in her ways, observant in her mitzvahs.">Sweet in her ways, observant in her mitzvahs.</option>
                            <option value="Sweet in his ways, observant in his mitzvahs.">Sweet in his ways, observant in his mitzvahs.</option>
                            <option value="Let her own works praise her at the gates.">Let her own works praise her at the gates.</option>
                            <option value="Let his own works praise him at the gates.">Let his own works praise him at the gates.</option>
                            <option value="Generous of heart, constant of faith.">Generous of heart, constant of faith.</option>
                            <option value="Out of sorrow, God speaks to us best.">Out of sorrow, God speaks to us best.</option>
                            <option value="I know that my redeemer lives, therefore I too shall live.">I know that my redeemer lives, therefore I too shall live.</option>
                            <option value="He gives His beloved sleep.">He gives His beloved sleep.</option>
                            <option value="God grant us love...Something to love He lends us.">God grant us love...Something to love He lends us.</option>
                            <option value="Our love goes with you and our souls wait to join you.">Our love goes with you and our souls wait to join you.</option>
                            <option value="In His will is our peace.">In His will is our peace.</option>
                            <option value="Unto them that love God, all things work for good.">Unto them that love God, all things work for good.</option>
                            <option value="And I will give you rest.">And I will give you rest.</option>
                            <option value="Trust in God.">Trust in God.</option>
                            <option value="May the peace of the Lord be with you.">May the peace of the Lord be with you.</option>
                            <option value="For to this end Christ died.">For to this end Christ died.</option>
                            <option value="I will lift up mine eyes unto the hills.">I will lift up mine eyes unto the hills.</option>
                            <option value="All things change but God remains.">All things change but God remains.</option>
                            <option value="God is our refuge and our strength.">God is our refuge and our strength.</option>
                            <option value="All things to the glory of God.">All things to the glory of God.</option>
                            <option value="And flights of angels sing thee to thy rest.">And flights of angels sing thee to thy rest.</option>
                            <option value="Whither thou goest I will go.">Whither thou goest I will go.</option>
                            <option value="Earth has no sorrow that heaven cannot heal.">Earth has no sorrow that heaven cannot heal.</option>
                            <option value="What we keep in memory is ours forever.">What we keep in memory is ours forever.</option>
                            <option value="A man must stand erect, not be kept erect by others.">A man must stand erect, not be kept erect by others.</option>
                            <option value="Always in our hearts.">Always in our hearts.</option>
                            <option value="Gone from home but not from our hearts.">Gone from home but not from our hearts.</option>
                            <option value="We lived together in happiness; we rest together in peace.">We lived together in happiness; we rest together in peace.</option>
                            <option value="Love lives on.">Love lives on.</option>
                            <option value="She touched everyone with special love and kindness.">She touched everyone with special love and kindness.</option>
                            <option value="We miss you.">We miss you.</option>
                            <option value="A free spirit.">A free spirit.</option>
                            <option value="Our little angel.">Our little angel.</option>
                            <option value="An inspiration to all.">An inspiration to all.</option>
                            <option value="We love you always.">We love you always.</option>
                            <option value="With all my love.">With all my love.</option>
                            <option value="There was grace in her steps, love in every gesture.">There was grace in her steps, love in every gesture.</option>
                            <option value="Forever young, forever in our hearts.">Forever young, forever in our hearts.</option>
                            <option value="Life is not forever. Love is.">Life is not forever. Love is.</option>
                            <option value="May she be remembered as she remembered others.">May she be remembered as she remembered others.</option>
                            <option value="A life full of years of understanding.">A life full of years of understanding.</option>
                            <option value="Of tender heart and generous spirit.">Of tender heart and generous spirit.</option>
                            <option value="Peace is thine and sweet remembrance is ours.">Peace is thine and sweet remembrance is ours.</option>
                            <option value="A woman of virtue kindness and modesty.">A woman of virtue kindness and modesty.</option>
                            <option value="Your patient courage is a beloved memory.">Your patient courage is a beloved memory.</option>
                            <option value="She graced her family with acts of loving-kindness.">She graced her family with acts of loving-kindness.</option>
                            <option value="Precious are the memories of">Precious are the memories of</option>
                            <option value="How beautiful life was to me.">How beautiful life was to me.</option>
                            <option value="Her works were kindness, her deeds were love.">Her works were kindness, her deeds were love.</option>
                            <option value="Tender mother, a faithful friend.">Tender mother, a faithful friend.</option>
                            <option value="A friend to many and sadly missed.">A friend to many and sadly missed.</option>
                            <option value="Our love is forever.">Our love is forever.</option>
                            <option value="Wonderful was your love for us.">Wonderful was your love for us.</option>
                            <option value="Love never ends.">Love never ends.</option>
                            <option value="They gave their today for our tomorrow.">They gave their today for our tomorrow.</option>
                            <option value="Loving memories last forever.">Loving memories last forever.</option>
                            <option value="He loved and was loved.">He loved and was loved.</option>
                            <option value="Too well loved to ever be forgotten.">Too well loved to ever be forgotten.</option>
                            <option value="Love makes memory eternal.">Love makes memory eternal.</option>
                            <option value="To live in the hearts of others is not to die.">To live in the hearts of others is not to die.</option>
                            <option value="Gone fishin'">Gone fishin'</option>
                            <option value="A gentle man.">A gentle man.</option>
                            <option value="She loved everyone.">She loved everyone.</option>
                            <option value="He touched the lives of many.">He touched the lives of many.</option>
                            <option value="While we have time, let us do good.">While we have time, let us do good.</option>
                            <option value="As the bird free of its cage seeks the heights, so the Christian soul in death flies home to God.">As the bird free of its cage seeks the heights, so the Christian soul in death flies home to God.</option>
                            <option value="The saddened hearts were healed in knowing the pain of life is over and the beauty of the soul revealed.">The saddened hearts were healed in knowing the pain of life is over and the beauty of the soul revealed.</option>
                            <option value="I have fought the good fight. I have finished my course. I have kept the faith.">I have fought the good fight. I have finished my course. I have kept the faith.</option>
                            <option value="Rest, O weary traveler, for with the dawn comes great joy.">Rest, O weary traveler, for with the dawn comes great joy.</option>
                            <option value="I am not afraid of tomorrow, for I have seen yesterday and loved today.">I am not afraid of tomorrow, for I have seen yesterday and loved today.</option>
                            <option value="If our love could have saved him, he would not have died.">If our love could have saved him, he would not have died.</option>
                            <option value="Step softly, a dream lies buried here.">Step softly, a dream lies buried here.</option>
                            <option value="God grant us the serenity to accept the things we cannot change, the courage to change the things we can and the wisdom to know the difference.">God grant us the serenity to accept the things we cannot change, the courage to change the things we can and the wisdom to know the difference.</option>
                            <option value="Great love lives on.">Great love lives on.</option>
                            <option value="His courage, his smile, his grace gladdened the hearts of those who have had the privilege of loving him.">His courage, his smile, his grace gladdened the hearts of those who have had the privilege of loving him.</option>
                            <option value="It's hard to look back on any gain in life that does not have a loss attached to it.">It's hard to look back on any gain in life that does not have a loss attached to it.</option>
                            <option value="Those we love remain with us for love itself lives on.">Those we love remain with us for love itself lives on.</option>
                            <option value="But O for the touch of a vanished hand and the sound of a voice that is still. -Tennyson">But O for the touch of a vanished hand and the sound of a voice that is still. -Tennyson</option>
                            <option value="For they conquer who believe they can. -Virgil">For they conquer who believe they can. -Virgil</option>
                            <option value="They who forgive most, shall be most forgiven. -Bailey">They who forgive most, shall be most forgiven. -Bailey</option>
                            <option value="The unity that binds us all together that makes this earth a family and all men brothers and the sons of God is love. -Wolfe">The unity that binds us all together that makes this earth a family and all men brothers and the sons of God is love. -Wolfe</option>
                            <option value="I am going the way of the earth. Joshua 23:14">I am going the way of the earth. Joshua 23:14</option>
                            <option value="Yea though I walk through the valley of the shadow of death I will fear no evil, for thou art with me. Thy rod and thy staff they comfort me. Psalms 23:4">Yea though I walk through the valley of the shadow of death I will fear no evil, for thou art with me. Thy rod and thy staff they comfort me. Psalms 23:4</option>
                            <option value="Blessed are they that mourn: for they shall be comforted. Matthew 5:4">Blessed are they that mourn: for they shall be comforted. Matthew 5:4</option>
                            <option value="Blessed are the merciful, for they shall obtain mercy. Matthew 5:7">Blessed are the merciful, for they shall obtain mercy. Matthew 5:7</option>
                            <option value="Blessed are the pure in heart, for they shall see God. Matthew 5:8">Blessed are the pure in heart, for they shall see God. Matthew 5:8</option>
                            <option value="In the Cross of Christ I glory.">In the Cross of Christ I glory.</option>
                        </select>
                    </div>

                    <div class="mb-3" id="custom-epitaph-textarea">
                        <label for="custom-epitaph" class="form-label">Write Your Own Epitaph</label>
                        <textarea class="form-control cmmn-field-class" id="custom-epitaph" rows="3" maxlength="150" minlength="0"></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="sizes" class="form-label">QR Sizes</label>
                            <select class="form-select cmmn-field-class" aria-label="Default select example" id="qr_sizes" onchange="changeQrSize(this.value)">
                                <option value="small" selected>Small (250x250)</option>
                                <option value="medium">Medium (350x350)</option>
                                <option value="large">Large (500x500)</option>
                                <option value="extralarge">Extra Large (750x750)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            @if(!empty($qrcodes))
                            <label for="sizes" class="form-label">QA Code</label>
                            <select class="form-select cmmn-field-class" aria-label="Default select example" id="qr_code_id" onchange="capturCode()">
                                <option value="select" selected>Please select a QR code</option>
                                @foreach($qrcodes as $qr)
                                <option value="{{ $qr->id }}">{{ $qr->label }}</option>
                                @endforeach
                            </select>
                            @else
                            <a href="{{url('plans')}}">
                                <button type="button" class="btn view-personalized-product">Buy QR</button>
                                <a>
                                    @endif
                        </div>
                    </div>

                    @if(!empty($qrcodes))
                    <div class="qr-image-container">
                        @foreach($qrcodes as $qr)
                        <div class="image-container">
                            <div class="capture-image" id="qacode-{{ $qr->id }}" style="display:none;">{{ $qr->qrcode }}</div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- <div class="mb-3">
                        <label for="qr-upload" class="form-label">Upload QR</label>
                        <input type="file" id="qr-upload" class="form-control cmmn-field-class" onchange="uplodeQR(event)" accept="image/*">
                        <canvas id="canvas" style="display: none;"></canvas>
                    </div> -->

                    <button type="button" class="btn view-personalized-product" id="view-personalized-product" onclick="viewPersonalizedProduct()">View Personalized Product</button>
                </form>
            </div>

            <div class="flat-hs-detail-info">
                <div class="flat-hs-detail-info-first">
                    <p>Personalize a headstone with our online designer. To begin:</p>
                    <ul>
                        <li>
                            Select a stone color and press the <strong>Personalize</strong> button.
                        </li>
                        <li>
                            Fill in the form below and press <strong>View Personalized Product</strong>.
                        </li>
                        <li>
                            The information you provided on the form will be displayed on the stone that you chose.
                        </li>
                        <li>
                            Within the form you are able to write your own epitaph / endearment or select one from the list provided.
                        </li>
                        <li>
                            Once your wording is on the screen you can select a design, add artwork, upload your own artwork and even add
                            additional
                            text to your personalized marker.
                        </li>
                    </ul>
                </div>

                <div class="flat-hs-detail-info-two mb-3">
                    <p>
                        All of the changes you make will be shown on the screen and carved into the headstone you purchase. We are able to
                        engrave most foreign languages. If you would like to add non-english lettering to your headstone you can change your
                        computer's keyboard to match that language and type directly into the form fields or copy and paste the characters into
                        the appropriate field within the personalization form. The form will remain in English, only the words that you type in
                        foreign characters will be shown in that language. Here is a list of some of the
                        languages that we can etch
                        . If you have any questions during this process or need assistance in any way please give us a call at: (800) 849-2873.
                    </p>
                </div>

                <div class="flat-hs-detail-info-third">
                    <p>
                        <strong>The price you see is the price you pay</strong>. All of our Headstones, Tombstones and Monuments include unlimited engraving and
                        free shipping to anywhere within the Continental United States (Shipping to Alaska or Hawaii for an Additional Charge).
                        Extra services such as photo engraving and ceramic photo’s are also available.
                    </p>
                    <ul>
                        <li>
                            Free Shipping to Anywhere in the Continental U.S.
                            (Shipping to Alaska and Hawaii For An Additional Charge)
                        </li>
                        <li>
                            Proof of Layout
                        </li>
                        <li>
                            Sales Tax Included
                        </li>
                        <li>
                            Ten Color Choices
                        </li>
                        <li>
                            Large Selection of Styles and Sizes
                        </li>
                        <li>
                            Unlimited Lettering
                        </li>
                        <li>
                            Large Clip Art Gallery to Choose From
                        </li>
                        <li>
                            Custom Design Layout
                        </li>
                        <li>
                            Large Selection of Artwork
                        </li>
                    </ul>
                </div>

            </div>

            <div class="addt-info">
                <h1 class="common-heading">
                    Additional information
                </h1>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Weight</th>
                            <td id="hs-weight">
                                <p>{{ $dataArr[0]->weight[1] }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Dimensions</th>
                            <td id="hs-dimension">
                                <p>
                                    {{ $dataArr[0]->dimension }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Stone Color</th>
                            <td colspan="2">
                                <p>
                                    <a class="stone-color-link" href="javascript:;" rel="tag">Grey</a>,&nbsp;
                                    <a class="stone-color-link" href="javascript:;" rel="tag">Imperial Black</a>,&nbsp;
                                    <a class="stone-color-link" href="javascript:;" rel="tag">Imperial Grey</a>,&nbsp;
                                    <a class="stone-color-link" href="javascript:;" rel="tag">Mahogany</a>,&nbsp;
                                    <a class="stone-color-link" href="javascript:;" rel="tag">Imperial Red</a>,&nbsp;
                                    <a class="stone-color-link" href="javascript:;" rel="tag">Blue Pearl</a>,&nbsp;
                                    <a class="stone-color-link" href="javascript:;" rel="tag">Desert Pink</a>,&nbsp;
                                    <a class="stone-color-link" href="javascript:;" rel="tag">Emerald Pearl</a>,&nbsp;
                                    <a class="stone-color-link" href="javascript:;" rel="tag">Bahama Blue</a>

                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="addt-info-othrs">
                    <!-- <p>
                        SKU: FL1GR120803
                    </p> -->
                    <p>
                        Category:
                        <a href="javascript:;"><?php
                                                function convertToTitleCase($inputString)
                                                {
                                                    // Remove the part starting from "Img-1"
                                                    $inputString = preg_replace('/Img-\d+/', '', $inputString);

                                                    // Separate the string into words based on camel case (e.g., serpTopSlantHeadstones -> serp, Top, Slant, Headstones)
                                                    preg_match_all('/[A-Z][a-z0-9]*/', $inputString, $matches);
                                                    $words = $matches[0];

                                                    // Capitalize the first letter of each word and join them with spaces
                                                    $convertedString = implode(' ', array_map('ucfirst', $words));

                                                    return $convertedString;
                                                }

                                                // Example usage:
                                                $inputString = ucfirst($dataArr[0]->images[1]);
                                                $convertedString = convertToTitleCase($inputString);
                                                echo $convertedString;
                                                ?></a>
                    </p>

                </div>
            </div>

            <div class="related-products">
                <h1 class="common-heading">
                    Related products
                </h1>
                <div class="related-products-grid">
                    @foreach($relatedProducts as $product)
                    <a href="{{$product->name}}" class="hs-cat-result-grid-item">
                        <div class="hs-cat-result-grid-item-img">
                            <img src="{{ asset('/headstoneImages/'.$product->image) }}" alt="">
                        </div>
                        <div class="hs-cat-result-grid-item-p">
                            <p class="hs-cat-result-grid-item-detail">
                                {{$product->name}}
                            </p>
                            <h4 class="hs-cat-result-grid-item-price">
                                <span>{{$product->min_price}}</span> -
                                <span>{{$product->max_price}}</span>
                            </h4>
                        </div>
                    </a>
                    @endforeach
                    <!-- <a href="./flat-hs-detail.html" class="hs-cat-result-grid-item">
                        <div class="hs-cat-result-grid-item-img">
                            <img src="./assets/images/flat-hs.jpg" alt="">
                        </div>
                        <div class="hs-cat-result-grid-item-p">
                            <p class="hs-cat-result-grid-item-detail">
                                24″ x 12″ x 3″ Flat Granite Headstone
                            </p>
                            <h4 class="hs-cat-result-grid-item-price">
                                <span>$550</span> -
                                <span>$5550</span>
                            </h4>
                        </div>
                    </a>
                    <a href="./flat-hs-detail.html" class="hs-cat-result-grid-item">
                        <div class="hs-cat-result-grid-item-img">
                            <img src="./assets/images/flat-hs.jpg" alt="">
                        </div>
                        <div class="hs-cat-result-grid-item-p">
                            <p class="hs-cat-result-grid-item-detail">
                                24″ x 12″ x 3″ Flat Granite Headstone
                            </p>
                            <h4 class="hs-cat-result-grid-item-price">
                                <span>$550</span> -
                                <span>$5550</span>
                            </h4>
                        </div>
                    </a> -->
                </div>
            </div>

        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.2/fabric.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" ></script> -->
<script src="{{asset('/assets/js/product-slider.js')}}"></script>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jsqr@1.0.4/dist/jsQR.js"></script>




<script>
    function uplodeQR(event) {
        const fileInput = document.getElementById("qr-upload");
        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext("2d");
        const file = event.target.files[0];
        const reader = new FileReader();
        if (file == '' || file == undefined) {
            //ctx.clearRect(0, 0, canvas.width, canvas.height);
            $('#hs-qr-code').css('display', 'block');
            $('#view-personalized-product').prop('disabled', false);
        }
        var qasize = $('#qr_sizes').find(":selected").val();
        reader.onload = function() {
            const img = new Image();
            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0, img.width, img.height);
                const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                const code = jsQR(imageData.data, imageData.width, imageData.height);
                console.log('code', code)
                if (code) {
                    console.log("QR code detected!");
                    console.log("QR code data:", code.data);
                    // Perform additional actions or processing if needed
                    const reader = new FileReader();
                    reader.onload = function() {
                        const imagePreview = document.getElementById('hs-qr-code');
                        imagePreview.src = reader.result;
                    };
                    reader.readAsDataURL(file);
                    changeQrSize(qasize);
                    $('#hs-qr-code').css('display', 'block');
                    $('#view-personalized-product').prop('disabled', false);
                } else {
                    // view-personalized-product
                    $('#hs-qr-code').css('display', 'none');
                    $('#view-personalized-product').prop('disabled', true);
                    alert("No QR code detected in the image.");
                }
            };
            img.src = reader.result;
        };
        reader.readAsDataURL(file);

        // Check if a file was selected
        // if (file) {
        //     // Create a new FileReader
        //     const reader = new FileReader();
        //     // Define the onload event handler for the FileReader
        //     reader.onload = function() {
        //         // Get the image preview element
        //         const imagePreview = document.getElementById('hs-qr-code');
        //         // Set the src attribute of the image preview to the data URL
        //         imagePreview.src = reader.result;
        //     };
        //     // Read the file as a data URL
        //     reader.readAsDataURL(file);
        // }
    }

    // select#qr_sizes
    function changeQrSize(value) {
        if (value == "small") {
            $('#hs-qr-code').css('width', '250px');
            $('#hs-qr-code').css('height', '250px');
        } else if (value == "medium") {
            $('#hs-qr-code').css('width', '350px');
            $('#hs-qr-code').css('height', '350px');
            $('.ui-wrapper').css('width', '350px');
            $('.ui-wrapper').css('height', '350px');

        } else if (value == "large") {
            $('#hs-qr-code').css('width', '500px');
            $('#hs-qr-code').css('height', '500px');
            $('.ui-wrapper').css('width', '500px');
            $('.ui-wrapper').css('height', '500px');
        } else if (value == "extralarge") {
            $('#hs-qr-code').css('width', '750px');
            $('#hs-qr-code').css('height', '750px');
            $('.ui-wrapper').css('width', '750px');
            $('.ui-wrapper').css('height', '750px');
        } else {
            $('#hs-qr-code').css('width', '250px');
            $('#hs-qr-code').css('height', '250px');
        }
    }


    $(function() {
        $("#hs-qr-code").draggable({
            containment: '#containerDiv',
            cursor: "move",
        });
        // $( ".hsqr-code" ).resizable({aspectRatio: true});
    });

    $('a.cart-btn').hide();
    $('div.custom-sec').hide();
    $('div.personalize-detail').hide();
    $('div#custom-textarea').hide()
    $('div#custom-date-checkbox').hide()
    $('div#single-date-checkbox').hide()
    $('div#custom-date-section').hide()
    $('div#custom-epitaph-textarea').hide()
    $('div#custom-endearment-textarea').hide()
    $('button.btn.personalize-btn').on('click', function() {
        var authCheck = "{{ Auth::check() }}"
        if (authCheck) {
            window.scrollTo(0, 650);
            $('div.personalize-detail').toggle('slide');
        } else {
            window.location.href = "{{ url('/login') }}";
        }
    });

    function endearmentSelect(value) {
        if (value == 'custom') {
            $('div#custom-endearment-textarea').show('slide')
        } else {
            $('div#custom-endearment-textarea').hide('slide')
        }
    }


    function dateOptions() {
        var checkbox = document.getElementById("gridCheck1");

        if (checkbox.checked) {
            $('div#custom-date-checkbox').show()
            $('div#single-date-checkbox').show()
        } else {
            $('div#custom-date-checkbox').hide()
            $('div#single-date-checkbox').hide()
        }

    }

    function customDateSection() {
        var checkbox = document.getElementById("gridCheck2");

        if (checkbox.checked) {
            $('div#date-section').hide()
            $('div#custom-date-section').show()
        } else {
            $('div#date-section').show()
            $('div#custom-date-section').hide()
        }
    }

    function singleDate() {
        var checkbox = document.getElementById("gridCheck3");

        if (checkbox.checked) {
            $('div#dod').hide()
            $('div#custom-dod').hide()
        } else {
            $('div#dod').show()
            $('div#custom-dod').show()
        }
    }

    function epitaphSelect(value) {
        if (value == 'custom') {
            $('div#custom-epitaph-textarea').show('slide')
        } else {
            $('div#custom-epitaph-textarea').hide('slide')
        }

    }

    function viewPersonalizedProduct() {
        //Validation        
        var name = $('#first-name').val();
        if (name == '' || name == null) {
            $(this).scrollTop(800);
            $('.name-error').html('Please fill name first.');
            setTimeout(() => {
                $('.name-error').html("");
            }, 5000);
            return false;
        }

        var lname = $('#last-name').val();
        if (lname == '' || lname == null) {
            $(this).scrollTop(800);
            $('.lname-error').html('Please fill last name.');
            setTimeout(() => {
                $('.lname-error').html("");
            }, 5000);
            return false;
        }
         
        var dob = $('#date-dob').val();
        var dod = $('#date-dod').val();
        if (dob == '' || dob == null) {
            $(this).scrollTop(1000);
            $('.dob-error').html('Please fill DOB.');
            setTimeout(() => {
                $('.dob-error').html("");
            }, 5000);
            return false;
        }
        if (dod == '' || dod == null) {
            $(this).scrollTop(1000);
            $('.dod-error').html('Please fill DOB.');
            setTimeout(() => {
                $('.dod-error').html("");
            }, 5000);
            return false;
        }

        var date1 = new Date(dob);
        var date2 = new Date(dod);

        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

        if (Difference_In_Days == 0 || Difference_In_Days > 0) {

            $('.flat-hs-detail-message').css('display', 'block');
            $('img.product-img').css('display', 'none');
            window.scrollTo(0, 0);
            $('a.cart-btn').show();
            $('div.custom-sec').show();
            $('div.personalize-detail').hide();
            // $('div.img-display').hide();
            $('button.btn.personalize-btn').html('Edit')
            if ($('#endearment-value').val() == 'custom') {
                $('#endearment-custom').html($('#custom-endearment').val());
            } else {
                $('#endearment-custom').html($('#endearment-value').val())
            }

            if ($('#epitaph-value').val() == 'custom') {
                $('#epitaph-custom').html($('#custom-epitaph').val());
            } else {
                $('#epitaph-custom').html($('#epitaph-value').val())
            }
            // var endearment = $('#endearment-custom').html('')

            var name = $('#first-name').val() + ' ' + $('#last-name').val();
            $('#name-custom').html(name)


            var checkbox2 = document.getElementById("gridCheck2");
            var checkbox3 = document.getElementById("gridCheck3");

            var dob_date_custom = $('#date-dob-custom').val();
            var dod_date_custom = $('#date-dod-custom').val();
            var date = '';
            if (checkbox2.checked) {
                if (checkbox3.checked) {
                    if (dob_date_custom != "" && dob_date_custom != undefined) {
                        date = dob_date_custom;
                    }
                } else {
                    if (dob_date_custom != "" && dod_date_custom != "") {
                        date = dob_date_custom + ' - ' + dod_date_custom;
                    }
                }
            } else {
                if ($('#date-format').val() == 'custom') {
                    if ($('#date-dob').val() != "" && $('#date-dod').val() != "") {
                        date = $('#date-dob').val() + ' - ' + $('#date-dod').val();
                    }
                } else {
                    if (checkbox3.checked) {
                        if ($('#date-dob').val() != "") {
                            date = moment($('#date-dob').val()).format($('#date-format').val());
                        }
                    } else {
                        if ($('#date-dob').val() != "" && $('#date-dod').val() != "") {
                            date = moment($('#date-dob').val()).format($('#date-format').val()) + ' - ' + moment($('#date-dod').val()).format($('#date-format').val());
                        }
                    }
                }
            }
            // const baseUrl = window.location.protocol + "//" + window.location.host;
            // $('#website_link').html(baseUrl)


            // if ($('#date-format').val() == 'custom') {
            //     var date = $('#date-dob').val() + '-' + $('#date-dod').val()
            // } else {

            //     if (checkbox3.checked) {
            //         var date = moment($('#date-dob').val()).format($('#date-format').val()) + '-'
            //     } else {
            //         var date = moment($('#date-dob').val()).format($('#date-format').val()) + '-'
            //     }
            // }   

            var endearment = $('#endearment-value').val();
            var customendearment = $('#custom-endearment').val();
            var epitaph = $('#epitaph-value').val();
            var ownEpitaph = $('#custom-epitaph').val();

            var metadata = { 'fname' : name, 'lname' : lname, 'dob' : dob, 'dod' : dod, 'endearment' : endearment, 'customendearment' : customendearment, 'epitaph' : epitaph, 'ownepitaph':ownEpitaph}
            $('#date-custom').html(date)
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                /* the route pointing to the post function */
                url: '/public/save-session',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, data:metadata},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) { 
                    console.log('data',data);
                   // $(".writeinfo").append(data.msg); 
                }
            }); 
            
        } else {
            $('.dod-error').html('Invalid Date of Death.');
            setTimeout(() => {
                $('.dod-error').html("");
            }, 5000);
            return false;
        }
    }

    $(document).ready(function() {
        // var cloned_element;
        // $("#draggable").draggable({
        //     helper: 'clone',
        //     revert: true
        // });
        // $('.artwork').on('click',function(){
        //     cloned_element = $(this).clone();
        //     cloned_element.attr("id","artworkdrag").addClass("yo").css("position","absolute");
        //     cloned_element.find(".custom-sec-edit-img").html("");
        //     cloned_element.appendTo("#artwork_drop");
        //     $(".yo").draggable({
        //         containment: '#containerDiv'
        //     });
        // }); 


        // $('.artwork').on('click', function() {
        //     var cloned_element = $(this).clone();
        //     cloned_element.addClass("yo");
        //     cloned_element.css("top", 0).css("left", 0); // Reset position of the cloned element
        //     var deleteButton = $("<button>", {
        //         text: "Delete",
        //         class: "delete-button",
        //         click: function() {
        //         // Remove the parent element (the cloned element) when the delete button is clicked
        //         $(this).parent().remove();
        //         }
        //     });
        //     cloned_element.append(deleteButton);
        //     cloned_element.appendTo("#artwork_drop");
        //     $(".yo").draggable({
        //         containment: '#containerDiv'
        //     });
        // });

        // $('.artwork').on('click', function() {
        //     var newDiv = $("<div>").addClass("drop-container");
        //     var cloned_element = $(this).clone();
        //     cloned_element.addClass("yo");
        //     cloned_element.css("top", 0).css("left", 0); // Reset position of the cloned element
        //     var deleteButton = $("<button>", {
        //         text: "Delete",
        //         class: "delete-button",
        //         click: function() {
        //         // Remove the parent element (the cloned element) when the delete button is clicked
        //         $(this).parent().remove();
        //         }
        //     });
        //     cloned_element.append(deleteButton);
        //     cloned_element.appendTo(newDiv);
        //     newDiv.appendTo("#artwork_drop"); // Append newDiv to the body or a specific container
        //     $(".yo").draggable({
        //         containment: '#containerDiv'
        //     });
        // });

        $('.artwork').on('click', function() {
            var newDiv = $("<div>").addClass("drop-container");
            var cloned_element = $(this).clone();
            // cloned_element.addClass("yo");
            cloned_element.css("top", 0).css("left", 0); // Reset position of the cloned element
            var deleteButton = $("<span>", {
                class: "delete-icon fa-solid fa-circle-xmark",
                click: function() {
                    // Remove the parent element (the cloned element) when the delete button is clicked
                    $(this).closest(".drop-container").remove();
                }
            });
            cloned_element.appendTo(newDiv);
            deleteButton.appendTo(newDiv);
            newDiv.appendTo("#artwork_drop"); // Append newDiv to the body or a specific container
            $(".drop-container").draggable({
                containment: '#containerDiv',
                cursor: 'move',
            });
        });

        // Button click event handler to delete the cloned element
        // $("#deleteButton").on('click', function() {
        //     $(".yo").remove();
        // });

        // Get the current date in the format required by the input type="date" (YYYY-MM-DD)
        const today = new Date().toISOString().split('T')[0];
        // Set the max attribute of the input element to today's date
        document.getElementById('date-dob').setAttribute('max', today);
        document.getElementById('date-dod').setAttribute('max', today);

    });



    function addToCart() {

        var container = document.querySelector("#containerDiv"); /* full page */
        var QrContainer = document.querySelector("#containerDiv img"); /* full page */
        var product_id = '{{ $dataArr[0]->product_id }}';
        var price = $('span.new-price').html();
        var quantity = $('input.quantity-field').val();

        quantity == 0 ? quantity = 1 : quantity = quantity;


        html2canvas(container, {
            allowTaint: true
        }).then(function(canvas) {
            // Convert canvas data to a Blob
            canvas.toBlob(function(blob) {
                // Create FormData object to send the file
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                var formData = new FormData();
                formData.append("_token", csrfToken);
                formData.append("product_id", product_id);
                formData.append("price", price);
                formData.append("quantity", quantity);
                formData.append("imageFile", blob, "Headstone-Image.jpg");
                if ($('#qr_code_id').val() != 'select') {
                    console.log($('#qr_code_id').val());
                    html2canvas(QrContainer, {
                        allowTaint: true
                    }).then(function(canvas1) {
                        // Convert canvas data to a Blob
                        canvas1.toBlob(function(blob) {
                            formData.append("qr_code_id", $('#qr_code_id').val());
                            formData.append("qrCodeImage", blob, "QR-Code-Image.jpg");
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "{{asset('/cart')}}", true);
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    window.location.href = "{{asset('/cart')}}";

                                }
                            };
                            xhr.send(formData);

                        }, "image/jpeg");
                    });
                } else {

                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "{{asset('/cart')}}", true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            window.location.href = "{{asset('/cart')}}";

                        }
                    };
                    xhr.send(formData);
                }
            }, "image/jpeg"); // Specify the file type (e.g., "image/jpeg" for JPEG format)
        });
    };


    function download() {
        /*var container = document.getElementById("image-wrap");*/
        /*specific element on page*/
        var container = document.querySelector("#containerDiv"); /* full page */
        html2canvas(container, {
            allowTaint: true
        }).then(function(canvas) {

            var link = document.createElement("a");
            document.body.appendChild(link);
            link.download = "Headstone-Image.jpg";
            link.href = canvas.toDataURL();
            link.target = '_blank';
            link.click();
        });
    }

    function toggleDiv(className, divNumber) {



        var divs = document.getElementsByClassName(className);
        if (divNumber >= 1 && divNumber <= divs.length) {
            var selectedDiv = divs[divNumber - 1];
            if (selectedDiv) {
                if (selectedDiv.style.display === 'none' || selectedDiv.style.display === '') {
                    selectedDiv.style.display = 'flex';
                    $('.subtab').css('display', 'none');
                    $('.main-my-div').css('display', 'block');
                } else {
                    selectedDiv.style.display = 'none';
                }
            } else {
                console.error('Selected div not found.');
            }
        } else {
            console.error('Invalid div number.');
        }

    }

    function showSubtab() {
        $('.subtab').css('display', 'flex');
        $('.my-div').css('display', 'none');
    }

    $(document).ready(function() {
        $(".capture-image").click(function() {
            var clickedImage = this;
            // Use html2canvas to capture the clicked image
            html2canvas(clickedImage).then(function(canvas) {
                // Convert the canvas content to a data URL
                var screenshotDataURL = canvas.toDataURL("image/png");
                //console.log('screenshotDataURL',screenshotDataURL)
                // Set the data URL as the source of the screenshot image
                $("#hs-qr-code").attr("src", screenshotDataURL);
                $('#hs-qr-code').show();
                var qasize = $('#qr_sizes').find(":selected").val();
                changeQrSize(qasize);
            });
        });
    });

    function capturCode() {
        var iid = $('#qr_code_id').val();
        $('.capture-image').hide();
        $('#qacode-' + iid).show();
        $('#qacode-' + iid).click();
    }
</script>
<style>
    .color-options-heading h5 span {
        font-weight: 400;
    }
</style>
</style>


<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        $("#tabs").tabs();
    });
</script>
@include('layouts.footer')