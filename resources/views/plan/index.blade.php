@include('layouts.header')
<!-- QR Section -->
<section class="qr-code-sec">
    <div class="container">
        <div class="qr-code-sec-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    QR Code Technology
                </h1>
            </div>

            <div class="qr-code-grid">
                <div class="qr-code-item">
                    <img src="./assets/images/dummy-qr.png" alt="">
                </div>
                <div class="qr-code-item">
                    <img src="./assets/images/dummy-qr.png" alt="">
                </div>
                <div class="qr-code-item">
                    <img src="./assets/images/dummy-qr.png" alt="">
                </div>
                <div class="qr-code-item">
                    <img src="./assets/images/dummy-qr.png" alt="">
                </div>
            </div>

            <div class="qr-pack">
                <div class="qr-pack-grid">
                    <div class="qr-pack-grid-item bp">
                        <div class="qr-code-item-top">
                            <h2 class="qr-pack-heading"><i class="fa-solid fa-cube"></i>&nbsp;Basic Package</h2>
                            <div class="shape-1"></div>
                            <div class="shape-2"></div>
                        </div>
                        <ul class="qr-feature-list">
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Profile Picture</li>
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Background Picture</li>
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Name</li>
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>10 Photo</li>
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>4 Video</li>
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Biography</li>
                            <!-- <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>300 Character Limit</li> -->
                            <!-- <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Headstone Base: Natural Stone</li>
                                <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Size: Small-Medium</li>
                                <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>choose from 5 different type stones</li> -->
                        </ul>

                        <div class="select-btn select-btn">
                            <input class="form-check-input" type="radio" name="planname" id="planname" value="1" checked="checked">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Buy Now
                            </label>
                        </div>
                    </div>
                    <div class="qr-pack-grid-item pp">
                        <div class="qr-code-item-top">
                            <h2 class="qr-pack-heading"><i class="fa-solid fa-cube"></i>&nbsp;Premium Package</h2>
                            <div class="shape-1"></div>
                            <div class="shape-2"></div>
                        </div>
                        <ul class="qr-feature-list">
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Profile Picture</li>
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Background Picture</li>
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Name</li>
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>25 Photo</li>
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>10 Video</li>
                            <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Biography</li>
                            <!-- <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>1000 Character Limit</li> -->
                            <!-- <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Headstone Base: Natural Granite</li>
                                <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>Size: Small-Medium-Large</li>
                                <li class="qr-feature-list-item"><i class="fa-solid fa-check"></i>choose from more than 20 different type stones</li> -->
                        </ul>
                        <div class="select-btn select-btn">
                            <input class="form-check-input" type="radio" name="planname" id="planname" value="2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Buy Now
                            </label>
                        </div>
                    </div>
                </div>

                <div class="qr-proceed">
                    <a href="{{ route('qr.detail') }}" class="qr-proceed-btn">Proceed </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="chat">
    <div class="container">
        <div class="chat-main">
            <a class="chat-link" href="">
                Chat With Us
            </a>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Clear Prvious Value
        localStorage.removeItem('plan_id');
        // Set Selected Value
        localStorage.setItem('plan_id', $('input[name="planname"]:checked').val());
    });

    $('input[type=radio][name=planname]').on('change', function() {
        // Set Value on change
        localStorage.setItem('plan_id', $(this).val());
    });
</script>
@include('layouts.footer')