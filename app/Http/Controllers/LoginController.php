<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $data = $request->all();
        $acc = Account::where('email', $data['email'])->first();
        if ($acc != null){
            if (Hash::check($data['password'], $acc->password)){
                do {
                    $token = str_random(32);
                } while (Auth::where("token", $token)->first() instanceof Auth);
                $auth = [
                    'acc_id'=> $acc->id,
                    'token'=> $token,
                    'created_at'=> time(),
                    'timeout'=> time()+864000
                ];
                if (Auth::create($auth)) return response()->json( $auth, 200);
                return response( "Error", 501);
            }
            else return response( "Password is incorrect", 501);
        }
        else return response( "Account dosen't exists", 501);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function begin(Request $request){
        $token = $request->header('Token');
        $data = $this->check_token($token);
        if ($data['status'] == true){
            return response( $data['data'], 200);
        }
        else{
            return response( $data['messages'], 501);
        }
    }
}
