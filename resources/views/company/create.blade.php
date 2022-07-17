@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Company</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
        </div>
    </div>
</div>
<br>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
@if (Session::has('success'))
   <div class="alert alert-info">{{ Session::get('success') }}</div>
@endif
@if (Session::has('error'))
   <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

{!! Form::open(array('route' => 'companies.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

     
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>fee:</strong>
            {!! Form::text('fee', null, array('placeholder' => '5','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>type fee:</strong>
                {!! Form::select('type_fee', array(''=>'select type','percent' => 'percent % ', 'amount' => 'amount $'), '', ['class' => 'form-control']); !!}
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>state:</strong>
                {!! Form::select('state', array('1' => 'active ', '0' => 'deactivate'), '1', ['class' => 'form-control']); !!}
            </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>url api:</strong>
            {!! Form::text('url_api', null, array('placeholder' => 'get url from company','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>api key	:</strong>
            {!! Form::text('api_key', null, array('placeholder' => 'get key from company','class' => 'form-control')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Message text email :</strong>
            {!! Form::text('message', null, array('placeholder' => 'Thank you for using our service','class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>required data for api:</strong>
            {!! Form::text('data', null, array('placeholder' => '["amount","email","phone","name"]','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>note :</strong>
            {!! Form::text('note', null, array('placeholder' => 'note','class' => 'form-control')) !!}
        </div>
    </div>
    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div> --}}
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

{!! Form::close() !!}

 @endsection