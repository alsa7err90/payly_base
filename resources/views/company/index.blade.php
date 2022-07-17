@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Companies  Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('companies.create') }}"> Create New Company</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

{{-- <form action="{{ route('companies.store') }}" method="POST" class=" mt-4">
    @csrf 

    <div class="form-row align-items-center">
        <div class="col-auto">
          <label class="sr-only" for="key">key</label>
          <input type="text" name="key" class="form-control mb-2" id="key" placeholder="name">
        </div>
        .<div class="col-auto">
            <label class="sr-only" for="value">value</label>
            <input type="text" name="value" class="form-control mb-2" id="value" placeholder="Jane Doe">
          </div>
        
         
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
      </div>
 
</form> --}}

  
<table class="table table-bordered  mt-4">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>State</th> 
   <th>Fee</th> 
   <th width="280px">Action</th>
 </tr> 
 @foreach ($companies as $key => $d)
  <tr>
    <td>{{ ++$i }}</td>
    <td><a href="{{ route('cards.show',$d->id) }}">  {{ $d->name }}</a></td> 
    <td>{{ $d->state }}</td> 
    <td>{{ $d->fee }}</td>  
    <td>
        <a class="btn btn-primary" href="{{ route('companies.show',$d->id) }}">show</a>
        <a class="btn btn-primary" href="{{ route('companies.edit',$d->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['companies.destroy', $d->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>
 

{!! $companies->render() !!}

 
@endsection