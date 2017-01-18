<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('checkhash', function ($attribute, $value, $parameters, $validator) {
            $hash = md5(
                     Input::get('address') . ':'
                    .Input::get('card_month') . ':'
                    .Input::get('card_no') . ':'
                    .Input::get('card_year') . ':'
                    .Input::get('city') . ':'
                    .Input::get('cvv') . ':'
                    .Input::get('email') . ':'
                    .Input::get('first_name') . ':'
                    .Input::get('last_name') . ':'
                    .Input::get('phone') . ':'
                    .Input::get('state') . ':'
                    .Input::get('sum') . ':'
                    .Input::get('zip_code')
            );
            return $value == $hash;
        });
        
        Validator::replacer('checkhash', function ($message, $attribute, $rule, $parameters) {
            return 'Invalid hash';
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
