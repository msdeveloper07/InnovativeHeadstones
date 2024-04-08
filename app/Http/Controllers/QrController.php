<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qr;
use App\Models\QrImage;
use App\Models\QrVideo;
use App\Models\UserPlan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    // Method to show a form for creating a QR code
    public function createDetailPage()
    {
        return view('qr.create');
    }

    public function submitQrDetail(Request $request)
    {

        // echo"<pre>"; print_r($request->all());  die;

        // Validate the form data, including the file uploads
        // $request->validate([
        //     'first_name' => 'required|string|max:25',
        //     'uploadimages' => 'required|array', // Images should be an array
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Each image should be a valid image type and within the allowed file size
        //     'video.*' => 'mimetypes:video/*|max:50000', 
        // ]);

        $validator = Validator::make($request->all(), [
            'label' => 'required|string',
            'first_name' => 'required|string|max:25',
            'uploadimages' => 'required|array', // Images should be an array
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Each image should be a valid image type and within the allowed file size
            'video.*' => 'mimetypes:video/*|max:50000',
        ]);

        if ($validator->fails()) {
            $errors = $validator->messages();
            foreach ($errors->all() as $error) {
                return response()->json(['type' => 'error', 'message' => $error], 401);
            }
        }

        $user_id = Auth::id();
        $current = Carbon::now();

        //Store Userplan
        $user_plan = new UserPlan([
            'plan_id' => $request->plan_id,
            'user_id' => $user_id,
            'start_date' => $current,
            'created_at' => $current
        ]);
        $user_plan->save();

        //Save QR Detail
        $qr_detail = new Qr([
            'label' => $request->label,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'biography' => $request->biography,
            'user_plan_id' => $user_plan->id,
            'user_id' => $user_id,
            'audio_id' => $request->audio_id,
            'is_new' => $request->is_new
        ]);
        $qr_detail->save();


        if ($request->hasFile('profile_image')) {
            $qr = Qr::find($qr_detail->id);
            $image = $request->file('profile_image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->move(public_path('/qr_detail/profile'), $imageName);
            $qr->profile_image = $imageName;
            $qr->save();
        }

        if ($request->hasFile('bg_image')) {
            $qr = Qr::find($qr_detail->id);
            $image = $request->file('bg_image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->move(public_path('/qr_detail/bg'), $imageName);
            $qr->bg_image = $imageName;
            $qr->save();
        }


        // Handle the file uploads and save them to the public
        if ($request->hasFile('uploadimages')) {
            $img_file_keys_arr = explode(",", $request->img_file_keys);
            foreach ($request->file('uploadimages') as $key => $image) {
                if (in_array($key, $img_file_keys_arr)) {
                    $imageName = $image->getClientOriginalName();
                    $imagePath = $image->move(public_path('/qr_detail/images'), $imageName);
                    // Save the image into table
                    QrImage::create(['qr_id' => $qr_detail->id, 'image' => $imageName, 'image_url' => '/qr_detail/images/' . $imageName]);
                }
            }
        }

        // Handle the file uploads and save them to the public
        if ($request->hasFile('video')) {
            $vid_file_keys_arr = explode(",", $request->vid_file_keys);
            foreach ($request->file('video') as $key => $video) {
                if (in_array($key, $vid_file_keys_arr)) {
                    $videoName = $video->getClientOriginalName();
                    $videoPath = $video->move(public_path('/qr_detail/videos'), $videoName);
                    // Save the video into table
                    QrVideo::create(['qr_id' => $qr_detail->id, 'video' => $videoName, 'video_url' => '/qr_detail/videos/' . $videoName]);
                }
            }
        }

        return response()->json(['type' => 'success', 'message' => 'QR details successfully saved.', 'data' => $qr_detail->id], 200);
    }

    public function qrDetailView($id)
    {
        $url = url('qr-detail-view') . '/' . $id;
        // Generate the QR code
        $qrCode = QrCode::size(240)->generate($url);
        $qr = Qr::find($id);
        return view('qr.detailview', compact('qrCode', 'qr'));
    }
}
