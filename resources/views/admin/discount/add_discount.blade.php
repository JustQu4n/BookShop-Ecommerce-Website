@extends('admin_layout')

@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mã giảm giá mới
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('discount.addPost') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã code: </label>
                                <input type="text" class="form-control" name="code" id="exampleInputEmail1"
                                    value="{{ old('code') }}">
                                @error('code')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phần trăm giảm giá </label>
                                <input type="text" class="form-control" name="percent_discount" id="exampleInputEmail1"
                                    value="{{ old('percent_discount') }}">
                                @error('percent_discount')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày hết hạn : </label>
                                <input type="date" class="form-control" name="date_end" id="exampleInputEmail1"
                                    value="{{ old('date_end') }}">
                                @error('date_end')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Hiệu lực</label>
                                <select class="form-control input-sm m-bot15" name='status'>
                                    <option value="0" {{ old('status') == 0 ? 'selected="true"' : false }}>Không</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected="true"' : false }}>Có</option>
                                </select>
                                @error('status')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info" name="add_category">Thêm mã giảm giá mới </button>
                    </div>
                    </form>
                </div>
        </div>
        </section>
    </div>
    </div>
@endsection
