<?php

namespace App\Http\Controllers\Ysh;

use App\Http\Controllers\Controller;
use App\Models\RoomClass;
use Illuminate\Http\Request;
//房间类别管理
class RoomInfoController extends Controller
{
    //获取房间类别信息
    public function getRoomInfo(){
        $res=RoomClass::getRoomInfo();
        return $res != null ?
            response()->success(200, '获取成功!', $res) :
            response()->fail(100, '获取失败!');

        echo "获取房间类别信息";

    }

    //修改房间类别信息
    public function UpdateRoomInfo(Request $request){
        $id1=$request->input('class_id1');
        $id2=$request->input('class_id2');
        $id3=$request->input('class_id3');
        $class1=$request->input('class1');
        $class2=$request->input('class2');
        $class3=$request->input('class3');
        $price1=$request->input('price1');
        $price2=$request->input('price2');
        $price3=$request->input('price3');
        $info1=array("id"=>$id1,'class'=>$class1,'price'=>$price1);
        $info2=array("id"=>$id2,'class'=>$class2,'price'=>$price2);
        $info3=array("id"=>$id3,'class'=>$class3,'price'=>$price3);

        $res=RoomClass::UpdateRoomInfo($info1);
        $res2=RoomClass::UpdateRoomInfo($info2);
        $res3=RoomClass::UpdateRoomInfo($info3);
        response()->success(200, '修改成功!');
    }
}
