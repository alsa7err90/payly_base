@extends('layouts.app')

@section('content')
    <x-body.content>
        <x-slot name="content">

            <x-cards.title>
                <x-slot name="title">Companies Management</x-slot>
                <x-slot name="button">
                    <a class="btn btn-success" href="{{ route('companies.create') }}"> Create New Company</a>
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
                <table class="table table-bordered  mt-4">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>State</th>
                        <th>Fee</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($companies as $key => $d)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><a href="{{ route('cards.show', $d->id) }}"> {{ $d->name }}</a></td>
                            <td>{{ $d->state }}</td>
                            <td>{{ $d->fee }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('companies.show', $d->id) }}">show</a>
                                <a class="btn btn-primary" href="{{ route('companies.edit', $d->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['companies.destroy', $d->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table> 
                {!! $companies->render() !!}
            </div>
        </x-slot>
    </x-body.content>
@endsection
