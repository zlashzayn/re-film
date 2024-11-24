@extends('layouts.master')

@section('title')
    Daftar Genre
@endsection

@section('content')
<a href="{{ route('genre.create') }}" class="btn btn-primary mb-3">Add</a>

<table class="table table-striped">
    <thead>                  
        <tr>
            <th>No.</th>
            <th>Nama Genre</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($genre as $key => $value)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    <form action="{{ route('genre.destroy', $value->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('genre.show', $value->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('genre.edit', $value->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus genre ini?')">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No data available</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection