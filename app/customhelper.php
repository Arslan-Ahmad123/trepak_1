<?php
// function destroysession(){
//     if(session()->has('viewprofileeng')){
//         echo "such session ";
//     }
// }
// echo destroysession();


function getcategoryname($id){
    $res = \App\Models\engCategory::find($id);
    return $res->engrcategory;
}

function getengrprice($id){
    $res = \App\Models\User::find($id);
    return $res->pricerange;
}
function getuser($id){
    $res = \App\Models\User::find($id);
    return $res;
}
function getallcategory(){
    $res = \App\Models\engCategory::get();
    return $res;
}
function getuseronline(){
    return (Illuminate\Support\Facades\Auth::check())?Illuminate\Support\Facades\Auth::user()->id:'';
}
function changestrtoarr($string){
    $res = explode(',',$string);
    return $res;
}


?>