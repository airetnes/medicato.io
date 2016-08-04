<?php

namespace App\Providers;

use App\Message;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer(['user.main', 'admin.messages', 'admin.message', 'user.message', 'user.profile'], function($view){
            $view->with('CountNewMessage', count(Message::CountNewMessage()));
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
