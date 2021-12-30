@extends("frontend/master/master")
@section('title', 'Danh mục')
@section('main')
    <link rel="stylesheet" href="css/category.css">
    <div class="products">
        <h3>{{ $category->name }}</h3>
        <div class="product-list row">
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <div class="product-item col-md-3 col-sm-6 col-xs-12 mb-2">
                        <a href="#"><img src="/backend/img/{{ $product->image }}" class="img-thumbnail"></a>
                        <p>{{ $product->name }}</p>
                        <p class="price">{{ $product->price }}</p>
                        <div class="marsk">
                            <div class="option">
                                <a href="/detail/{{ $product['id'] }}/{{ $product['slug'] }}.html">Xem chi tiết</a>
                                <a href="#" data-url="/addtocart/{{ $product['id'] }}" class=" buynow">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Chưa có sản phẩm nào</p>
            @endif

        </div>
        <div id="pagination">
            <ul class="pagination pagination-lg justify-content-center">

                {{ $products->links('pagination::bootstrap-4') }}

            </ul>
        </div>
    </div>


@endsection
