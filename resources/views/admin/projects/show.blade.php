@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center my-2">
            <h1>Project {{$project->id}}</h1>
            <div>
                <a href="{{route('admin.projects.edit', ['project' => $project->id])}}" 
                    class="btn btn-warning">Edit
                </a>
            </div>
        </div>
        <div>
            <h1>{{$project->title}}</h1>
            @if($project->img != null)
                <img src="{{asset('/storage/' . $project->img)}}" alt="{{$project->title}}" width="350">
            @else
                <img src="{{asset('/img/aaaa.jpg')}}" alt="{{$project->title}}" width="350">
            @endif
            <h3>{{$project->slug}}</h3>
            <p>{{$project->content}}</p>
        </div>
@endsection