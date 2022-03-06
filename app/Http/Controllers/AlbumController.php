<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumYear;
use Exception;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index() {
        
    }

    public function store(Request $request) {
        $request->validate([
            'year' => 'required|numeric|digits:4',
            'title' => 'required|min:5|max:50',
            'description' => 'nullable|max:255'
        ]);

        try {
            $year = AlbumYear::firstOrCreate([
                'year' => $request->year
            ]);

            $newAlbum = Album::create([
                'album_year_id' => $year->id,
                'title' => $request->title,
                'description' => $request->description
            ]);

            $newAlbum->save();

            return redirect(route('album-year.index'))->with('status', 'Albumet har lagts till.');
        } catch(Exception $ex) {
            dd($ex);
            return redirect(route('album-year.index'))->with('status', 'Ett fel uppstod, det gick inte lägga till albumet.');
        }
        
    }

    public function edit(int $id) {
        $album = Album::findOrFail($id);
        return view('pages.album.edit-album', [
            'album' => $album
        ]);
    }

    public function update(Request $request) {

    }

    public function delete(int $id) {

    }

    public function destroy(Request $request) {
        
    }
}
