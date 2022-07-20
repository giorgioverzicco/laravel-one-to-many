@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header d-inline-flex">
                        <span class="font-weight-bold" style="font-size: 1.5rem">Create a new Category</span>
                        <div class="ml-auto">
                            <a class="btn btn-primary" href="{{ route('admin.categories.index') }}" role="button">
                                {{ __('Go back to all categories') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="post-name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="post-name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
