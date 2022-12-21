@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sự kiện mới
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('event.addPost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sự kiện </label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{old('name')}}">
                            @error('name')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian bắt đầu</label>
                            <input type="time" class="form-control" name="start_hours" value="{{old('start_hours')}}">
                            @error('start_hours')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày bắt đầu</label>
                            <input type="date" class="form-control" name="start_time" value="{{old('start_time')}}">
                            @error('start_time')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian kết thúc</label>
                            <input type="time" class="form-control" name="end_hours" value="{{old('end_hours')}}">
                            @error('end_hours')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày kết thúc</label>
                            <input type="date" class="form-control" name="end_time" value="{{old('end_time')}}">
                            @error('end_time')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ </label>
                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value="{{old('address')}}">
                            @error('address')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sự kiện:</label>
                            <textarea class="form-control" id="editor1"  name="event_desc">
                                {{old('event_desc')}}
                            </textarea>

                            @error('event_desc')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Hiển thị</label>
                            <select class="form-control input-sm m-bot15" name='status'>
                                <option value="0" {{old('status')==0?'selected="true"':false}} >Ẩn</option>
                                <option value="1" {{old('status')==1?'selected="true"':false}}>Hiện</option>                            
                            </select>

                            @error('status')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                            <button type="submit" class="btn btn-info" name="add_category">Thêm  sự kiện mới  </button>                           
                        </div>
                       
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection