@extends(' layouts.app')

@section ( 'title', 'Item')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @endpush

@section('content')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')

                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Order No {{$order->id}}</h4>
                    </div>
                    <div class="card-body">
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
@endsection
