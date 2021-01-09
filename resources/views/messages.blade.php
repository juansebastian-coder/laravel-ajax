@if(Session::has('save'))

<div class="alert alert-success">
    <strong>{{Session::get('save')}}</strong>
</div>

@endif

@if(Session::has('update'))
<div class="alert alert-success">
    <strong>{{Session::get('update')}}</strong>
</div>
@endif


@if(Session::has('delete'))
<div class="alert alert-success">
    {{Session::get('delete')}}
</div>
@endif


@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>
    {{$error}}
    </li>
    @endforeach    
    </ul>
</div>
@endif