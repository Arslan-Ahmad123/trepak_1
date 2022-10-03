<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Blade::directive('usercheck', function () {
            $userstat =false;
            if(Auth::check()){
                if(Auth::user()->role == 'user'){
                    $userstat = true;
                   return '<?php  if(1){ ?>';
                }else{
                    return '<?php  if(0){ ?>';
                }
            }else{
                return '<?php  if(0){ ?>';
            }
        });
         Blade::directive('endusercheck', function () {
           return "<?php  } ?>";
        });

         Blade::directive('usernot', function () {
            // $userstatus =true;
            if(Auth::check()){
                if(Auth::user()->role == 'user'){
                    // $userstatus = false;
                   return '<?php  if(0){ ?>';
                }else{
                    return '<?php  if(1){ ?>';
                }
            }else{
                return '<?php  if(1){ ?>';
            }
        });
         Blade::directive('endusernot', function () {
           return "<?php  } ?>";
        });
    }
}
