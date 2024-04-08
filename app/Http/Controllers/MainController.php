<?php

namespace App\Http\Controllers;

use App\Models\HeadstoneDesign;
use App\Models\Product;
use App\Models\Cart;
use DOMDocument;
use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ShippingAddress;

class MainController extends Controller
{
    public function index()
    {
        $testimonials =  DB::table('testimonials')->get();
        return view('home')->with(compact('testimonials'));
    }

    public function store()
    {
        return view('store');
    }

    public function flatHeadstonesView()
    {
        return view('product-category/flat-headstone');
    }

    public function flatHeadstones(Request $request)
    {
        $minPrice = (float) $request->minPrice;
        $maxPrice = (float) $request->maxPrice;
        $dataArr = Product::where('type', 'flatHeadstone')
            ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$minPrice, $maxPrice])
            ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)
            ->get();
        return response()->json($dataArr);
    }

    public function crossesHeadstonesView()
    {
        return view('product-category/cross-headstones');
    }

    public function crossesHeadstones(Request $request)
    {
        $dataArr = Product::where('type', 'crossHeadstone')
            ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
            ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)
            ->get();
        return response()->json($dataArr);
    }

    public function angelsHeadstonesView()
    {
        return view('product-category/angel-headstones');
    }

    public function angelsHeadstones(Request $request)
    {
        $dataArr = Product::where('type', 'angelHeadstone')
            ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
            ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)->get();
        return response()->json($dataArr);
    }

    public function heartShapedHeadstonesView()
    {
        return view('product-category/heart-shaped-headstones');
    }

    public function heartShapedHeadstones(Request $request)
    {
        $dataArr = Product::where('type', 'heartHeadstone')
            ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
            ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)->get();
        return response()->json($dataArr);
    }

    public function classicUprightHeadstonesView()
    {
        return view('product-category/classic-upright-headstones');
    }

    public function classicUprightHeadstones(Request $request)
    {
        $dataArr = Product::where('type', 'classicHeadstone')
            ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
            ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)->get();
        return response()->json($dataArr);
    }

    public function photoStonesEngravedHeadstonesView()
    {
        return view('product-category/photostones-engraved-headstones');
    }

    public function photoStonesEngravedHeadstones(Request $request)
    {
        $dataArr = Product::where('type', 'photoStonesEngravedHeadstone')
            ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
            ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)->get();
        return response()->json($dataArr);
    }

    public function floralUprightHeadstonesView()
    {
        return view('product-category/floral-upright-headstones');
    }

    public function floralUprightHeadstones(Request $request)
    {
        $dataArr = Product::where('type', 'floralHeadstone')
            ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
            ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)->get();
        return response()->json($dataArr);
    }

    public function pillowTopHeadstonesView()
    {
        return view('product-category/pillow-top-headstones');
    }

    public function pillowTopHeadstones(Request $request)
    {
        $dataArr = Product::where('type', 'pillowHeadstone')
            ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
            ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)->get();
        return response()->json($dataArr);
    }

    public function ceramicHeadstonePicturesView()
    {
        return view('product-category/ceramic-headstone-pictures');
    }

    public function ceramicHeadstonePictures(Request $request)
    {
        if ($request->filterCheck  == 'nonFilter') {

            $count = Product::where('type', 'ceramicHeadstone')->count();
            $dataArr = Product::where('type', 'ceramicHeadstone')->skip($request->offset)->take(6)
                ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)->get();
        } else {
            $count = Product::where('type', 'ceramicHeadstone')
                ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
                ->count();
            $dataArr = Product::where('type', 'ceramicHeadstone')
                ->skip($request->offset)->take(6)
                ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
                ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)->get();
        }
        return response()->json(['data' => $dataArr, 'count' => $count]);
    }

    public function serpTopSlantHeadstonesView()
    {
        return view('product-category/serp-top-slant-headstones');
    }

    public function serpTopSlantHeadstones(Request $request)
    {
        $dataArr = Product::where('type', 'serpTopSlantHeadstone')
            ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
            ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)->get();
        return response()->json($dataArr);
    }

    public function serpTopUprightHeadstonesView()
    {
        return view('product-category/serp-top-upright-headstones');
    }

    public function serpTopUprightHeadstones(Request $request)
    {
        $dataArr = Product::where('type', 'serpTopUprightHeadstone')
            ->whereBetween(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), [$request->minPrice, $request->maxPrice])
            ->orderBy(DB::raw("CAST(REPLACE(SUBSTRING_INDEX(min_price, '$', -1), ',', '') AS DECIMAL(10, 2))"), $request->sort)->get();
        return response()->json($dataArr);
    }

    public function productData($name)
    {
        $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
        $type = Product::where('name', $name)->first();

        foreach ($dataArr as $data) {
            $data->url = 'flatHeadstoneColorImg';
            $data->product_id = $type->id;

            $data->images = explode(',', $data->images);
            $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

            $data->old_price = explode(',', $data->old_price);
            $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

            $data->new_price = explode(',', $data->new_price);
            $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

            $data->weight = explode(',', $data->weight);
            $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
        }
        $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();

        //getting artworks
        $artworks = $this->getArtwork();
        $cliparts = $this->getCliparts();
        $clipart_categories = $this->getClipartCategories();
        $qrcodes = $this->getMyQr();

        return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    }


    // public function viewflatHeadstoneProduct($name)
    // {
    // $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
    // $type = Product::where('name', $name)->first();

    // foreach ($dataArr as $data) {
    //     $data->url = 'flatHeadstoneColorImg';
    //     $data->product_id = $type->id;

    //     $data->images = explode(',', $data->images);
    //     $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

    //     $data->old_price = explode(',', $data->old_price);
    //     $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

    //     $data->new_price = explode(',', $data->new_price);
    //     $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

    //     $data->weight = explode(',', $data->weight);
    //     $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
    // }
    // $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();

    // //getting artworks
    // $artworks = $this->getArtwork();
    // $cliparts = $this->getCliparts();
    // $clipart_categories = $this->getClipartCategories();
    // $qrcodes = $this->getMyQr();

    //     return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    // }

    // public function viewPhotostonesProduct($name)
    // {
    // $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
    // $type = Product::where('name', $name)->first();
    // foreach ($dataArr as $data) {
    //     $data->url = 'photoStonesImages';
    //     $data->product_id = $type->id;

    //     $data->images = explode(',', $data->images);
    //     $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

    //     $data->old_price = explode(',', $data->old_price);
    //     $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

    //     $data->new_price = explode(',', $data->new_price);
    //     $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

    //     $data->weight = explode(',', $data->weight);
    //     $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
    // }
    // $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();
    // //getting artworks
    // $artworks = $this->getArtwork();
    // $cliparts = $this->getCliparts();
    // $clipart_categories = $this->getClipartCategories();
    // $qrcodes = $this->getMyQr();
    //     return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    // }

    // public function viewPillowTopHeadstonesProduct($name)
    // {
    // $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
    // $type = Product::where('name', $name)->first();

    // foreach ($dataArr as $data) {
    //     $data->url = 'pillowTopHeadstoneImg';
    //     $data->product_id = $type->id;

    //     $data->images = explode(',', $data->images);
    //     $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

    //     $data->old_price = explode(',', $data->old_price);
    //     $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

    //     $data->new_price = explode(',', $data->new_price);
    //     $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

    //     $data->weight = explode(',', $data->weight);
    //     $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
    // }
    // $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();
    // //getting artworks
    // $artworks = $this->getArtwork();
    // $cliparts = $this->getCliparts();
    // $clipart_categories = $this->getClipartCategories();
    // $qrcodes = $this->getMyQr();

    //     return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    // }

    // public function viewSerpTopSlantHeadstonesProduct($name)
    // {
    // $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
    // $type = Product::where('name', $name)->first();

    // foreach ($dataArr as $data) {
    //     $data->url = 'serpTopSlantHeadstonesImg';
    //     $data->product_id = $type->id;

    //     $data->images = explode(',', $data->images);
    //     $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

    //     $data->old_price = explode(',', $data->old_price);
    //     $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

    //     $data->new_price = explode(',', $data->new_price);
    //     $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

    //     $data->weight = explode(',', $data->weight);
    //     $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
    // }

    // $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();
    // //getting artworks
    // $artworks = $this->getArtwork();
    // $cliparts = $this->getCliparts();
    // $clipart_categories = $this->getClipartCategories();
    // $qrcodes = $this->getMyQr();

    //     return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    // }

    // public function viewSerpTopUprightHeadstonesProduct($name)
    // {
    // $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
    // $type = Product::where('name', $name)->first();
    // foreach ($dataArr as $data) {
    //     $data->url = 'serpTopUprightHeadstonesImg';
    //     $data->product_id = $type->id;

    //     $data->images = explode(',', $data->images);
    //     $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

    //     $data->old_price = explode(',', $data->old_price);
    //     $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

    //     $data->new_price = explode(',', $data->new_price);
    //     $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

    //     $data->weight = explode(',', $data->weight);
    //     $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
    // }

    // $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();
    // //getting artworks
    // $artworks = $this->getArtwork();
    // $cliparts = $this->getCliparts();
    // $clipart_categories = $this->getClipartCategories();
    // $qrcodes = $this->getMyQr();
    //     return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    // }

    // public function viewAngelsHeadstonesProduct($name)
    // {
    // $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
    // $type = Product::where('name', $name)->first();
    // foreach ($dataArr as $data) {
    //     $data->url = 'angelsHeadstonesImg';
    //     $data->product_id = $type->id;

    //     $data->images = explode(',', $data->images);
    //     $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

    //     $data->old_price = explode(',', $data->old_price);
    //     $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

    //     $data->new_price = explode(',', $data->new_price);
    //     $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

    //     $data->weight = explode(',', $data->weight);
    //     $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
    // }
    // $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();
    // //getting artworks
    // $artworks = $this->getArtwork();
    // $cliparts = $this->getCliparts();
    // $clipart_categories = $this->getClipartCategories();
    // $qrcodes = $this->getMyQr();

    //     return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    // }

    // public function viewHeartShapedHeadstonesProduct($name)
    // {
    // $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
    // $type = Product::where('name', $name)->first();
    // foreach ($dataArr as $data) {
    //     $data->url = 'heartShapedHeadstonesImg';
    //     $data->product_id = $type->id;

    //     $data->images = explode(',', $data->images);
    //     $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

    //     $data->old_price = explode(',', $data->old_price);
    //     $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

    //     $data->new_price = explode(',', $data->new_price);
    //     $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

    //     $data->weight = explode(',', $data->weight);
    //     $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
    // }

    // $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();
    // //getting artworks
    // $artworks = $this->getArtwork();
    // $cliparts = $this->getCliparts();
    // $clipart_categories = $this->getClipartCategories();
    // $qrcodes = $this->getMyQr();

    //     return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    // }

    // public function viewFloralUprightHeadstonesProduct($name)
    // {
    // $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
    // $type = Product::where('name', $name)->first();
    // foreach ($dataArr as $data) {
    //     $data->url = 'floralUprightHeadstonesImg';
    //     $data->product_id = $type->id;

    //     $data->images = explode(',', $data->images);
    //     $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

    //     $data->old_price = explode(',', $data->old_price);
    //     $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

    //     $data->new_price = explode(',', $data->new_price);
    //     $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

    //     $data->weight = explode(',', $data->weight);
    //     $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
    // }

    // $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();
    // //getting artworks
    // $artworks = $this->getArtwork();
    // $cliparts = $this->getCliparts();
    // $clipart_categories = $this->getClipartCategories();
    // $qrcodes = $this->getMyQr();

    //     return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    // }
    // public function viewCrossesHeadstonesProduct($name)
    // {
    // $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
    // $type = Product::where('name', $name)->first();
    // foreach ($dataArr as $data) {
    //     $data->url = 'crossesHeadstonesImg';
    //     $data->product_id = $type->id;

    //     $data->images = explode(',', $data->images);
    //     $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

    //     $data->old_price = explode(',', $data->old_price);
    //     $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

    //     $data->new_price = explode(',', $data->new_price);
    //     $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

    //     $data->weight = explode(',', $data->weight);
    //     $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
    // }
    // $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();
    // //getting artworks
    // $artworks = $this->getArtwork();
    // $cliparts = $this->getCliparts();
    // $clipart_categories = $this->getClipartCategories();
    // $qrcodes = $this->getMyQr();

    //     return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    // }

    // public function viewClassicUprightHeadstonesProduct($name)
    // {
    // $dataArr = DB::table('headstone_colors')->where('name', $name)->get();
    // $type = Product::where('name', $name)->first();

    // foreach ($dataArr as $data) {
    //     $data->url = 'classicUprightHeadstonesImg';
    //     $data->product_id = $type->id;

    //     $data->images = explode(',', $data->images);
    //     $data->images = $exploded = array_combine(range(1, count($data->images)), $data->images);

    //     $data->old_price = explode(',', $data->old_price);
    //     $data->old_price = $exploded = array_combine(range(1, count($data->old_price)), $data->old_price);

    //     $data->new_price = explode(',', $data->new_price);
    //     $data->new_price = $exploded = array_combine(range(1, count($data->new_price)), $data->new_price);

    //     $data->weight = explode(',', $data->weight);
    //     $data->weight = $exploded = array_combine(range(1, count($data->weight)), $data->weight);
    // }

    // $relatedProducts = Product::where('type', $type->type)->inRandomOrder()->limit(3)->get();
    // //getting artworks
    // $artworks = $this->getArtwork();
    // $cliparts = $this->getCliparts();
    // $clipart_categories = $this->getClipartCategories();
    // $qrcodes = $this->getMyQr();
    //return view('view-product')->with(compact('dataArr', 'relatedProducts', 'artworks', 'cliparts', 'clipart_categories', 'qrcodes'));
    //}


    public function viewCeramicHeadstonePicturesProduct($name)
    {

        $dataArr = Product::where('name', $name)->first();
        $relatedProducts = Product::where('type', $dataArr->type)->inRandomOrder()->limit(3)->get();
        return view('ceramic-headstone-pictures-view')->with(compact('dataArr', 'relatedProducts'));
    }

    public function headstoneDesignIdeaGallery($type = "Book")
    {
        $dataArr = HeadstoneDesign::where('type', $type)->get();
        return view('/resources/headstones-designs/headstone-design-idea-gallery')->with(compact('dataArr'));
    }

    // public function borderHeadstoneDesignIdeaGallery()
    // {
    //     $dataArr = HeadstoneDesign::where('type', 'Border')->get();
    //     return view('/resources/headstones-designs/headstone-design-idea-gallery')->with(compact('dataArr'));
    // }

    // public function catholicHeadstoneDesignIdeaGallery()
    // {
    //     $dataArr = HeadstoneDesign::where('type', 'catholic')->get();
    //     return view('/resources/headstones-designs/headstone-design-idea-gallery')->with(compact('dataArr'));
    // }

    // public function childrenHeadstoneDesignIdeaGallery()
    // {
    //     $dataArr = HeadstoneDesign::where('type', 'children')->get();
    //     return view('/resources/headstones-designs/headstone-design-idea-gallery')->with(compact('dataArr'));
    // }

    // public function crossHeadstoneDesignIdeaGallery()
    // {
    //     $dataArr = HeadstoneDesign::where('type', 'cross')->get();
    //     return view('/resources/headstones-designs/headstone-design-idea-gallery')->with(compact('dataArr'));
    // }

    public function addToCart(Request $request)
    {
        $quantity = $request->quantity;
        if ($quantity == 0 && $quantity == "") {
            $quantity = 1;
        }

        if ($request->hasFile('qrCodeImage')) {
            $QrImageFile = $request->file('qrCodeImage');
            $randomName = Str::random(10); // Change 20 to the desired length of the random name
            $extension = $QrImageFile->getClientOriginalExtension();
            $QrImageFileName = 'QrCode-' . $randomName . '.' . $extension; // File name
            $QrImageFile->move(public_path('qr_code_images'), $QrImageFileName);
        }

        if ($request->hasFile('imageFile')) {
            $imageFile = $request->file('imageFile');
            $randomName = Str::random(10); // Change 20 to the desired length of the random name
            $extension = $imageFile->getClientOriginalExtension();
            $fileName = 'Headstone-custom-' . $randomName . '.' . $extension; // File name
            $imageFile->move(public_path('cart_images'), $fileName);

            Cart::insert(
                [
                    'user_id' => Auth::user()->id ?? "0",
                    'product_id' => $request->product_id,
                    'design_image' => 'cart_images/' . $fileName,
                    'price' => $request->price,
                    'quantity' => $quantity,
                    'qr_code_image' => isset($request->qr_code_id) ? $QrImageFileName : NULL,
                    'qr_code_image_url' => isset($request->qr_code_id) ? 'qr_code_images/' . $QrImageFileName : NULL,
                    'qr_code_id' => isset($request->qr_code_id) ? $request->qr_code_id : NULL,
                ]
            );
        } else {
            $product = Product::where("id", $request->product_id)->first();
            Cart::insert([
                'user_id' => Auth::user()->id ?? "0",
                'product_id' => $request->product_id,
                'design_image' => 'headstoneImages/' . $product->image,
                'price' => $product->min_price,
                'quantity' => $quantity,
                'qr_code_image' => isset($request->qr_code_id) ? $QrImageFileName : NULL,
                'qr_code_image_url' => isset($request->qr_code_id) ? 'qr_code_images/' . $QrImageFileName : NULL,
                'qr_code_id' => isset($request->qr_code_id) ? $request->qr_code_id : NULL,
            ]);
        }
    }

    public function cart()
    {
        $dataArr = Cart::where("user_id", Auth::user()->id)->get();
        $grandTotalArr = [];
        foreach ($dataArr as $data) {
            $productDetail = Product::where("id", $data->product_id)->first();
            $data->name = $productDetail->name;
            $grandTotalArr[] = ((float)str_replace('$', '', $data->price)) * $data->quantity;
        }

        $grandTotal =  array_sum($grandTotalArr);

        return view('cart')->with(compact('dataArr', 'grandTotal'));
    }

    public function deleteCartItem(Request $request)
    {
        Cart::where('id', $request->item_id)->delete();
    }

    public function updateCart(Request $request)
    {
        $quantity = $request->quantity;
        if ($quantity == 0 && $quantity == "") {
            $quantity = 1;
        }
        $dataArr = Cart::where("id", $request->item_id)->update([
            'quantity' => $quantity
        ]);
        return true;
    }

    public function checkout()
    {
        $shipping_addresses = ShippingAddress::where('user_id', Auth::user()->id)->orderBy('is_default', 'DESC')->get();
        return view('checkout')->with(compact('shipping_addresses'));
    }
    public function aboutUs()
    {
        return view('about-us');
    }
    public function contactUs()
    {
        return view('contact-us');
    }
    public function headstoneHistory()
    {
        return view('headstone-history');
    }
    public function questionsToAskACemetry()
    {
        return view('/resources/questions-to-ask-a-cemetry');
    }
    public function frequentlyAskedQuestions()
    {
        return view('/resources/frequently-asked-questions');
    }
    public function photos()
    {
        return view('/resources/photos');
    }
    public function stoneColor()
    {
        return view('/resources/stone-color');
    }

    public function endearment()
    {
        return view('/resources/endearment');
    }

    public function getArtwork()
    {
        $artworks = DB::table('artworks')->get();
        return $artworks;
    }

    public function getCliparts()
    {
        $data = array();
        $data['angels'] = $this->getClipartCategory('angels');
        $data['animals'] = $this->getClipartCategory('animals');
        $data['aquatic'] = $this->getClipartCategory('aquatic');
        $data['automobiles'] = $this->getClipartCategory('automobiles');
        $data['banners'] = $this->getClipartCategory('banners');
        $data['bibles'] = $this->getClipartCategory('bibles');
        $data['birds'] = $this->getClipartCategory('birds');
        $data['borders'] = $this->getClipartCategory('borders');
        $data['buildings'] = $this->getClipartCategory('buildings');
        $data['catholic'] = $this->getClipartCategory('catholic');
        $data['children'] = $this->getClipartCategory('children');
        $data['christian'] = $this->getClipartCategory('christian');
        $data['crosses'] = $this->getClipartCategory('crosses');
        $data['emblems'] = $this->getClipartCategory('emblems');
        $data['floral'] = $this->getClipartCategory('floral');
        $data['jesus'] = $this->getClipartCategory('jesus');
        $data['jewish'] = $this->getClipartCategory('jewish');
        $data['marriage'] = $this->getClipartCategory('marriage');
        $data['symbols'] = $this->getClipartCategory('symbols');
        $data['saints'] = $this->getClipartCategory('saints');
        $data['roses'] = $this->getClipartCategory('roses');
        $data['rosaries'] = $this->getClipartCategory('rosaries');
        $data['mary'] = $this->getClipartCategory('mary');
        $data['dogs'] = $this->getClipartCategory('dogs');
        $data['cats'] = $this->getClipartCategory('cats');
        $data['boats'] = $this->getClipartCategory('boats');
        $category['category'] = $data;
        return $category;
    }

    public function getClipartCategory($category)
    {
        $cliparts = DB::table('cliparts')->where('category', $category)->get();
        return $cliparts;
    }

    public function getClipartCategories()
    {
        $cliparts = DB::table('cliparts')->distinct()->pluck('category');
        return $cliparts;
    }

    /*** Get Purchased QR Code ***/
    public function getMyQr()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $user = User::find($user_id);
            $qrcodes = $user->qrcodeDetails;
            foreach ($qrcodes as $key => $value) {
                $url = url('qr-detail-view') . '/' . $value->id;
                // Generate the QR code
                $qrCode = QrCode::size(250)->margin(2)->generate($url);
                $value->qrcode = $qrCode;
            }
        } else {
            $qrcodes = array();
        }
        return $qrcodes;
    }



    public function testimonial()
    {
        $testimonials =  DB::table('testimonials')->get();
        return view('testimonial')->with(compact('testimonials'));
    }

    public function epitaphs()
    {
        return view('/resources/epitaphs');
    }

    public function fonts()
    {
        $fonts = DB::table('fonts')->get();
        return view('/resources/fonts')->with(compact('fonts'));
    }


    public function clipart($type = null)
    {
        $category = $this->getClipartCategories();
        $data = $this->getClipartCategory($type);
        return view('clipart')->with(compact('data', 'category', 'type'));
    }
}
