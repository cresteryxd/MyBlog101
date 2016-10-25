<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    //modify password for admin
    public function pass()
    {
        if($input = Input::all()){
            $rules = [
                'password' => 'required|between:6,20|confirmed',
            ];

            $message = [
                'password.required' => 'New Password Cannot be void!',
                'password.between' => 'New Password Must between 6 and 20!',
                'password.confirmed' => 'New Password Not match!',
            ];

            $validator = Validator::make($input, $rules, $message);
            if($validator->passes())
            {
                $user = User::first();
                $_password = Crypt::decrypt($user->user_pass);
                if ($input['password_o'] == $_password){
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->withErrors("Successfully Done!");
                }else{
                    return back()->withErrors("Wrong Password");

                }
            }else{
//               dd($validator->errors()->all());

                return back()->withErrors($validator);
            }
        }
        else{
            return view('admin.pass');
        }

    }
}
