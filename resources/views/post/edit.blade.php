@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        Category
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('post.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" class="form-control" type="text" name="title"
                                            value="{{ $category->title }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input id="image" class="form-control" type="text" name="image"
                                            value="{{ $category->image }}">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input id="description" class="form-control" type="text" name="description"
                                            value="{{ $category->description }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input id="status" class="form-control" type="text" name="status"
                                            value="{{ $category->description }}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
                                        <select name="role" class="custom-select-sm">
                                            <option selected>{{ $category->title ? 'title' : '' }}</option>
                                            <option value="admin">{{ $category->title }}</option>
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
