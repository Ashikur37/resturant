@extends(' layouts.app')

@section ( 'title', 'Item')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @endpush


@section('content')
<style>
    @media print
{
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')

                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Order No {{$order->id}}</h4>
                        {{-- print button --}}
                        <a onclick="window.print()" href="#" class=" no-print btn  btn-info pull-right">Print</a>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th> Full Name</th>
                                        <td>{{$order->user->name}}</td>
                                    </tr>

                                    <tr>
                                        <th> Email</th>
                                        <td>{{$order->user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th> Area</th>
                                        <td>{{$order->area}}</td>
                                    </tr>
                                    <tr>
                                        <th> Address</th>
                                        <td>{{$order->shipping_address}}</td>
                                    </tr>
                                    {{-- payment method --}}
                                    <tr>
                                        <th> Payment Method</th>
                                        <td>{{$order->payment_method}}</td>
                                    </tr>
                                    @if($order->payment_method == 'Bkash')
                                    <tr>
                                        <th> Bkash Number</th>
                                        <td>{{$order->sender_number}}</td>
                                    </tr>
                                    <tr>
                                        <th> Bkash Transaction ID</th>
                                        <td>{{$order->trxid}}</td>
                                    </tr>
                                    @endif
                                    <tr class="no-print">
                                        <th>Order Status</th>
                                        <td>
                                            <select class="form-control" onchange="load(this.value)">
                                                <option {{$order->status=="Pending"?"selected":""}}>Pending</option>
                                                <option {{$order->status=="Cancelled"?"selected":""}}>Cancelled</option>
                                                <option {{$order->status=="Delivered"?"selected":""}}>Delivered</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <script>
                                        function load(status){
                                            window.location.href='{{route('order.status',$order->id)}}?status='+status;
                                        }
                                        </script>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <thead class=" text-primary">

                                    <th>
                                        Item
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Total
                                    </th>

                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>

                                            <td>
                                                {{$item->item->name}}
                                                <br>
                                                <img style="width:100px" src="{{asset('uploads/item/'.$item->item->image)}}" class="img-responsive" alt="Food" >
                                            </td>
                                            <td>

                                                    <input style="width:50%;display:inline-block" type="number" name="qty" value="{{$item->quantity}}" class="form-control" disabled>


                                            </td>
                                            <td>
                                                {{$item->price}}
                                            </td>
                                            <td>
                                                {{$item->price}}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td>Total</td>
                                        <th>{{$order->total}}</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
