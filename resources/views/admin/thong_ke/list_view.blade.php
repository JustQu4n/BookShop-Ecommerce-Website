@extends('admin_layout')

@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách lượt xem sản phẩm
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

                            <th style="text-align: center;">Số thứ tự</th>
                            <th style="text-align: center;">Tên sách </th>
                            <th style="text-align: center;">Số lượt xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            {{--  <td><label class="i-checks m-b-none"><input   type="checkbox" name="post[]"><i></i></label></td>  --}}
                            <td>{{ $item->number }} </td>
                            <td>{{ $item->name }} </td>
                            <td>
                                @if ($item->rating)
                                    {{ $item->rating}}
                                @else
                                    0
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
