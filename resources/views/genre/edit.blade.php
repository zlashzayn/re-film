@extends('layouts.master')

@section('title')
    Mengedit Genre Film
@endsection

@section('content')
<form action="{{ route('genre.update', $genre->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Genre</label>
        <input name="name" type="name" value="{{ $genre->name }}" class="form-control">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection