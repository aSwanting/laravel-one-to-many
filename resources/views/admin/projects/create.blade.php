@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="mb-4">Projects Index</h1>
            <form class="mb-3" action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Project Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Project Description</label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>
                <button type="submit" class="btn btn-primary me-3">Create Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to Index</a>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </section>
@endsection
