
@extends(' layouts.user')



@section('content')
<style>
    body {
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    overflow-x: hidden;
    font-size: 14px;
}
    </style>

    {{-- checkout form--}}
    <div class="content" style="margin-top:130px;min-height:80vh">
        <div class="container-fluid">
            <form method="post" action="{{route('checkout.submit')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Payment Method</label>
                   <select class="form-control" name="payment_method" onchange="setBkash(this.value)">
                       <option value="COD">COD</option>
                        <option value="Bkash">Bkash</option>

                   </select>
                </div>
                <div style="display:none" id="bkash">
                    <div class="alert alert-success">
                        Send  <strong>BDT {{Cart::total()}}</strong>  to <strong>01647679604</strong>
                    </div>

                    <div class="form-group">
                        <label for="name">Bkash Number</label>
                        <input type="text" class="form-control" name="sender_number" placeholder="Enter Bkash Number">
                    </div>
                    <div class="form-group">
                        <label for="name">Bkash Transaction ID</label>
                        <input type="text" class="form-control" name="trxid" placeholder="Enter Bkash Transaction ID">
                    </div>
                </div>
                <script>
                        function setBkash(val){
                            document.getElementById('bkash').style.display = 'none';
                            if(val=="Bkash"){
                            document.getElementById('bkash').style.display = 'block';

                            }
                        }
                    </script>
                {{-- area dropdown --}}

                <div class="form-group">
                    <label for="name">Area</label>
                    <select name="area" class="form-control" id="">
{{-- 1- Mograpara
2- chourasta
3- Bari Majlish
4- Habibpur
5- Uddhapganj
6- Boiddar Bazar
7- Pirojpur
8- Meghna
9- Kaikertek
10- Sonakhali --}}
                        <option value="Mograpara">Mograpara</option>
                        <option value="Chourasta">Chourasta</option>
                        <option value="Bari Majlish">Bari Majlish</option>
                        <option value="Habibpur">Habibpur</option>
                        <option value="Uddhapganj">Uddhapganj</option>
                        <option value="Boiddar Bazar">Boiddar Bazar</option>
                        <option value="Pirojpur">Pirojpur</option>
                        <option value="Meghna">Meghna</option>
                        <option value="Kaikertek">Kaikertek</option>
                        <option value="Sonakhali">Sonakhali</option>
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
