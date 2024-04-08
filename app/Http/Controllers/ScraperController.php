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

class ScraperController extends Controller
{
    public function scrapClipart(Request $request)
    {
        $clipart_url = "https://www.honorlife.com/angels-clipart-emblems/";
        if (!empty($clipart_url)) {
            $client = new Client();
            $website = $client->request('GET', $clipart_url); // get html access of this url
            $html = $website->html();

            $website->filter('.page-template #page-container #et-main-area #main-content .status-publish .entry-content #emblem-display-wrapper #envira-gallery-wrap-tags_angels')->each(function ($node, $i) use (&$img) {
                $img[] =  $node->children('.envira-gallery-public')->html();
            });

            $dom = new DOMDocument();
            $dom->loadHTML('<?xml encoding="UTF-8">' . $img[0], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $srcArray = array();
            $imgElements = $dom->getElementsByTagName('img');
            foreach ($imgElements as $imgElement) {
                $srcArray['clipart'][] = $imgElement->getAttribute('src');
            }

            $count = count($srcArray['clipart']);
            for ($i = 0; $i < $count; $i++) {

                $url = $srcArray['clipart'][$i];
                $pathinfo = pathinfo($url);
                $testname = $pathinfo['filename'] . '.svg';


                // die($pathinfo['filename']);

                $image_name = (stristr($url, '?', true)) ? stristr($url, '?', true) : $url;
                $pos = strrpos($image_name, '/');
                $image_name = substr($image_name, $pos + 1);
                $extension = stristr($image_name, '.');
                if ($extension == '.jpg' || $extension == '.png' || $extension == '.gif' || $extension == '.jpeg' || $extension == '.svg') {
                    $testname = $image_name;
                }

                $imageUrl = $srcArray['clipart'][$i];
                $localFilePath = 'clipart/angel/' . $testname;

                $client = new GuzzleHttpClient();
                $response = $client->get($imageUrl, ['sink' => public_path('/' . $localFilePath)]); //save new images
                $imageSrcArray[] = $localFilePath;

                $ifExit = DB::table('cliparts')->where('category', 'angels')->where('title', $pathinfo['filename'])->get();
                if ($ifExit->count() == 0) {
                    $values = array('category' => 'angels', 'image' => $testname, 'title' => $pathinfo['filename']);
                    DB::table('cliparts')->insert($values);
                }
            }


            echo "<pre>";
            print_r($count);
            die;
        }
    }

    public function scraping(Request $request)
    {

        dd('Done');
        $client = new Client();
        $website = $client->request('GET', 'https://www.honorlife.com/western-headstone-design-idea-gallery/'); // get html access of this url
        $abc = $website->html();
        $img = [];
        $website->filter('div#envira-gallery-tags_dl_western')->each(function ($node, $i) use (&$img) {
            $img[] =  $node->html();
        });
        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $img[0], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $srcArray = array();
        $nameArray = array();
        $dataArr = array();

        // Find all the <img> tags with the class "attachment-shop_catalog"
        $imgElements = $dom->getElementsByTagName('img');
        foreach ($imgElements as $imgElement) {
            $srcArray['designImages'][] = $imgElement->getAttribute('src');
        }
        $imgElements = $dom->getElementsByTagName('a');
        foreach ($imgElements as $imgElement) {
            $nameArray['designName'][] = $imgElement->getAttribute('title');
        }

        // $imageFiles = File::files(public_path('honorlifeImages')); // Find old images
        // foreach ($imageFiles as $file) {
        //     File::delete(public_path('honorlifeImages/' . $file->getFilename())); // delete old images
        // }

        $count = count($srcArray['designImages']);
        for ($i = 0; $i < $count; $i++) {



            $imgName = "westernHeadstoneImage-" . $i . '.jpg';
            $imageUrl = $srcArray['designImages'][$i];
            $localFilePath = 'headstoneDesignImages/' . $imgName;

            $client = new GuzzleHttpClient();
            $response = $client->get($imageUrl, ['sink' => public_path('/' . $localFilePath)]); //save new images
            // $imageSrcArray[] = $localFilePath;




            $data = array(
                'type' => 'western',
                'image' => $imgName,
                'title' => $nameArray['designName'][$i],
            );

            $dataArr[] = $data;
        }
        // dd($dataArr);
        dd(DB::table('headstone_designs')->insert($dataArr));
        return response()->json($dataArr);














        dd('Under Process...');
        $client = new Client();
        $website = $client->request('GET', 'https://www.honorlife.com/engraving-fonts/'); // get html access of this url

        $img = [];
        $website->filter('div.envira-gallery-public.envira-gallery-1-columns.envira-clear.enviratope.envira-gallery-css-animations')->each(function ($node, $i) use (&$img) {
            $img[] =  $node->html();
            // dd($node->html());
        });
        // dd($img);

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $img[0], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $srcArray = array();
        $nameArray = array();
        $classArray = array();
        // $minPriceArray = array();
        // $maxPriceArray = array();
        // $dataArr = array();

        // Find all the <img> tags with the class "attachment-shop_catalog"
        $imgElements = $dom->getElementsByTagName('img');
        foreach ($imgElements as $imgElement) {
            $srcArray['productImages'][] = $imgElement->getAttribute('src');
        }
        // dump($srcArray);

        // Find all the <h2> tags
        $h2Elements = $dom->getElementsByTagName('a');
        foreach ($h2Elements as $h2Element) {
            $nameArray['productName'][] = $h2Element->getAttribute('title');
        }
        // dump($nameArray);


        $classElements = $dom->getElementsByTagName('div');
        $i = 0;
        $j = 1;
        foreach ($classElements as $key => $classElement) {
            if ($key == $i) {
                $value = str_replace('envira-gallery-item enviratope-item envira-gallery-item-' . $j . ' envira-tag-all', '', $classElement->getAttribute('class'));
                $classArray['fontClass'][] = str_replace('envira-tag-', 'filter-', $value);
                $i = $i + 6;
                $j++;
            }
        }
        // dd($classArray);

        // // Find all the <span> tags with the class "price"
        // $priceElements = $dom->getElementsByTagName('span');
        // foreach ($priceElements as $priceElement) {
        //     if ($priceElement->getAttribute('class') === 'price') {
        //         $minPriceArray['productMinPrice'][] = explode('–', $priceElement->textContent)[0];
        //         $maxPriceArray['productMaxPrice'][] = explode('–', $priceElement->textContent)[1];
        //     }
        // }
        // $imageFiles = File::files(public_path('honorlifeImages')); // Find old images
        // foreach ($imageFiles as $file) {
        //     File::delete(public_path('honorlifeImages/' . $file->getFilename())); // delete old images
        // }

        $count = count($srcArray['productImages']);
        // for ($i = 0; $i < $count; $i++) {



        //     $imgName = 'font-image-' . $i . '.jpg';
        //     $imageUrl = $srcArray['productImages'][$i];
        //     $localFilePath = 'font-images/' . $imgName;

        //     $client = new GuzzleHttpClient();
        //     $response = $client->get($imageUrl, ['sink' => public_path('/' . $localFilePath)]); //save new images
        //     // $imageSrcArray[] = $localFilePath;




        //     $data = array(
        //         'font_image' => $localFilePath,
        //         'font_name' => $nameArray['productName'][$i],
        //         'font_class' => $classArray['fontClass'][$i],
        //     );

        //     $dataArr[] = $data;
        // }
        // dd($dataArr);
        // dd(DB::table('fonts')->insert($dataArr));
        return response()->json($dataArr);
    }
}
