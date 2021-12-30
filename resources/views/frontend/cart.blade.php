@extends("frontend/master/master")
@section('title', 'Giỏ hàng')
@section('main')
    <link rel="stylesheet" href="/frontend/css/cart.css">
    {{-- {{ dd(session()->get('cart')) }} --}}
    <div class="cart-wrapper">
        @include('frontend/components/listcart')
    </div>

    <div id="xac-nhan">
        <h3>Xác nhận mua hàng</h3>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif
        <form method="POST">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="name">Họ và tên:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="number" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group text-right">
                <button type="submit" name="submit" class="btn btn-default">Thực hiện đơn hàng</button>
            </div>
            @csrf
        </form>
    </div>

    <script>
        cartUpdate = (event) => {
            event.preventDefault();
            // console.log(event.target);
            let url = $('.updatecart_url').data('url');
            let id = $(event.target).attr("data-id");
            let qtt = $(event.target).parents('tr').find('.qtt').val();
            // let id = $(this).data('id');
            // let qtt = $(this).closest('tr').find('input').val();
            // console.log(id);
            // console.log(url);
            // console.log(qtt);

            $.ajax({
                type: "GET",
                url: url,
                data: {
                    id: id,
                    qtt: qtt
                },
                success: function(data) {
                    if (data.code == 200) {
                        $('.cart-wrapper').html(data.listcart);

                        $(function() {
                            $('.cart-update').on('click', cartUpdate);
                            $('.cart-delete').on('click', cartDelete);
                        })
                        alert('Cập nhật thành công');
                    }

                },
                error: function() {}
            });


        }

        cartDelete = (event) => {
            event.preventDefault();
            let id = $(event.target).attr("data-id");
            let url = $('.deletecart_url').data('url');
            console.log(id);
            console.log(url);

            $.ajax({
                type: "GET",
                url: url,
                data: {
                    id: id,
                },
                success: function(data) {
                    if (data.code == 200) {
                        $('.cart-wrapper').html(data.listcart);
                        $('.cart-notify-wrapper').html(data.cartnotify);
                        $(function() {
                            $('.cart-update').on('click', cartUpdate);
                            $('.cart-delete').on('click', cartDelete);
                        })
                        alert('Xóa thành công');
                    }

                },
                error: function() {}
            });
        }


        cartDeleteAll = (event) => {
            event.preventDefault();
            let url = $('.delete-all').data('url');
            let key = "deleteall"

            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    if (data.code == 200) {
                        $('.cart-notify-wrapper').html(data.cartnotify);
                        $('.cart-wrapper').html(data.listcart);
                        alert('Xóa giỏ hàng thành công');
                        $('.cart-delete-all').on('click', cartDeleteAll)
                    }

                },
                error: function() {}
            });
        }



        $(function() {
            $('.cart-update').on('click', cartUpdate);
            $('.cart-delete').on('click', cartDelete);
            $('.cart-delete-all').on('click', cartDeleteAll)
        })
    </script>
@endsection
