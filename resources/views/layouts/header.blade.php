<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('/assets/images/Headstone-icon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css'>
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

    <link rel="stylesheet" href="{{ asset('/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/common-styles.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/styles.css')}}">

    <title>Headstones</title>
</head>

<body>

    <!-- Header -->
    <header class="header-bar fixed-top" data-aos="fade-down" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-duration="400">
        <div class="top-box fixed-top">
            <div class="top-box-grid">
                <div class="top-box-item">
                    <a href="" class="top-box-item-link">
                        <i class="fa-solid fa-phone"></i>
                        <p>(123)123-1234</p>
                    </a>
                    <a href="" class="top-box-item-link">
                        <i class="fa-solid fa-envelope"></i>
                        <p>info@example.com</p>
                    </a>
                </div>
                <div class="top-box-item">
                    <a href="{{ asset('/product-category/flat-headstones') }}" class="top-box-item-link">
                        <p>Flat Headstones</p>
                    </a>
                    <a href="{{ asset('/product-category/pillow-top-headstones') }}" class="top-box-item-link">
                        <p>Pillow Headstones</p>
                    </a>
                    <a href="{{ asset('/product-category/serp-top-slant-headstones') }}" class="top-box-item-link">
                        <p>Serp Top Uprights</p>
                    </a>
                    <a href="{{ asset('/product-category/serp-top-upright-headstones') }}" class="top-box-item-link">
                        <p>Serp Top Slants</p>
                    </a>

                    <a href="{{ asset('/cart')}}" class="top-box-item-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p><?php

                            use App\Models\Cart;
                            use Illuminate\Support\Facades\Auth;

                            if (Auth::check()) {
                                echo Cart::where('user_id', Auth::user()->id)->count();
                            }else{
                                echo 0;
                            }
                            ?> Items</p>
                    </a>

                </div>
            </div>
        </div>

        <nav class="navbar-menu navbar navbar-expand-xl fixed-top" id="main_navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ asset('/') }}">
                    <img src="{{ asset('/assets/images/hs-logo.svg') }}" alt="" alt="Innovative Headstones">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ asset('/') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Products
                            </a>
                            <ul class="dropdown-menu resources-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/angel-headstones') }}">Angels</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/cross-headstones') }}">Crosses</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/classic-upright-headstones') }}">Classics</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/flat-headstones') }}">Flat Headstones</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/floral-upright-headstones') }}">Floral</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/heart-shaped-headstones') }}">Hearts</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/photostones-engraved-headstones') }}">Photostones</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/pillow-top-headstones') }}">Pillow Headstones</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/ceramic-headstone-pictures') }}">Photos</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/serp-top-slant-headstones') }}">SERP Top Slants</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/product-category/serp-top-upright-headstones') }}">SERP Top Upright</a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('plans.show') }}">QR Code Technology</a>
                        </li> -->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('plans.show') }}" role="button" data-bs-toggle="dropdown">
                                QR Code Technology
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('plans.show') }}">Bio My Life</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">GPS Tracker</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Resources
                            </a>
                            <ul class="dropdown-menu resources-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ url('/clip-art/angels') }}">Clip art</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ asset('/headstone-design-idea-gallery') }}">Designs</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/endearment') }}">endearments</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/epitaphs') }}">epitaphs</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/fonts') }}">fonts</a>
                                </li>
                                <!-- <li>
                                    <a class="dropdown-item" href="">life story biography</a>
                                </li> -->
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/photos') }}">photos</a>
                                </li>
                                <!-- <li>
                                    <a class="dropdown-item" href="">QR Code packages</a>
                                </li> -->
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/questions-to-ask-a-cemetry') }}">questionaire form</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/frequently-asked-questions') }}">Q&A</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ asset('/stone-color') }}">stone color</a>
                                </li>
                                <!-- <li>
                                    <a class="dropdown-item" href="">videos</a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Merchant Members
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="">Cemeteries</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">Funeral Homes</a>
                                </li>
                            </ul>
                        </li> -->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Who Are We
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{asset('/about-us')}}">About Us</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{asset('/contact-us')}}">Contact Us</a>
                                </li>
                                <!-- <li>
                                    <a class="dropdown-item" href="">Our QR Code Technology</a>
                                </li> -->
                                <li>
                                    <a class="dropdown-item" href="{{asset('/headstone-history')}}">Headstone History</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{url('/testimonial')}}">Testimonials</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ asset('/product-category/angel-headstones') }}">Personalized
                                Headstones</a>
                        </li>
                        <li class="nav-item last-nav-item">
                            <a class="nav-link" aria-current="page" href="{{ asset('/cart')}}">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                            <!-- <a class="nav-link active" aria-current="page" href="{{ asset('/login')}}">
                                <i class="fa-solid fa-user"></i>
                            </a> -->
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ asset('/login')}}">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('dashboard') }}" role="button" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-user"></i>
                            </a>
                            <ul class="dropdown-menu profile menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li>
                                    <!-- <button type="button" class="btn btn-primary logout button" data-bs-toggle="modal" data-bs-target="#exampleModal"> -->
                                    <a class="dropdown-item logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <!-- </button> -->
                                </li>
                            </ul>
                        </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
    </header>