<div id="list-cart">
    <h3>Giỏ hàng</h3>
    <div class="delete-all" data-url="/deleteall">
        <form class="updatecart_url" data-url="/updatecart">
            <table class="table table-bordered .table-responsive text-center deletecart_url" data-url="/deletecart">
                <tr class="active">
                    <td width="11.111%">Ảnh mô tả</td>
                    <td width="22.222%">Tên sản phẩm</td>
                    <td width="22.222%">Số lượng</td>
                    <td width="12.6665%">Đơn giá</td>
                    <td width="12.6665%">Thành tiền</td>
                    <td width="19.112%">Xóa</td>
                </tr>
                <?php
                $total = 0;
                
                ?>
                @if ($carts)
                    @foreach ($carts as $id => $item)
                        <?php
                        $total += $item['price'] * $item['qtt'];
                        
                        ?>
                        <tr>
                            <td><img class="img-responsive img-fluid" src="/backend/img/{{ $item['image'] }}"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control qtt" name="qtt" min="1" type="number"
                                        value="{{ $item['qtt'] }}">
                                </div>
                            </td>
                            <td><span class="price">{{ number_format($item['price']) }} đ</span></td>
                            <td><span class="price">{{ number_format($item['price'] * $item['qtt']) }}
                                    đ</span>
                            </td>
                            <td>
                                <div style="display: flex;">
                                    <a href="#" class="cart-update btn btn-success mr-2" data-id={{ $id }}>
                                        Cập nhật
                                    </a>
                                    <a href="#" class="cart-delete btn btn-danger" data-id={{ $id }}>Xóa</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif


            </table>
            <div class="row" id="total-price">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    Tổng thanh toán: <span class="total-price">{{ number_format($total) }}</span>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <a href="/" class="my-btn btn">Mua tiếp</a>
                    <a href="#" class="my-btn btn cart-delete-all">Xóa giỏ hàng</a>
                </div>
            </div>
        </form>
    </div>
</div>
