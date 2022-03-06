<?php

namespace App\Http\Controllers;

use App\Models\CurrentInformation;
use Illuminate\Http\Request;
use Exception;

class CurrentInformationController extends Controller
{
    public function index()
    {
        return view('pages.current-information.index', [
            'currentInformations' => CurrentInformation::all()
        ]);
    }

    public function store (Request $request) 
    {
        $request->validate([
            'header' => 'required|min:5|max:45',
            "description" => 'required|min:5|max:200'
        ]);
        try {
            $newCurrentInfo = CurrentInformation::create([
                'header' => $request->header,
                'description' => $request->description
            ]);
    
            $newCurrentInfo->save();
            return redirect(route('current-information.index'))->with('status', 'Den nya aktuella information är tillagd.');
        } catch (Exception $ex) {
            return redirect(route('current-information.index'))->with('status', "Ett fel uppstod, det gick inte lägga till '{$request->header}'.");
        }
    }

    public function edit(int $id) 
    {
        $currentInformation = CurrentInformation::findOrFail($id);
        return view('pages.current-information.edit-current-information', [
            'currentInformation' => $currentInformation
        ]);
    }

    public function update(Request $request) 
    {
        $request->validate([
            'header' => 'required|min:5|max:45',
            'description' => 'required|min:5|max:200'
        ]);

        
        $currentInformation = CurrentInformation::findOrFail($request->id);
        $currentInformation->header = $request->header;
        $currentInformation->description = $request->description;
        try {
            $currentInformation->save();
            return redirect(route('current-information.index'))->with('status', "'{$currentInformation->header}' har lagts till.");
        } catch(Exception) {
            return redirect(route('current-information.index'))->with('status', "Det gick inte lägga till '{$currentInformation->header}'.");
        }
    }

    public function delete(int $id) 
    {
        $currentInformation = CurrentInformation::findOrFail($id);
        return view('pages.current-information.delete-current-informaiton', [
            'currentInformation' => $currentInformation
        ]);
    }

    public function destroy(Request $request) 
    {
        $currentInformation = CurrentInformation::findOrFail($request->id);
        if(CurrentInformation::destroy($currentInformation->id)) {
            return redirect(route('current-information.index'))->with('status', "'{$currentInformation->header}' är borttagen.");
        } else {
            return redirect(route('current-information.index'))->with('status', "Det gick inte ta bort'{$currentInformation->header}'.");
        }
    }
}
