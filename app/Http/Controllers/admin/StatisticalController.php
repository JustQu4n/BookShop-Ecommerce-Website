<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistical; 

class StatisticalController extends Controller
{
    //

    public function statistical_order(Request $request) {
        
        $date_start = $request-> date_start; 
        $date_end = $request-> date_end;    
        $get = Statistical::whereBetween('order_date', [$date_start, $date_end]) -> orderBy('order_date', 'ASC') -> get();
        foreach ($get as $key => $val) {
            $char_data[] = array(
                'period' =>$val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity,
 
            ); 
        }

        $result =  json_encode($char_data);
        return $result ; 
     
    }

    public function filter(Request $request) {

        $filter = $request-> filter;
        $date_start  = null ;     
        $date_end = date('Y-m-d'); 
        switch ($filter) {
            case '1': // filter follower 7 day 
                $date_start = date('Y-m-d', strtotime('-7 days')); 
                
                break;
            case '2': // filter follower last month
                $date_start = date('Y-m-d', strtotime('first day of last month')); 
                $date_end = date('Y-m-d', strtotime('last day of last month')); 
                break;

            case '3': // filter follow this month 
                $date_start = date('Y-m-d', strtotime('first day of this month'));
                break;

            case '4': // filter follow 365 date
                $date_start = date('Y-m-d', strtotime('-365 days')); 
                break;

            default:
                # code...
                break;
        }
        $get = Statistical::whereBetween('order_date', [ $date_start , $date_end ]) -> orderBy('order_date', 'ASC') -> get();
        foreach ($get as $key => $val) {
            $char_data[] = array(
                'period' =>$val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity,
 
            ); 
        }

        $result =  json_encode($char_data);
        return $result ; 

    }
}
