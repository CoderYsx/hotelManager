<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class CheckRecord extends Model
{
    public $timestamps = false;
    protected $table = 'check_record';
    protected $primaryKey = 'id';

    //获取入住次数
    public static function getAllRoom()
    {
        try {

            $res=DB::table('room3')->get();
            return $res;
        } catch (Exception $e) {
            die($e->getMessage());
            return null;
        }
    }
    //通过房间号查询类别号
    public static function getClassid($room_id){
        try{
            $classid=DB::table('room_info')->distinct()->where('room_id',$room_id)->select('class_id')->get();
            return $classid;

        }catch (\Exception $e){
            die($e->getMessage());
            return null;
        }

    }

    public static function updateInfo($a,$name){

         try{
             $res=DB::table('room_class')->where('class_id',$a)->update(['name' => $name]);
             return $res;
         }catch (Exception $e){
             die($e->getMessage());
             return null;

         }

    }

    public static function getSearchRoom($id){
        try{

            $res=DB::table('room3')->where('room_id',$id)->first();
            return $res;

        }catch (Exception $e){
            die($e->getMessage());
            return null;

        }

    }


}
