<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $genre = Genre::all();
        return view('genre.index', compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        Genre::create([
            'name' => $request->name
        ]);
        return redirect()->route('genre.index')->with('success', 'Genre berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = Genre::find($id);
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::find($id);
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $genre = Genre::find($id);
        $genre->name = $request->name;
        $genre->update();
        return redirect()->route('genre.index')->with('success', 'Genre berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::find($id);
        $genre->delete();
        return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus.');
    }
}
