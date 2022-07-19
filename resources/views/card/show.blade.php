@extends('layouts.app') 
@section('content') 
<x-body.content>
    <x-slot name="content"> 
                <x-cards.title>
                    <x-slot name="title"> Show Card </x-slot>
                    <x-slot name="button">
                        <a class="btn btn-primary" href="{{ route('cards.index') }}"> back</a>
                    </x-slot>
                </x-cards.title>

                @if (Session::has('success'))
                    <x-messages.success>
                        <x-slot name="message"> {{ Session::get('success') }} </x-slot>
                    </x-messages.success>
                @endif
                @if (Session::has('error'))
                    <x-messages.error>
                        <x-slot name="message"> {{ Session::get('error') }} </x-slot>
                    </x-messages.error>
                @endif

                <div class="card-body ">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $card->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>state:</strong>
                                {{ $card->state }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>fee:</strong>
                                {{ $card->fee }} {{ $card->type_fee }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>amount:</strong>
                                {{ $card->amount }} {{ $card->type_amount }}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>price:</strong>
                                {{ $card->price }} {{ $card->currency }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>image:</strong>
                                {{ $card->image }}
                            </div>
                        </div>

                    </div>
                </div>
        </x-slot>
    </x-body.content>
@endsection
