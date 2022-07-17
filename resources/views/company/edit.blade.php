@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>edit {{ $company->name }} </h2>
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
 
{!! Form::model($company ,['method' => 'PATCH','route' => ['companies.update', $company->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name',  $company->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

     
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>fee:</strong>
            {!! Form::text('fee',  $company->fee, array('placeholder' => '5','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>type fee:</strong>
                {!! Form::select('type_fee', array(''=>'select type','percent' => 'percent % ', 'amount' => 'amount $'),  $company->type_fee , ['class' => 'form-control']); !!}
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>state:</strong>
                {!! Form::select('state', array('1' => 'active ', '0' => 'deactivate'), $company->state, ['class' => 'form-control']); !!}
            </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>url api:</strong>
            {!! Form::text('url_api', $company->url_api, array('placeholder' => 'get url from company','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>api key	:</strong>
            {!! Form::text('api_key', $company->api_key, array('placeholder' => 'get key from company','class' => 'form-control')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Message text email :</strong>
            {!! Form::text('message', $company->message, array('placeholder' => 'Thank you for using our service','class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>required data for api:</strong>
            {!! Form::text('data', $company->data, array('placeholder' => '["amount","email","phone","name"]','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>note :</strong>
            {!! Form::text('note', $company->note, array('placeholder' => 'note','class' => 'form-control')) !!}
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