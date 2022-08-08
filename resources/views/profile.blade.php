
@extends(' layouts.user')



@section('content')
    {{-- order success alert --}}
    <div class="content" style="margin-top:130px;min-height:80vh">
        <div class="container-fluid">
            <div class="alert alert-success">
                Welcome <strong>{{auth()->user()->name}}</strong>
            </div>
          <div class="row">
            <div class="col-md-6">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td>{{auth()->user()->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{auth()->user()->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{auth()->user()->phone}}</td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>
                            <a class="btn btn-link" href="#">Change Now</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Total Order</th>
                        <td>{{auth()->user()->orders->count()}}</td>
                    </tr>
                    <tr>
                        <th>Pending Order</th>
                        <td>{{auth()->user()->orders->where("status","=","Pending")->count()}}</td>
                    </tr>
                    <tr>
                        <th>Deliverd Order</th>
                        <td>{{auth()->user()->orders->where("status","=","Delivered")->count()}}</td>
                    </tr>
                    <tr>
                        <th>Cancelled Order</th>
                        <td>{{auth()->user()->orders->where("status","=","Cancelled")->count()}}</td>
                    </tr>
                </table>
               </div>
          </div>
        </div>
    </div>


@endsection
