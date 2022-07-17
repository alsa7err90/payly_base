@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Card</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('cards.index') }}"> Back</a>
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

{!! Form::open(array('route' => 'cards.store','method'=>'POST','files' => true)) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

     
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>amount:</strong>
            {!! Form::text('amount', null, array('placeholder' => '5','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>type amount:</strong>
            {!! Form::text('type_amount', null, array('placeholder' => 'points','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Company:</strong>
                {!! Form::select('company_id', $select, '', ['class' => 'form-control']); !!}
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
            <strong>price :</strong>
            {!! Form::text('price', null, array('placeholder' => 'Thank you for using our service','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>currency :</strong>
            {!! Form::text('currency', null, array('placeholder' => 'Thank you for using our service','class' => 'form-control')) !!}
        </div>
    </div>

    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>fee :</strong>
            {!! Form::text('fee', null, array('placeholder' => '7','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>type fee :</strong>
            {!! Form::select('type_fee', array(''=>'select type','percent' => 'percent % ', 'amount' => 'amount $'), '', ['class' => 'form-control']); !!}
        </div>
    </div>


  
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>image :</strong>
            {!! Form::file('image',  array('accept' => 'image/*','class' => 'form-control')) !!}
        </div>
    </div>


    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

{!! Form::close() !!}

 @endsection