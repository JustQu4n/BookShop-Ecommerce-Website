@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('brand.addPost') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu : </label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                    value="{{ old('name') }}"placeholder="Tên danh mục ....">
                                @error('name')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu:</label>
                                <textarea class="form-control" id="editor1" name="brand_desc">
                                {{ old('brand_desc') }}
                            </textarea>

                                @error('brand_desc')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" name='brand_status'>
                                    <option value="1" {{ old('brand_status') == 0 ? 'selected="true"' : false }}>Ẩn</option>
                                    <option value="0" {{ old('brand_status') == 1 ? 'selected="true"' : false }}>Hiện
                                    </option>
                                </select>

                                @error('brand_status')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info" name="add_category">Thêm thương hiệu sản phẩm
                            </button>

                    </div>

                    </form>
                </div>

        </div>
        </section>
    </div>
    </div>
@endsection
