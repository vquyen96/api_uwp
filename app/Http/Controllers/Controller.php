<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function check_token($token){
        $auth = Auth::where('token', $token)->first();
        if ($auth != null){
            if (time() > $auth->created_at && time() < $auth->timeout){
                return ['data' => $auth->acc , 'status'=>true];
            }
            else return ['messages' => 'Token time-expired', 'status'=>false];
        }
        else return ['messages' => 'Token dosen\'t exists', 'status'=>false];
    }
}
