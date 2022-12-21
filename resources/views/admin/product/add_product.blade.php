@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('product.addPost')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm </label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{old('name')}}"placeholder="Tên danh mục ....">
                            @error('name')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá </label>
                            <input type="text" class="form-control" name="price" id="exampleInputEmail1" value="{{old('price')}}"placeholder="Tên danh mục ....">
                            @error('price')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh </label>
                            <input type="file" class="form-control" name="image" id="exampleInputEmail1" value="{{old('price')}}"placeholder="Tên danh mục ....">
                            @error('image')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm </label>
                            <textarea style="resize: none; row=8" class="form-control"  name="product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục...">
                                {{old('product_desc')}}
                            </textarea>

                            @error('product_desc')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm </label>
                            <textarea style="resize: none; row=8" class="form-control"  name="product_content" id="exampleInputPassword1" placeholder="Mô tả danh mục...">
                                {{old('product_content')}}
                            </textarea>

                            @error('product_content')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Chọn thương hiệu </label>
                            <select class="form-control input-sm m-bot15" name='product_brand'>
                                @php
                                    $brands = listBrand();
                                @endphp
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    
                                @endforeach     
                            </select>

                            @error('product_brand')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Chọn danh mục </label>
                            <select class="form-control input-sm m-bot15" name='product_category'>
                               @php
                                   $categories = listCategory();
                               @endphp
                               @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                   
                               @endforeach 
                            </select>

                            @error('product_category')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hiển thị </label>
                            <select class="form-control input-sm m-bot15" name='product_status'>
                                <option value="1" {{old('brand_status')==0?'selected="true"':false}} >Ẩn</option>
                                <option value="0" {{old('brand_status')==1?'selected="true"':false}}>Hiện</option>          
                            </select>

                            @error('product_status')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                            <button type="submit" class="btn btn-info" name="add_product">Thêm sản phẩm</button>
                            
                        </div>
                       
                       
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection