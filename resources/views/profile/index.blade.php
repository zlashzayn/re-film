@extends('layouts.master')

@section('title')
    Update Profile
@endsection

@section('content')
    <form action="{{ route('profile.update', $profiledetail->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ $profiledetail->user->name }}" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat Email</label>
            <input type="text" class="form-control" value="{{ $profiledetail->user->email }}" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan password baru (opsional)">
        </div>
        <div class="mb-3">
            <label class="form-label">Umur</label>
            <input type="number" class="form-control" value="{{ $profiledetail->age }}" name="age" min="0" max="120">
        </div>
        @error('age')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Bio</label>
            <textarea name="bio" class="form-control" rows="3">{{ $profiledetail->bio }}</textarea>
        </div>
        @error('bio')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection