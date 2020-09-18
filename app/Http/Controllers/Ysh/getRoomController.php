<?php

namespace App\Http\Controllers\Ysh;

use App\Http\Controllers\Controller;
use App\Models\CheckRecord;
use Illuminate\Http\Request;
use App\Models\RoomClass;
//客房管理
class getRoomController extends Controller
{
    //获取某个状态下的所有客房信息
    public function getRoom(){

        echo "获取某个状态下的所有客房信息";
        $res=CheckRecord::getAllRoom();
        dd($res);
        return $res != null ?
            response()->success(200, '获取成功!', $res) :
            response()->fail(100, '获取失败!');

    }

    //获取当前修改客房信息
    public function getUpdateInfo(Request $request){

        $id= $request->input("room_id");
        $res =CheckRecord::getSearchRoom($id);
        //dd($res);
        return $res != null ?
            response()->success(200, '获取成功!', $res) :
            response()->fail(100, '获取失败!');


    }


    //修改客房状态
    public function updateInfo(Request $request){
        $info=$request->all();
        $id=$info['room_id'];
        $name=$info['name'];

        $res=CheckRecord::updateInfo($id,$name);
        if($res==1){
            response()->success(200, '修改成功!');
        }else{
            response()->fail(100, '修改失败!');
        }

        echo "修改客房状态";



    }
    //获取单个客房信息

    public function getSearchRoom(Request $request){
        $id=$request->input('room_id');

        $res =CheckRecord::getSearchRoom($id);
        //dd($res);
        return $res != null ?
            response()->success(200, '获取成功!', $res) :
            response()->fail(100, '获取失败!');

    }

}
