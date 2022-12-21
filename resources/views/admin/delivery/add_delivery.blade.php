@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm phí vận chuyển
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form>
                            @csrf             
                        <div class="form-group">
                            <label for="exampleInputFile">Chọn tỉnh/thành phố</label>
                            <select class="form-control input-sm m-bot15 choose city" name="city" id="city">
                                <option value=""  >--Chọn tỉnh/thành phố--</option>
                                @foreach ($list_cities as $city )
                                    <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                @endforeach                           
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Chọn quận/huyện</label>
                            <select class="form-control input-sm m-bot15 choose province" name="province" id="province">
                                <option value=""  >--Chọn quận/huyện--</option>      
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Chọn xã/phường</label>
                            <select class="form-control input-sm m-bot15" name="wards" id="wards">
                                <option value=""  >--Chọn xã/phường--</option>                        
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phí vận chuyển: </label>
                            <input type="text" class="form-control feeship" name="feeship" id="exampleInputEmail1">            
                        </div>
                        
                            <button type="button" id="add"  class="btn btn-info add" name="add_category">Thêm thương phí vận chuyển </button>
                        </div>                     
                    </form>
                    </div>

                    <div class="load-delivery">

                    </div>

                </div>
            </section>
            
    </div>
</div>
@endsection