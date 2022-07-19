@extends('layouts.app')

@section('content')
    <x-body.content>
        <x-slot name="content">
            <x-cards.title>
                <x-slot name="title">Show Company </x-slot>
                <x-slot name="button">
                    <a class="btn btn-primary" href="{{ route('companies.index') }}"> back</a>
                </x-slot>
            </x-cards.title>
            @if (Session::has('success'))
                <x-messages.success>
                    <x-slot name="message">{{ Session::get('success') }} </x-slot>
                </x-messages.success>
            @endif
            @if (Session::has('error'))
                <x-messages.error>
                    <x-slot name="message">{{ Session::get('error') }} </x-slot>
                </x-messages.error>
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $company->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>state:</strong>
                            {{ $company->state }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>fee:</strong>
                            {{ $company->fee }} {{ $company->type_fee }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>url api:</strong>
                            {{ $company->url_api }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>api key:</strong>
                            {{ $company->api_key }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>message:</strong>
                            {{ $company->message }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>data:</strong>
                            {{ $company->data }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>note:</strong>
                            {{ $company->note }}
                        </div>
                    </div>

                </div>
            </div>
        </x-slot>
    </x-body.content>
@endsection
