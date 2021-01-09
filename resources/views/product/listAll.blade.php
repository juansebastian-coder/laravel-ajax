<table class="table table-bordered table-hover text-center">
        <thead class="bg-primary text-white">
            <tr>
                <td>#</td>
                <td>Nombre</td>
                <td>Precio</td>
                <td>Marca</td>
                <td>Acciones</td>
            </tr>
        </thead>

       
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{number_format($product->price)}}</td>
                    <td>{{$product->mark->name}}</td>
                    <td class="d-inline">
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-info">Editar</a>
                        <a class="btn btn-warning" href="{{route('products.show',$product->id)}}">ver</a>
                        <a class="btn btn-danger" href="{{route('products.destroy',$product->id)}}">Elminar</a>
                    </td>
                </tr>
            @endforeach
          
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$products->links()}}
    </div>