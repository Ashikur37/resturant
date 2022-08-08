
@extends(' layouts.user')



@section('content')
    {{-- cart table --}}
    <div class="content" style="margin-top:130px;min-height:80vh">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Cart</h4>
                        </div>
                        <div class="card-content ">
                            <div class="table-responsive" id="cart-wrap">
                                @include('cart-table')
                            </div>
                        </div>
                    </div>
                    {{-- go to checkout --}}
                    {{-- coupon form --}}
                    <div class="card">
                        <div class="col-md-7"></div>
                        <div class="col-md-4">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Have Coupon Code</h4>
                            </div>
                            <div class="card-content ">
                                <div class="table-responsive" id="cart-wrap">


                                    <form action="{{URL::to('/coupon')}}">
                                        <input type="text" class="form-control" name="code">

                                   <button class="btn btn-success">Apply</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if(count(Cart::content())>0)
                    <a href="{{route('checkout')}}" class="btn btn-info" style="float:right;margin-right:100px;margin-bottom:100px">
                        Go to chekout
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

<script>
    function increment(id){
        $("#cart-wrap").load("{{route('cart.increment')}}?id="+id);
    }
    function decrement(id){
        $("#cart-wrap").load("{{route('cart.decrement')}}?id="+id);
    }

</script>
@endsection
