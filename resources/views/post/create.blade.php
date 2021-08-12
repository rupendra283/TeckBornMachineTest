@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Category
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" class="form-control" type="text" name="title" value="">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input id="image" class="form-control" type="file" name="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description"></textarea>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="status">Status</label>
                                        <input id="status" class="form-control" type="text" name="status">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category" class="custom-select-sm">
                                            @foreach ($categories as $category)

                                                <option value="{{ $category->title }}">{{ $category->title }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
