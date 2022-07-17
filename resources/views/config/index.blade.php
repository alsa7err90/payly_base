@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Configration  Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<form action="{{ route('configurations.store') }}" method="POST" class=" mt-4">
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
 
</form>

<form method="POST" action="{{ route('configurations.update',0) }}">
    @csrf
    @method('PUT')
    <input type="submit" value="save edit" class="btn btn-primary">


<table class="table table-bordered  mt-4">
 <tr>
   <th>No</th>
   <th>key</th>
   <th>value</th> 
   <th width="280px">Action</th>
 </tr> 
 @foreach ($data as $key => $d)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $d->key }}</td>
    <td><input type="text" value="{{ $d->value }}" name="{{ $d->key }}" class="form-control" ></td>
  </form>
    <td>
          {!! Form::open(['method' => 'DELETE','route' => ['configurations.destroy', $d->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}
 
@endsection