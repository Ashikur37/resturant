
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
                    <a href="{{route('checkout')}}" class="btn btn-info" style="float:right;margin-right:100px">
                        Go to chekout
                    </a>
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
