<?php

namespace App\Http\Controllers;

use App\Events\oneChatevent;
use App\Models\appointmentInfo;
use App\Models\User;
use App\Models\oneChat;
use App\Models\Comment;
use App\Models\engCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use PharIo\Manifest\Url;

class index extends Controller
{
    public function showindex(){
       $city = array ( 0 => 'Islamabad', 1 => 'Ahmed Nager', 2 => 'Ahmadpur East', 3 => 'Ali Khan', 4 => 'Alipur', 5 => 'Arifwala', 6 => 'Attock', 7 => 'Bhera', 8 => 'Bhalwal', 9 => 'Bahawalnagar', 10 => 'Bahawalpur', 11 => 'Bhakkar', 12 => 'Burewala', 13 => 'Chillianwala', 14 => 'Chakwal', 15 => 'Chichawatni', 16 => 'Chiniot', 17 => 'Chishtian', 18 => 'Daska', 19 => 'Darya Khan', 20 => 'Dera Ghazi', 21 => 'Dhaular', 22 => 'Dina', 23 => 'Dinga', 24 => 'Dipalpur', 25 => 'Faisalabad', 26 => 'Fateh Jhang', 27 => 'Ghakhar Mandi', 28 => 'Gojra', 29 => 'Gujranwala', 30 => 'Gujrat', 31 => 'Gujar Khan', 32 => 'Hafizabad', 33 => 'Haroonabad', 34 => 'Hasilpur', 35 => 'Haveli', 36 => 'Lakha', 37 => 'Jalalpur', 38 => 'Jattan', 39 => 'Jampur', 40 => 'Jaranwala', 41 => 'Jhang', 42 => 'Jhelum', 43 => 'Kalabagh', 44 => 'Karor Lal', 45 => 'Kasur', 46 => 'Kamalia', 47 => 'Kamoke', 48 => 'Khanewal', 49 => 'Khanpur', 50 => 'Kharian', 51 => 'Khushab', 52 => 'Kot Adu', 53 => 'Jauharabad', 54 => 'Lahore', 55 => 'Lalamusa', 56 => 'Layyah', 57 => 'Liaquat Pur', 58 => 'Lodhran', 59 => 'Malakwal', 60 => 'Mamoori', 61 => 'Mailsi', 62 => 'Mandi Bahauddin', 63 => 'mian Channu', 64 => 'Mianwali', 65 => 'Multan', 66 => 'Murree', 67 => 'Muridke', 68 => 'Mianwali Bangla', 69 => 'Muzaffargarh', 70 => 'Narowal', 71 => 'Okara', 72 => 'Renala Khurd', 73 => 'Pakpattan', 74 => 'Pattoki', 75 => 'Pir Mahal', 76 => 'Qaimpur', 77 => 'Qila Didar', 78 => 'Rabwah', 79 => 'Raiwind', 80 => 'Rajanpur', 81 => 'Rahim Yar', 82 => 'Rawalpindi', 83 => 'Sadiqabad', 84 => 'Safdarabad', 85 => 'Sahiwal', 86 => 'Sangla Hill', 87 => 'Sarai Alamgir', 88 => 'Sargodha', 89 => 'Shakargarh', 90 => 'Sheikhupura', 91 => 'Sialkot', 92 => 'Sohawa', 93 => 'Soianwala', 94 => 'Siranwali', 95 => 'Talagang', 96 => 'Taxila', 97 => 'Toba Tek', 98 => 'Vehari', 99 => 'Wah Cantonment', 100 => 'Wazirabad', 101 => 'Badin', 102 => 'Bhirkan', 103 => 'Rajo Khanani', 104 => 'Chak', 105 => 'Dadu', 106 => 'Digri', 107 => 'Diplo', 108 => 'Dokri', 109 => 'Ghotki', 110 => 'Haala', 111 => 'Hyderabad', 112 => 'Islamkot', 113 => 'Jacobabad', 114 => 'Jamshoro', 115 => 'Jungshahi', 116 => 'Kandhkot', 117 => 'Kandiaro', 118 => 'Karachi', 119 => 'Kashmore', 120 => 'Keti Bandar', 121 => 'Khairpur', 122 => 'Kotri', 123 => 'Larkana', 124 => 'Matiari', 125 => 'Mehar', 126 => 'Mirpur Khas', 127 => 'Mithani', 128 => 'Mithi', 129 => 'Mehrabpur', 130 => 'Moro', 131 => 'Nagarparkar', 132 => 'Naudero', 133 => 'Naushahro Feroze', 134 => 'Naushara', 135 => 'Nawabshah', 136 => 'Nazimabad', 137 => 'Qambar', 138 => 'Qasimabad', 139 => 'Ranipur', 140 => 'Ratodero', 141 => 'Rohri', 142 => 'Sakrand', 143 => 'Sanghar', 144 => 'Shahbandar', 145 => 'Shahdadkot', 146 => 'Shahdadpur', 147 => 'Shahpur Chakar', 148 => 'Shikarpaur', 149 => 'Sukkur', 150 => 'Tangwani', 151 => 'Tando Adam', 152 => 'Tando Allahyar', 153 => 'Tando Muhammad', 154 => 'Thatta', 155 => 'Umerkot', 156 => 'Warah', 157 => 'Abbottabad', 158 => 'Adezai', 159 => 'Alpuri', 160 => 'Akora Khattak', 161 => 'Ayubia', 162 => 'Banda Daud', 163 => 'Bannu', 164 => 'Batkhela', 165 => 'Battagram', 166 => 'Birote', 167 => 'Chakdara', 168 => 'Charsadda', 169 => 'Chitral', 170 => 'Daggar', 171 => 'Dargai', 172 => 'Darya Khan', 173 => 'dera Ismail', 174 => 'Doaba', 175 => 'Dir', 176 => 'Drosh', 177 => 'Hangu', 178 => 'Haripur', 179 => 'Karak', 180 => 'Kohat', 181 => 'Kulachi', 182 => 'Lakki Marwat', 183 => 'Latamber', 184 => 'Madyan', 185 => 'Mansehra', 186 => 'Mardan', 187 => 'Mastuj', 188 => 'Mingora', 189 => 'Nowshera', 190 => 'Paharpur', 191 => 'Pabbi', 192 => 'Peshawar', 193 => 'Saidu Sharif', 194 => 'Shorkot', 195 => 'Shewa Adda', 196 => 'Swabi', 197 => 'Swat', 198 => 'Tangi', 199 => 'Tank', 200 => 'Thall', 201 => 'Timergara', 202 => 'Tordher', 203 => 'Awaran', 204 => 'Barkhan', 205 => 'Chagai', 206 => 'Dera Bugti', 207 => 'Gwadar', 208 => 'Harnai', 209 => 'Jafarabad', 210 => 'Jhal Magsi', 211 => 'Kacchi', 212 => 'Kalat', 213 => 'Kech', 214 => 'Kharan', 215 => 'Khuzdar', 216 => 'Killa Abdullah', 217 => 'Killa Saifullah', 218 => 'Kohlu', 219 => 'Lasbela', 220 => 'Lehri', 221 => 'Loralai', 222 => 'Mastung', 223 => 'Musakhel', 224 => 'Nasirabad', 225 => 'Nushki', 226 => 'Panjgur', 227 => 'Pishin valley', 228 => 'Quetta', 229 => 'Sherani', 230 => 'Sibi', 231 => 'Sohbatpur', 232 => 'Washuk', 233 => 'Zhob', 234 => 'Ziarat', );
       if(Auth::check()){  
        $user = Auth::user()->role;
        $userstatus = Auth::user()->status;     
        if($user == 'admin'){
                            return redirect(RouteServiceProvider::ADMIN);
        }elseif($user == 'enge'){
                if($userstatus == 0){
                        dd('Your request go to Admin');
                }else{
                    return redirect(RouteServiceProvider::ENGE);
                }                
        }else{
               return view('newpanel.newpanelview');
        } 
    }else{
        // $eng_type = engCategory::get('engrcategory');
    //    $json_type = json_encode($eng_type);
        // return view('newpanel.newpanelview')->with(['engtype'=>$eng_type]);
        return view('newpanel.newpanelview');
        // return view('loginview.loginpageview');
    }
    }
    public function sessionsearchengineer(Request $res){
        if(session()->has('searchengrpage')){
            session()->forget('sessionsearchengineer');
            session()->forget('sessionsearchengineer_catid');
            session()->forget('sessionsearchengineer_page');
            session()->put('sessionsearchengineer',$res->routename);
            session()->put('sessionsearchengineer_catid',$res->pathparameter);
            session()->put('sessionsearchengineer_page',$res->subpage);
            return response()->json('yes');
        }else{
            session()->put('sessionsearchengineer',$res->routename);
            session()->put('sessionsearchengineer_catid',$res->pathparameter);
            session()->put('sessionsearchengineer_page',$res->subpage);
            return response()->json('yes');
        }
    }
    public function engineersearch(Request $res){
       
        //  $res->validate([
        //     'cityname' => ['required'],
        //     'date' => ['required'],
            
        // ]);
        //    $engineer_count = User::where('role','enge')->where('city',$res->cityname)->count();
            $categoryname = engCategory::find($res->id);
            $engr = User::where('role','enge')->where('engrcategoryid',$res->id)->paginate(10);
           
            $totalengr = User::where('role','enge')->where('engrcategoryid',$res->id)->count();
            return view('searchengineer.searchengineerview')->with(['engr'=>$engr,'tlengr'=>$totalengr,'cate_name'=>$categoryname,'category_id'=>$res->id]);
            // ->with(['enge'=>$engineer,'enge_count'=>$engineer_count,'cityname'=>$res->cityname,'engcategory'=>$res->date]);
    }
    public function registerformshow(Request $res){
        // dd($res->city_name);
        return view('auth.register')->with(['city_name'=>$res->city_name,'eng_type' =>$res->eng_type]);
    }
    public function showuserpanel(){
       
    //    $eng_type = engCategory::get('category');
    // return view('newpanel.newpanelview')->with(['engtype'=>$eng_type]);
    // dd(Route::current());
      return view('newpanel.newpanelview');
}
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function viewprofileeng(Request $res){
        if(session()->has('cmt_engrid')){
            $engr_id = session()->get('cmt_engrid');
           
        }else{
            $engr_id = $res->userid;
          
        }
        // dd(User::where('id',$res->userid)->get());
        $value = Auth::user()->id;
        $engr = User::with([ 'comment' => function($q) use($value){
            $q->where('clientid', '=',$value); // '=' is optional
           
        }])->where('id', $engr_id)->get()->toArray(); 
        
        // dd(json_encode()); 
        $object = (object) $engr[0];

      
        return view('engineerprofile.engineerprofileview')->with(['engr'=>$object]);
    //     try{
           
    //     }catch (\Exception $e) {
    //          dd($e);
    // }
        
    }
    public function register_show(){
        return view('registerpage.registerpageview');
    }
    public function register_form(){
        return redirect()->back();
    }
    public function booking(Request $res){
       
        $engr = User::find($res->bookingid);
        return view('booking.bookingpageview')->with('engr',$engr);
    }
     public function proceed(Request $res){
        
        if(Auth::check()){
            if(session()->has('path')){
                if(session()->has('date')){
                    session()->forget('date');
                    session()->put('date',$res->date);
                }else{
                    session()->put('date',$res->date);
                }
                return redirect()->route('proceed');
            }else{
                return redirect()->route('home');
            }
           
        }else{
            if(session()->has('date')){
                session()->forget('date');
                session()->put('date',$res->date);
            }else{
                session()->put('date',$res->date);
            }
           
            return view('loginview.loginpageview');
        }
    }
    public function loginproceed(){
        if(session()->has('path')){
            return view('proceedtopay.proceedpageview');
        }else{
            if(Auth::check()){
                return redirect()->route('userfrontpageview');
            }else{
                return redirect()->route('home');
            }
        }
    }
    public function commentmessage(Request $res){
        // $res->validate([
        //     'comment'=>'required'
        // ]);
       $engrdata = User::find($res->engr_id);
       $servicesrating = ($res->rating == null)?0:$res->rating;
       $responserating = ($res->responserating == null)?0:$res->responserating;
            if(Auth::user()->role == 'user'){
                $savecmt = Comment::create([
                    'clientid'=>Auth::user()->id,
                    'engrid'=>$res->engr_id,
                    'comment'=>$res->msg_cmt,
                    'service'=>$servicesrating,
                    'response'=>$responserating,
                ]);
                if($savecmt){
                    session()->put('cmt_engrid',$res->engr_id);
                    return redirect()->route('viewprofileeng');
                    // return view('engineerprofile.engineerprofileview')->with(array('msg'=>'Successfully save your comment','engr'=>$engrdata));
                   
                }else{
                    return view('engineerprofile.engineerprofileview')->with(array('msg'=>'Not save your comment','engr'=>$engrdata));

                }
              
            }
        
    }
     public function clientsearchengr(){ 
        $engr = User::where('role','enge')->paginate(5);
        return view('client.searchengr.searchengepageview')->with('engr',$engr);
    }
    public function conformorder(Request $res){
       $clientid = Auth::user()->id;
       $checkres = appointmentInfo::where('engrid',$res->engr_id)->where('clientid',$clientid)->where('clientstatus',0)->count();
       if($checkres > 0){
        $ress = appointmentInfo::create([
            'engrid'=>$res->engr_id,
            'clientid'=>$clientid,
            'meetingdate'=>$res->engrdate,
            'bookingfee'=>$res->bookingfee,
            'consultingfee'=>$res->consultingfee,
            'tlprice'=>$res->totalfee,
            'paymentmethod'=>$res->payment_radio,
           ]);
           if($ress){
            session()->put('conformengrid',$res->engr_id);
            session()->put('conformmeetingdate',$res->engrdate);
            return redirect()->route('conformorderpage');
           }
       }else{
        $ress = appointmentInfo::create([
            'engrid'=>$res->engr_id,
            'clientid'=>$clientid,
            'meetingdate'=>$res->engrdate,
            'bookingfee'=>$res->bookingfee,
            'consultingfee'=>$res->consultingfee,
            'tlprice'=>$res->totalfee,
            'paymentmethod'=>$res->payment_radio,
           ]);
           if($ress){
            session()->put('conformengrid',$res->engr_id);
            session()->put('conformmeetingdate',$res->engrdate);
            return redirect()->route('conformorderpage');
           }
       }
       
    }
    public function conformorderpage(){
        if(session()->has('conformengrid')){
            return view('client.successbooking.bookingpageview');
        }else{
            return redirect()->route('clientprofile');
        }
    }
    public function fetchorderinfo(appointmentInfo $id){
        $engrinfo = getuser($id->engrid);
        $clientinfo = getuser($id->clientid);
        $engrcategory = getcategoryname($engrinfo->engrcategoryid);
        $dataarray = [$id,$engrinfo,$clientinfo,$engrcategory];
        return response()->json( $dataarray);
    }
     public function clientprofile(){ 
        $order = appointmentInfo::paginate(10);
        return view('client.clientprofile.clientprofile')->with('order',$order);
    }
     public function clientprofilesetting(){ 
        return view('client.profilesetting.clientprofilepageview');
    }
     public function engineerprofile(){ 
        return view('client.profilesetting.clientprofilepageview');
    }
     public function clientchangepassword(){ 
        return view('client.changepassword.changepassword');
    }
     public function conformemailpage(){ 
        return view('conform_email.conformemailpage');
    }
    public function onegetchatmsg(Request $res){
        $getmessages = oneChat::where([['senderid',$res->senderid],['reciverid',$res->reciverid]])->orwhere([['reciverid',$res->senderid],['senderid',$res->reciverid]])->get();
        return response()->json($getmessages);
    }
    public function fetchrole(Request $res){
        $user = User::find($res->id);
        return response()->json($user->role);
    }
    public function send_message(Request $res){
        if(Auth::user()->role == 'user'){
            $ress = oneChat::create([
                'clientid'=>$res->senderid,
                'engrid'=>$res->reciverid,
                'senderid'=>$res->senderid,
                'reciverid'=>$res->reciverid,
                'message'=>$res->message,
            ]);
        }else{
            $ress = oneChat::create([
                'clientid'=>$res->reciverid,
                'engrid'=>$res->senderid,
                'senderid'=>$res->senderid,
                'reciverid'=>$res->reciverid,
                'message'=>$res->message,
            ]);
        }
       
        if($res){
            event(new oneChatevent($res->senderid,$res->reciverid,$res->message));
            return ['success'=>true];
        }
    }
     public function conformemailcode(Request $res){ 
       
        if($res->conformemail == Auth::user()->emailcode){
            User::where('id',Auth::user()->id)->update(['emailstatus'=>1]);
           return redirect(RouteServiceProvider::HOME);
        }
        else{
            return redirect()->back();
        }
    }
    public function searchspecificcategory(Request $res){
        $specific_engr = User::where('role','enge')->where('status',1)->where('emailstatus',1)->where('engrcategoryid',$res->id)->get();
        $count_tl = count($specific_engr);
        return response()->json(['data'=>$specific_engr,'tlcount'=>$count_tl]);
    }
}
