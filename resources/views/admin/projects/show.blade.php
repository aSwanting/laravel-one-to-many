@extends('layouts.app')
@section('content')
    <section>
        <div class="container py-5">
            <h1 class="display-4 fw-bold mb-4">{{ $project->title }}</h1>
            <p>{{ $project->description }}</p>
        </div>
    </section>
@endsection
