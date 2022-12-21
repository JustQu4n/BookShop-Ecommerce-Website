@extends('admin_layout')

@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh mục thương hiệu
            </div>


            <div class="row w3-res-tb">
                <div class="my-3">
                    @php
                        $msg = request()
                            ->session()
                            ->get('msg');
                    @endphp

                    @if ($msg)
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Thành công!</strong> {{ $msg }}.
                        </div>
                        @php
                            request()
                                ->session()
                                ->put('msg', null);
                        @endphp
                    @endif
                </div>

                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên thương hiệu</th>
                            <th>Mô tả thương hiệu </th>
                            <th>Hiển thị</th>
                            <th>Ngày thêm</th>
                            <th>Ngày cập nhật</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_brands as $item)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{!! $item->description !!}</td>
                                <td><span class="text-ellipsis">
                                        @if ($item->status == 1)
                                            <a href="{{ route('brand.unactive', ['id' => $item->id]) }}">
                                                <sapn class="">Hiện</sapn>
                                            </a>
                                        @else
                                            <a href="{{ route('brand.active', ['id' => $item->id]) }}">
                                                <sapn>Ẩn</sapn>
                                            </a>
                                        @endif

                                    </span>
                                </td>
                                <td><span class="text-ellipsis">
                                        @php
                                            echo date('d-m-Y', strtotime($item->created_at));
                                        @endphp
                                    </span>
                                </td>

                                <td><span class="text-ellipsis">
                                        @php
                                            $up = date('d-m-Y', strtotime($item->updated_at));
                                            $date1 = strtotime($up);
                                            $date2 = strtotime('1970-01-01');
                                            if ($date1 > $date2) {
                                                echo $up;
                                            } else {
                                            }
                                        @endphp
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('brand.update', ['id' => $item->id]) }}" class="active"
                                        ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a href="{{ route('brand.delete', ['id' => $item->id]) }}" class="active"
                                        ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
