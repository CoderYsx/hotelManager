<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class RoomClass extends Model
{
    public $timestamps = false;
    protected $table = 'room_class';
    protected $primaryKey = 'class_id';

    public static function getRoomInfo()
    {
        try {
            $res = DB::table('room_class')
                ->select('class_id', 'name', 'price')
                ->get();
            return $res;
        } catch (Exception $e) {
            die($e->getMessage());
            return null;
        }


    }

    public static function UpdateRoomInfo($info)
    {

        $res = DB::table('room_class')->where('class_id', $info['id'])
            ->update(['name' => $info['class'],
                'price' => $info['price'],
            ]);
        return $res;


    }
}
