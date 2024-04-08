@include('layouts.header')
<!-- Section -->
<section class="flat-hs-detail-sec">
    <div class="container">
        <div class="flat-hs-detail-sec-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    {{$dataArr->name}}
                </h1>
            </div>


            <div class="flat-hs-detail-sec-grid">
                <div class="flat-hs-detail-sec-grid-left-item">
                    <div class="product-imgs">
                        <div class="img-display">
                            <div class="product-showcase">
                                <img class="product-img" src="{{ asset('/headstoneImages/'.$dataArr->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flat-hs-detail-sec-grid-right-item">
                    <div class="flat-hs-detail-sec-grid-right-item-inner">

                        <div class="product-price">
                            <p class="product-label">Price :</p>
                            <p class="product-price-p">
                                <span class="old-price">{{ $dataArr->max_price }}</span>
                                <span class="new-price">{{ $dataArr->min_price }}</span>
                            </p>
                            <p class="free-ship-p">
                                & FREE Shipping
                            </p>
                        </div>

                        <div class="product-price">
                            <p class="product-label">You Save :</p>
                            <p class="product-price-p">
                                <span class="save-price">${{ (float) preg_replace("/[^0-9.]/", "", $dataArr->max_price) - (float) preg_replace("/[^0-9.]/", "", $dataArr->min_price) }}</span>
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
                            <input class="quantity-field" placeholder="Ex: 1" type="number" min="0" value="1" />
                        </div>

                        <div class="personalize-btn-div">
                            <!-- <button class="btn personalize-btn">
                                    Personalize
                                </button> -->

                            <a href="javascript:;" class="cart-btn" onclick="addToCart()">
                                Add to Cart
                            </a>
                        </div>


                    </div>
                </div>
            </div>

            <!-- <div class="personalize-photo-div">
                <form action="" class="personalize-photo">
                    <label for="" class="form-label">Photo Crop <sup style="color: red; font-size: 15px;">*</sup></label>
                    <div class="personalize-photo-radio-grp">
                        <div class="mb-3 form-check photo-stone-check">
                            <input class="form-check-input photo-stone-input" type="radio" name="flexRadioDefault" id="head-img" value="head" onchange="photoCrop(this.value)">
                            <label class="form-check-label" for="head-img">
                                Head
                                <img src="{{asset('/assets/images/head.svg')}}" alt="">
                            </label>
                        </div>

                        <div class="mb-3 form-check photo-stone-check">
                            <input class="form-check-input photo-stone-input" type="radio" name="flexRadioDefault" id="bust-img" value="bust" onchange="photoCrop(this.value)">
                            <label class="form-check-label" for="bust-img">
                                Bust
                                <img src="{{asset('/assets/images/bust.svg')}}" alt="">
                            </label>
                        </div>

                        <div class="mb-3 form-check photo-stone-check">
                            <input class="form-check-input photo-stone-input" type="radio" name="flexRadioDefault" id="hf-img" value="half-figure" onchange="photoCrop(this.value)">
                            <label class="form-check-label" for="hf-img">
                                Half Figure
                                <img src="{{asset('/assets/images/half-figure.svg')}}" alt="">
                            </label>
                        </div>

                        <div class="mb-3 form-check photo-stone-check">
                            <input class="form-check-input photo-stone-input" type="radio" name="flexRadioDefault" id="ff-img" value="fill-figure" onchange="photoCrop(this.value)">
                            <label class="form-check-label" for="ff-img">
                                Full Figure
                                <img src="{{asset('/assets/images/full-figure.svg')}}" alt="">
                            </label>
                        </div>

                        <div class="mb-3 form-check photo-stone-check">
                            <input class="form-check-input photo-stone-input" type="radio" name="flexRadioDefault" id="fp-img" value="full-photo" onchange="photoCrop(this.value)">
                            <label class="form-check-label" for="fp-img">
                                Full Photo
                                <img src="{{asset('/assets/images/full-photo.svg')}}" alt="">
                            </label>
                        </div>

                        <div class="mb-3 form-check photo-stone-check">
                            <input class="form-check-input photo-stone-input" type="radio" name="flexRadioDefault" id="other-img" value="other" onchange="photoCrop(this.value)">
                            <label class="form-check-label" for="other-img">
                                Other
                            </label>
                        </div>
                    </div>

                    <div class="mb-3" id="crop-method">
                        <label for="addt-commt" class="form-label">Please describe other cropping method</label>
                        <input type="text" class="form-control cmmn-field-class" name="" id="" placeholder="" />
                    </div>

                    <div class="col-md-6 mb-3 file-upload-div">
                        <label for="fileupload" class="form-label">File Upload (Limit of 5)</label>
                        <input type="file" class="cmmn-field-class" placeholder="" />
                    </div>

                    <div class="mb-3">
                        <label for="addt-commt" class="form-label">Additional Comments</label>
                        <textarea class="form-control cmmn-field-class" id="addt-commt" rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="submit-btn">Submit</button>
                    </div>
                </form>
            </div> -->

            <div class="addt-info">
                <h1 class="common-heading">
                    Additional information
                </h1>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Weight</th>
                            <td id="hs-weight">
                                <p>29 lbs</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Dimensions</th>
                            <td id="hs-dimension">
                                <p>
                                    <span>12</span>×<span>8</span>×<span>3</span>in
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="addt-info-othrs">
                   
                    <p>
                        Category:
                        <a href="javascript:;">Ceramic Headstone Pictures</a>
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
                                <span>{{$product->min_price}}</span>
                                <!-- <span>{{$product->max_price}}</span> -->
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
                    </a> -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $('div#crop-method').hide()

    function photoCrop(value) {
        console.log(value);
        if (value == 'other') {
            $('div#crop-method').show()
        } else {
            $('div#crop-method').hide()
        }
    }

    function addToCart() {
        var product_id = '{{ $dataArr->id }}';



        // Convert canvas data to a Blob
        // Create FormData object to send the file
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var formData = new FormData();
        formData.append("_token", csrfToken);
        formData.append("product_id", product_id);

        // Create an XMLHttpRequest or use the Fetch API for sending the file
        var xhr = new XMLHttpRequest();
        // Replace 'upload_url' with your server-side endpoint for handling the file upload
        xhr.open("POST", "{{asset('/cart')}}", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // File upload successful
                // console.log("File uploaded successfully!");
                window.location.href = "{{asset('/cart')}}";

            }
        };
        xhr.send(formData);
    }
</script>
@include('layouts.footer')