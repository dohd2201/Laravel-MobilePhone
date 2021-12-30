<!DOCTYPE html>
<html>

<head>
    @include("backend/master/layouts/head")
</head>

<body>
    <!-- header -->
    @include("backend/master/layouts/header")
    <!-- header -->
    <!-- sidebar left-->
    @include("backend/master/layouts/sidebar")

    <!--/. end sidebar left-->

    <!--main-->
    @yield("main")

    <!--end main-->

    <!-- javascript -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>

</body>

</html>