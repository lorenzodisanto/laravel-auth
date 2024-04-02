@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="my-4">Project list</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->description }}</td>
                            <td><a href="{{ route('admin.projects.show', $project) }}"> Info </a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3"><i>Nessun Progetto</i></td>
                        </tr>
                    @endforelse
    
                </tbody>
            </table>

            {{-- paginazione --}}
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
