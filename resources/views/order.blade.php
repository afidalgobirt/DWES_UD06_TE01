@extends('template')
@section('main-section')
    <h2>Cesta</h2>
    <table class="table mb-5">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Importe</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $item)
                <form action="{{route('update-order-quantity')}}" method="POST">
                    @csrf
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->amount}}</td>
                        <input type="hidden" name="order-id" value="{{$item->id}}"/>
                        <input type="hidden" name="product-price" value="{{$item->price}}"/>
                        <td><input type="number" name="order-quantity"/></td>
                        <td><input type="submit" value="Modificar" class="btn border border-primary rounded bg-primary text-white"/></td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
    <span>Importe total: {{$totalAmount}}</span>
@endsection