@extends('layouts.master')

@section('title', 'Detail Film')

@section('content')
<div class="row">
    <!-- Kolom Gambar -->
    <div class="col-md-4">
        <img src="{{ asset('image/' . $film->poster) }}" class="img-fluid" style="max-width: 100%; max-height: auto;" alt="Poster {{ $film->title }}">
    </div>

    <!-- Kolom Detail -->
    <div class="col-md-8">
        <h3 class="card-title">{{ $film->title }}</h3>
        <p><strong>Tahun Rilis:</strong> {{ $film->release_year }}</p>
        <p><strong>Genre:</strong> {{ $film->genre->name }}</p>
        <p class="card-text">{{ $film->summary }}</p>
        <a href="{{ route('film.index') }}" class="btn btn-success">kembali</a>

        <hr class="sidebar-divider my-3">
        
        <h4>List Review</h4>

        <form action="/review" method="post">
            @csrf
            <textarea name="content" class="form-control my-3" placeholder="Masukkan review" col="3"></textarea>
            @error('content')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            <input type="submit" value="review">
        </form>

    </div>
</div>
@endsection
