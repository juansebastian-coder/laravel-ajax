@extends('layouts.master')

@section('title','productos')

@section('content')

@include('messages')


 <div class="page-header text-center mt-3">
     <h1> Productos
         <small>Actualizados Hasta Hoy</small>
     </h1>
 </div>
<br>
<div>
    <div class="btn btn-danger float-right"   id="nuevo">+ nuevo</div>
</div>
  <div id="list-product">

  </div>

   



  <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>


    <script>
     $(document).ready(function(){
        listProduct();
     });


     $("#nuevo").click(function(event){
            document.location.replace("{{url('products/create')}}");
     });


    function listProduct(){
         $.ajax({
             type:'get',
             url:'{{url("listAll")}}',
             success(data){
                $('#list-product').empty().html(data);
             }

         });
     };



     $(document).on('click','a.page-link', function(e){
        e.preventDefault();
        let url=$(this).attr('href');

        $.ajax({
            type:'get',
            url:url,
            success(data){
                $('#list-product').empty().html(data);
            }
        })
     })
 </script> 
@endsection