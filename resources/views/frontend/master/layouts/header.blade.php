<header id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-md-3 col-sm-12 col-xs-12">
                <h1>
                    <a href="/">
                        <h1 style="color: #fff">Mobile Shop</h1>
                    </a>
                    <nav><a id="pull" class="btn btn-danger" href="#">
                            <i class="fa fa-bars"></i>
                        </a></nav>
                </h1>
            </div>
            <div id="search" class="col-md-7 col-sm-12 col-xs-12">
                <form action="/search" method="get">
                    <input type="text" name="result" placeholder="Search...">
                    <input type="submit" name="submit" id="submit" value="Tìm Kiếm">
                    @csrf
                </form>
            </div>
            <div id="cart" class="col-md-2 col-sm-12 col-xs-12">
                <div class="cart-notify-wrapper">
                    @include('frontend/master/layouts/cartnotify')
                </div>
            </div>
        </div>
    </div>
</header><!-- /header -->
