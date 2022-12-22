@extends('admin_layout')

@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Thêm slider mới
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-slider')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên ảnh </label>
                                <input type="text" class="form-control" name="slider_name" id="exampleInputEmail1"
                                    value="{{ old('name') }}">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" class="form-control" name="slider_image">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thị:</label>
                                <select class="form-control input-sm m-bot15" name='slider_status'>
                                    <option value="1" >Hiện
                                    </option>
                                    <option value="0" >Ẩn
                                    </option>
                                  
                                </select>
                            </div>
                            <div>

                                <button type="submit" class="btn btn-success" name="add_slider">Save</button>
                            </div>

                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên ảnh</th>
                        <th>Ảnh</th>
                        <th>Hiển thị</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slider as $item)
                        <tr>
                            {{--  <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>  --}}
                            <td>{{ $item->name }}</td>
                            <td><img src="{{asset('uploads/sliderImage/'.$item->image)}}" alt="" width="150" height="80"></td>
                            <td><span class="text-ellipsis">
                                <?php 
                                if ($item->tatus == 0)
                                {
                                ?>
                                    <a href="{{URL::to('/unactive-slide/'.$item->id)}}" ><button class="btn btn-danger">Ẩn</button>
                                    <?php
                                }  else{
                                ?>
                                <a href="{{URL::to('/active-slide/'.$item->id)}}"><button class="btn btn-primary">Hiện</button>
                                    <?php
                                }
                                ?>
                                </span>
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('delete-slider/'.$item->id)}}" class="btn btn-danger">Xoá</a>
                            </td>
                            
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
