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
        $this->loadRoutesFrom(dirname(__DIR__) . '\routes\web.php');
        $this->loadViewsFrom(dirname(__DIR__) . '\views', 'user_discount');
        $this->loadMigrationsFrom(dirname(__DIR__) . '/migrations');

//        $slider = DB::table('admin_menus')->where('name', 'Скидки пользователей')->first();
//        if (is_null($slider)) {
//            DB::table('admin_menus')->insert([
//                'admin_menu_id' => 5,
//                'name' => 'Скидки пользователей',
//                'icon' => 'fa-percent',
//                'route' => 'admin.user_discount.edit',
//                'o' => 0
//            ]);
//        }

    }

    public function register()
    {
//        $this->app->singleton(TypeButton::class, function(){
//            return new BuildButton(Type::with('product_type')->get());
//        });
    }

}