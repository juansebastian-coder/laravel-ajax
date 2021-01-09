@extends('layouts.master')

@section('title','Nueva Marca')

@section('content')


<div class="row">
  <nav aria-label=" breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Escritorio</a></li>
      <li class="breadcrumb-item " aria-current="page">Marcas</li>
      <li class="breadcrumb-item active" aria-current="page">
        <a>Marca Nueva</a>
      </li>
    </ol>
  </nav>
</div>

<div class="page-header text-center mt-3">
  <h1> Marca
    <small> Nueva</small>
  </h1>

  @include('messages')

  <div id="msm-error" class="alert alert-info" style="display: none;">
      <strong id="errorM"></strong>
  </div>

<div class="mx-auto w-50">
    {{Form::open(['id'=>'form'])}}

    <div class="form-group">
        {{Form::label('Nombre')}}
        {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la marca','id'=>'name'])}}
    </div>

    {{link_to('#','grabar',['id'=>'grabar','class'=>'btn btn-info btn-sm'])}}

    {{Form::close()}}
</div>




<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>
    
    $('#grabar').click(function(){
        var name=$('#name').val();
        var token=$('input[name=_token]').val();
        var route='{{route("mark.store")}}';
        var dataString='name='+name;
console.log(dataString)
        $.ajax({
            type:'post',
            url:route,
            headers:{'X-CSRF-TOKEN':token},
            datatype:'json',
            data:dataString,
            success(data){

            }, error(error){
                console.log(error.responseJSON.errors['name'][0])
                $('#errorM').html(error.responseJSON.errors['name'][0]);
                $('#msm-error').show(1000,'linear');
                setTimeout(function(){ $('#msm-error').hide(3000,'linear'); }, 3000)
                
            }

        })

        
    });
</script>

@endsection
