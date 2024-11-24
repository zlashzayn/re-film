<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $film = Film::all();
        $film = Film::with('genre')->get();
        return view('film.index', compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();
        return view('film.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $fileName = time(). '.' .$request->poster->extension();
        $request->poster->move(public_path('image'), $fileName);

        $film = new Film;

        $film->title = $request->title;
        $film->summary = $request->summary;
        $film->release_year = $request->release_year;
        $film->genre_id = $request->genre_id;
        $film->poster = $fileName;

        $film->save();
        return redirect()->route('film.index')->with('success', 'Film berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::with('genre')->find($id);
        return view('film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::with('genre')->find($id);

        if (!$film) {
            return redirect()->route('film.index')->with('error', 'Film tidak ditemukan.');
        }

        $genre = Genre::all();
        return view('film.edit', compact('film', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $film = Film::find($id);
        $film->title = $request->title;
        $film->summary = $request->summary;
        $film->release_year = $request->release_year;
        $film->genre_id = $request->genre_id;
        $film->save();
        return redirect()->route('film.index')->with('success', 'Film berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);
        $film->delete();
        return redirect()->route('film.index')->with('success', 'Film berhasil dihapus.');
    }
}
