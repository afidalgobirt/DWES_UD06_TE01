@extends('template')
@section('main-section')
    <h2>Productos</h2>
    <table class="table mb-5">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $item)
                <tr>
                    <form action="{{route('post-order')}}" method="POST">
                        @csrf
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <input type="hidden" name="product-id" value="{{$item->id}}"/>
                        <input type="hidden" name="product-price" value="{{$item->price}}"/>
                        <td><input type="submit" value="Añadir" class="btn border border-primary rounded bg-primary text-white"/></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{route('post-product')}}" method="POST" class="w-75">
        @csrf
        <div class="row my-2">
            <label for="product-name" class="col-2">Nombre</label>
            <input type="text" id="product-name" name="product-name" class="col"/>
        </div>
        <div class="row my-2">
            <label for="product-name" class="col-2">Precio</label>
            <input type="number" id="product-price" name="product-price" class="col"/>
        </div>
        <input type="submit" value="Enviar" class="mt-2 btn border border-primary rounded bg-primary text-white"/>
    </form>
@endsection