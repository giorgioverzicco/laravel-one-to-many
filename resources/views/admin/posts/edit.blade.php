@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header d-inline-flex">
                        <span class="font-weight-bold" style="font-size: 1.5rem">Edit: {{ $post->title }}</span>
                        <div class="ml-auto">
                            <a class="btn btn-primary" href="{{ route('admin.posts.index') }}" role="button">
                                {{ __('Go back to all posts') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.posts.update', $post->slug) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="post-title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="post-title" name="title" value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="post-category-id">Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="post-category-id" name="category_id">
                                    <option value="">Select any category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="post-content">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="post-content" name="content" rows="3">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="post-published" name="published" {{ old('published', $post->published) ? 'checked' : '' }}>
                                <label class="form-check-label" for="post-published">Publish</label>
                                @error('published')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
