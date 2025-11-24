<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class UserController extends Controller
{
    function user_list()
    {
        return user::all();
    }

    function add_user(Request $request)
    {
        dd ($request);
        $rules = array(
            "name" => "required | min:2 | max:10",
            "email" => "required | email"

        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return $validation->errors();
        } else {
            $add_user = new User();
            $add_user->name = $request->name;
            $add_user->email = $request->email;
            $add_user->password = bcrypt(value: $request->password);
        }
        if ($add_user->save()) {
            return ["result" => "User Added"];
        } else {
            return ["result" => "User Not Added"];
        }
    }
    function update_user(Request $request, $id)
    {
        $rules = array(
            "name" => "nullable| min:2 | max:10",
            "email" => "nullable| email"

        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return $validation->errors();
        }
        $validated = $validation->validated();
        $add_user = User::find($id);
        if ($add_user->update($validated))    {
            return ["result" => "User Updated Added"];
        } else {
            return ["result" => "User Not Update"];
        }
    }

    function delete_user($id)
    {
        $user = User::destroy($id);
        if ($user) {
            return ["result" => " user record deleted"];
        } else {
            return ["result" => " user record not deleted"];
        }
    }
}
