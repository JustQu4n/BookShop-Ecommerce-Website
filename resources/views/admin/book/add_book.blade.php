@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sách mới
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('book.addPost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sách  : </label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{old('name')}}">
                            @error('name')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tác giả: </label>
                            <input type="text" class="form-control" name="author" id="exampleInputEmail1" value="{{old('author')}}">
                            @error('author')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá  : </label>
                            <input type="text" class="form-control" name="price" id="exampleInputEmail1" value="{{old('price')}}">
                            @error('price')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nhà xuất bản : </label>
                            <input type="text" class="form-control" name="publisher" id="exampleInputEmail1" value="{{old('publisher')}}">
                            @error('publisher')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Năm xuất bản : </label>
                            <input type="number" class="form-control" name="year" min="1900" max="2022" id="exampleInputEmail1" value="{{old('year')}}">
                            @error('year')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số trang: </label>
                            <input type="number" class="form-control" name="total_page" min="1" id="exampleInputEmail1" value="{{old('total_page')}}">
                            @error('total_page')
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
                            <label for="exampleInputPassword1">Mô tả sách:</label>
                            <textarea class="form-control" id="editor1"  name="book_desc">
                                {{old('book_desc')}}
                            </textarea>

                            @error('book_desc')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sách:</label>
                            <textarea class="form-control" id="editor2"  name="book_content">
                                {{old('book_content')}}
                            </textarea>

                            @error('book_content')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                    

                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục</label>
                            @php
                                $list_categories = getCategory();
                            @endphp
                                    
                            <select class="form-control input-sm m-bot15" name='book_category'>
                                @foreach ($list_categories as $category)
                                    <option value="{{$category->id}}" {{old('book_category')==$category->id?'selected="true"':false}}>{{$category->name}}</option>
                                @endforeach
                            </select>

                            @error('book_category')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Thương hiệu </label>
                            @php
                                $list_brands = getBrands();
                            @endphp
                                    
                            <select class="form-control input-sm m-bot15" name='book_brand'>
                                @foreach ($list_brands as $brand)
                                    <option value="{{$brand->id}}" {{old('book_brand')==$brand->id?'selected="true"':false}}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                            @error('book_brand')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Hiển thị</label>
                            <select class="form-control input-sm m-bot15" name='book_status'>
                                <option value="0" {{old('book_status')==0?'selected="true"':false}} >Ẩn</option>
                                <option value="1" {{old('book_status')==1?'selected="true"':false}}>Hiện</option>                            
                            </select>

                            @error('brand_status')
                                <p style="color:red; ">{{$message}}</p>
                            @enderror
                        </div>

                            <button type="submit" class="btn btn-info" name="add_category">Thêm sách mới  </button>
                            
                        </div>
                       
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection