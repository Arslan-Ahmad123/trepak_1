<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videoConsaltant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;




class VideoConsaltantController extends Controller
{
    public function bookvideo(Request $res){
       
        //  $res->validate([
        //     'client_date'=>['required'],
        //     'client_time'=>['required'],
        //     'mobile' => ['required','regex:/^[^a-z]*$/i'],
        // ]);
        // $rules = ['client_date' => 'required','client_time' => 'required','mobile' => 'required|regex:/^[^a-z]*$/i'];

        // $result = Validator::make($res->all(), $rules);

        // if($result->fails())
        // {
        //     return back()->withErrors($result)->with(['userid'=>'2','bookingid'=>'2']);
        // }
        $bookvideoinstance = videoConsaltant::create([
            'user_id'=>$res->client_id_video,
            'engr_id'=>$res->engr_id_video,
            'client_phone'=>$res->mobile,
            'client_date'=>$res->client_date,
            'client_time'=>$res->client_time,   
        ]);
        if($bookvideoinstance){
            return redirect()->route('indexpage')->with(['video_info'=>'Your video Consultantion Info send to engineer']);
        }
    }

    public function clientvideoconsultant(){
        $resun =videoConsaltant::where('user_id',Auth::user()->id)->where('engr_reply',NULL)->where('client_reply',NULL)->where('orderstatus',0)->paginate(10);
        
        $engr_reply =videoConsaltant::where('user_id',Auth::user()->id)->where('orderstatus',0)->where('engr_reply','<>',NULL)->where('client_reply',NULL)->paginate(10);
        
        $client_reply =videoConsaltant::where('user_id',Auth::user()->id)->where('orderstatus',0)->where('engr_reply','<>',NULL)->where('client_reply','<>',NULL)->paginate(10);
    
        $rescon =videoConsaltant::where('user_id',Auth::user()->id)->where('orderstatus',1)->paginate(10);
        
        return view('clientvideoconsul.clientvideoviewpage')->with(['res_un_c'=>$resun,'res_c'=>$rescon,'engr_reply'=>$engr_reply,'client_reply'=>$client_reply]);
    }
}
