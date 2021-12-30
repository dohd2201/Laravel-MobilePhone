@extends("backend/master/master")
@section('title', 'Danh mục sản phẩm')
@section('main')


    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Sửa danh mục
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert bg-success" id="show-message" role="alert">
                                <svg class="glyph stroked checkmark">
                                    <use xlink:href="#stroked-checkmark"></use>
                                </svg>{{ session()->get('message') }}<a href="#" class="pull-right"><span
                                        class="glyphicon glyphicon-remove"></span></a>
                            </div>

                        @endif

                        <form role="form" method="POST">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="{{ $category['name'] }}" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Sửa danh mục</button>
                            <a href="/admin/category" style="color: #fff; text-decoration: none"><button type="button"
                                    class="btn btn-danger">Hủybỏ</button> </a>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="
                                    col-xs-12 col-md-7 col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách danh mục</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Tên danh mục</th>
                                        <th style="width: 30%">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>iPhone</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><span
                                                    class="glyphicon glyphicon-edit"></span> Sửa</a>
                                            <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                                Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Samsung</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><span
                                                    class="glyphicon glyphicon-edit"></span> Sửa</a>
                                            <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                                Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nokia</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><span
                                                    class="glyphicon glyphicon-edit"></span> Sửa</a>
                                            <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                                Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HTC</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><span
                                                    class="glyphicon glyphicon-edit"></span> Sửa</a>
                                            <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                                Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>LG</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><span
                                                    class="glyphicon glyphicon-edit"></span> Sửa</a>
                                            <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                                Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sony</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><span
                                                    class="glyphicon glyphicon-edit"></span> Sửa</a>
                                            <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                                Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Motorola</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><span
                                                    class="glyphicon glyphicon-edit"></span> Sửa</a>
                                            <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                                Xóa</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->



    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/chart.min.js"></script>
    <script src="../js/chart-data.js"></script>

@endsection
