<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
    </form>
    <ul class="nav menu">
        <li class={{ Request::is('admin') ? 'active' : '' }}><a href="/admin/"><svg
                    class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg> Tổng quan</a></li>
        <li class={{ Request::segment(2) == 'category' ? 'active' : '' }}><a href="/admin/category"><svg
                    class="glyph stroked clipboard with paper">
                    <use xlink:href="#stroked-clipboard-with-paper" />
                </svg> Danh Mục</a></li>
        <li class={{ Request::segment(2) == 'product' ? 'active' : '' }}><a href="/admin/product"><svg
                    class="glyph stroked bag">
                    <use xlink:href="#stroked-bag"></use>
                </svg> Sản phẩm</a></li>
        <li class={{ Request::segment(2) == 'order' ? 'active' : '' }}><a href="/admin/order"><svg
                    class="glyph stroked notepad ">
                    <use xlink:href="#stroked-notepad" />
                </svg> Đơn hàng</a></li>
        <li role="presentation" class="divider"></li>
        <li class={{ Request::segment(2) == 'user' ? 'active' : '' }}><a href="/admin/user"><svg
                    class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                </svg> Quản lý thành viên</a></li>

    </ul>

</div>
