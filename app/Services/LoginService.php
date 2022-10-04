<?php
namespace App\Services;

Class LoginService {
public function storeSignupdata($request){
if($request->role == 'User'){
return $request;
}else{
    return $request;
}
}
}