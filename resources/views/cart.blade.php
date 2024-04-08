@include('layouts.header')
<section class="hs-cart">
    <div class="container">
        <div class="hs-cart-inner">
            @if(count($dataArr) == 0)
            <div class="hs-cart-item-name">

                <h3 class="hs-cart-item-name-h3">
                    Your cart is currently empty.
                </h3>

            </div>
            @endif
            <div class="hs-cart-table">
                <div class="hs-cart-table-heading-grid">
                    <div class="hs-cart-table-heading-grid-item">
                        <h6>
                            Product Image
                        </h6>
                    </div>
                    <div class="hs-cart-table-heading-grid-item">
                        <h6>
                            Product Name
                        </h6>
                    </div>
                    <div class="hs-cart-table-heading-grid-item">
                        <h6>
                            Quantity
                        </h6>
                    </div>
                    <div class="hs-cart-table-heading-grid-item">
                        <h6>
                            Price
                        </h6>
                    </div>
                    <div class="hs-cart-table-heading-grid-item">
                        <h6>
                            Subtotal
                        </h6>
                    </div>
                    <div class="hs-cart-table-heading-grid-item">
                        <h6>

                        </h6>
                    </div>
                </div>
                @foreach($dataArr as $data)
                <div class="hs-cart-table-main-grid">
                    <div class="hs-cart-table-main-grid-item">
                        <div class="hs-cart-product-img-div">
                            <img class="hs-cart-product-img" src="{{ asset($data->design_image) }}" alt="">
                        </div>
                    </div>
                    <div class="hs-cart-table-main-grid-item">
                        <div class="hs-cart-product-name">
                            <p>
                                {{$data->name}}
                            </p>
                        </div>
                    </div>
                    <div class="hs-cart-table-main-grid-item">
                        <div class="hs-cart-product-qty">
                            <input class="hs-cart-qty-input" type="number" min="1" value="{{ $data->quantity }}" onchange="updateQuantity(this.value,'{{ $data->id }}')">
                        </div>

                    </div>
                    <div class="hs-cart-table-main-grid-item">
                        <div class="hs-cart-product-price">
                            <p>
                                <span id="price-{{ $data->id }}">{{ $data->price }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="hs-cart-table-main-grid-item">
                        <div class="hs-cart-product-subtotal">
                            <p>
                                $<span id="subtotal-{{ $data->id }}">{{ ((float)str_replace('$', '', $data->price))*$data->quantity }}.00</span>
                            </p>
                        </div>
                    </div>
                    <div class="hs-cart-table-main-grid-item">
                        <div class="remove-icon-div" onclick="deleteCartItem('{{ $data->id }}')">
                            <i class="fa-solid fa-trash-can"></i>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="hs-cart-total-div">
                    <div class="hs-cart-total-heading">
                        <p class="hs-cart-total-heading-p">Cart Total :</p>
                    </div>
                    <div class="hs-cart-total-value-no">
                        <p class="hs-cart-total-value-no-p">
                            $<span>{{ $grandTotal }}.00</span>
                        </p>
                    </div>
                </div>
                <div class="hs-cart-btn-grp">
                    <a href="{{ asset('/store') }}" class="hs-cart-btn-continue">Continue Shopping</a>
                    @if(count($dataArr) > 0)
                    <!-- <a href="{{ asset('/checkout') }}" class="hs-cart-btn-proceed">Proceed to Checkout</a> -->
                    <a data-bs-toggle="modal" href="#exampleModalToggle" role="button" class="hs-cart-btn-proceed" onclick="coundDown(1)">Proceed to Checkout</a>
                    @endif
                </div>
            </div>



            <!-- <button type="button" class="add-new-address dashboard-address-edit-btn" data-bs-toggle="modal" data-bs-target="#deleteModal">Add New Address</button> -->
            <!-- Cart item delete Confirm Modal -->
            <!-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content address-modal">
                              
                                <div class="modal-body">
                                    <div id="dashboard-form" class="dashboard-form">
                                            <div class="shipping-part">
                                                <div class="col-12">
                                                    <label class="form-check-label head-label" for="gridCheck">
                                                    Are you sure you want to delete this item from cart?
                                                    </label>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary dashboard-save-btn" onclick="return $('#deleteModal').modal('toggle');">Cancel</button>                                                    
                                            <button class="btn btn-primary dashboard-save-btn">Ok</button>                                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
            <!-- Cart item delete Confirm Modal -->


        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Read Carefully</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    It is the Customers responsibility to make sure purchases are allowed from “external monument vendors ”
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" style="cursor: not-allowed;">Previous</button>
                    <button class="btn btn-primary" id="next-modal-1" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="coundDown(2)">
                        <div id="count-loading" class="count-wrap"><span class="n" id="countdown-number-1">5</span>
                            <div id="loader"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Read Carefully</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    It is the Customers responsibility to make sure “external” monument shipments are accepted by the cemetery
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Previous</button>
                    <button class="btn btn-primary" id="next-modal-2" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="coundDown(3)">
                        <div id="count-loading" class="count-wrap"><span class="n" id="countdown-number-2">5</span>
                            <div id="loader"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel3">Read Carefully</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    A disclaimer notice is offered for customers to acknowledge that they have read AND followed the cemetery check list to confirm external monument purchases re: Size, Color, Marker Attachments (I e , flush-QR Code self-installation metal plates can be added on monument).
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Previous</button>
                    <button class="btn btn-primary" id="next-modal-3" data-bs-target="#exampleModalToggle4" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="coundDown(4)">
                        <div id="count-loading" class="count-wrap"><span class="n" id="countdown-number-3">5</span>
                            <div id="loader"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel4" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel4">Read Carefully</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    A disclaimer notice is offered for customers to acknowledge that they have read and agree that only three (3) design changes/edits are allowed per order, also acknowledging that they understand additional changes/edits will be charged and invoiced, by the manufacturer, upon each additional change/edit request.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">Previous</button>
                    <button class="btn btn-primary" id="next-modal-4" data-bs-target="#exampleModalToggle5" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="coundDown(5)">
                        <div id="count-loading" class="count-wrap"><span class="n" id="countdown-number-4">5</span>
                            <div id="loader"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle5" aria-hidden="true" aria-labelledby="exampleModalToggleLabel5" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel5">Read Carefully</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    A disclaimer notice is offered for customers to acknowledge that they have read and agree that only three (3) design changes/edits are allowed per order, also acknowledging that they understand additional charges/edits will be charged by the manufacturer upon service design request.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-bs-target="#exampleModalToggle4" data-bs-toggle="modal" data-bs-dismiss="modal">Previous</button>
                    <button class="btn btn-primary" id="next-modal-5" data-bs-target="#exampleModalToggle6" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="coundDown(6)">
                        <div id="count-loading" class="count-wrap"><span class="n" id="countdown-number-5">5</span>
                            <div id="loader"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle6" aria-hidden="true" aria-labelledby="exampleModalToggleLabel6" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel6">Read Carefully</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    A disclaimer AND acknowledgement that all Sales & Custom Design Artwork is final, upon Customer Approval....there are No Refunds on Monument Products & QR Purchases.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-bs-target="#exampleModalToggle5" data-bs-toggle="modal" data-bs-dismiss="modal">Previous</button>
                    <button class="btn btn-primary" id="next-modal-6" data-bs-target="#exampleModalToggle7" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="coundDown(7)">
                        <div id="count-loading" class="count-wrap"><span class="n" id="countdown-number-6">5</span>
                            <div id="loader"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle7" aria-hidden="true" aria-labelledby="exampleModalToggleLabel7" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel7">Read Carefully</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    A disclaimer suggesting that any/all custom design artwork can be offered at an additional price (contact us for price quote).
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-bs-target="#exampleModalToggle6" data-bs-toggle="modal" data-bs-dismiss="modal">Previous</button>
                    <a class="btn btn-success" id="next-modal-7" href="{{ asset('/checkout') }}">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a> -->
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script>
    function updateQuantity(quantity, item_id) {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if (quantity > 0) {
            var oldPrice = $('span#price-' + item_id).html();
            var newPrice = (parseFloat(oldPrice.replace('$', ''))) * quantity;
            var grandtotal = (parseFloat($('p.hs-cart-total-value-no-p span').html()) - $('span#subtotal-' + item_id).html()) + newPrice;

            $('span#subtotal-' + item_id).html(newPrice + '.00')
            $('p.hs-cart-total-value-no-p span').html(grandtotal)
        }

        $.ajax({
            method: 'POST',
            url: "{{asset('/updateCart')}}",
            data: {
                item_id: item_id,
                quantity: quantity,
                _token: csrfToken
            }
        });

    }

    function deleteCartItem(value) {

        if (confirm("Are you sure you want to delete this item from cart?") == true) {

            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            $.ajax({
                method: 'POST',
                url: "{{asset('/delete-cart-item')}}",
                data: {
                    item_id: value,
                    _token: csrfToken
                },
                success: function(result) {
                    location.reload(true)
                }
            });
        }
    }

    function coundDown(id) {
        $('button.btn.btn-primary').prop('disabled', true)
        var loader = `<div id="count-loading" class="count-wrap"><span class="n" id="countdown-number-` + id + `">5</span>
                            <div id="loader"></div>
                        </div>`;

        $('#next-modal-' + id).html(loader);
        var countdownNumberEl = document.getElementById("countdown-number-" + id);
        var countdown = 5;
        countdownNumberEl.textContent = countdown;
        var downloadTimer = setInterval(function() {
            countdown--; // 5 to 0
            countdownNumberEl.textContent = countdown;

            if (countdown > 0) {
                $('button.btn.btn-primary').prop('disabled', true)
                // modalToggle.unbind("click", showMConfirmModal);
            } else {
                if (id != 7) {
                    $('#next-modal-' + id).html('Next');
                } else {
                    $('#next-modal-' + id).html('Checkout');
                }
                $('button.btn.btn-primary').prop('disabled', false)
                // modalToggle.bind("click", showMConfirmModal);
                clearInterval(downloadTimer);
                // modal.removeClass("is-visible");
            }
        }, 1000);
    }
</script>
<style>
    span#countdown-number {
        font-size: 14px;
    }

    .count-wrap {
        position: relative;
        right: 0%;
        top: 0%;
        width: 25px;
        height: 25px;
        filter: invert(100%);
    }

    .btn.disabled,
    .btn:disabled,
    fieldset:disabled .btn {
        color: white;
        background-color: #0d6efd38;
        border-color: #0d6efd38;
        opacity: 1;
    }

    #loader {
        position: absolute;
        left: 1.9px;
        top: 2px;
        z-index: 10;

        border: 2px solid #fff;
        border-radius: 50%;
        border-top: 2px solid #2f7bf5;
        width: 21px;
        height: 21px;
        animation: spin .8s linear infinite;

    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .n {
        display: flex;
        width: inherit;
        height: inherit;
        position: absolute;
        left: 0;
        top: 0;
        z-index: 20;
        font-size: 14px;
        justify-content: center;
        align-items: center
    }
</style>
@include('layouts.footer')