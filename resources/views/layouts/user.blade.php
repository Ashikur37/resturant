<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

    <title>Mamma's Kitchen</title>

    <link rel="stylesheet" href=" {{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href=" {{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=" {{asset('frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href=" {{asset('frontend/css/owl.theme.css')}}">
    <link rel="stylesheet" href=" {{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href=" {{asset('frontend/css/flexslider.css')}}">
    <link rel="stylesheet" href=" {{asset('frontend/css/pricing.css')}}">
    <link rel="stylesheet" href=" {{asset('frontend/css/main.css')}}">
    <link rel="stylesheet" href=" {{asset('frontend/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



    <script src="{{asset('frontend/js/jquery-1.11.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/jquery.flexslider.min.js')}} "></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlsContainer: ".flexslider-container"
            });
        });
    </script>


    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
                center: new google.maps.LatLng(24.909439, 91.833800),
                zoom: 16,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(mapCanvas, mapOptions)

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(24.909439, 91.833800),
                title:"Mamma's Kitchen Restaurant"
            });

            // To add the marker to the map, call setMap();
            marker.setMap(map);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>


</head>
<body data-spy="scroll" data-target="#template-navbar">

<!--== 4. Navigation ==-->
<nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img id="logo" src="{{asset('frontend/images/Logo_main.png')}}" class="logo img-responsive">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="Food-fair-toggle">
            <ul class="nav navbar-nav navbar-right">
                {{-- home --}}
                <li><a href="{{route('home')}}">Home</a></li>
                {{-- about --}}
                <li><a href="#about">about</a></li>
                <li><a href="#pricing">Item & Pricing</a></li>

                <li><a href="#featured-dish">featured</a></li>
                <li><a href="#reserve">reservation</a></li>
                <li>
                    <form action="#" method="get">
                        <div class="input-group" style="width:200px;padding-top:10px">
                            <input type="text" name="search" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Go!</button>
                            </span>
                        </div>
                    </form>
                </li>
                <li>
                @guest

                <a href="{{route('login')}}">Login</a>
                    @elseif(Auth::user()->type==2)
                    <a href="#">{{auth()->user()->name}}</a>
                    <form id="logout-form" method="post" action="{{route('logout')}}">
                    @csrf
                </form>

                    @else
                    <a href="{{route('admin.dashboard')}}">{{auth()->user()->name}}</a>
                    @endguest
                </li>
                @if(auth()->check())
                <li>
                    <a href="#"  onclick="document.getElementById('logout-form').submit()">

Logout
</a>
</li>
@endif
        <li>

            <a href="{{route('cart.index')}}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="badge" id="cart-count">{{Cart::count()}}</span>
            </a>
        </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.row -->
</nav>

@yield('content')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="copyright text-center">
                    <p>
                        &copy; Copyright, 2022
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.mixitup.min.js')}}" ></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.hoverdir.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jQuery.scrollSpeed.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script id="">
    function addToCart(id){
        var qty=$("#qty-"+id).val();
        //toastr show
        /* toastr.success('Item added to cart successfully'); */
        /* post request */
        $.ajax({
            url:"{{route('cart.add')}}",
            method:"POST",
            data:{id:id,qty:qty,_token:"{{csrf_token()}}"},
            success:function(data){
                $("#cart-count").html(data);
                /* $("#cart-count").html(data.count);
                $("#cart-items").html(data.html); */
                toastr.success('Item added to cart successfully');
            }
        });
    }
    $(function () {
        @if(Session::has('success'))
        toastr.success('{{Session::get('success')}}');
        @endif
        $('#datetimepicker1').datetimepicker({
            format: "dd MM yyyy - HH:11 P",
            showMeridian: true,
            autoclose: true,
            todayBtn: true
        });
    })
</script>

{!! Toastr::message() !!}
</body>
</html>
