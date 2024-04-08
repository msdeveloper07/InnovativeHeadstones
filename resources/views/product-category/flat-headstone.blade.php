@include('layouts.header')

<!-- section -->
<section class="hs-cat-sec">
    <div class="container">
        <div class="hs-cat-sec-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    Flat Headstones
                </h1>
            </div>

            <div class="hs-cat-main">

                <aside class="hs-cat-right-menu">
                    <h4 class="hs-cat-right-menu-heading">
                        Filter by Price
                    </h4>
                    <div class="filter-range">
                        <!-- <form class="multi-range-field" method="GET"> -->
                        <input type="text" class="js-range-slider" value="" data-skin="round" data-type="double" data-min="100" data-max="5550" data-grid="false" />

                        <div class="price-range-inputs-grp">
                            <input name="minPrice" type="number" maxlength="4" class="from" value="100" />
                            <input name="maxPrice" type="number" maxlength="4" class="to" value="5550" />
                        </div>
                        <button onclick="filterProduct()" class="btn filter-btn">Filter</button>

                        <!-- </form> -->
                    </div>
                    <h4 class="hs-cat-right-menu-heading">
                        Product Categories
                    </h4>
                    @include('layouts.product-aside-nav')
                </aside>

                <div class="hs-cat-left">
                    <div class="hs-cat-main-p">
                        <p>
                            All our flat headstones are made from 100% natural premium and exotic granite and are hand engraved with care.
                            We
                            also
                            offer a variety of colors for you to choose from. Prices starting at $279.00 and include unlimited lettering and
                            free
                            freight anywhere in the Contiguous US only.
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
                                <!-- <option selected>Sort by popularity</option>
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
                                <img src="./assets/images/flat-hs.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    16″ x 8″ x 3″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$550</span> -
                                    <span>$5550</span>
                                </h4>
                            </div>
                        </a>
                        <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/flat-hs.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    12″ x 8″ x 3″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$550</span> -
                                    <span>$5550</span>
                                </h4>
                            </div>
                        </a>
                        <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/flat-hs.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    20″ x 10″ x 3″ Flat Granite Headstone
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>$550</span> -
                                    <span>$5550</span>
                                </h4>
                            </div>
                        </a>
                        <a href="#" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="./assets/images/flat-hs.jpg" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                    24″ x 12″ x 4″ Flat Granite Headstone
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
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: "/public/product-category/flat-headstones",
            data: {
                minPrice: minPrice,
                maxPrice: maxPrice,
                sort: sort,
            },
            success: function(result) {
                $('select.form-select.hs-cat-result-sort').attr('disabled', false)
                $('button.btn.filter-btn').attr('disabled', false)
                $('.hs-cat-result-grid').html(`<div class="custom-loader"></div>`);
                $('.hs-cat-result-left p span').html(result.length);
                $('.hs-cat-result-grid').html('');

                result.forEach(products);
                console.log(min, max);

                function products(item, index) {

                    var appendProperty = `<a href="{{asset('product-category/flat-headstones/` + item.name + `')}}" class="hs-cat-result-grid-item">
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