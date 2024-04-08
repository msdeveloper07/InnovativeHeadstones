@include('layouts.header')

<!-- section -->
<section class="hs-cat-sec">
    <div class="container">
        <div class="hs-cat-sec-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    Serp Top Upright Headstones
                </h1>
            </div>

            <div class="hs-cat-main">

                <aside class="hs-cat-right-menu">
                    <h4 class="hs-cat-right-menu-heading">
                        Filter by Price
                    </h4>
                    <div class="filter-range">

                        <input type="text" class="js-range-slider" name="my_range" value="" data-skin="round" data-type="double" data-min="100" data-max="20000" data-grid="false" />

                        <div class="price-range-inputs-grp">
                            <input name="minPrice" type="number" maxlength="4" class="from" value="1000" />
                            <input name="maxPrice" type="number" maxlength="4" class="to" value="20000" />
                        </div>
                        <button onclick="filterProduct()" class="btn filter-btn">Filter</button>


                    </div>
                    <h4 class="hs-cat-right-menu-heading">
                        Product Categories
                    </h4>
                    <!-- <ul class="hs-cat-right-menu-ul">
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./angel.html">Angel Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./ceramics-hs.html">Ceramic Headstone Pictures</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./classics-hs.html">Classic Upright Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Cremation Urns</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./cross-hs.html">Cross Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Custom Headstone Design Services</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./flat-headstones.html">Flat Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./floral-hs.html">Floral Upright Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./heart-shape.html">Heart Shaped Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Memorial Benches</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./photostones.html">PhotoStones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./pillowstones.html">Pillow Top Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./serp-top-slant.html">Serp Top Slant Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./serp-top-upright.html">Serp Top Upright Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Uncategorized</a>
                        </li>
                    </ul> -->
                    @include('layouts.product-aside-nav')
                </aside>

                <div class="hs-cat-left">
                    <div class="hs-cat-main-p">
                        <p>
                            All of our serpentine top upright headstones come in many colors and are made from 100% natural premium and exotic
                            granite and engraved with care. Single upright headstone prices start at $2,299.00 and include unlimited lettering and
                            free freight anywhere in the Contiguous US only.
                        </p>
                    </div>
                    <div class="hs-cat-result">
                        <div class="hs-cat-result-left">
                            <p>
                                Showing all <span>0</span> results
                            </p>
                        </div>
                        <div class="hs-cat-result-right">
                            <select class="form-select hs-cat-result-sort" aria-label="Default select example" onchange="sorting(this.value)">
                                <!-- <option>Sort by popularity</option>
                                <option value="1">Sort by average rating</option>
                                <option value="2">Sort by latest</option> -->
                                <option value="asc" selected>Sort by price: low to high</option>
                                <option value="desc">Sort by price: high to low</option>
                            </select>
                        </div>
                    </div>

                    <div class="hs-cat-result-grid">
                        <div class="custom-loader"></div>
                        <!-- <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/serp-top-upright-3.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    24″ x 12″ x 3″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$2,299.00</span> -
                                    <span>$3,299.00</span>
                                </h4>
                            </div>
                        </a>
                        <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/serp-top-upright.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    16″ x 8″ x 3″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$2,299.00</span> -
                                    <span>$3,299.00</span>
                                </h4>
                            </div>
                        </a>
                        <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/serp-top-uright-2.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    12″ x 8″ x 3″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$2,299.00</span> -
                                    <span>$3,299.00</span>
                                </h4>
                            </div>
                        </a>
                        <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/serp-top-upright-3.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    20″ x 10″ x 3″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$2,299.00</span> -
                                    <span>$3,299.00</span>
                                </h4>
                            </div>
                        </a>
                        <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/serp-top-upright.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    24″ x 12″ x 4″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$2,299.00</span> -
                                    <span>$3,299.00</span>
                                </h4>
                            </div>
                        </a>
                        <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/serp-top-uright-2.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    24″ x 12″ x 4″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$2,299.00</span> -
                                    <span>$3,299.00</span>
                                </h4>
                            </div>
                        </a>

                        <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/serp-top-uright-2.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    24″ x 12″ x 4″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$2,299.00</span> -
                                    <span>$3,299.00</span>
                                </h4>
                            </div>
                        </a>

                        <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/serp-top-upright-3.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    24″ x 12″ x 4″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$2,299.00</span> -
                                    <span>$3,299.00</span>
                                </h4>
                            </div>
                        </a> -->
                    </div>
                </div>

            </div>


        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    function filterProduct() {
        var minPrice = document.getElementsByName('minPrice')[0].value;
        var maxPrice = document.getElementsByName('maxPrice')[0].value;
        console.log(minPrice, maxPrice);
        filter(minPrice, maxPrice, $('select.form-select.hs-cat-result-sort').val());
    }

    function sorting(value) {

        var minPrice = document.getElementsByName('minPrice')[0].value;
        var maxPrice = document.getElementsByName('maxPrice')[0].value;
        filter(minPrice, maxPrice, value);
    }

    function filter(minPrice, maxPrice, sort) {
        $('select.form-select.hs-cat-result-sort').attr('disabled', true)
        $('button.btn.filter-btn').attr('disabled', true)
        $('.hs-cat-result-grid').html(`<div class="custom-loader"></div>`);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: "/public/product-category/serp-top-upright-headstones",
            data: {
                minPrice: minPrice,
                maxPrice: maxPrice,
                sort: sort,
            },
            success: function(result) {
                $('select.form-select.hs-cat-result-sort').attr('disabled', false)
                $('button.btn.filter-btn').attr('disabled', false)
                $('.hs-cat-result-left p span').html(result.length);
                $('.hs-cat-result-grid').html('');

                result.forEach(products);

                function products(item, index) {
                    var appendProperty = `<a href="{{asset('product-category/serp-top-upright-headstones/` + item.name + `')}}" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="{{asset('/headstoneImages/` + item.image + `')}}" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                ` + item.name + `
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                <span>` + item.min_price + `</span> -
                                    <span>` + item.max_price + `</span>
                                </h4>
                            </div>
                        </a>`;
                    $('.hs-cat-result-grid').append(appendProperty);
                }

            }
        });
    }

    $(document).ready(() => {
        filter(min, max, $('select.form-select.hs-cat-result-sort').val());
    });
</script>

@include('layouts.footer')