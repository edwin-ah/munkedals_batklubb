<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumYear;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index() {
        $years = Album::orderBy('year')->distinct('year')->pluck('year');

        return view('pages.album.index', [
            'years' => $years
          ]);
    }

    public function store(Request $request) {
        $request->validate([
            'year' => 'required|numeric|digits:4',
            'title' => 'required|min:5|max:50',
            'description' => 'nullable|max:255'
        ]);

        try {
            $newAlbum = Album::create([
                'title' => $request->title,
                'year' => $request->year,
                'description' => $request->description
            ]);
            $newAlbum->save();

            return redirect()->route('album-image.add', ['albumId' => $newAlbum->id]);

        } catch(Exception $ex) {
            dd($ex);
            return redirect(route('album.index'))->with('status', 'Ett fel uppstod, det gick inte lägga till albumet.');
        }
    }

    public function albumsYear(int $year) {
        if($year == null) {
          abort(404);
        }

        $albums = Album::where('year', $year)->with('albumImage')->get();

        return view('pages.album.albums-year', [
          'albums' => $albums
        ]);
    }

    public function edit(int $id) {
        $album = Album::findOrFail($id);
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
   
            $album = Album::findOrFail($request->id);

            $album->title = $request->title;
            $album->year = $request->year;
            $album->description = $request->description;
            $album->save();

            return redirect()->route('album-year', ['albumYear' => $album->year])
                                ->withFragment('#'.$album->id)
                                ->with('status', "'{$album->name}' är uppdaterat.");

        } catch(Exception $ex) {
            dd($ex);
            return redirect()->route('album-year', ['albumYear' => $album->year])
                                ->withFragment('#'.$album->id)
                                ->with('status', "Ett fel uppstod när albumet '{$album->name}' skulle uppdateras.");
        }
    }

    public function delete(int $id) {
        $album = Album::findOrFail($id);

        return view('pages.album.delete-album', [
            'album' => $album
        ]);
    }

    public function destroy(Request $request) {
        try {
            $album = Album::with('albumImage')->findOrFail($request->id);
            Album::destroy($album->id);
            foreach($album->albumImage as $image)
            {
                Storage::delete('public/uploads/images/album_images/'.$image->imageName);
            }
            return redirect(route('album-index'))->with('status', "Albumet '{$album->name}' är raderat.");
        } catch(Exception $ex) {
            dd($ex);
            return redirect(route('album-index'))->with('status', "Ett fel uppstod när albumet '{$album->name}' skulle raderas.");
        }
        
    }
}
