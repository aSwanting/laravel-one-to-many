@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="mb-4">Projects Index</h1>
            <form class="mb-3" action="{{ route('admin.projects.update', $project) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Project Title</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ old('title', $project->title) }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Project Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ old('description', $project->description) }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to index</a>
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
