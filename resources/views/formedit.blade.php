@extends('layouts.main')
@section('title', "Form Edit Movies")
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/update/{{ $mv->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $mv->title }}"  required>
                 </div>
                 <div class="form-group">
                    <label>Genre</label>
                    <select name="genre" class="form-control">
                        <option value="0">--Pilih Genre--</option>
                        <option value="Action" {{ ($mv->genre == "Action") ? "selected":""}}>Action</option>
                        <option value="Horror" {{ ($mv->genre == "Horror") ? "selected":""}}>Horror</option>
                        <option value="Thriller" {{ ($mv->genre == "Thriller") ? "selected":""}}>Thriller</option>
                        <option value="Comedy" {{ ($mv->genre == "Comedy") ? "selected":""}}>Comedy</option>
                        <option value="Crime" {{ ($mv->genre == "Crime") ? "selected":""}}>Crime</option>
                        <option value="Romance" {{ ($mv->genre == "Romance") ? "selected":""}}>Romance</option>
                        <option value="Anime" {{ ($mv->genre == "Anime") ? "selected":""}}>Anime</option>
                    </select>
                 </div>
                 <div class="form-gorup">
                    <label>Year</label>
                    <input type="number" min="1900" max="2100" name="year" value="{{ $mv->year}}" class="form-control" required>
                 </div>
                 <div class="form-group">
                    <label>Poster</label>
                    <input type="file" accept="image/*" name="poster" class="form-control" required>
                 </div>
                 <div class="form-group">
                    <img src="{{asset('/storage/'.$mv->poster) }}" alt="{{$mv->poster}}" height="80" width="170">
                 </div>
                 <div class="form-group">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                 </div>
            </form>
        </div>
    </div>
@endsection