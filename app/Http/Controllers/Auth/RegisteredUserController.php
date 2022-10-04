<?php

namespace App\Http\Controllers\Auth;



use App\Services\LoginService;
use App\Models\User;
use App\Events\conformemail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\signupEngineerRequest;


class RegisteredUserController extends Controller
{
   
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request,LoginService $loginService)
    {
       dd($loginService);
        // $loginService->storeSignupdata($request);
    //    if($request->role == 'user'){
          
    //     $email_code = rand(111111,999999);
    //     $longi = $request->longitude * 1E6;
    //     $lati = $request->latitude * 1E6;
        
    //     $image = $request->pic->getClientOriginalName();
    //     $saveimage = time().'.'.$image;
    //      $request->pic->move(public_path().'/engrphoto/',  $saveimage);
    //     // $dotpos =strpos($saveimage,'.');
    //     // dd(substr($saveimage,$dotpos+1,strlen($saveimage)));
    //     $user = User::create([
    //         'pic' => $saveimage,
    //         'fname' => $request->fname,
    //         'lname' => $request->lname,
    //         'mobile' => $request->mobile,
    //         'role' => $request->role,
    //         'address' => $request->address,
    //         'longitude' => $longi,
    //         'latitude' => $lati,
    //         'emailcode' => $email_code,
    //         'subcity'=>"Model Town",
    //         'city'=>"Gujranwala",
    //         'state'=>"punjab",
    //         'country'=> 'Pakistan',
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));
       

    //     Auth::login($user);
    //     Event(new conformemail($user));
    //     $user = Auth::user()->role;
    //     $userstatus = Auth::user()->status;        
    //     if($user == 'admin'){
    //         return redirect(RouteServiceProvider::ADMIN);
    //     }elseif($user == 'enge'){
    //         if($userstatus == 0){
    //             // dd('Your request go to Admin');
    //             return redirect(RouteServiceProvider::ENGE);
    //         }else{
    //             return redirect(RouteServiceProvider::ENGE);
    //         }                
    //   }else{
    //        return redirect(RouteServiceProvider::HOME);
    //   }

    //    }else{

    //         $request->validate([
    //         'pic' => ['required','image','mimes:jpeg,jpg,png'],
    //         'fname' => ['required', 'string', 'max:255'],
    //         'lname' => ['required', 'string', 'max:255'],
    //         'mobile' => ['required', 'string', 'max:255'],
    //         'address' => ['required', 'string', 'max:255'],
    //         'latitude' => ['required', 'string', 'max:255'],
    //         'longitude' => ['required', 'string', 'max:255'],
    //         'role' => ['required'],
    //         'education' => ['required'],
    //         'specialize' => ['required'],
    //         'experience' => ['required'],
    //         'currentcomp' => ['required'],
    //         'chargeperhour' => ['required'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);
    //     // if($request->role == 'user'){ 
    //     //     $cityname = $request->cityname;
    //     //     $emptype = $request->engtype;
    //     // }
    //     // $city = array ( 0 => 'Islamabad', 1 => 'Ahmed Nager', 2 => 'Ahmadpur East', 3 => 'Ali Khan', 4 => 'Alipur', 5 => 'Arifwala', 6 => 'Attock', 7 => 'Bhera', 8 => 'Bhalwal', 9 => 'Bahawalnagar', 10 => 'Bahawalpur', 11 => 'Bhakkar', 12 => 'Burewala', 13 => 'Chillianwala', 14 => 'Chakwal', 15 => 'Chichawatni', 16 => 'Chiniot', 17 => 'Chishtian', 18 => 'Daska', 19 => 'Darya Khan', 20 => 'Dera Ghazi', 21 => 'Dhaular', 22 => 'Dina', 23 => 'Dinga', 24 => 'Dipalpur', 25 => 'Faisalabad', 26 => 'Fateh Jhang', 27 => 'Ghakhar Mandi', 28 => 'Gojra', 29 => 'Gujranwala', 30 => 'Gujrat', 31 => 'Gujar Khan', 32 => 'Hafizabad', 33 => 'Haroonabad', 34 => 'Hasilpur', 35 => 'Haveli', 36 => 'Lakha', 37 => 'Jalalpur', 38 => 'Jattan', 39 => 'Jampur', 40 => 'Jaranwala', 41 => 'Jhang', 42 => 'Jhelum', 43 => 'Kalabagh', 44 => 'Karor Lal', 45 => 'Kasur', 46 => 'Kamalia', 47 => 'Kamoke', 48 => 'Khanewal', 49 => 'Khanpur', 50 => 'Kharian', 51 => 'Khushab', 52 => 'Kot Adu', 53 => 'Jauharabad', 54 => 'Lahore', 55 => 'Lalamusa', 56 => 'Layyah', 57 => 'Liaquat Pur', 58 => 'Lodhran', 59 => 'Malakwal', 60 => 'Mamoori', 61 => 'Mailsi', 62 => 'Mandi Bahauddin', 63 => 'mian Channu', 64 => 'Mianwali', 65 => 'Multan', 66 => 'Murree', 67 => 'Muridke', 68 => 'Mianwali Bangla', 69 => 'Muzaffargarh', 70 => 'Narowal', 71 => 'Okara', 72 => 'Renala Khurd', 73 => 'Pakpattan', 74 => 'Pattoki', 75 => 'Pir Mahal', 76 => 'Qaimpur', 77 => 'Qila Didar', 78 => 'Rabwah', 79 => 'Raiwind', 80 => 'Rajanpur', 81 => 'Rahim Yar', 82 => 'Rawalpindi', 83 => 'Sadiqabad', 84 => 'Safdarabad', 85 => 'Sahiwal', 86 => 'Sangla Hill', 87 => 'Sarai Alamgir', 88 => 'Sargodha', 89 => 'Shakargarh', 90 => 'Sheikhupura', 91 => 'Sialkot', 92 => 'Sohawa', 93 => 'Soianwala', 94 => 'Siranwali', 95 => 'Talagang', 96 => 'Taxila', 97 => 'Toba Tek', 98 => 'Vehari', 99 => 'Wah Cantonment', 100 => 'Wazirabad', 101 => 'Badin', 102 => 'Bhirkan', 103 => 'Rajo Khanani', 104 => 'Chak', 105 => 'Dadu', 106 => 'Digri', 107 => 'Diplo', 108 => 'Dokri', 109 => 'Ghotki', 110 => 'Haala', 111 => 'Hyderabad', 112 => 'Islamkot', 113 => 'Jacobabad', 114 => 'Jamshoro', 115 => 'Jungshahi', 116 => 'Kandhkot', 117 => 'Kandiaro', 118 => 'Karachi', 119 => 'Kashmore', 120 => 'Keti Bandar', 121 => 'Khairpur', 122 => 'Kotri', 123 => 'Larkana', 124 => 'Matiari', 125 => 'Mehar', 126 => 'Mirpur Khas', 127 => 'Mithani', 128 => 'Mithi', 129 => 'Mehrabpur', 130 => 'Moro', 131 => 'Nagarparkar', 132 => 'Naudero', 133 => 'Naushahro Feroze', 134 => 'Naushara', 135 => 'Nawabshah', 136 => 'Nazimabad', 137 => 'Qambar', 138 => 'Qasimabad', 139 => 'Ranipur', 140 => 'Ratodero', 141 => 'Rohri', 142 => 'Sakrand', 143 => 'Sanghar', 144 => 'Shahbandar', 145 => 'Shahdadkot', 146 => 'Shahdadpur', 147 => 'Shahpur Chakar', 148 => 'Shikarpaur', 149 => 'Sukkur', 150 => 'Tangwani', 151 => 'Tando Adam', 152 => 'Tando Allahyar', 153 => 'Tando Muhammad', 154 => 'Thatta', 155 => 'Umerkot', 156 => 'Warah', 157 => 'Abbottabad', 158 => 'Adezai', 159 => 'Alpuri', 160 => 'Akora Khattak', 161 => 'Ayubia', 162 => 'Banda Daud', 163 => 'Bannu', 164 => 'Batkhela', 165 => 'Battagram', 166 => 'Birote', 167 => 'Chakdara', 168 => 'Charsadda', 169 => 'Chitral', 170 => 'Daggar', 171 => 'Dargai', 172 => 'Darya Khan', 173 => 'dera Ismail', 174 => 'Doaba', 175 => 'Dir', 176 => 'Drosh', 177 => 'Hangu', 178 => 'Haripur', 179 => 'Karak', 180 => 'Kohat', 181 => 'Kulachi', 182 => 'Lakki Marwat', 183 => 'Latamber', 184 => 'Madyan', 185 => 'Mansehra', 186 => 'Mardan', 187 => 'Mastuj', 188 => 'Mingora', 189 => 'Nowshera', 190 => 'Paharpur', 191 => 'Pabbi', 192 => 'Peshawar', 193 => 'Saidu Sharif', 194 => 'Shorkot', 195 => 'Shewa Adda', 196 => 'Swabi', 197 => 'Swat', 198 => 'Tangi', 199 => 'Tank', 200 => 'Thall', 201 => 'Timergara', 202 => 'Tordher', 203 => 'Awaran', 204 => 'Barkhan', 205 => 'Chagai', 206 => 'Dera Bugti', 207 => 'Gwadar', 208 => 'Harnai', 209 => 'Jafarabad', 210 => 'Jhal Magsi', 211 => 'Kacchi', 212 => 'Kalat', 213 => 'Kech', 214 => 'Kharan', 215 => 'Khuzdar', 216 => 'Killa Abdullah', 217 => 'Killa Saifullah', 218 => 'Kohlu', 219 => 'Lasbela', 220 => 'Lehri', 221 => 'Loralai', 222 => 'Mastung', 223 => 'Musakhel', 224 => 'Nasirabad', 225 => 'Nushki', 226 => 'Panjgur', 227 => 'Pishin valley', 228 => 'Quetta', 229 => 'Sherani', 230 => 'Sibi', 231 => 'Sohbatpur', 232 => 'Washuk', 233 => 'Zhob', 234 => 'Ziarat', );
       
    //     $email_code = rand(111111,999999);
    //      $longi =$request->longitude * 1E6;
    //     $lati = $request->latitude * 1E6;
    //     // ImageManagerStatic::configure(['driver' => 'imagick']);
    //     $image = $request->pic->getClientOriginalName();
    //     // $resizeimg =  ImageManagerStatic::make($request->pic->getRealPath())->resize(200, 200);
    //      $saveimage = time().'.'.$image;
    //      $request->pic->move(public_path().'/engrphoto/',  $saveimage);
    //      $degreestartdate = $request->degreestart;
    //      $degreeenddate = $request->degreeend;
    //      $degreedate = $degreestartdate.'-'.$degreeenddate;
    //     // $dotpos =strpos($saveimage,'.');
    //     // dd(substr($saveimage,$dotpos+1,strlen($saveimage)));
    //     $user = User::create([
    //         'pic' => $saveimage,
    //         'fname' => $request->fname,
    //         'lname' => $request->lname,
    //         'mobile' => $request->mobile,
    //         'role' => $request->role,
    //         'address' => $request->address,
    //         'longitude' =>$longi,
    //         'latitude' => $lati,
    //         'emailcode' => $email_code,
    //         'subcity'=>"Model Town",
    //         'city'=>"Gujranwala",
    //         'state'=>"punjab",
    //         'country'=> 'Pakistan',
    //         'education' => $request->education,
    //         'university' => $request->university,
    //         'degreedate' => $degreedate,
    //         'specialization' => $request->specialize,
    //         'aboutme' => $request->aboutme,
    //         'experience' => $request->experience,
    //         'company' => $request->currentcomp,
    //         'pricerange' => $request->chargeperhour,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));
    //     // Event(new conformemail($user));

    //     Auth::login($user);
    //      Event(new conformemail($user));
    //    $user = Auth::user()->role;
    //    $userstatus = Auth::user()->status;        
    //    if($user == 'admin'){
    //         return redirect(RouteServiceProvider::ADMIN);
    //    }elseif($user == 'enge'){
    //         if($userstatus == 0){
    //             // dd('Your request go to Admin');
    //             return redirect(RouteServiceProvider::ENGE);
    //         }else{
    //             return redirect(RouteServiceProvider::ENGE);
    //         }                
    //   }else{
    //        return redirect(RouteServiceProvider::HOME);
    //   }

    //    }


       
    }
}
