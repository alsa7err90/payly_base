@extends('layouts.app')

@section('content')
   
<x-body.content>
    <x-slot name="content">
                <x-cards.title>
                    <x-slot name="title">Users Management</x-slot>
                    <x-slot name="button">
                        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <label>{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
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
