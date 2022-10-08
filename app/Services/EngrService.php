<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\engrDocumentation;

class EngrService {

    public function storeEngr_documentation(engrDocumentation $request){
      
        $cvname = $request->engr_cv->getClientOriginalName();
        $cv_custom_name = time() . '.' . $cvname;
        $request->pic->move(public_path() . '/engr_cv/',  $cv_custom_name);
        $logoin_user = Auth::user()->id;
        $user = User::where('id',$logoin_user)->update([
            'cv'=>$cv_custom_name,
            'workplacetype'=>$request->workplace,
            'jobtype'=>$request->jobtype,
            'about'=>$request->description,
            'docsstatus'=>1
        ]);
        return $user?'yes':'no';
    }
}