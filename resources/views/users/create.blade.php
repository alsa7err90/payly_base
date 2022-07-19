@extends('layouts.app')

@section('content')
    <x-body.content>
        <x-slot name="content">
            <x-cards.title>
                <x-slot name="title">Create New User</x-slot>
                <x-slot name="button">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
            $inputs = [
                // nameView , nameIndb , placeholder
                ['text', 'Name', 'name', 'name card'],
                ['text', 'Email', 'email', 'enter email user '],
                ['text', 'Password', 'password', ' enter password user'],
                ['text', 'Confirm Password', 'confirm-password', 'Confirm Password'],
                ['select', 'Role', 'roles[]', $roles],
                ['button', 'save', '', ''],
            ];
            ?>
            <div class="card-body">

                {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

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
                                    <option value="{{ $key }}">
                                        {{ $value }}
                                    </option>
                                @endforeach
                            @endif
                        </x-slot>
                    </x-form.inputText>
                @endforeach

                {!! Form::close() !!}
            </div>
        </x-slot>
    </x-body.content>
@endsection
