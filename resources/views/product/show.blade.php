@extends('layouts.master')

@section('title','Editar Producto ')

@section('content')

<div class="row">
  <nav aria-label=" breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Escritorio</a></li>
      <li class="breadcrumb-item " aria-current="page">Productos</li>
      <li class="breadcrumb-item active" aria-current="page">
        <a>Eliminar Producto</a>
      </li>
    </ol>
  </nav>
</div>

<div class="page-header text-center mt-3">
  <h1> Eliminar Producto
  </h1>

<div class="mx-auto w-50">

  {{Form::open(['route'=>['products.destroy',$products->id],'method'=>'DELETE'])}}
  <div class="form-group">
  <strong> {{Form::label('¿DESEA ELIMINAR EL SIGUIENTE PRODUCTO?')}}</strong>
  </div>

  <div class="form-group">
  <strong>{{Form::label('Producto: ')}}</strong>
    {{$products->name}}
  </div>

  <div class="form-group">
      <strong>{{Form::label('Precio: ')}}</strong>
      {{number_format($products->price)}}
  </div>

  {{Form::submit('Eliminar',['class'=>'btn btn-danger'])}}
  <a  class="btn btn" href="{{url('products')}}">Atras</a>
    
  {{Form::close()}}
 

</div>

</div>
@endsection