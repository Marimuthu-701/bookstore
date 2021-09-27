<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Sanctum;

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
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        Validator::extend('password_rules', function($attribute, $value, $parameters, $validator) {
            $err = 0;
            $result = false;
            /*if(preg_match("/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/u",$value)){
                $result = true;
            }*/
            if (!preg_match('/(?:(?:0(?=1)|1(?=2)|2(?=3)|3(?=4)|4(?=5)|5(?=6)|6(?=7)|7(?=8)|8(?=9)){5,}\d|(?:a(?=b)|b(?=c)|c(?=d)|d(?=e)|e(?=f)|f(?=g)|g(?=h)|h(?=i)|i(?=j)|j(?=k)|k(?=l)|l(?=m)|m(?=n)|n(?=o)|o(?=p)|p(?=q)|q(?=r)|r(?=s)|s(?=t)|t(?=u)|u(?=v)|v(?=w)|w(?=x)|x(?=y)|y(?=z)){5,}\w|(.)\1{5,})/is', $value)){
                $result = true;
            }
            return $result;
        });

        Validator::extend('alpha_spaces', function($attribute, $value) {
            return preg_match('/^[\pL\s]+$/u', $value);
        });
    }
}
