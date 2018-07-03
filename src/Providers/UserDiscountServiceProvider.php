<?php
/**
 * Created by PhpStorm.
 * User: UserCE
 * Date: 11.06.2018
 * Time: 14:46
 */

namespace Softce\UserDiscount\Providers;

use Illuminate\Support\ServiceProvider;


class UserDiscountServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/web.php');
        $this->loadViewsFrom(dirname(__DIR__) . '/views', 'user_discount');
        $this->loadMigrationsFrom(dirname(__DIR__) . '/migrations');
    }

    public function register()
    {

    }

}