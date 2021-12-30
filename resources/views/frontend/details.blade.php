@extends("frontend/master/master")
@section('title', 'Chi tiết sản phẩm')
@section('main')
    <link rel="stylesheet" href="/frontend/css/details.css">
    <div id="product-info">
        <div class="clearfix"></div>
        <h3>{{ $product->name }}</h3>
        <div class="row">
            <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                <img class="img-fluid" src="/backend/img/{{ $product->image }}">
            </div>
            <div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                <p>Giá: <span class="price">{{ number_format($product->price) }} VNĐ</span></p>
                <p>Bảo hành: {{ $product->warranty }}</p>
                <p>Phụ kiện: {{ $product->accessories }}</p>
                <p>Tình trạng: {{ $product->condition }}</p>
                <p>Khuyến mại: {{ $product->promotion }}</p>
                <p>Còn hàng:
                    @if ($product->status == 1)
                        Còn hàng
                    @else
                        Hết hàng
                    @endif

                </p>
                <p class="add-cart text-center"><a class="buynow" data-url="/addtocart/{{ $product['id'] }}"
                        href="#">Đặt hàng online</a></p>
            </div>
        </div>
    </div>
    <div id="product-detail">
        <h3>Chi tiết sản phẩm</h3>
        <p class="text-justify">{{ $product->description }}</p>
    </div>
    <div id="comment">
        <h3>Bình luận</h3>
        <div class="col-md-9 comment">
            <form method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required type="email" class="form-control" id="email" name="email"
                        value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input required type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="cm">Bình luận:</label>
                    <textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" name="submit" class="btn btn-default" value="{{ old('') }}">Gửi</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
    <div id="comment-list">
        @foreach ($comments as $comment)
            <ul>
                <li class="com-title">
                    {{ $comment->name }}
                    <br>
                    <span>{{ $comment->created_at }}</span>
                </li>
                <li class="com-details">
                    {{ $comment->content }}
                </li>
            </ul>
        @endforeach

    </div>

    <div id="pagination">
        <ul class="pagination pagination-lg justify-content-center">

            {{ $comments->links('pagination::bootstrap-4') }}

        </ul>
    </div>

@endsection
