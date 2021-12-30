<a class="display" href="/showcart">Giỏ hàng</a>
<a href="#">
    @if (session()->get('cart'))
        {{ count(session()->get('cart')) }}

    @else
        0
    @endif
</a>
