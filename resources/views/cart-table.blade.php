<table class="table">
    <thead class=" text-primary">
        <th>
            ID
        </th>
        <th>
            Name
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
        <th>
            Action
        </th>
    </thead>
    <tbody>
        @foreach (Cart::content() as $cart)
            <tr>
                <td>
                    {{$cart->id}}
                </td>
                <td>
                    {{$cart->name}}
                </td>
                <td>
                    {{-- decrease button --}}
                    <button onclick="decrement('{{$cart->rowId}}')">-</button>
                        <input style="width:50%;display:inline-block" type="number" name="qty" value="{{$cart->qty}}" class="form-control" disabled>
                    <button onclick="increment('{{$cart->rowId}}')">+</button>

                </td>
                <td>
                    {{$cart->price}}
                </td>
                <td>
                    {{$cart->total}}
                </td>
                <td>
                    <form action="{{route('cart.destroy',$cart->rowId)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td>Total</td>
            <th>{{Cart::subtotal()+Cart::discount()}}</th>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td>Discount</td>
            <th>{{Cart::discount()}}</th>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td>Total</td>
            <th>{{Cart::total()}}</th>
        </tr>
    </tfoot>

</table>
