<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;


require_once 'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
        //test
        if($input = Input::all()){
            $code = new \code;
            $_code = $code->get();


            if(strtoupper($input['code']) != $_code)
            {

                return back()->with('msg', 'Wrong Verification Code');
            }



            $user = User::first();

            if($user->user_name == $input['user_name'] && Crypt::decrypt($user->user_pass) == $input['user_pass']){
                session(['user' => $user]);
                return redirect('admin/index');
            }
            else{
                return back()->with('msg', 'Wrong Username or Password');
            }


        }
        else{
            //session(['user'=>null]);
            return view('admin.login');
        }
    }

//    public function crypt()
//    {
//        $str = 'asdf1234';
//        $str_p = Crypt::encrypt($str);
//
//        echo $str_p;
//        echo '<br/>';
//        echo Crypt::decrypt($str_p);
//
//    }

    public function code()
    {
        $code = new \Code;
        $code->make();
    }

    public function quit()
    {
        session(['user' => null]);
        return redirect('admin/login');
    }

}
