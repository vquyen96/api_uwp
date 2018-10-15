<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function createSong(Request $request){
        $token = $request->header('Token');
        $check = $this->check_token($token);
        if ($check['status']){
            $data = $request->all();
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s', time());
            $data['updated_at'] = $data['created_at'];
            $data['acc_id'] = $check['data']->id;
            Song::create($data);
            return response()->json( $data, 200);
        }
        else{
            return response()->json( $check['messages'], 501);
        }
    }
    public function listSong(){
        $songs = Song::orderByDesc('id')->get();
        return response()->json( $songs, 200);
    }
    public  function yourSong(Request $request){
        $token = $request->header('Token');
        $check = $this->check_token($token);
        if ($check['status']){
            $id = $check['data']->id;
            $songs = Song::where('acc_id', $id)->orderByDesc('id')->get();
            return response()->json( $songs, 200);
        }
        else{
            return response()->json( $check['messages'], 501);
        }
    }
    public function postDetailSong(Request $request){
        $data = $request->all();
        $token = $request->header('Token');
        $check = $this->check_token($token);
        if ($check['status']){
            $song = Song::find($data[id]);
            if ($song->update($data)){
                return response()->json( $song, 200);
            }else{
                return response()->json( 'Cập nhật bị lỗi', 501);
            }
        }
        else{
            return response()->json( $check['messages'], 501);
        }
    }
//    public function postDetailSong(Request $request){
//
//    }
}
