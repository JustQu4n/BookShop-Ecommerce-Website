@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách phản hồi
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
                            {{--  <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>  --}}
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>

                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_feedBack as $item)
                            <tr>
                                {{--  <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>  --}}
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->content }}</td>

                                <td><span class="text-ellipsis">
                                        @php
                                            echo date('d-m-Y', strtotime($item->created_at));
                                        @endphp
                                    </span>
                                </td>
                                <td>
                                    <span class="text-ellipsis">
                                        @if ($item->status == 0)
                                            <a href="{{ route('feedBack.active', ['id' => $item->id]) }}">
                                                <sapn class="">Chưa trả lời</sapn>
                                            </a>
                                        @else
                                            <a href="{{ route('feedBack.unactive', ['id' => $item->id]) }}">
                                                <sapn>Đã trả lời</sapn>
                                            </a>
                                        @endif
                                    </span>
                                </td>
                                <td>

                                    <a href="{{ route('feedBack.delete', ['id' => $item->id]) }}" class="active"
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
    <div>
        @php
            $msg = request()
                ->session()
                ->get('msg');
        @endphp

        @if ($msg)
            <script>
                alert({{ $msg }})
            </script>

            @php
                request()
                    ->session()
                    ->put('msg', null);
            @endphp
        @endif


    </div>
@endsection
