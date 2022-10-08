<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class EngrService {

    public function storeEngr_documentation($request){
        // $request->file("file")->getClientOriginalExtension();
        $cvnameext = $request->engr_cv->getClientOriginalExtension();
        if($cvnameext == 'pdf'){
            $cvname = $request->engr_cv->getClientOriginalName();
            $cv_custom_name = time() . '.' . $cvname;
            $request->engr_cv->move(public_path() . '/engr_cv/',  $cv_custom_name);
        }else{
            return 'Plase select pdf file';
        }
       
        $logoin_user = Auth::user()->id;
        $user = User::where('id',$logoin_user)->update([
            'cv'=>$cv_custom_name,
            'workplacetype'=>$request->workplace,
            'jobtype'=>$request->jobtype,
            'about'=>$request->description,
            'docsstatus'=>1
        ]);
         if($user)
                  $returnresponse =  'yes';
                    else
                    $returnresponse ='no';
        return $returnresponse;
    }
}