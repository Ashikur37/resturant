@extends(' layouts.app')

@section ( 'title', 'Item')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Orders</h4>
                        </div>
                            <div class="card-content table-responsive">
                                <table id="table" class="table" cellspacing="0" width="100%">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                       Customer
                                    </th>
                                    <th>
                                        Total Item
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Order At
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    </thead>

                                    @foreach( $orders as $key=>$item )
                                        <tr>
                                            <td> {{$item->id }}</td>
                                            <td> {{  $item->user->name }}</td>
                                            <td> {{$item->items->count()}}</td>
                                            <td> {{  $item->status }}</td>
                                            <td> {{  $item->total }}</td>
                                            <td> {{  $item->shipping_address }}</td>
                                            <td> {{ $item->created_at->format("d-M-y h:i") }}</td>

                                            <td>
                                                <a href="{{ route('order.show',$item->id) }}" class="btn btn-info btn-sm">Show</a>

                                                <form id="delete-form-{{ $item->id }}" action="{{ route('order.destroy',$item->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $item->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>


                                        </tr>
                                        @endforeach
                                </table>
                            </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>


    @endpush
