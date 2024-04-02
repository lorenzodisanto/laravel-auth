@extends('layouts.app')

@section('content')
  <section>
     <div class="container my-4">

      {{-- pulsante ritorna alla lista  --}}
      <a href="{{ route('admin.projects.index')}}" class="btn btn-primary">Return to list</a>

      {{-- pulsante torna al dettaglio --}}
      <a href="{{ route('admin.projects.show', $project)}}" class="btn btn-info">Info</a>


      <h2 class="mt-3">Edit Project</h2>
        
      {{-- form modifica progetto --}}
      <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="row">
        @csrf

        {{-- aggiungo modificatore --}}
        @method("PATCH")

        <div class="col-6">
            <label for="title" class="form-label pt-3">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}"/>
        </div>

        <div class="col-6">
            <label for="link" class="form-label pt-3">Link</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ $project->link }}"/>
        </div>

        <div class="col-12">
            <label for="description" class="form-label pt-3">Description</label>
            <textarea
                class="form-control"
                id="description"
                name="description"
                rows="5"
            >{{ $project->description }}</textarea>
        </div>
        
        <div class="col-2">
            <button type="submit" class="btn btn-warning mt-3">Edit</button>
        </div>
       </form>
     </div>
  </section>
@endsection
