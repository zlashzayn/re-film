@extends('layouts.master')

@section('title')
    Daftar Film Berdasarkan Genre
@endsection

@section('content')
<h3>Genre {{ $genre->name }}</h3>
<div class="row">
    @forelse ($genre->film as $item)
        <div class="col-3">
            <div class="card">
                <img src="{{ asset('image/' . $item->poster) }}" class="card-img-top img-fluid" style="max-width: 400px; max-height: 600px;" alt="Poster {{ $item->title }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $item->title }}</h3>
                    <p class="card-text">{{ Str::limit($item->summary, 200) }}</p>
                    <form action="{{ route('film.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('film.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                        @auth
                            <a href="{{ route('film.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus Film ini?')">
                        @endauth
                    </form>
                </div>
            </div>
        </div>
    @empty
        <h5 class="text-center">Genre ini tidak memiliki Film</h5>
    @endforelse
</div>
@endsection