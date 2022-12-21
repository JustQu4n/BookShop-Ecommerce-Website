<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\City;
use App\Models\Feeship;
use  App\Models\Province;
use  App\Models\Wards; 

class DeliveryController extends Controller
{
    //

    public function show_delivery() {
        $feeship = Feeship::orderBy('id', 'ASC') -> get();
        $output = '<div class="table-responsive">
                        <table class="table table-bordered">
                            <thread>
                                <tr>
                                    <th>Tên tỉnh/thành phố</th>
                                    <th>Tên quận/huyện</th>
                                    <th>Tên xã/phường</th>
                                    <th>Phí vận chuyển</th>
                                </tr>
                            </thread>
                       
                        <tbody>'; 


            foreach ($feeship as $key => $fee) {
                $output .= '<tr>
                                <td>'. $fee->city->city_name . '</td>
                                <td>'.$fee->province->province_name.'</td>
                                <td>'.$fee->wards->wards_name .'</td>
                                <td contenteditable class="edit-feeship" data-id="'. $fee->id. '">'. number_format($fee->fees_ship, 0, ',', '.').'</td>
                            </tr>';
            }
            $output.='</tbody>
                    </table>
                    </div>';

            return $output;
    }

    public function index() {
        $list_cities = City::orderBy('city_id', 'ASC') -> get(); 
        
        return view('admin.delivery.add_delivery', compact('list_cities'));
    }

    public function select_delivery(Request $request) {
        $data = $request->all();       
       
        if($data) {
            $output = "";
            if($data['action'] == 'city') {
                $list_provinces = Province::where('city_id', $data['code_id']) -> orderBy('province_id', "ASC") -> get();
                $output .= '<option value="">'. '--Chọn quận/huyện--'. '</option>';
                foreach ($list_provinces as $province) {
                    $output .= '<option value="'. $province->province_id. '">'. $province ->province_name.'</option>';
                }
              

            } else {
                $list_wards = Wards::where('province_id', $data['code_id']) -> orderBy('wards_id', "ASC") -> get();
                $output .= '<option value="">'. '--Chọn xã/phường--'. '</option>';

                foreach ($list_wards as $wards) {
                    $output .= '<option value="'. $wards->wards_id. '">'. $wards ->wards_name.'</option>';
                }

            }
        }
        return $output;
       
    }

    public function save_delivery(Request $request) {
      
        $data = $request-> all();
        if($data) {
            Feeship::create($data);
        }
       
    }

    // edit_delivery 
    public function edit_delivery(Request $request) {
        $data = $request-> all();
        $fees_ship = Feeship::find($data['id']);
        $fees_value = trim($data['fees_ship'], '.'); 
        $fees_ship -> fees_ship = $fees_value; 
        $fees_ship->save();
        return $fees_value;
    }
}
