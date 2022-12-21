@extends('admin_layout')

@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sách
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('book.updatePost', ['id' => $id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sách: </label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                    value="{{ $book->name }}">
                                @error('name')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sách: </label>
                                <input type="text" class="form-control" name="author" id="exampleInputEmail1"
                                    value="{{ $book->author }}">
                                @error('author')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá : </label>
                                <input type="text" class="form-control" name="price" id="exampleInputEmail1"
                                    value="{{ $book->price }}">
                                @error('price')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhà xuất bản : </label>
                                <input type="text" class="form-control" name="publisher" id="exampleInputEmail1"
                                    value="{{ $book->publisher }}">
                                @error('publisher')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Năm xuất bản: </label>
                                <input type="number" class="form-control" name="year" id="exampleInputEmail1"
                                    value="{{ $book->year }}">
                                @error('year')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Số trang: </label>
                                <input type="number" class="form-control" name="total_page" id="exampleInputEmail1"
                                    value="{{ $book->total_page }}">
                                @error('total_page')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" class="form-control" name="image">
                                <input type="hidden" name="old_image" value={{ $book->image }}>
                                <img src="{{ asset("uploads/books/$book->image") }}"
                                    alt=""style="width: 150px; height: 150px;">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sách:</label>
                                <textarea class="form-control" id="editor1" name="book_desc">
                                {!! $book->description !!}
                            </textarea>

                                @error('book_desc')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sách:</label>
                                <textarea class="form-control" id="editor2" name="book_content">
                                    {!! $book->content !!}
                            </textarea>

                                @error('book_content')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Danh mục</label>
                                @php
                                    $list_categories = getCategory();
                                @endphp

                                <select class="form-control input-sm m-bot15" name='book_category'>
                                    @foreach ($list_categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $book->category_id ? 'selected="true"' : false }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('book_category')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Thương hiệu </label>
                                @php
                                    $list_brands = getBrands();
                                @endphp

                                <select class="form-control input-sm m-bot15" name='book_brand'>
                                    @foreach ($list_brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id == $book->brand_id ? 'selected="true"' : false }}>
                                            {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('book_brand')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" name='book_status'>
                                    @if ($book->status == 0)
                                        <option value="0" selected="true">Ẩn</option>
                                    @else
                                        <option value="1" selected="true">Hiện</option>
                                    @endif


                                </select>

                                @error('brand_status')
                                    <p style="color:red; ">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info" name="add_category">Cập nhật sách mới </button>
                    </div>
                    </form>
                </div>
        </div>
        </section>
    </div>
    </div>
@endsection
