@extends('layouts.app')

@section('content') 
    <x-body.content>
        <x-slot name="content">
            <x-cards.title>
                <x-slot name="title">Edit {{ $card->name }} </x-slot>
                <x-slot name="button">
                    <a class="btn btn-primary" href="{{ route('cards.index') }}"> back</a>
                </x-slot>
            </x-cards.title>

            @if (count($errors) > 0)
                <x-messages.validate>
                    <x-slot name="list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </x-slot>
                </x-messages.validate>
            @endif
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

            <?php
            $option_fee = ['percent' => 'percent % ', 'amount' => 'amount $'];
            $option_state = ['0' => 'deactivate', '1' => 'active'];
            $inputs = [
                // nameView , nameIndb , placeholder , 'value'  ,
                ['text', 'Name', 'name', 'name card', $card->name],
                ['select', 'Company', 'company_id', $select, $card->amount],
                ['select', 'State', 'state', $option_state, $card->state],
                ['text', 'Amount', 'amount', 'amount  card', $card->amount],
                ['text', 'Type Amount', 'type_amount', 'as points', $card->type_amount],
                ['text', 'Price', 'price', 'price : as 10', $card->price],
                ['text', 'Currency', 'currency', "currency : as $ or usd", $card->currency],
                ['text', 'Fee', 'fee', 'as 3', $card->fee],
                ['select', 'Type Fee', 'type_fee', $option_fee, $card->type_fee],
                ['file', 'Select Image', 'image', '', ''],
                ['button', 'update', '', '', ''],
            ];
            ?>
            <div class="card-body">
                {!! Form::model($card, ['method' => 'PATCH', 'route' => ['cards.update', $card->id], 'files' => true]) !!}

                @foreach ($inputs as $input)
                    <x-form.inputText>
                        <x-slot name="type">{{ $input[0] }} </x-slot>
                        <x-slot name="nameView">{{ $input[1] }} </x-slot>
                        <x-slot name="nameInDb"> {{ $input[2] }} </x-slot>
                        <x-slot name="placeholder">
                            @if (gettype($input[3]) == 'string')
                                {{ $input[3] }}
                            @else
                                @foreach ($input[3] as $key => $value)
                                    <option value="{{ $key }}" <?php
                                    if (isset($input[4]) && $input[4] == $key) {
                                        echo 'selected';
                                    }
                                    ?>>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            @endif
                        </x-slot>
                        <x-slot name="value">{{ $input[4] }} </x-slot>
                    </x-form.inputText>
                @endforeach
                {!! Form::close() !!} 
            </div>
        </x-slot>
    </x-body.content>
@endsection
