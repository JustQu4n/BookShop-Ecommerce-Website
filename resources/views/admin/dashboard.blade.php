@extends('admin_layout')

@section('admin_content')
    <div class="container-fluid">
		
        <style>
            p.title_thongke {
                text-align: center;
                font-size: 20px;
                font-weight: bold;
            }

            table caption {
                color: #000000;
                font-size: 20px;
                font-weight: bold;

            }

            table th {
                color: #000000 !important;
                font-weight: bold !important;
                font-size: 17px !important;
            }

            td {
                color: #5001d8 !important;
                font-weight: bold;
                font-size: 15px;
            }
        </style>

        {{--  start profit  --}}

		
        <div class="row">
            <p class="title_thongke">Thống kê doanh số đơn hàng</p>

        </div>
        <form action="" autocomplete="off">
            @csrf
            <div class="col-md-2">
                <p>Từ ngày: <input type="text" id="datepicker" value="" class="form-control"></p>
                <input type="button" id="btn-dasboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
            </div>

            <div class="col-md-2">
                <p>Từ ngày: <input type="text" id="datepicker2" value="" class="form-control"></p>

            </div>

            <div class="col-md-2">
                <p>
                    Lọc theo:
                <form method="post">
                    @csrf

                    <select name="filter_profit" id="filter_profit" class="dasboard-filter form-control">
                        <option value="">--Chọn--</option>
                        <option value="1">7 ngày qua</option>
                        <option value="2">tháng trước</option>
                        <option value="3">tháng này</option>
                        <option value="4">365 ngày qua</option>
                    </select>
                </form>
                </p>
            </div>

        </form>

        <div class="col-md-12">
            <div id="myfirstchart" style="height: 250px;">
            </div>
        </div>
        {{--  end profit  --}}
        <div class="row my-3">
            <div class="col-md-4">
                <p class="title_thongke">Thống kê</p>

                <div id="donut" class="top_view"></div>
            </div>

            <div class="col-md-4 top_view top_view-miiddler">
                <table class="table caption-top table-bordered border-primary">
                    <caption>Sách xem nhiều</caption>
                    <thead>
                        <tr>
                            <th scope="col">Số thứ tự</th>
                            <th scope="col">Tên sách</th>
                            <th scope="col">Số lượt xem</th>

                        </tr>
                    </thead>
					
                    @php
                        $i = 0;
                    @endphp

                    <tbody>
                        @foreach ($books_rating as $book)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->rating }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
				<a href="{{ route('list_view') }}" class="btn_detail_list">Xem chi tiết danh sách</a>
            </div>

            <div class="col-md-4 top_view">
                <table class="table table-bordered border-primary">
                    <caption>Sách bán chạy</caption>
                    <thead>
                        <tr>
                            <th scope="col">Số thứ tự</th>
                            <th scope="col">Tên sách</th>
                            <th scope="col">Số lượng bán</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($book_sell as $book)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $book['book']->name }}</td>
                                <td>{{ $book['qty'] }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
				<a href="{{ route('list_order') }}" class="btn_detail_list">Xem chi tiết danh sách</a>
            </div>

        </div>
        <div class="row">
        </div>

    </div>

    <script>
        var chart = new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.

            lineColors: ['#819c79', '#fc8710', '#ff6541', '#766856'],
            parseTime: false,
            hideHover: 'auto',

            // The name of the data record attribute that contains x-values.
            xkey: 'period',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['order', 'sales', 'profit', 'quantity', ],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Tổng phí', 'Phí bán ra', 'lợi nhuận', 'số lượng']
        });

        var colorDanger = "#FF1744";
        Morris.Donut({
            element: 'donut',
            resize: true,
            colors: [
                '#E0F7FA',
                '#B2EBF2',
                '#80DEEA',
                '#4DD0E1',
                '#26C6DA',
                '#00BCD4',
                '#00ACC1',
                '#0097A7',
                '#00838F',
                '#006064'
            ],
            //labelColor:"#cccccc", // text color
            //backgroundColor: '#333333', // border color
            data: [{
                    label: "Tổng số sách",
                    value: {{ $data['book_qty'] }},
                    color: colorDanger
                },
                {
                    label: "Tổng số khách hàng",
                    value: {{ $data['user_qty'] }},
                    color: '#F0B57B'
                },
                {
                    label: "Sự kiện display",
                    value: {{ $data['event_qty'] }},
                    color: '#CC9C85'
                },
                {
                    label: "Đơn hàng",
                    value: {{ $data['order_qty'] }}
                },

            ]
        });

        $(function() {
            $("#datepicker").datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "yy-mm-dd",
                dateNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration: "slow"
            });

            $("#datepicker2").datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "yy-mm-dd",
                dateNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration: "slow"
            });
        });

        $(document).ready(function() {
            // filter profit
            $("#filter_profit").change(function() {
                var filter = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.post(
                    "{{ route('filter_profit') }}", // url
                    {
                        filter: filter,
                        _token: _token,
                    }, // data to be submit
                    function(data) { // success callback function
                        chart.setData(data);
                    },
                    'json'); // response data format


            });

            $('#btn-dasboard-filter').click(function() {
                var date_start = $('#datepicker').val();
                var date_end = $('#datepicker2').val();
                var _token = $('input[name="_token"]').val();


                $.ajax({
                    url: "{{ route('statistical_order') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        date_start: date_start,
                        date_end: date_end,
                        _token: _token
                    },
                    success: function(data) {
                        chart.setData(data);
                    }
                });



            })
        });

        function get30days() {

            var get_start = new Date();
            var get_end = new Date();
            var _token = $('input[name="_token"]').val();
            var year_end = get_end.getFullYear();
            var month_end = get_end.getMonth() + 1;

            var day_end = get_end.getDate();
            var year_start = get_start.getFullYear();
            var month_start = get_start.getMonth();
            var day_start = get_start.getDate();

            var end = year_end + "-" + month_end + "-" + day_end;
            var start = year_start + "-" + month_start + "-" + day_start;

            $.ajax({
                url: "{{ route('statistical_order') }}",
                method: "POST",
                dataType: "JSON",
                data: {
                    date_start: start,
                    date_end: end,
                    _token: _token
                },
                success: function(data) {
                    chart.setData(data);
                }

            });
        }
        get30days();
    </script>
@endsection
