<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumImage;
use Exception;
use Illuminate\Http\Request;

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
        dd($request->imageId);
    }
}
