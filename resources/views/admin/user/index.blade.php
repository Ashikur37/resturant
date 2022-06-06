@extends(' layouts.app')

@section ( 'title', 'User')



@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Staff</h4>
                        </div>
                            <div class="card-content table-responsive">
                                <table id="table" class="table" cellspacing="0" width="100%">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>

                                    <th>
                                        Action
                                    </th>
                                    </thead>

                                    @foreach( $staffs as $key=>$staff )
                                        <tr>
                                            <td> {{$key +1 }}</td>
                                            <td> {{  $staff->name }}</td>
                                            <td> {{  $staff->email }}</td>


                                            <td>

                                                <form id="delete-form-{{ $staff->id }}" action="{{ route('user.destroy',$staff->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $staff->id }}').submit();
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
