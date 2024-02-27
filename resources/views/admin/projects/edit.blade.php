@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Modifica un progetto</h1>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.projects.update', $project->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo"
                    required value="{{old('title') ?? $project->title}}">
            </div>
            <div class="form-group mb-3">
                @if ($project->img != null)
                <div class="mb-3">
                    <img src="{{asset('/storage/' . $project->img)}}" alt="{{$project->title}}" width="350">                    
                </div>
                @endif
                <label for="img" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="img" name="img">
            </div>
            <div class="form-group mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" name="content" id="content" rows="3" placeholder="Contenuto"
                    required>{{old('content') ?? $project->content}}
                </textarea>
            <button class="btn btn-success mt-3" type="submit">Salva</button>
            </div>
        </form>
@endsection