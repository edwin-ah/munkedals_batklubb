<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumYear;
use Illuminate\Http\Request;

class AlbumYearController extends Controller 
{
  public function index() {
    return view('pages.album-year.index', [
      'years' => AlbumYear::all()->sortBy('year')
    ]);
  }

  public function details(int $year) {
    $year = AlbumYear::where('year', $year)->first();
    if($year == null) {
      abort(404);
    }
    $albums = Album::where('album_year_id', $year->id)->with('albumImage')->get();
    return view('pages.album-year.details', [
      'albums' => $albums
    ]);
  }
}