@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <h1 class="mb-4">Projects Index</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">NEW PROJECT</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}">
                                    {{ $project->title }}
                                </a>
                            </td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ $project->description }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.projects.edit', $project) }}">edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-sm btn-danger" type="submit" value="delete">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Projects Exist!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
