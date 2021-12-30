@extends("frontend/master/master")
@section('title', 'Trang chủ')
@section('main')
    <link rel="stylesheet" href="css/home.css">
    <div class="products">
        <h3>sản phẩm nổi bật</h3>
        <div class="product-list row">
            @foreach ($featured_products as $product)
                <div class="product-item col-md-3 col-sm-6 col-xs-12 mb-2">
                    <a href="/detail/{{ $product->id }}/{{ $product->slug }}.html"><img
                            src="/backend/img/{{ $product->image }}" class="img-thumbnail"></a>
                    <p><a href="#">{{ $product->name }}</a></p>
                    <p class="price">{{ number_format($product->price) }} VNĐ</p>
                    <div class="marsk">
                        <div class="option">
                            <a href="/detail/{{ $product['id'] }}/{{ $product['slug'] }}.html">Xem chi tiết</a>
                            <a href="#" data-url="/addtocart/{{ $product['id'] }}" class="buynow">Mua ngay</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="products">
        <h3>sản phẩm mới</h3>
        <div class="product-list row">
            @foreach ($new_products as $product)
                <div class="product-item col-md-3 col-sm-6 col-xs-12 mb-2">
                    <a href="/detail/{{ $product->id }}/{{ $product->slug }}.html"><img
                            src="/backend/img/{{ $product->image }}" class="img-thumbnail"></a>
                    <p><a href="#">{{ $product->name }}</a></p>
                    <p class="price">{{ number_format($product->price) }} VNĐ</p>
                    <div class="marsk">
                        <div class="option">
                            <a href="/detail/{{ $product['id'] }}/{{ $product['slug'] }}.html">Xem chi tiết</a>
                            <a href="#" data-url="/addtocart/{{ $product['id'] }}" class="buynow">Mua ngay</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
