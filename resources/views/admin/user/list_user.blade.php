@extends('admin_layout')

@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách tài khoản khách hàng
            </div>
            <div class="row w3-res-tb">

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
                <table class="table table-striped b-t b-light" style="text-align: center;">
                    <thead>
                        <tr>

                            <th style="text-align: center;">Tên</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Số lượng đơn hàng đã mua</th>
                            <th style="text-align: center;">Tổng đơn hàng</th>
                            <th style="text-align: center;">Tình trạng tài khoản</th>
                            <th style="text-align: center;">Ngày tạo tài khoản</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                {{--  <td><label class="i-checks m-b-none"><input   type="checkbox" name="post[]"><i></i></label></td>  --}}
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->email }} </td>
                                <td> {{ $item->order_payed }} </td>
                                <td>{{ $item->order }}</td>
                                <td>{{ $item->status == 1 ? 'Đã kích hoạt' : 'Chưa kích hoạt' }}</td>
                                <td>{{ date_format(date_create($item->created_at), 'd-m-Y') }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <a href="{{ route('block_account', ['id' => $item->id]) }}" class=""
                                            style="padding:5px; background-color: rgb(189, 8, 8); color: white;  border: 1px solid white; border-radius: 5px;">
                                            Khóa   tài khoản
                                         </a>
                                    @else
                                        <a href="{{ route('active_account_1', ['id' => $item->id]) }}" class=""
                                            style="padding:5px; background-color: rgb(38, 22, 213); color: white;  border: 1px solid white; border-radius: 5px;">
                                            Mở tài khoản
                                        </a>
                                    @endif

                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{--  <div class="d-flex justify-content-center">
                    {!! $list->links() !!}
                </div>  --}}
            </div>
        </div>
    </div>
@endsection
