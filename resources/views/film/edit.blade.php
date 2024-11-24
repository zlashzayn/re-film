@extends('layouts.master')

@section('title')
    Mengedit Data Film
@endsection

@section('content')
<form action="{{ route('film.update', $film->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input name="title" type="title" value="{{ $film->title }}" class="form-control">
    </div>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Ringkasan Cerita</label>
        <textarea name="summary" class="form-control" rows="3">{{ $film->summary }}</textarea>
    </div>
    @error('summary')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Tahun Rilis</label>
        <select name="release_year" class="form-control" required>
            @for ($year = 1900; $year <= date('Y'); $year++)
                <option value="{{ $year }}" {{ $film->release_year == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endfor
        </select>        
    </div>
    <div class="mb-3">
        <label for="genre_id">Genre</label>
        <select name="genre_id" id="genre_id" class="form-control">
            @foreach ($genre as $value)
                <option value="{{ $value->id }}" {{ $film->genre_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection