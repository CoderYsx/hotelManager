<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class CheckRecord extends Model
{
    public $timestamps = false;
    protected $table = 'check_record';
    protected $primaryKey = 'id';
    protected $guarded = [];

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


    //获取入住总人次
    public static function getUserCount(){
        $number = CheckRecord::count('id');
        return $number;
  }

    public static function Add($time,$cust,$room){
        $rs = CheckRecord::create([
           'time_id'=>$time,
           'cust_id'=>$cust,
           'room_id'=>$room
        ]);
        return $rs;
    }

    public static function deleteid($id){
        $rs = CheckRecord::where('cust_id',$id)
            ->get();
        foreach ($rs as $a){
           $time = $a['time_id'];
        }
        CheckRecord::where('cust_id',$id)->delete();
        return $time;

    }

    //获取可入住房间
    Public static function getSureClass(){
        $room_id = DB::table('check_record')
            ->Join('time_record', 'time_record.time_id', '=', 'check_record.time_id')
            ->where('time_record.out_time', '<', now())
            ->select('check_record.room_id')
            ->get();
        return $room_id;
    }
}
