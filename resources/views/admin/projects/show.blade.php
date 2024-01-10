@extends('layouts.app')
@section('content')
    <section>
        <div class="container py-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h1 class="display-4 fw-bold mb-4">{{ $project->title }}</h1>
            <p>{{ $project->description }}</p>
            <a class="btn btn-success" href="{{ route('admin.projects.edit', $project) }}">edit</a>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to index</a>
        </div>
    </section>
@endsection
