@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Cards  Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('cards.create') }}"> Create New card</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
 
<table class="table table-bordered  mt-4">
 <tr>
   <th>No</th>
   <th>name</th>
   <th>amount</th> 
   <th>Fee</th> 
   <th>state</th> 
   <th width="280px">Action</th>
 </tr> 
 @foreach ($cards as $key => $d)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $d->name }}</td> 
    <td>{{ $d->amount }} {{ $d->type_amount }}</td> 
    <td>{{ $d->fee }} {{ $d->type_fee }}</td>  
    <td>{{ $d->state }}</td> 
    <td>
        <a class="btn btn-primary" href="{{ route('cards.show',$d->id) }}">show</a>
        <a class="btn btn-primary" href="{{ route('cards.edit',$d->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['cards.destroy', $d->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>
 

{!! $cards->render() !!}

 
@endsection