@include('layouts.header')

<!-- section -->
<section class="hs-cat-sec">
    <div class="container">
        <div class="hs-cat-sec-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    Ceramic Headstone Pictures
                </h1>
            </div>

            <div class="hs-cat-main">

                <aside class="hs-cat-right-menu">
                    <h4 class="hs-cat-right-menu-heading">
                        Filter by Price
                    </h4>
                    <div class="filter-range">
                        <!-- <form class="multi-range-field" method="GET"> -->
                        <input type="text" class="js-range-slider" value="" data-skin="round" data-type="double" data-min="190" data-max="500" data-grid="false" />

                        <div class="price-range-inputs-grp">
                            <input name="minPrice" type="number" maxlength="4" class="from" value="190" />
                            <input name="maxPrice" type="number" maxlength="4" class="to" value="500" />
                        </div>
                        <button onclick="filterProduct(0)" class="btn filter-btn">Filter</button>

                        <!-- </form> -->
                    </div>
                    <h4 class="hs-cat-right-menu-heading">
                        Product Categories
                    </h4>
                    <!-- <ul class="hs-cat-right-menu-ul">
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Angel Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Ceramic Headstone Pictures</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Classic Upright Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Cremation Urns</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Cross Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Custom Headstone Design Services</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="./flat-headstones.html">Flat Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Floral Upright Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Heart Shaped Headstones</a>
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
                            <a class="hs-cat-right-menu-ul-li-link" href="">Serp Top Upright Headstones</a>
                        </li>
                        <li class="hs-cat-right-menu-ul-li">
                            <a class="hs-cat-right-menu-ul-li-link" href="">Uncategorized</a>
                        </li>
                    </ul> -->
                    @include('layouts.product-aside-nav')
                </aside>

                <div class="hs-cat-left">
                    <!-- <div class="hs-cat-main-p">
                        <p>
                            All our flat headstones are made from 100% natural premium and exotic granite and are hand engraved with care.
                            We
                            also
                            offer a variety of colors for you to choose from. Prices starting at $279.00 and include unlimited lettering and
                            free
                            freight anywhere in the Contiguous US only.
                        </p>
                    </div> -->
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
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item" prev_attr="-6" id="prev" onclick="previous(this)">
                                <a class="page-link" href="javascript:;" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <div id="paggination">
                                <!-- <li onclick="filterProduct(1)" style="float: left;" class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                                <li onclick="filterProduct(6)" style="float: left;" class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                                <li onclick="filterProduct(12)" style="float: left;" class="page-item"><a class="page-link" href="javascript:;">3</a></li> -->
                            </div>
                            <li class="page-item" raw_attr="6" id="next" onclick="next(this)">
                                <a class="page-link" href="javascript:;" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>


        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    function previous(element) {
        var prevOffset = $(element).attr('prev_attr')
        if (0 <= parseInt(prevOffset)) {
            filterProduct(prevOffset);
        }
    }

    function sorting(value) {

        var minPrice = document.getElementsByName('minPrice')[0].value;
        var maxPrice = document.getElementsByName('maxPrice')[0].value;
        filter(minPrice, maxPrice, 0, 'nonFilter', value);
    }

    function next(element) {
        var nextOffset = $(element).attr('raw_attr')
        if (parseInt($('.hs-cat-result-left p span').html()) >= parseInt(nextOffset)) {
            filterProduct(nextOffset);
        }
    }

    function filterProduct(offset) {
        var minPrice = document.getElementsByName('minPrice')[0].value;
        var maxPrice = document.getElementsByName('maxPrice')[0].value;
        // console.log(minPrice.length, maxPrice);

        if (minPrice.length != 0) {
            filter(minPrice, maxPrice, offset, 'filter', $('select.form-select.hs-cat-result-sort').val());
        } else {
            filter(minPrice, maxPrice, offset, 'nonFilter', $('select.form-select.hs-cat-result-sort').val());
        }
        $('li#next').attr('raw_attr', parseInt(offset) + 6)
        $('li#prev').attr('prev_attr', parseInt(offset) - 6)
    }


    function filter(minPrice, maxPrice, offset, filterCheck, sort) {
        $('select.form-select.hs-cat-result-sort').attr('disabled', true)
        $('button.btn.filter-btn').attr('disabled', true)
        $('.hs-cat-result-grid').html(`<div class="custom-loader"></div>`);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: "/public/product-category/ceramic-headstone-pictures",
            data: {
                minPrice: minPrice,
                maxPrice: maxPrice,
                sort: sort,
                offset: offset,
                filterCheck: filterCheck,
            },
            success: function(result) {
                $('select.form-select.hs-cat-result-sort').attr('disabled', false)
                $('button.btn.filter-btn').attr('disabled', false)
                $('.hs-cat-result-left p span').html(result.count);
                $('.hs-cat-result-grid').html('');
                $('div#paggination').html('');
                let j = 1;
                for (let i = 0; i < result.count; i++) {

                    if (i % 6 == 0) {
                        if (i == offset) {
                            var paggination = `<li onclick="filterProduct(` + i + `)" style="float: left;" class="page-item"><a style="background-color: var(--green-shade);color: var(--white-clr);border: var(--bs-pagination-border-width) solid #22a699;" class="page-link" href="javascript:;">` + j + `</a></li>`;
                        } else {
                            var paggination = `<li onclick="filterProduct(` + i + `)" style="float: left;" class="page-item"><a class="page-link" href="javascript:;">` + j + `</a></li>`;
                        }
                        $('div#paggination').append(paggination);
                        j++;
                    }
                }

                result.data.forEach(products);

                function products(item, index) {
                    var appendProperty = `<a href="{{asset('product-category/ceramic-headstone-pictures/` + item.name + `')}}" class="hs-cat-result-grid-item">
                            <div class="hs-cat-result-grid-item-img">
                                <img src="{{asset('/headstoneImages/` + item.image + `')}}" alt="">
                            </div>
                            <div class="hs-cat-result-grid-item-p">
                                <p class="hs-cat-result-grid-item-detail">
                                ` + item.name + `
                                </p>
                                <h4 class="hs-cat-result-grid-item-price">
                                    <span>` + item.min_price + `</span>
                                </h4>
                            </div>
                        </a>`;
                    $('.hs-cat-result-grid').append(appendProperty);
                }

            }
        });
    }

    $(document).ready(() => {
        filter(540, 5550, 0, 'nonFilter', $('select.form-select.hs-cat-result-sort').val());
    });
</script>

<style>
    .page-item:first-child .page-link {
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
    }

    .page-item:last-child .page-link {
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }
</style>

@include('layouts.footer')