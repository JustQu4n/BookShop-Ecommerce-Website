@extends('admin_layout')

@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('category.addPost') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục: </label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                    value="{{ old('name') }}"placeholder="Tên danh mục ....">
                                @error('name')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục:</label>
                                <textarea class="form-control" id="editor1" name="category_desc" id="exampleInputPassword1"
                                    placeholder="Mô tả danh mục...">
                                {{ old('category_desc') }}
                            </textarea>

                                @error('category_desc')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thị:</label>
                                <select class="form-control input-sm m-bot15" name='category_status'>
                                    <option value="0" {{ old('category_status') == 0 ? 'selected="true"' : false }}>Ẩn
                                    </option>
                                    <option value="1" {{ old('category_status') == 1 ? 'selected="true"' : false }}>Hiện
                                    </option>
                                </select>

                                @error('category_status')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info" name="add_category">Thêm danh mục sản phẩm</button>

                    </div>

                    </form>
                </div>
        </div>
        </section>

    </div>
    </div>
@endsection
