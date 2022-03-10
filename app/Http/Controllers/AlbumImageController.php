<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumImageController extends Controller
{
    public function index() {
        
    }

    public function add(int $id) {
        $album = Album::findOrFail($id);
        return view('pages.album-image.add-image', [
            'album' => $album
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'images' => 'required',
            'images.*' => 'required|mimes:jpg,jpeg,png',
            'descriptions.*' => 'nullable|max:255'
        ]);

        $album = Album::findOrFail($request->albumId);

        try {
            for($i = 0; $i < count($request->images); $i++) {

                $filenameWithExt = $request->images[$i]->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->images[$i]->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $request->images[$i]->storeAs('public/uploads/images/album_images', $filenameToStore);
    

                $album->albumImage()->create([
                    'imageName' => $filenameToStore,
                    'description' => $request->descriptions[$i]
                ]);
            }

            return redirect(route('album-year.index'));

        } catch(Exception $ex) {
            dd($ex);
        }
        
    }

    public function edit(int $id) {

    }

    public function update(Request $request) {

    }

    public function delete(int $id) {
        $album = Album::with('albumImage')->findOrFail($id);

        return view('pages.album-image.delete-image', [
            'album' => $album
        ]);
    }

    public function destroy(Request $request) {
        $request->validate([
            'imageIds' => 'required',
            'albumId' => 'required'
        ]);

        $imageIds = $request->imageIds;
        $album = Album::where('id', $request->albumId)->with('albumYear')->get();

        try {
            // radera bilden ur databasen
            foreach($imageIds as $imageId) {
                $image = AlbumImage::findOrFail($imageId);
                if(AlbumImage::destroy($imageId)) {
                    // radera bildfilen
                    Storage::delete('public/uploads/images/album_images/'.$image->imageName);
                }
            }
            return redirect()->route('album-year.details', ['albumYear' => $album[0]->albumYear->year]);
        } catch(Exception $ex) {
            return redirect(url('album-year.index'))->with('status', 'Ett fel uppstod när bilden/bilderna skulle raderas.');
        }
    }
}
