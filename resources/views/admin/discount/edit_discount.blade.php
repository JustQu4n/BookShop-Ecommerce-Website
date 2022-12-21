@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật mã giảm giá
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('discount.updatePost', ['id' => $id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã code: </label>
                            <input type="text" class="form-control" name="code" id="exampleInputEmail1" value="{{$discount->code}}">
                            @error('code')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phần trăm giảm giá</label>
                            <input type="text" class="form-control" name="percent_discount" id="exampleInputEmail1" value="{{$discount->percent_discount}}">
                            @error('percent_discount')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày hết hạn  : </label>
                            <input type="date" class="form-control" name="date_end" id="exampleInputEmail1" value="{{$discount->date_end}}">
                            @error('date_end')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                            <button type="submit" class="btn btn-info">Cập nhật mã giảm giá  </button>
                        </div>                
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>
@endsection