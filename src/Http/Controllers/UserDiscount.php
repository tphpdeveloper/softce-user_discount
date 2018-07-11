<?php
/**
 * Created by PhpStorm.
 * User: UserCE
 * Date: 11.07.2018
 * Time: 11:05
 */

namespace Softce\UserDiscount\Http\Controllers;


use Illuminate\Http\Request;
use Mage2\Ecommerce\Http\Controllers\Admin\AdminController;
use Mage2\Ecommerce\Models\Database\Category;
use Mage2\Ecommerce\Models\Database\User;

class UserDiscount extends AdminController
{

    public function __construct()
    {
        $this->middleware(['admin.auth']);
    }

    public function index(Request $request)
    {
        $user = User::find($request->user);

        if(is_null($user)){
            return redirect()->route('admin.user.index');
        }

        $categories = Category::all();
        $user->categories()->sync($categories);

        return view('user_discount::edit')
            ->with('user', $user)
            ->with('categories', $user->categories);

    }

    public function change(Request $request)
    {
        $user = User::find($request->user);

        $row = $user->categories()->where('category_id', $request->category_id)->first();
        if($row->pivot->discount != $request->discount) {
            $res = $user->categories()->updateExistingPivot($request->category_id, ['discount' => $request->discount]);
        }
        else{
            $res = true;
        }

        if($res){
            return response()->json(['status' => 'ok']);
        }else {
            return response()->json(["status" => "error", "message" => "Что то пошло не так!\nИли скидка уже записана."]);
        }
    }
}