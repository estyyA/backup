@extends('layouts/main')
@section('title', "Profile")
@section('artikel')
    <div class="card">
        <div class="card-header">
            <a href="/movies/form-add" class="btn btn-primary"><i class="bi bi-plus-square-dotted"></i>Movies</a>
        </div>
        <div class="card-body"></div>
        @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('alert')}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
          </div>
        @endif
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Poster</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mv as $idx => $m)
                <tr>
                    <td>{{ $idx +1}}</td>
                    <td>{{ $m->title}}</td>
                    <td>{{ $m->genre}}</td>
                    <td>{{ $m->year}}</td>
                    <td>
                        <img src="{{asset('/storage/'.$m->poster) }}" alt="{{$m->poster}}" height="80" width="170">
                    </td>
                    <td>
                        <a href="/form-edit/{{ $m->id}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="/delete/{{ $m->id}}" class="btn btn-danger"><i class="bi bi-trash3"></i></i></a>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection