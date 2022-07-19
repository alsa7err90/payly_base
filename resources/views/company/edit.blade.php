@extends('layouts.app')

@section('content')
    <x-body.content>
        <x-slot name="content"> 
            <x-cards.title>
                <x-slot name="title">Edit {{ $company->name }}</x-slot>
                <x-slot name="button">
                    <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
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
                // nameView , nameIndb , placeholder
                ['text', 'Name', 'name', 'name card', $company->name],
                ['text', 'Url Api', 'url_api', 'get url from company', $company->name],
                ['text', 'Api key', 'api_key', 'get key from company', $company->name],
                ['text', 'required data for api', 'data', '["amount","email","phone","name"]', $company->name],
                ['text', 'Fee', 'fee', 'as 3', $company->name],
                ['select', 'Type Fee', 'type_fee', $option_fee, $company->name],
                ['select', 'State', 'state', $option_state, $company->name],
                ['text', 'Message text email', 'message', 'Thank you for using our service', $company->name],
                ['text', 'note', 'note', 'write any note here ', $company->name],
                ['file', 'Select Image', 'image', '', ''],
                ['button', 'Update', '', '', ''],
            ];
            ?>
            <div class="card-body">

                {!! Form::model($company, ['method' => 'PATCH', 'route' => ['companies.update', $company->id]]) !!}
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
