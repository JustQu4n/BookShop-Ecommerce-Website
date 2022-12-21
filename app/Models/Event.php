<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory;

    // get Evetn  
    static function getEvent($id){
        $event = DB::table('event') -> where('id', $id) ->  first(); 
        return $event;
    }
    static  function getListEventsActicve() {
        $list_events = DB::table('event') -> where('status', 1) -> orderBy('start_time', 'DESC') ->get();
        return $list_events;
    }
    static  function getListEvents() {
        $list_events = DB::table('event') -> get();
        return $list_events;
    }
    // get getNameImage
    static  function getNameImage($id) {
        $nameImage = DB::table('event') -> where('id', $id) -> select('image') -> first();
        return $nameImage;
    }

    static  function addEvent($data) {
        $add = DB::table('event') -> insert($data);
        return $add;
    }

    // active
    static  function active($id) {
        $active = DB::table('event') -> where('id', $id) -> update(['status' => 1]);
        return $active;
    }
    static  function unActive($id) {
        $active = DB::table('event') -> where('id', $id) -> update(['status' => 0]);
        return $active;
    }

    // remove event 
    static function removeEvent($id) {
        $del = DB::table('event') -> where('id', $id) -> delete();
        return $del;
    }

    // update event 
    static  function editEvent($data, $id) {
        $edit = DB::table('event') -> where('id', $id) -> update($data); 
        return $edit;
    }
}
