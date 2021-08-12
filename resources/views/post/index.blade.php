@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Post
                        <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm float-right">Add
                            Post</a>
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
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Created By</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sr = 1;
                                        @endphp
                                        @foreach ($posts as $post)

                                            <tr>
                                                <td>{{ $sr++ }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($post->image) }}" width="60px" alt="">
                                                </td>
                                                <td>{{ $post->category_id }}</td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>{{ $post->description }}</td>
                                                <td>
                                                    <a href="{{ route('post.delete', $post->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                    <a href="{{ route('post.edit', $post->id) }}"
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
