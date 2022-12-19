<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('onechat', function ($user) {
  Log::info('channel is working');
    return Auth::check();
});
Broadcast::channel('groupmessage', function ($user) {

    // if(session()->has('storegroupid')){
    //     $groupid = \App\Models\groupInfo::find(session()->get('storegroupid'));
    //     $groupuser = changestrtoarr($groupid->groupmember);
    //      return (in_array(Auth::user()->id,$groupuser));
    // }else{
    //     return true;
    // }
    return Auth::check();
  
});


