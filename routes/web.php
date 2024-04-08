<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ScraperController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [MainController::class, 'index']);
Route::get('/home', [MainController::class, 'index']);
Route::get('/scrap-clipart', [ScraperController::class, 'scrapClipart']);
Route::get('/scraping', [ScraperController::class, 'scraping']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // QR Code
    Route::get('/qr-create-detail', [QrController::class, 'createDetailPage'])->name('qr.detail');
    Route::post('/qr-submit-form', [QrController::class, 'submitQrDetail'])->name('qr.submit');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/get-states', [DashboardController::class, 'getStates']);
    Route::post('/get-cities', [DashboardController::class, 'getCities']);

    // Shipping Address
    Route::post('/shipping-address', [ProfileController::class, 'saveShippingAddress'])->name('shipping.address');
    Route::post('/update-shipping-address', [ProfileController::class, 'updateShippingAddress'])->name('update.shipping_address');
    Route::post('/remove-shipping-address', [ProfileController::class, 'removeShippingAddress'])->name('remove.shipping_address');

    //Orders
    Route::get('/order-detail/{id?}', [OrderController::class, 'orderDetail'])->name('order.detail');

    //Cart
    Route::post('/cart', [MainController::class, 'addToCart']);
    Route::post('/delete-cart-item', [MainController::class, 'deleteCartItem']);
    Route::get('/cart', [MainController::class, 'cart']);
    Route::post('/updateCart', [MainController::class, 'updateCart']);

    //checkout
    Route::get('/checkout', [MainController::class, 'checkout']);

    //Payment
    Route::post('/payment', [StripePaymentController::class, 'stripePayment']);
    Route::get('/save-order-detail/{id?}', [OrderController::class, 'saveOrderDetail']);

    // Save data into Session
    Route::post('/save-session', [ProfileController::class, 'saveDataIntoSession']);
});

// QR Code
Route::get('/qr-detail-view/{id}', [QrController::class, 'qrDetailView'])->name('qr.detail-view');

//Plans
Route::get('/plans', [PlanController::class, 'showPlans'])->name('plans.show');


Route::prefix('/product-category')->group(function () {
    //Route::get('/flat-headstones/{name}', [MainController::class, 'viewflatHeadstoneProduct']);
    Route::get('/flat-headstones/{name}', [MainController::class, 'productData']);
    Route::get('/flat-headstones', [MainController::class, 'flatHeadstonesView']);
    Route::post('/flat-headstones', [MainController::class, 'flatHeadstones']);

    //Route::get('/angel-headstones/{name}', [MainController::class, 'viewAngelsHeadstonesProduct']);
    Route::get('/angel-headstones/{name}', [MainController::class, 'productData']);
    Route::get('/angel-headstones', [MainController::class, 'angelsHeadstonesView']);
    Route::post('/angel-headstones', [MainController::class, 'angelsHeadstones']);

    //Route::get('/cross-headstones/{name}', [MainController::class, 'viewCrossesHeadstonesProduct']);
    Route::get('/cross-headstones/{name}', [MainController::class, 'productData']);
    Route::get('/cross-headstones', [MainController::class, 'crossesHeadstonesView']);
    Route::post('/cross-headstones', [MainController::class, 'crossesHeadstones']);

    //Route::get('/photostones-engraved-headstones/{name}', [MainController::class, 'viewPhotostonesProduct']);
    Route::get('/photostones-engraved-headstones/{name}', [MainController::class, 'productData']);
    Route::get('/photostones-engraved-headstones', [MainController::class, 'photoStonesEngravedHeadstonesView']);
    Route::post('/photostones-engraved-headstones', [MainController::class, 'photoStonesEngravedHeadstones']);

    //Route::get('/heart-shaped-headstones/{name}', [MainController::class, 'viewHeartShapedHeadstonesProduct']);
    Route::get('/heart-shaped-headstones/{name}', [MainController::class, 'productData']);
    Route::get('/heart-shaped-headstones', [MainController::class, 'heartShapedHeadstonesView']);
    Route::post('/heart-shaped-headstones', [MainController::class, 'heartShapedHeadstones']);

    //Route::get('/classic-upright-headstones/{name}', [MainController::class, 'viewClassicUprightHeadstonesProduct']);
    Route::get('/classic-upright-headstones/{name}', [MainController::class, 'productData']);
    Route::get('/classic-upright-headstones', [MainController::class, 'classicUprightHeadstonesView']);
    Route::post('/classic-upright-headstones', [MainController::class, 'classicUprightHeadstones']);

    //Route::get('/floral-upright-headstones/{name}', [MainController::class, 'viewFloralUprightHeadstonesProduct']);
    Route::get('/floral-upright-headstones/{name}', [MainController::class, 'productData']);
    Route::get('/floral-upright-headstones', [MainController::class, 'floralUprightHeadstonesView']);
    Route::post('/floral-upright-headstones', [MainController::class, 'floralUprightHeadstones']);

    //Route::get('/pillow-top-headstones/{name}', [MainController::class, 'viewPillowTopHeadstonesProduct']);
    Route::get('/pillow-top-headstones/{name}', [MainController::class, 'productData']);
    Route::get('/pillow-top-headstones', [MainController::class, 'pillowTopHeadstonesView']);
    Route::post('/pillow-top-headstones', [MainController::class, 'pillowTopHeadstones']);

    Route::get('/ceramic-headstone-pictures/{name}', [MainController::class, 'viewCeramicHeadstonePicturesProduct']);
    Route::get('/ceramic-headstone-pictures', [MainController::class, 'ceramicHeadstonePicturesView']);
    Route::post('/ceramic-headstone-pictures', [MainController::class, 'ceramicHeadstonePictures']);

    //Route::get('/serp-top-slant-headstones/{name}', [MainController::class, 'viewSerpTopSlantHeadstonesProduct']);
    Route::get('/serp-top-slant-headstones/{name}', [MainController::class, 'productData']);
    Route::get('/serp-top-slant-headstones', [MainController::class, 'serpTopSlantHeadstonesView']);
    Route::post('/serp-top-slant-headstones', [MainController::class, 'serpTopSlantHeadstones']);

    //Route::get('/serp-top-upright-headstones/{name}', [MainController::class, 'viewSerpTopUprightHeadstonesProduct']);
    Route::get('/serp-top-upright-headstones/{name}', [MainController::class, 'productData']);
    Route::get('/serp-top-upright-headstones', [MainController::class, 'serpTopUprightHeadstonesView']);
    Route::post('/serp-top-upright-headstones', [MainController::class, 'serpTopUprightHeadstones']);
});


Route::get('/headstone-design-idea-gallery/{type?}', [MainController::class, 'headstoneDesignIdeaGallery']);
// Route::get('/book-headstone-design-idea-gallery', [MainController::class, 'headstoneDesignIdeaGallery']);

// Route::get('/border-headstone-design-idea-gallery', [MainController::class, 'borderHeadstoneDesignIdeaGallery']);

// Route::get('/catholic-headstone-design-idea-gallery', [MainController::class, 'catholicHeadstoneDesignIdeaGallery']);

// Route::get('/children-headstone-design-idea-gallery', [MainController::class, 'childrenHeadstoneDesignIdeaGallery']);

// Route::get('/cross-headstone-design-idea-gallery', [MainController::class, 'crossHeadstoneDesignIdeaGallery']);

Route::get('/store', [MainController::class, 'store']);

Route::get('/about-us', [MainController::class, 'aboutUs']);
Route::get('/contact-us', [MainController::class, 'contactUs']);
Route::get('/headstone-history', [MainController::class, 'headstoneHistory']);
Route::get('/questions-to-ask-a-cemetry', [MainController::class, 'questionsToAskACemetry']);
Route::get('/frequently-asked-questions', [MainController::class, 'frequentlyAskedQuestions']);
Route::get('/photos', [MainController::class, 'photos']);
Route::get('/stone-color', [MainController::class, 'stoneColor']);
Route::get('/endearment', [MainController::class, 'endearment']);


Route::get('/clip-art/{type?}', [MainController::class, 'clipart']);
Route::get('/fonts', [MainController::class, 'fonts']);
Route::get('/epitaphs', [MainController::class, 'epitaphs']);
Route::get('/testimonial', [MainController::class, 'testimonial']);

require __DIR__ . '/auth.php';
