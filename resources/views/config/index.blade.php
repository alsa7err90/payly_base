@extends('layouts.app')

@section('content')
    <x-body.content>
        <x-slot name="content">
            <x-cards.title>
                <x-slot name="title">Configration Management</x-slot>
                <x-slot name="button">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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

            <div class="card-body">
                <form action="{{ route('configurations.store') }}" method="POST" class=" mt-4">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="key">key</label>
                            <input type="text" name="key" class="form-control mb-2" id="key"
                                placeholder="name">
                        </div>
                        .<div class="col-auto">
                            <label class="sr-only" for="value">value</label>
                            <input type="text" name="value" class="form-control mb-2" id="value"
                                placeholder="Jane Doe">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Save new</button>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered  mt-4">
                    <form method="POST" action="{{ route('configurations.update', 0) }}">
                        @csrf
                        @method('PUT')
                        <input type="submit" value="Save All Edit" class="btn btn-primary">

                        <tr>
                            <th>No</th>
                            <th>key</th>
                            <th>value</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($data as $key => $d)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $d->key }}<input type="hidden" value="{{ $d->key }}"
                                        name="{{ $d->key }}"></td>
                                <td><input type="text" value="{{ $d->value }}" name="{{ $d->key }}"
                                        class="form-control"></td>
                    </form>
                    <td>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['configurations.destroy', $d->id],
                            'style' => 'display:inline',
                        ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                    </tr>
                    @endforeach
                </table>
                {!! $data->render() !!}
            </div>
        </x-slot>
    </x-body.content>
@endsection
