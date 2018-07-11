<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Mage2\Ecommerce\Models\Database\Category;
use Mage2\Ecommerce\Models\Database\User;


class CreateUserCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->float('discount', 4, 1)->unsigned()->nullable();
            $table->timestamps();
        });

        $users = User::all();
        $categories = Category::all();

        foreach($users as $user){
            $data = [];
            foreach($categories as $category){
                $data[] = [
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                ];
            }
            DB::table('user_category')->insert($data);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_category');
    }
}
