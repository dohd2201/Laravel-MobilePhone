@extends("backend/master/master")
@section('title', 'Chi tiết đơn')
@section('main')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Đơn hàng / Chi tiết đặt hàng</li>
            </ol>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Chi tiết đặt hàng</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel panel-blue">
                                                <div class="panel-heading dark-overlay">Thông tin khách hàng</div>
                                                <div class="panel-body">
                                                    @if ($order)
                                                        <strong><span class="glyphicon glyphicon-user"
                                                                aria-hidden="true"></span> :
                                                            {{ $order->customer->fullname }}</strong> <br>
                                                        <strong><span class="glyphicon glyphicon-phone"
                                                                aria-hidden="true"></span> :
                                                            {{ $order->customer->phone }}</strong>
                                                        <br>
                                                        <strong><span class="glyphicon glyphicon-send"
                                                                aria-hidden="true"></span> :
                                                            {{ $order->customer->address }}</strong>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Thông tin Sản phẩm</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Thành tiền</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @if ($details)
                                            @foreach ($details as $detail)
                                                <tr>
                                                    <td>{{ $i += 1 }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img width="100px" src="img/{{ $detail->product->image }}"
                                                                    class="thumbnail">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p><b>Mã sản phẩm</b>: {{ $detail->product->code }} </p>
                                                                <p><b>Tên Sản phẩm</b>: {{ $detail->product->name }}</p>
                                                                <p><b>Số lương</b> : {{ $detail->qtt }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $detail->price }}</td>
                                                    <td>{{ $detail->price * $detail->qtt }}</td>

                                                </tr>
                                            @endforeach
                                        @endif


                                    </tbody>

                                </table>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width='70%'>
                                                <h4 align='right'>Tổng Tiền :</h4>
                                            </th>
                                            <th>
                                                <h4 align='right' style="color: brown;">{{ $order ? $order->total : 0 }}
                                                </h4>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="alert alert-primary" role="alert" align='right'>
                                    <form action="" method="post">
                                        <a id="" class="btn btn-danger" href="/admin/order" role="button">Quay
                                            lại</a>
                                        <button name="/admin/order" id="" name="submit" type="submit"
                                            class="btn btn-success" href="#" role="button">Đã xử lý</button>
                                        @csrf

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->


    </div>
    <!--end main-->

    <!-- javascript -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>




@endsection
