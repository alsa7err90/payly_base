@extends('layouts.app') 
@section('content')
    <x-body.content>
        <x-slot name="content">
            <!-- Card Header - Dropdown -->
            <x-cards.title>
                <x-slot name="title"> Cards Management</x-slot>
                <x-slot name="button">
                    <a class="btn btn-success" href="{{ route('cards.create') }}"> Create New card</a>
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
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>name</th>
                        <th>amount</th>
                        <th>Fee</th>
                        <th>state</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($cards as $key => $d)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->amount }} {{ $d->type_amount }}</td>
                            <td>{{ $d->fee }} {{ $d->type_fee }}</td>
                            <td>{{ $d->state }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('cards.show', $d->id) }}">show</a>
                                <a class="btn btn-primary" href="{{ route('cards.edit', $d->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['cards.destroy', $d->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $cards->render() !!}
            </div>
        </x-slot>
    </x-body.content>
@endsection
