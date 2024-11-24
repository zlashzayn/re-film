@extends('layouts.master')

@section('title')
    Menambah Data Film
@endsection

@section('content')
<form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input name="title" class="form-control">
    </div>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Ringkasan Cerita</label>
        <textarea name="summary" class="form-control" rows="3"></textarea>
    </div>
    @error('summary')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Tahun Rilis</label>
        <select name="release_year" class="form-control" required>
            @for ($year = 1900; $year <= date('Y'); $year++)
                <option value="{{ $year }}">{{ $year }}</option>
            @endfor
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Poster</label>
        <input name="poster" type="file" class="form-control">
    </div>
    @error('poster')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="genre_id">Genre</label>
        <select name="genre_id" id="genre_id" class="form-control">
            <option value="" disabled selected>Pilih Genre</option>
            @foreach ($genre as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection