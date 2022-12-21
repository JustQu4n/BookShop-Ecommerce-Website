@extends('admin_layout')

@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sự kiện mới
                </header>
                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="{{ route('event.updatePost', ['id' => $blog->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài viết </label>
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                                    value="{{ $blog->title }}">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" class="form-control" name="image_blog" value="{{ $blog->image }}">
                                <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tác giả </label>
                                <input type="text" class="form-control" name="author" id="exampleInputEmail1"
                                    value="{{ $blog->author }}">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung bài viết:</label>
                                <textarea class="form-control" id="editor1" name="content_blog">
                                {{ $blog->content }}
                            </textarea>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung ngắn</label>
                                <textarea class="form-control" id="editor1" name="content_blog">
                                {{ $blog->content_blog_short }}
                            </textarea>

                            </div>

                            <button type="submit" class="btn btn-info" name="add_category">Cập nhật </button>
                    </div>

                    </form>
                </div>

        </div>
        </section>
    </div>
    </div>
@endsection
