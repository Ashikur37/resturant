
@extends(' layouts.user')



@section('content')
    {{-- order success alert --}}
    <div class="content" style="margin-top:130px;min-height:80vh">
        <div class="container-fluid">
            <div class="alert alert-success">
                <strong>Success!</strong> Your order has been placed.
            </div>
        </div>
    </div>
    {{-- order summary --}}

@endsection
