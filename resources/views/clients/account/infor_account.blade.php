@extends('clients.account.account_layout')

@section('link_account')
    <link rel="stylesheet" href="{{asset('assets/css/infor_account.css')}}">
@endsection

@section('content_account')
   <div class="title">
        <h1>Thông tin tài khỏan </h1>
   </div>

   <div class="infor-account">
        <form action="{{route('myAccount.update')}}" method="POST">
            @csrf
            <table>
                <tr>
                    <td class="text-right">Tên người dùng</td>
                    <td class="text-left" >
                        <input type="text" name="user_name" value="{{$data['user_name']}}">
                        @error('user_name')
                            <p style="color:red; ">{{$message}}</p>
                        @enderror
                    </td>

                </tr>
                <tr>
                    <td class="text-right">Email</td>
                    <td class="text-left">{{$data['email']}}</td>
                </tr>
                @if ($data['phone'])
                <tr>
                    <td class="text-right">Số điện thoại</td>
                    <td class="text-left">{{$data['phone']}}</td>
                </tr>
                @endif
                <tr>
                    <td class="text-right">Địa chỉ</td>
                    <td class="text-left">{{$data['address']}}</td>
                </tr>
            </table>

            <input type="submit" value="Cập nhật" class="submit">

        </form>
   </div>
   @if(session('success'))
        <script>
            alert("Cập nhật thành công"); 
        </script>
        @php 
            session() -> put('success', null); 
        @endphp
   @endif

@endsection