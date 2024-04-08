@include('layouts.header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<section class="checkout-sec">
    <div class="container">
        <div class="checkout-sec-inner">

            @if(!Auth::check())
            <div class="checkout-login">
                <a href="./myaccount.html" class="checkout-login-btn">
                    Click here to login
                </a>
            </div>
            @endif



            <div class="checkout-form">
                <div class="col-12">
                    <label class="form-check-label head-label" for="gridCheck">
                        Billing details
                    </label>
                </div>


                @if(count($shipping_addresses)>0)
                <form action="{{ url('/payment') }}" method="POST" onsubmit="return checkoutValidations(event)">
                    @csrf
                    <div class="dashboard-address-grid checkout-address-grid">
                        @foreach($shipping_addresses as $key => $shipping_address)
                        <div class="checkout-address-inner-item">

                            <div class="checkout-address-main-content">
                                <div class="dashboard-address-content">
                                    @if($key == 0)
                                    <p class="dashboard-address-default-tag">
                                        <i class="fa-solid fa-house-circle-check"></i>Default
                                    </p>
                                    @endif
                                    <p class="dashboard-user-name">
                                        {{ $shipping_address->recipient_name }}
                                    </p>
                                    <div class="dashboard-user-address">
                                        <p class="dashboard-user-addres-p">
                                            {{ $shipping_address->address_line1 }} <br>
                                            {{ get_city_name($shipping_address->city) }}, {{ get_state_name($shipping_address->state) }}, {{ $shipping_address->postal_code }} <br>
                                            {{ get_country_name($shipping_address->country) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="select-btn select-btn address-select">
                                    <!-- <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onchange="selectPack('pp')"> -->
                                    <input class="form-check-input" type="radio" id="default-{{$key}}" name="default_address" value="{{ $shipping_address->id }}" @if($key==0) checked @endif />
                                    <label class="form-check-label" for="default-{{$key}}" style="cursor: pointer;">
                                        Select
                                    </label>
                                </div>
                                <!-- <div class="radio-select">

                                <i class="fa-solid fa-square-check"></i>
                            </div> -->
                            </div>

                        </div>
                        @endforeach
                    </div>


                    <div class="col-md-3">
                        <label for="sizes" class="form-label">QR Code Display Options</label>
                        <select style="width: 360px;" class="form-select cmmn-field-class" aria-label="Default select example" name="qr_display_option">
                            <option value="Embedded/Engraved on the Headstone" selected="">Embedded/Engraved on the Headstone</option>
                            <option value="A Ceramic Plate installed on the Headstone">A Ceramic Plate installed on the Headstone</option>
                        </select>
                    </div>



                    <div class="checkout-form-div">
                        <div class="checkout-form-div-inner">
                            <label style="font-weight: 900;" for="">Additional Info Box (Optional)</label>
                            <textarea class="form-control user-detail-input" name="note" placeholder="Additional Info..." rows="5" cols="33"></textarea>
                        </div>
                    </div>

                    <!-- New fields -->
                    <div class="row mb-3">

                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Name on Order</label>
                                    <input type="text" id="name_on_order" class="form-control" name="name_on_order" placeholder="" >
                                    <span class="error ordername-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Company Name</label>
                                    <input type="text" id="company_name" class="form-control" name="company_name" placeholder="" >
                                    <span class="error company-error"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Inscription type</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="inscription_type">
                                <option value="single" selected="">Single</option>
                                <option value="companion">Companion</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Location (cemetery) name</label>
                                    <input type="text" id="cemetry_location_name" class="form-control" name="cemetry_location_name" placeholder="" >
                                    <span class="error cemetery-name-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Location (cemetery) Address</label>
                                    <input type="text" id="cemetry_location_address" name="cemetry_location_address" class="form-control" placeholder="" >
                                    <span class="error cemetery-location-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Location (cemetery) Phone</label>
                                    <input type="tel" id="cemetry_location_phone" name="cemetry_location_phone" class="form-control" placeholder="" >
                                    <span class="error cemetery-phone-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inscription 1 endearment -->
                    <!-- <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 1 First Name</label>
                                    <input type="text" id="inscription1_firstname" name="inscription1_firstname" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 1 Middle Name</label>
                                    <input type="text" id="inscription1_middlename" name="inscription1_middlename" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 1 Last Name</label>
                                    <input type="text" id="inscription1_lastname" name="inscription1_lastname" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 1 endearment</label>
                                    <input type="text" id="inscription1_endearment" name="inscription1_endearment" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 1 Birth date</label>
                                    <input type="date" id="inscription1_dob" name="inscription1_dob" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 1 Death  Date</label>
                                    <input type="date" id="inscription1_dd" name="inscription1_dd" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 1 Epitaph</label>
                                    <input type="text" id="inscription1_epitaph" name="inscription1_epitaph" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 1 Emblem</label>
                                    <input type="text" id="inscription1_emblem" name="inscription1_emblem" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>
                    </div> -->
                    

                    <!-- Inscription 2 -->

                    <div class="mb-3">
                        <label for="" class="form-label">Endearment</label>
                        <select onchange="endearmentSelect(this.value)" id="endearment-value" class="form-select cmmn-field-class" aria-label="Default select example" name="inscription2_endearment">
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
                    <div class="mb-3" id="custom-endearment-textarea" style="display:none;">
                        <label for="custom-endearment" class="form-label">Write Your Own Endearment</label>
                        <textarea class="form-control cmmn-field-class" name="customendearment2" id="custom-endearment" rows="3" maxlength="150" minlength="0"></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 2 First Name</label>
                                    <input type="text" id="inscription2_firstname" name="inscription2_firstname" class="form-control" placeholder="" >
                                    <span class="error ins-fname-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 2 Middle Name</label>
                                    <input type="text" id="inscription2_middlename" name="inscription2_middlename" class="form-control" placeholder="" >
                                    <span class="error ins-lname-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 2 Last Name</label>
                                    <input type="text" id="inscription2_lastname" name="inscription2_lastname" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 2 Endearment</label>
                                    <input type="text" id="inscription2_endearment" name="inscription2_endearment" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 2 Birth date</label>
                                    <input type="date" id="inscription2_dob" name="inscription2_dob" class="form-control" placeholder="" >
                                    <span class="error dob-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 2 Death  Date</label>
                                    <input type="date" id="inscription2_dd" name="inscription2_dd" class="form-control" placeholder="" >
                                    <span class="error dod-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                        <!-- <div class="col-md-4 mb-3">
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 2 Epitaph</label>
                                    <input type="text" id="inscription2_epitaph" name="inscription2_epitaph" class="form-control" placeholder="" >
                                </div>
                            </div>
                        </div> -->
                        <div class="mb-3">
                            <label for="" class="form-label">Epitaph</label>
                            <select onchange="epitaphSelect(this.value)" name="inscription2_epitaph" id="inscription2_epitaph" class="form-select cmmn-field-class" aria-label="Default select example">
                                <option selected="" value=""></option>
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
                        <div class="mb-3" id="custom-epitaph-textarea" style="display: none;">
                            <label for="custom-epitaph" class="form-label">Write Your Own Epitaph</label>
                            <textarea class="form-control cmmn-field-class" id="custom-epitaph" rows="3" maxlength="150" minlength="0"></textarea>
                        </div>
                        <!-- <div class="col-md-4 mb-3"> -->
                            <div class="checkout-form-div">
                                <div class="checkout-form-div-inner">
                                    <label style="font-weight: 900;" for="">Inscription 2 Emblem</label>
                                    <input type="text" id="inscription2_emblem" name="inscription2_emblem" class="form-control" placeholder="" >
                                </div>
                            </div>
                        <!-- </div> -->
                        
                    
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <div class="checkout-form-div-inner">
                                <label style="font-weight: 900;" for="">Design Number</label>
                                <input type="text" id="design_number" name="design_number" class="form-control" placeholder="" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Sanded Panel</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="sanded_panel">
                                <option value="yes" selected="">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Sanded Artwork</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="sanded_artwork">
                                <option value="yes" selected="">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Shape</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="shape" id="shape">
                                <option value="Flat" selected="">Flat</option>
                                <option value="Flat (Continued)">Flat (Continued)</option>
                                <option value="Bench">Bench</option>
                                <option value="Bench (Continued)">Bench (Continued)</option>
                                <option value="Pillow">Pillow</option>
                                <option value="Slant">Slant</option>
                                <option value="Die - Angel">Die - Angel</option>
                                <option value="Die - Heart">Die - Heart</option>
                                <option value="Die - Serp Top">Die - Serp Top</option>
                                <option value="Die - Other">Die - Other</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Size</label>
                            <select onchange="shapeSize(this.value)" style="width: 360px;" class="form-select" aria-label="Default select example" name="size" id="size">
                                
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="mb-3" id="custom-shape-size-textarea" style="display: none;">
                                <label for="custom-sixze" class="form-label">Write Your Own Size</label>
                                <input type="text" class="form-control" name="customshapesize" id="customshapesize">
                            </div>
                        </div>
                    </div>

                    <!-- Color // Polish -->
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Color</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="color" id="color">
                                <option selected="">Select</option>
                                <option value="Bahama Blue">Bahama Blue</option>
                                <option value="Blue Pearl">Blue Pearl</option>
                                <option value="Ebony">Ebony</option>
                                <option value="Emerald Pearl">Emerald Pearl</option>
                                <option value="Grey">Grey</option>
                                <option value="Imperial Grey">Imperial Grey</option>
                                <option value="Mahogany">Mahogany</option>
                                <option value="Serenity Red">Serenity Red</option>
                                <option value="Sierra">Sierra</option>
                            </select>
                            <span class="error color-error"></span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Polish</label>
                            <select onchange="changePolish(this.value)" style="width: 360px;" class="form-select" aria-label="Default select example" name="polish" id="polish">
                                <option selected="">Select a value</option>
                                <option value="Polish 1">Polish 1</option>
                                <option value="Polish 2">Polish 2</option>
                                <option value="Polish 3">Polish 3</option>
                                <option value="Polish 5">Polish 5</option>
                                <option value="See Additional Notes">See Additional Notes</option>
                            </select>
                            <span class="error polish-error"></span>
                        </div>
                        <!-- <div class="col-md-4 mb-3"> -->
                            <div class="mb-3" id="polish_note" style="display: none;">
                                <label for="custom-sixze" class="form-label">Additional Polish Notes</label>
                                <textarea class="form-control cmmn-field-class" name="polishnote" id="polishnote" rows="3" maxlength="150" minlength="0"></textarea>
                            </div>
                        <!-- </div> -->
                    </div>
                    <!-- Engraving depth // Base size // Base size (Continued) -->
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Engraving depth</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="engraving_depth" id="engraving_depth">
                                <option selected="">Select</option>
                                <option value="Standard">Standard</option>
                                <option value="Deep Sunk">Deep Sunk</option>
                                <option value="Skin sunk">Skin sunk</option>
                            </select>
                            <span class="error engraving-depth-error"></span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Base size</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="base_size" id="base_size">
                                <option selected="">Select a value</option>
                                <option value="20 x 08 x 08in">20 x 08 x 08in</option>
                                <option value="20 x 12 x 10in">20 x 12 x 10in</option>
                                <option value="22 x 10 x 08in">22 x 10 x 08in</option>
                                <option value="24 x 10 x 06in">24 x 10 x 06in</option>
                                <option value="24 x 10 x 08in">24 x 10 x 08in</option>
                                <option value="24 x 12 x 05in">24 x 12 x 05in</option>
                                <option value="24 x 12 x 06in">24 x 12 x 06in</option>
                                <option value="24 x 12 x 08in">24 x 12 x 08in</option>
                                <option value="26 x 12 x 06in">26 x 12 x 06in</option>
                                <option value="26 x 12 x 08in">26 x 12 x 08in</option>
                                <option value="30 x 10 X 08in">30 x 10 X 08in</option>
                                <option value="30 x 12 x 06in">30 x 12 x 06in</option>
                                <option value="30 x 12 × 08in">30 x 12 × 08in</option>
                                <option value="30 x 14 x 06in">30 x 14 x 06in</option>
                            </select>
                            <span class="error base-size-error"></span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Base size (Continued)</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="base_size_continued" id="base_size_continued">
                                <option selected="">Select a value</option>
                                <option value="30 x 14 x 08in">30 x 14 x 08in</option>
                                <option value="30 X 30 X 04in">30 X 30 X 04in</option>
                                <option value="34 x 12 X 06in">34 x 12 X 06in</option>
                                <option value="34 × 14 x 06in">34 × 14 x 06in</option>
                                <option value="36 x 12 x 06in">36 x 12 x 06in</option>
                                <option value="40 X 14 x 06in">40 X 14 x 06in</option>
                                <option value="42 x 12 x 06in">42 x 12 x 06in</option>
                                <option value="42 × 30 x 04in">42 × 30 x 04in</option>
                                <option value="48 × 12 x 06in">48 × 12 x 06in</option>
                                <option value="48 x 12 x 08in">48 x 12 x 08in</option>
                                <option value="48 x 14 x 08in">48 x 14 x 08in</option>
                                <option value="48 X 20 x 10in">48 X 20 x 10in</option>
                                <option value="60 x 12 x 06in">60 x 12 x 06in</option>
                                <option value="60 X 14 x 08in">60 X 14 x 08in</option>
                                <option value="66 × 14 x 08in">66 × 14 x 08in</option>
                                <option value="72 × 14 x 06in">72 × 14 x 06in</option>
                            </select>
                            <span class="error base-size-continued-error"></span>
                        </div>
                    </div>

                    <!-- Photo (ceramic embed) shape || Photo (ceramic embed) size || Photo (ceramic embed) color-->
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Photo (ceramic embed) shape</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="photo_shape" id="photo_shape">
                                <option selected="">Select</option>
                                <option value="Oval">Oval</option>
                                <option value="Rectangle">Rectangle</option>
                            </select>
                            <span class="error photo-shape-error"></span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Photo (ceramic embed) size</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="photo_size" id="photo_size">
                                <option selected="">Select</option>
                                <option value="2.25 x 2.75">2.25 x 2.75</option>
                                <option value="2.635 x 3.375">2.635 x 3.375</option>
                                <option value="3.25 x 4.25">3.25 x 4.25</option>
                                <option value="3.75 x 5">3.75 x 5</option>
                                <option value="4.25 x 6">4.25 x 6</option>
                                <option value="5 x 7">5 x 7</option>
                                <option value="8 x 10">8 x 10</option>
                            </select>
                            <span class="error photo-size-error"></span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Photo (ceramic embed) color</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="photo_color" id="photo_color">
                                <option selected="">Select</option>
                                <option value="Color">Color</option>
                                <option value="Black and White">Black and White</option>
                            </select>
                            <span class="error photo-color-error"></span>
                        </div>
                    </div>

                    <!-- Photo (ceramic embed) cropping || Photo (ceramic embed) background || Attach photo -->
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Photo (ceramic embed) cropping</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="photo_cropping" id="photo_cropping">
                                <option selected="">Select</option>
                                <option value="Head">Head</option>
                                <option value="Bust">Bust</option>
                                <option value="Half Figure">Half Figure</option>
                                <option value="Full Figure">Full Figure</option>
                                <option value="Full Photo">Full Photo</option>
                            </select>
                            <span class="error photo-crop-error"></span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Photo (ceramic embed) background</label>
                            <select style="width: 360px;" class="form-select" aria-label="Default select example" name="photo_background" id="photo_background">
                                <option selected="">Select</option>
                                <option value="Keep Background">Keep Background</option>
                                <option value="Remove Background">Remove Background</option>
                            </select>
                            <span class="error photo-bg-error"></span>
                        </div>
                        <!-- <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Attach photo</label>
                            <input type="file" id="additional-photo-upload" name="additional-photo-upload" class="form-control cmmn-field-class" accept="image/*">
                        </div> -->
                    <!-- </div> -->
                    <!-- Base color -->
                    <!-- <div class="row mb-3"> -->
                        <div class="col-md-4 mb-3">
                            <label for="sizes" class="form-label">Base color</label>
                            <select onchange="baseColorChange(this.value)" style="width: 360px;" class="form-select" aria-label="Default select example" name="basecolor" id="basecolor">
                                <option selected="">Select</option>
                                <option value="Bahama Blue">Bahama Blue</option>
                                <option value="Blue Pearl">Blue Pearl</option>
                                <option value="Desert Rose (aka Desert Pink)">Desert Rose (aka Desert Pink)</option>
                                <option value="Ebony (aka Imperial Black)">Ebony (aka Imperial Black)</option>
                                <option value="Emerald Pearl">Emerald Pearl</option>
                                <option value="Grey">Grey</option>
                                <option value="Himalayan">Himalayan</option>
                                <option value="Imperial Grey">Imperial Grey</option>
                                <option value="Mahogany">Mahogany</option>
                                <option value="Serenity Red (aka Imperial Red)">Serenity Red (aka Imperial Red)</option>
                                <option value="Sierra">Sierra</option>
                                <option value="Sunset Red">Sunset Red</option>
                                <option value="See Additional Instructions">See Additional Instructions </option>
                            </select>
                            <span class="error basecolor-error"></span>
                            <!-- </div>
                            <div class="col-md-4 mb-3"> -->
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="mb-3" id="basecolor-note" style="display: none;">
                            <label for="custom-sixze" class="form-label">Additional Base color Instructions</label>
                            <textarea class="form-control cmmn-field-class" name="basecolor_additional_note" id="basecolor_additional_note" rows="3" maxlength="150" minlength="0"></textarea>
                        </div>
                    </div>

                    <div class="payment-btn-div">
                        <button type="submit" class="payment-btn">
                            Pay Securely With Debit/Credit Card
                        </button>
                    </div>
                </form>
                @else
                <div class="no-address">
                    <p>
                        <span><i class="fa-solid fa-building-user"></i></span>
                        No address add yet.
                        <a href="{{url('dashboard')}}">
                            <button type="button" class="btn view-personalized-product">Add address</button>
                        </a>
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        // Get the current date in the format required by the input type="date" (YYYY-MM-DD)
        const today = new Date().toISOString().split('T')[0];
        // Set the max attribute of the input element to today's date
        document.getElementById('inscription2_dob').setAttribute('max', today);
        document.getElementById('inscription2_dd').setAttribute('max', today);
    });

    function endearmentSelect(value) {
        if (value == 'custom') {
            $('div#custom-endearment-textarea').show('slide')
        } else {
            $('div#custom-endearment-textarea').hide('slide')
        }
    }

    function epitaphSelect(value) {
        if (value == 'custom') {
            $('div#custom-epitaph-textarea').show('slide')
        } else {
            $('div#custom-epitaph-textarea').hide('slide')
        }
    }

    function shapeSize(value){
        if (value == 'Custom') {
            $('div#custom-shape-size-textarea').show('slide')
        } else {
            $('div#custom-shape-size-textarea').hide('slide')
        }
    }

    function baseColorChange(value){
        if (value == 'See Additional Instructions') {
            $('div#basecolor-note').show('slide')
        } else {
            $('div#basecolor-note').hide('slide')
        }
    }

    function changePolish(value){
        if (value == 'See Additional Notes') {
            $('div#polish_note').show('slide')
        } else {
            $('div#polish_note').hide('slide')
        }
    }

    function checkoutValidations(e) {

        var order_name = $('#name_on_order').val();
        console.log('order_name',order_name)
        if (order_name == '' || order_name == null) {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.ordername-error').html('Please fill Name on order first.');
            setTimeout(() => {
                $('.ordername-error').html("");
            }, 5000);
            return false;
        }


        var cname = $('#company_name').val();
        console.log('cname',cname)
        if (cname == '' || cname == null) {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.company-error').html('Please fill company first.');
            setTimeout(() => {
                $('.company-error').html("");
            }, 5000);
            return false;
        }

        var location_name = $('#cemetry_location_name').val();
        console.log('location_name',location_name)
        if (location_name == '' || location_name == null) {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.cemetery-name-error').html('Please fill Location (cemetery) name first.');
            setTimeout(() => {
                $('.cemetery-name-error').html("");
            }, 5000);
            return false;
        }

        var cemetery_location = $('#cemetry_location_address').val();
        console.log('cemetery_location',cemetery_location)
        if (cemetery_location == '' || cemetery_location == null) {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.cemetery-location-error').html('Please fill Location (cemetery) Address first.');
            setTimeout(() => {
                $('.cemetery-location-error').html("");
            }, 5000);
            return false;
        }

        var cemetry_location_phone = $('#cemetry_location_phone').val();
        console.log('cemetry_location_phone',cemetry_location_phone)
        if (cemetry_location_phone == '' || cemetry_location_phone == null) {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.cemetery-phone-error').html('Please fill Location (cemetery) Phone first.');
            setTimeout(() => {
                $('.cemetery-phone-error').html("");
            }, 5000);
            return false;
        }

        var ins_fname = $('#inscription2_firstname').val();
        console.log('ins_fname',ins_fname)
        if (ins_fname == '' || ins_fname == null) {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.ins-fname-error').html('Please fill Inscription 2 First Name first.');
            setTimeout(() => {
                $('.ins-fname-error').html("");
            }, 5000);
            return false;
        }

        var ins_lname = $('#inscription2_lastname').val();
        console.log('ins_lname',ins_lname)
        if (ins_lname == '' || ins_lname == null) {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.ins-lname-error').html('Please fill Inscription 2 Last Name first.');
            setTimeout(() => {
                $('.ins-lname-error').html("");
            }, 5000);
            return false;
        }

        var dob = $('#inscription2_dob').val();
        var dod = $('#inscription2_dd').val();
        console.log('dob',dob)
        console.log('dod',dod)
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
            //
        } else {
            $('.dod-error').html('Invalid Date of Death.');
            setTimeout(() => {
                $('.dod-error').html("");
            }, 5000);
            return false;
        }

        var size = $('[name=size]').val();
        console.log('size',size)
        if (size == '' || size == null || size == "Select a value") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.size-error').html('Please select size first.');
            setTimeout(() => {
                $('.size-error').html("");
            }, 5000);
            return false;
        }

        var color = $('[name=color]').val();
        console.log('color',color)
        if (color == '' || color == null || color == "Select") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.color-error').html('Please select color first.');
            setTimeout(() => {
                $('.color-error').html("");
            }, 5000);
            return false;
        }

        var polish = $('[name=polish]').val();
        console.log('polish',polish)
        if (polish == '' || polish == null || polish == "Select a value") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.polish-error').html('Please select polish value first.');
            setTimeout(() => {
                $('.polish-error').html("");
            }, 5000);
            return false;
        }

        var engraving_depth = $('[name=engraving_depth]').val();
        console.log('engraving_depth',engraving_depth)
        if (engraving_depth == '' || engraving_depth == null || engraving_depth == "Select") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.engraving-depth-error').html('Please select Engraving depth value first.');
            setTimeout(() => {
                $('.engraving-depth-error').html("");
            }, 5000);
            return false;
        }

        var base_size = $('[name=base_size]').val();
        console.log('base_size',base_size)
        if (base_size == '' || base_size == null || base_size == "Select a value") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.base-size-error').html('Please select base size value first.');
            setTimeout(() => {
                $('.base-size-error').html("");
            }, 5000);
            return false;
        }

        // var base_size_continued = $('[name=base_size_continued]').val();
        // if (base_size_continued == '' || base_size_continued == null || base_size_continued == "Select a value") {
        //     e.preventDefault();
        //     $(this).scrollTop(800);
        //     $('.base-size-continued-error').html('Please select base size continued value first.');
        //     setTimeout(() => {
        //         $('.base-size-continued-error').html("");
        //     }, 5000);
        //     return false;
        // }

        var base_size_continued = $('[name=base_size_continued]').val();
        console.log('base_size_continued',base_size_continued)
        if (base_size_continued == '' || base_size_continued == null || base_size_continued == "Select a value") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.base-size-continued-error').html('Please select base size continued value first.');
            setTimeout(() => {
                $('.base-size-continued-error').html("");
            }, 5000);
            return false;
        }

        var photo_shape = $('[name=photo_shape]').val();
        console.log('photo_shape',photo_shape)
        if (photo_shape == '' || photo_shape == null || photo_shape == "Select") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.photo-shape-error').html('Please select photo shape value first.');
            setTimeout(() => {
                $('.photo-shape-error').html("");
            }, 5000);
            return false;
        }

        var photo_size = $('[name=photo_size]').val();
        console.log('photo_size',photo_size)
        if (photo_size == '' || photo_size == null || photo_size == "Select") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.photo-size-error').html('Please select photo size first.');
            setTimeout(() => {
                $('.photo-size-error').html("");
            }, 5000);
            return false;
        }

        var photo_color = $('[name=photo_color]').val();
        console.log('photo_color',photo_color)
        if (photo_color == '' || photo_color == null || photo_color == "Select") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.photo-color-error').html('Please select photo color first.');
            setTimeout(() => {
                $('.photo-color-error').html("");
            }, 5000);
            return false;
        }

        var photo_cropping = $('[name=photo_cropping]').val();
        console.log('photo_cropping',photo_cropping)
        if (photo_cropping == '' || photo_cropping == null || photo_cropping == "Select") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.photo-crop-error').html('Please select photo crop first.');
            setTimeout(() => {
                $('.photo-crop-error').html("");
            }, 5000);
            return false;
        }

        var photo_background = $('[name=photo_background]').val();
        console.log('photo_background',photo_background)
        if (photo_background == '' || photo_background == null || photo_background == "Select") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.photo-bg-error').html('Please select photo background first.');
            setTimeout(() => {
                $('.photo-bg-error').html("");
            }, 5000);
            return false;
        }

        var basecolor = $('[name=basecolor]').val();
        console.log('basecolor',basecolor)
        if (basecolor == '' || basecolor == null || basecolor == "Select") {
            e.preventDefault();
            $(this).scrollTop(800);
            $('.basecolor-error').html('Please select base color first.');
            setTimeout(() => {
                $('.basecolor-error').html("");
            }, 5000);
            return false;
        }

        return true; 
    }

    var shapeMap = {
        Flat: ["18 x 9 x 3 in", "20 x 10 x 3 in", "20 x 10 x 4 in", "24 x 12 × 3 in", "24 x 12 x 4 in", "28 x 16 x 3 in", "28 x 16 X 4 in", "28 × 20 x 3 in", "30 x 18 x 3 in", "32 x 20 x 3 in", "32 x 20 x 4 in", "32 × 48 x 4 in", "36 x 13 x 4 in", "36 x 14 x 3 in"],
        "Flat (Continued)": ["36 x 14 x 4 in", "36 x 18 x 3 in", "38 x 48 x 4 in", "39 x 30 X 3 in", "42 x 16 x 3 in", "42 x 18 x 3 in", "44 × 14 x 4 in"],
        Bench: ['BN1010 34" Park bench', 'BN1030 34" straight leg bench', 'BN1040 34" curved leg bench', 'BN1010 36" Park bench', 'BN1030 36" straight leg bench', 'BN1040 36" curved leg bench', 'BN1020 36" cremation bench', 'BN1010 48" Park bench'],
        "Bench (Continued)": ['BN1030 48" straight leg bench', 'BN1040 48" curved leg bench', 'BN1020 48" cremation bench', 'Custom'],
        Pillow: ['20 x 10 x 6 x 4 in','24 × 12 x 6 x 4 in','24 x 12 x 8 x 6 in','30 × 12 x 8 x 6 in','36 x 12 x 8 x 6 in','Custom'],
        Slant: ['20 X 10 x 16 in','24 x 10 x 16 in','30 x 10 x 16 in','30 × 12 x 8 x 6 in','36 x 10 x 16 in','Custom'],
        "Die - Angel": ['7290 Single heart carved angel 32 x 8 x 32','7300 Leaning carved angel 40 x 8 x 33','7295 Dbl heart carved angels 50 x 8 x 30','7305 Resting carved angel 54 x 8 x 36','Custom'],
        "Die - Heart": ['Single 24 x 6 x 24','Dbl stacked 24 x 6 x 34','Dbl side by side 48 x 6 x 24','Custom'],
        "Die - Serp Top": ['18 × 6 × 24 in','24 x 6 x 30 in','24 x 18 x 6 in','30 x 6 x 24 in','36 x 6 x 24 in','48 x 6 x 24 in','Custom'],
        "Die - Other": ['Praying hands with cross 18 x 6 x 24','Arched Cross Roman 24 x 6 x 34','Carved Rose 24 x 6 x 40','Cross 24 x 6 x 42','St Mary 31 x 6 x 42','Custom']
    };
    function populateSize() {
        var shape = $("#shape").val();
        console.log('shape', shape)
        var size = shapeMap[shape] || [];
        console.log('size', size)
        var sizeDropdown = $("#size");
        sizeDropdown.empty();
        if (size.length === 0) {
            sizeDropdown.append('<option value="">Select a size</option>');
        } else {
            $.each(size, function (index, state) {
                sizeDropdown.append('<option value="' + state + '">' + state + '</option>');
            });
        }
    }
    $("#shape").on("change", populateSize);
    populateSize();
</script>
@include('layouts.footer')