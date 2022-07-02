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

    <style>
        @foreach($sliders as $key=>$slider)
        .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child({{ $key+1 }}) .item
        {
            background: url('{{ asset('uploads/slider/'.$slider->image) }}');
            background-size: cover;
            background-position: bottom;
        }
        @endforeach

    </style>

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
                <li><a href="#about">about</a></li>
                <li><a href="#great-place-to-enjoy">Item & Pricing</a></li>

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

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.row -->
</nav>


<!--== 5. Header ==-->
<section id="header-slider" class="owl-carousel">
    @foreach( $sliders as $key=>$slider)
    <div class="item">
        <div class="container">
            <div class="header-content">
                <h1 class="header-title">{{$slider->title}}</h1>
                <p class="header-sub-title">{{$slider->sub_title}}</p>
            </div> <!-- /.header-content -->
        </div>
    </div>
    @endforeach
</section>



<!--== 6. About us ==-->
<section id="about" class="about">
    <img src="{{asset('frontend/images/icons/about_color.png')}}" class="img-responsive section-icon hidden-sm hidden-xs">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                </div>
                <div class="col-xs-12 col-sm-6 dis-table-cell">
                    <div class="section-content">
                        <h2 class="section-content-title">
                            <b>About us</b></h2>
                        <p class="section-content-para" style="font-size:17px">
                            Chef Irene Li co-founded Mei Mei with her two older siblings in 2012 as a food truck. "Mei Mei” means little sister in Mandarin Chinese and Mei Mei food is an expression of the Li sibling’s favorite childhood eating experiences as Chinese-American kids growing up in Boston.

Mei Mei's unconventional dumpling combinations showcase our love for great New England ingredients along with a pursuit of what tastes delicious.

                        </p>

                    </div> <!-- /.section-content -->
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.wrapper -->
</section> <!-- /#about -->


<!--==  7. Afordable Pricing  ==-->
<section id="pricing" class="pricing">
    <div id="w">
        <div class="pricing-filter">
            <div class="pricing-filter-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="section-header">
                                <h2 class="pricing-title">We Offer This Menu</h2>
                                <ul id="filter-list" class="clearfix">

                                     @foreach($categories as $category)
                                        <li class="filter" data-filter="#{{ $category->slug }}"> {{ $category->name }}
                                            <span class="badge">
                                                {{$category->items->count()}}
                                            </span></li>

                                         @endforeach
                                </ul><!-- @end #filter-list -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-gallery" style="width: 100%; float:left;">
                    <div class="flexslider-container">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/IMG_20210826_200820.jpg')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/img-20200822-180155-largejpg.jpg')}}" />
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ul id="menu-pricing" class="menu-price">

                       @foreach($items as $item)
                            <li class="item dinner" id="{{ $item->category->slug }}">

                                <a href="#">
                                    <img src="{{asset('uploads/item/'.$item->image)}}" class="img-responsive" alt="Food" >
                                    <div class="menu-desc text-center">
                                            <span>
                                                <h3>{{$item->name}}</h3>
                                                {{$item->description}}
                                            </span>
                                    </div>
                                </a>

                                <h2 class="white">Tk. {{$item->price}}</h2>
                            </li>
                           @endforeach
                    </ul>

                    <!-- <div class="text-center">
                            <a id="loadPricingContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                    </div> -->

                </div>
            </div>
        </div>

    </div>
</section>






<!--==  9. Our Beer  ==-->











<!--== 12. Our Featured Dishes Menu ==-->
<section id="featured-dish" class="featured-dish">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('frontend/images/icons/food_black.png')}}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Our Featured Dishes Menu</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#featured-dish -->


<style>
    .iwAsFO {
    display: flex;
    flex-flow: row wrap;
    right: 0px;
    left: 0px;
    margin: 0.5em 0.4em 0px;
    max-width: 100%;
    flex-basis: auto;
    border-radius: 3px;
    background-color: rgb(255, 255, 255);
    box-shadow: rgb(0 0 0 / 12%) 0px 2px 2px 0px, rgb(0 0 0 / 12%) 0px 2px 4px 0px;
    -webkit-box-pack: center;
    justify-content: center;
    overflow: hidden;
}
.iwAsFO .wd-100 {
    width: 100%;
    position: relative;
}
.fYdZgi {
    position: absolute;
    top: 0.5rem;
    z-index: 1;
    left: 1.25rem;
    font-size: 0.625rem;
    color: rgb(255, 255, 255);
}
.eGgOlL {
    min-width: 0px;
    position: relative;
    overflow: hidden;
}
.eGgOlL .img-cvr {
    height: 8.4rem;
    background-image: url(https://api.dominos.com.bd/olo-bg-prod-api/static/assets/placeholder.png);
}
.eGgOlL img {
    max-width: 100%;
    max-height: 450em;
    border-radius: 3px 3px 0px 0px;
}
.eGgOlL .img-wrpr__img-txt {
    font-size: 1.2em;
    font-weight: 500;
    color: rgb(255, 255, 255);
    position: absolute;
    top: 4.7em;
    left: 0.5em;
    display: flex;
    flex-direction: column-reverse;
}
.icon-image {
    min-width: 0.3em;
    min-height: 0.3em;
    background-repeat: no-repeat;
    display: block;
}


.efVKWF {
    width: 3em;
    height: 2em;
    opacity: 0.5;
    filter: blur(0.8em);
    background-color: rgb(0, 0, 0);
    position: absolute;
    top: 0px;
    right: 0px;
}

.kpOVEp {
    background-image: url(/images/shadow.svg);
}
.eGgOlL .img-wrpr__fav {
    font-size: 5em;
    position: absolute;
    top: 0.14em;
    right: 0.1em;
}
.eGgOlL .img-wrpr__typ {
    font-size: 2em;
    position: absolute;
    top: 0.2em;
    left: 0.2em;
}
.bJhCXX {
    align-self: center;
    position: absolute;
    right: 0.5em;
    bottom: 1em;
}
.bJhCXX .btn--cstmz {
    border: 1px solid rgb(255, 255, 255);
    color: rgb(51, 51, 51);
    background-color: rgb(255, 255, 255);
    opacity: 0.92;
    display: flex;
    padding: 0.1rem 0.1rem 0.1rem 0.3rem;
}
.bJhCXX button {
    font-size: 1em;
    font-weight: 600;
}
.dPRFWH {
    flex-basis: auto;
    flex-wrap: wrap;
    padding: 0.3em;
    width: 100%;
    margin-left: 0.2em;
}
.dPRFWH .itm-dsc__nm {
    flex-basis: auto;
    -webkit-box-pack: start;
    justify-content: flex-start;
    font-size: 1em;
    font-weight: 500;
    color: rgb(51, 51, 51);
    margin-top: 0.4rem;
}
.dPRFWH .itm-dsc__dscrptn {
    flex-basis: auto;
    font-size: 1em;
    color: rgb(102, 102, 102);
    margin-top: 0.5em;
    width: 90%;
}
.dPRFWH .itm-dsc__actn {
    flex-basis: auto;
    flex-flow: row nowrap;
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    margin-top: 0.4em;
    margin-bottom: 0.5em;
    width: 100%;
}
.dPRFWH .itm-dsc__actn__sz {
    flex-flow: column nowrap;
}
.dPRFWH .itm-dsc__actn__sz__nm {
    width: 1.3rem;
    height: 0.81rem;
    font-size: 1rem;
    color: rgb(102, 102, 102);
    margin-bottom: 0.2rem;
}
.nQrgY {
    position: absolute;
}
.dPRFWH .itm-dsc__actn__crst {
    flex-flow: column nowrap;
    margin-left: -3rem;
}
.dPRFWH .itm-dsc__actn__crst__nm {
    width: 1.3rem;
    height: 0.81rem;
    font-size: 0.75rem;
    color: rgb(102, 102, 102);
    margin-bottom: 0.2rem;
}
.dPRFWH .itm-dsc__actn__addtcrt {
    margin-right: 0.1rem;
}
.cdXtGq {
    align-self: center;
}
.cdXtGq .btn--grn {
    background-color: rgb(101, 171, 11);
    color: rgb(255, 255, 255);
    border: 1px solid rgb(101, 171, 11);
}
.cdXtGq button {
    padding: 0.433em 0.663em;
}
.cdXtGq button {
    position: relative;
    overflow: hidden;
}
.cdXtGq button {
    border-radius: 3px;
    outline: none;
    text-transform: uppercase;
    padding: 0.5em 1em;
}
    </style>

@php
$items=[
    "Pizza"=>[
        [
           "image"=>"https://images.dominos.com.bd/american_fav_feast.png",
           "name"=>"Pizza",
        ],
        // [
        //     "image"=>"https://api.dominos.com.bd/olo-bg-prod-api/static/assets/placeholder.png",
        //     "name"=>"Pizza2",
        //  ],
    ],
    "Burger"=>[
        [
           "image"=>"frontend/img-20200822-180155-largejpg.jpg",
           "name"=>"Burger",
        ],
        // [
        //     "image"=>"https://api.dominos.com.bd/olo-bg-prod-api/static/assets/placeholder.png",
        //     "name"=>"Pizza",
        //  ],
    ],
    "Swarma"=>[
        [
           "image"=>"frontend/232a370bb98efcf66fc650af86a2098b.jpg",
           "name"=>"Sawrma",
        ],
        // [
        //     "image"=>"https://api.dominos.com.bd/olo-bg-prod-api/static/assets/placeholder.png",
        //     "name"=>"Pizza",
        //  ],
    ],
    "Soup"=>[
        [
           "image"=>"frontend/puree-soup-2160x3840-tomato-gnocchi-toast-herbs-678.jpg",
           "name"=>"Soup",
        ],
        // [
        //     "image"=>"https://api.dominos.com.bd/olo-bg-prod-api/static/assets/placeholder.png",
        //     "name"=>"Pizza",
        //  ],
    ],
    "Kabab"=>[
        [
           "image"=>"frontend/Chicken-Tikka.jpeg",
           "name"=>"Pizza",
        ],
        // [
        //     "image"=>"https://api.dominos.com.bd/olo-bg-prod-api/static/assets/placeholder.png",
        //     "name"=>"Pizza",
        //  ],
    ],
    "Salad"=>[
        [
           "image"=>"frontend/salad.jpg",
           "name"=>"Pizza",
        ],
        // [
        //     "image"=>"https://api.dominos.com.bd/olo-bg-prod-api/static/assets/placeholder.png",
        //     "name"=>"Pizza",
        //  ],
    ],
    "Beverage"=>[
        [
           "image"=>"frontend/images (12).jpeg",
           "name"=>"Pizza",
        ],
        // [
        //     "image"=>"https://api.dominos.com.bd/olo-bg-prod-api/static/assets/placeholder.png",
        //     "name"=>"Pizza",
        //  ],
    ],
    "Chowmin"=>[
        [
           "image"=>"frontend/7c3bb3c4d6ce96074dee02046c669bdf.jpg",
           "name"=>"Pizza",
        ],
        // [
        //     "image"=>"https://api.dominos.com.bd/olo-bg-prod-api/static/assets/placeholder.png",
        //     "name"=>"Pizza",
        //  ],
    ],
]

@endphp
<!--== 13. Menu List ==-->
<section id="menu-list" class="menu-list">
    <div class="container" style="width: 1450px">
        <div class="row menu">
            <div class="col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-12">
                <div class="row">
                    @foreach(["Pizza","Burger","Swarma","Soup","Kabab","Salad","Beverage","Chowmin"] as $name)
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="row" style="display: flex">
                            <div class="menu-catagory" style="margin:auto">
                                <h2>{{$name}}</h2>
                            </div>
                        </div>
                        @foreach($items[$name] as $item)
                        <div class="row">
                            <div class="injectStyles-bxKuyf jvchdE" style="width: 90%;margin-left:5%;" data-label="American Favourite Feast">
                                <div class="injectStyles-ghyFZI iwAsFO" id="container"><div class="wd-100">
                                    <div class="MenuItemstyle__TagDiv-exaGSV fYdZgi"></div>
                                    <div class="MenuItemstyle__ImageWrapperElem-brWeHV eGgOlL">
                                        <div class="img-cvr"><div>
                                            <img alt="American Favourite Feast" class="img-comp injectStyles-hqiIPi jdTQZw img-wrpr__img" loading="eager" style=""
                                             src="{{$item["image"]}}"></div></div><span>
                                                <i class="ImageCompstyle__Icon-kMKYiT kpOVEp icon-image injectStyles-hqiIPi kMTkUh"></i></span>
                                                <div class="img-wrpr__shdw-prc"></div><div class="img-wrpr__img-txt"><span class="bdt">799</span></div>
                                                <span><i class="ImageCompstyle__Icon-kMKYiT kpOVEp icon-image injectStyles-hqiIPi efVKWF"></i>
                                                </span><div class="img-wrpr__fav" data-label="favorite"><span><i class="ImageCompstyle__Icon-kMKYiT kIMWMT icon-image injectStyles-hqiIPi jdTQZw"></i></span>
                                                </div><div class="img-wrpr__typ"><span><i class="ImageCompstyle__Icon-kMKYiT ksXAIT icon-image injectStyles-hqiIPi AwDdF"></i>
                                                </span></div><div class="injectStyles-ZfRWV bJhCXX"></div></div></div>
                                                    <div class="MenuItemstyle__TextWrapperElement1-kRLdBR dPRFWH"><div class="itm-dsc__nm">{{$item["name"]}}</div>
                                                    <div class="itm-dsc__dscrptn">Chicken sausage, Beef pepperoni come together with seasoned mushrooms and green chilli to deliver a spicy and meaty mouthfeel.</div>
                                                    <div></div><div class="itm-dsc__actn"><div class="itm-dsc__actn__sz"><div class="itm-dsc__actn__sz__nm">Size</div><div><div class="injectStyles-ipKJhp nQrgY">
                                                        <div class="itm-dsc__actn__sz__dd-ttl">
                                                            <select class="form-control">
                                                                <option value="">Quantity</option>
                                                                <option value="">1</option>
                                                                <option value="">2</option>
                                                                <option value="">3</option>
                                                                <option value="">4</option>
                                                            </select>
                                                        </div></div></div></div><div class="itm-dsc__actn__crst"><div class="itm-dsc__actn__crst__nm">Crust</div><div><div class="injectStyles-ipKJhp nQrgY">
                                                            <div class="itm-dsc__actn__sz__dd-ttl"><span><i class="ImageCompstyle__Icon-kMKYiT gIwBxy icon-image injectStyles-hqiIPi jgpZSw">
                                                                </i></span></div></div></div></div>
                                                                <div class="itm-dsc__actn__addtcrt"><div class="injectStyles-ZfRWV cdXtGq"><button data-label="addTocart" class="btn--grn ripple"><span>ADD TO CART</span>
                                                                </button></div><div class="itm-dsc__oos"><div></div></div></div></div></div></div></div>
                                                                <br>

                        </div>
                        @endforeach


                    </div>
                    @endforeach

                </div>

                <div id="moreMenuContent"></div>
                <div class="text-center">
                    <a id="loadMenuContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>



<!--== 14. Have a look to our dishes ==-->

<section id="have-a-look" class="have-a-look hidden-xs">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('frontend/images/icons/food_color.png')}}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">

                <div class="menu-gallery" style="width: 50%; float:left;">
                    <div class="flexslider-container">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu1.png')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu2.jpg')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu3.png')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu4.jpg')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu5.jpg')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu6.jpg')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu7.jpg')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu8.jpg')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu9.jpg')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu10.jpg')}}" />
                                </li>
                                <li>
                                    <img src="{{asset('frontend/images/menu-gallery/menu11.jpg')}}" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="gallery-heading hidden-xs color-bg" style="width: 50%; float:right;">
                    <h2 class="section-title">Have A Look To Our Dishes</h2>
                </div>


            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.wrapper -->
</section>




<!--== 15. Reserve A Table! ==-->
<section id="reserve" class="reserve">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('frontend/images/icons/reserve_black.png')}}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Reserve A Table !</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#reserve -->



<section class="reservation">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('frontend/images/icons/reserve_color.png')}}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class=" section-content">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <form class="reservation-form" method="post" action="{{route('reservation.reserve')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="name" id="name" required="required" placeholder="  &#xf007;  Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control reserve-form empty iconified" id="email" required="required" placeholder="  &#xf1d8;  e-mail">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control reserve-form empty iconified" name="phone" id="phone" required="required" placeholder="  &#xf095;  Phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="dateandtime" id="datetimepicker1" required="required" placeholder="&#xf017;  Time">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <textarea type="text" name="messege" class="form-control reserve-form empty iconified" id="messege" rows="3" required="required" placeholder="  &#xf086;  We're listening"></textarea>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                        <span><i class="fa fa-check-circle-o"></i></span>
                                        Make a reservation
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-md-2 hidden-sm hidden-xs"></div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="opening-time">
                            <h3 class="opening-time-title">Hours</h3>
                            <p>Mon to Fri: 7:30 AM - 11:30 AM</p>
                            <p>Sat & Sun: 8:00 AM - 9:00 AM</p>

                            <div class="launch">
                                <h4>Lunch</h4>
                                <p>Mon to Fri: 12:00 PM - 5:00 PM</p>
                            </div>

                            <div class="dinner">
                                <h4>Dinner</h4>
                                <p>Mon to Sat: 6:00 PM - 1:00 AM</p>
                                <p>Sun: 5:30 PM - 12:00 AM</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>




<section id="contact" class="contact">
    <div class="container-fluid color-bg">
        <div class="row dis-table">
            <div class="hidden-xs col-sm-6 dis-table-cell">
                <h2 class="section-title">Contact With us</h2>
            </div>
            <div class="col-xs-6 col-sm-6 dis-table-cell">
                <div class="section-content">
                    <p>16th Birn street Get Plaza (4th floar) USA</p>
                    <p>+44 12 213584</p>
                    <p>example@mail.com </p>
                </div>
            </div>
        </div>
        <div class="social-media">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="center-block">
                        <li><a href="#" class="fb"></a></li>
                        <li><a href="#" class="twit"></a></li>
                        <li><a href="#" class="g-plus"></a></li>
                        <li><a href="#" class="link"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid">
    <div class="row">
        <div id="map-canvas"></div>
    </div>
</div>



<section class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <div class="row">
                    <form class="contact-form" method="post" action="contact.php">

                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="  Name">
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" id="email" required="required" placeholder="  Email">
                            </div>
                            <div class="form-group">
                                <input name="subject" type="text" class="form-control" id="subject" required="required" placeholder="  Subject">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <textarea name="message" type="text" class="form-control" id="message" rows="7" required="required" placeholder="  Message"></textarea>
                        </div>

                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="text-center">
                                <button type="submit" id="submit" name="submit" class="btn btn-send">Send </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


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
    $(function () {
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
