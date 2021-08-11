@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        User List
                        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm float-right">Add Users</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-light">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>sr No</th>
                                            <th>Users</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sr = 1;
                                        @endphp
                                        @foreach ($users as $user)

                                            <tr>
                                                <td>{{ $sr++ }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->is_admin ? 'Admin' : 'Editor' }}</td>
                                                <td>
                                                    <a href="{{ route('user.delete', $user->id) }}"
                                                        class="btn btn-Danger">Delete</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
