@extends('layouts.master')

@section('title','Editar Producto ')

@section('content')

<div class="row">
  <nav aria-label=" breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Escritorio</a></li>
      <li class="breadcrumb-item " aria-current="page">Productos</li>
      <li class="breadcrumb-item active" aria-current="page">
        <a>Editar Producto</a>
      </li>
    </ol>
  </nav>
</div>

<div class="page-header text-center mt-3">
  <h1> Editar Producto
  </h1>

  @include('messages')
  
<div class="mx-auto w-50">
  {{Form::model($products,['route'=>['products.update',$products->id], 'method'=>'PUT'])}}
  <div class="form-group">
    {{Form::label('name','Nombre')}}
    {{Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Nombre Proudcto'])}}
  </div>

  <div class="from-group">
    {{Form::label('price','Precio',['class'=>'float-left'])}}
    {{Form::text('price',null,['id'=>'price','class'=>'form-control', 'placeholder'=>'Precio producto'])}}
  </div>

  <div class="form-group">
    {{Form::label('mark', 'Marca',['class'=>['float-left','font-weight-bold"']])}}
    {{Form::select('mark_id',$responseMarks,null,['class'=>'form-control'])}}
  </div>
  {{Form::submit('Editar',['name'=>'crear', 'id'=>'crear','class'=>'btn btn-outline-danger btn-block'])}}
  {{Form::close()}}

</div>

</div>
@endsection