@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('brand.updatePost', ['id' => $id])}}" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu : </label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{$brand->name}}"placeholder="Tên danh mục ....">
                            @error('name')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea class="form-control"  name="brand_desc" id="editor1">
                                {!! $brand->description !!}
                            </textarea>

                            @error('brand_desc')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                           
                        </div>
                            <button type="submit" class="btn btn-info" name="update_brand">Cập nhật thương hiệu </button>
                            
                        </div>
                       
                       
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection