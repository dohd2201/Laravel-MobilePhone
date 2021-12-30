<!DOCTYPE html>
<html>

{{-- head --}}
@include('frontend/master/layouts/head')

<body>
    <!-- header -->
    @include('frontend/master/layouts/header')
    <!-- endheader -->

    <!-- main -->
    <section id="body">
        <div class="container">
            <div class="row">
                <div id="sidebar" class="col-md-3">
                    {{-- Menu --}}
                    @include('frontend/master/layouts/menu')
                    {{-- Banner --}}
                    @include('frontend/master/layouts/banner')
                    <div id="main" class="col-md-9">

                        @include('frontend/master/layouts/slide')


                        {{-- banner-t --}}
                        @include('frontend/master/layouts/banner-t')

                        <div id="wrap-inner">
                            {{-- main --}}
                            @yield('main')
                            <!-- end main -->
                        </div>
                    </div>
                </div>
    </section>
    <!-- endmain -->

    <!-- footer -->
    @include('frontend/master/layouts/footer')
    <!-- endfooter -->
</body>

</html>

<script>
    function addtocart() {
        event.preventDefault();
        let url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: url,
            success: function(data) {
                if (data.code == 200) {
                    alert(data.message);
                    $('.cart-notify-wrapper').html(data.cartnotify);
                }
            },
            error: function() {}
        })
    }
    $(function() {
        $('.buynow').on('click', addtocart);
    })
</script>
