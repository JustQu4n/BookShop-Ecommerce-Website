@extends('admin_layout')

@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sự kiện kiện mới
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('event.updatePost', ['id' => $event->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sự kiện </label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                    value="{{ $event->name }}">
                                @error('name')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" class="form-control" name="image" value={{ $event->image }}>
                                <input type="hidden" name="old_image" value="{{ $event->image }}">
                                <img src="{{ asset("uploads/events/$event->image") }}"
                                    alt=""style="width: 150px; height: 150px;">
                                @error('image')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thời gian bắt đầu</label>
                                <input type="time" class="form-control" name="start_hours"
                                    value="{{ $event->start_hours }}">
                                @error('start_hours')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="start_time"
                                    value="{{ date('Y-m-d', strtotime($event->start_time)) }}">
                                @error('start_time')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Thời gian kết thúc</label>
                                <input type="time" class="form-control" name="end_hours"
                                    value="{{ $event->end_hours }}">
                                @error('end_hours')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="end_time"
                                    value="{{ date('Y-m-d', strtotime($event->end_time)) }}">
                                @error('end_time')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ </label>
                                <input type="text" class="form-control" name="address" id="exampleInputEmail1"
                                    value="{{ $event->address }}">
                                @error('address')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sự kiện:</label>
                                <textarea class="form-control" id="editor1" name="event_desc">
                                {{ $event->description }}
                            </textarea>

                                @error('event_desc')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" name='status'>
                                    <option value="0" {{ $event->status == 0 ? 'selected="true"' : false }}>Ẩn</option>
                                    <option value="1" {{ $event->status == 1 ? 'selected="true"' : false }}>Hiện</option>
                                </select>

                                @error('status')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info" name="add_category">Cập nhật kiện mới </button>
                    </div>

                    </form>
                </div>

        </div>
        </section>
    </div>
    </div>
@endsection
