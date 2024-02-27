@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Aggiungi un progetto</h1>
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
        <form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo"
                    required value="{{old('title')}}">
            </div>
            <div class="form-group mb-3">
                <label for="img" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="img" name="img" value="{{old('img')}}">
            </div>
            <div class="form-group mb-3">
                <label for="type_id" class="form-label">Seleziona tipologia</label>
                <select name="type_id" id="type_id" class="form-select">
                    <option value="">Seleziona tipologia</option>
                    @foreach ($types as $type) 
                        <option value="{{$type->id}}" @selected($type-> == old('type_id'))>{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" name="content" id="content" rows="3" placeholder="Contenuto"
                    required>{{old('content')}}
                </textarea>
            <button class="btn btn-success mt-3" type="submit">Salva</button>
            </div>
        </form>
@endsection