@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Category
                        <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-right">Add
                            Category</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-light">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>sr No</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sr = 1;
                                        @endphp
                                        @foreach ($categories as $category)

                                            <tr>
                                                <td>{{ $sr++ }}</td>
                                                <td>{{ $category->title }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td>
                                                    <a href="{{ route('category.delete', $category->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                    <a href="{{ route('category.edit', $category->id) }}"
                                                        class="btn btn-success btn-sm">Edit</a>
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
