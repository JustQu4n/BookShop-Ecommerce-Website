@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục  loại sản phẩm 
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('category.updatePost', ['id' => $id])}}" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục: </label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{$category->name}}"placeholder="Tên danh mục ....">
                            @error('name')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea  class="form-control" id="editor1"  name="category_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục...">
                                {!! $category->description !!}
                            </textarea>

                            @error('category_desc')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                           
                        </div>
                            <button type="submit" class="btn btn-info" name="update_category">Cập nhật danh mục </button>
                            
                        </div>
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection