@extends('layouts.app')

@section('content')
  <section>
     <div class="container my-4">

        {{-- pulsante ritorna alla lista  --}}
      <a href="{{ route('admin.projects.index')}}" class="btn btn-primary"> Return to list</a>

      <h2 class="mt-3">Add Project</h2>
        
      {{-- form aggiungi nuovo progetto --}}
      <form action="{{ route('admin.projects.store') }}" method="POST" class="row">
        @csrf

        <div class="col-6">
            <label for="title" class="form-label pt-3">Title</label>
            <input type="text" class="form-control" id="title" name="title" />
        </div>

        <div class="col-6">
            <label for="link" class="form-label pt-3">Link</label>
            <input type="text" class="form-control" id="link" name="link" />
        </div>

        <div class="col-12">
            <label for="description" class="form-label pt-3">Description</label>
            <textarea
                class="form-control"
                id="description"
                name="description"
                rows="5"
            ></textarea>
        </div>
        
        <div class="col-2">
            <button type="submit" class="btn btn-success mt-3">Salva</button>
        </div>
       </form>
     </div>
  </section>
@endsection
