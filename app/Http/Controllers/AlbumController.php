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

            return redirect()->route('album-image.add', ['albumId' => $newAlbum->id]);

        } catch(Exception $ex) {
            dd($ex);
            return redirect(route('album-year.index'))->with('status', 'Ett fel uppstod, det gick inte lägga till albumet.');
        }
        
    }

    public function edit(int $id) {
        $album = Album::with('albumYear')->findOrFail($id);
        return view('pages.album.edit-album', [
            'album' => $album
        ]);
    }

    public function update(Request $request) {
        $request->validate([
            'year' => 'required|numeric|digits:4',
            'title' => 'required|min:5|max:50',
            'description' => 'nullable|max:255'
        ]);

        try {
   
            $album = Album::with('albumYear')->findOrFail($request->id);

            $album->title = $request->title;
            $album->description = $request->description;
            $album->save();

            if ($request->year != $album->albumYear->year) {
                $oldAlbumYear = $album->album_year_id;

                $year = AlbumYear::firstOrCreate([
                    'year' => $request->year
                ]);
                $album->album_year_id = $year->id;
                $album->save();

                $this->checkAlbumYear($oldAlbumYear);
            }

            return redirect()->route('album-year.details', ['albumYear' => $album->albumYear->year]);

        } catch(Exception $ex) {
            dd($ex);
            return redirect(route('album-year.index'))->with('status', 'Ett fel uppstod, det gick inte lägga till albumet.');
        }
    }

    public function delete(int $id) {

    }

    public function destroy(Request $request) {
        
    }

    private function checkAlbumYear($yearId) {
        $year = AlbumYear::with('album')->find($yearId);
        if(count($year->album) == 0) {
            $year->delete();
        }       
    }
}
