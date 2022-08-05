
@extends(' layouts.user')



@section('content')
    {{-- checkout form--}}
    <div class="content" style="margin-top:130px;min-height:80vh">
        <div class="container-fluid">
            <form method="post" action="{{route('checkout.submit')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Payment Method</label>
                   <select class="form-control" name="payment_method">
                        <option value="Bkash">Bkash</option>
                        <option value="COD">COD</option>

                   </select>
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                   <textarea name="shipping_address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
