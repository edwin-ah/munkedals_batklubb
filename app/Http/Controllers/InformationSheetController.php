<?php

namespace App\Http\Controllers;

use App\Models\CurrentInformation;
use Illuminate\Http\Request;
use App\Models\InformationSheet;
use Exception;
use Illuminate\Support\Facades\Storage;

class InformationSheetController extends Controller
{
    public function index() {

        $currentInformation = CurrentInformation::all();
        $currentInformationJson = $currentInformation->toJson();
        $informationSheets = InformationSheet::orderByDesc('id')->paginate(10);

        if(count($currentInformation) > 0) {
            return view('pages.information.index', [
                'informationSheets' => $informationSheets,
                'currentInformation' => $currentInformationJson,
                'activeInformationId' => $currentInformation->first()->id 
            ]);
        } else {
            return view('pages.information.index', [
                'informationSheets' => $informationSheets,
            ]);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:5|max:45',
            'pdf' => 'required|mimes:pdf|max:1000'
        ]);

        try {
            $filenameWithExt = $request->pdf->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->pdf->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $filePath = 'storage/uploads/pdfs/informationsheets/'.$filenameToStore;
            $newInformation = InformationSheet::create([
                'title' => $request->input('title'),
                'pdfName' => $filenameToStore,
                'filePath' => $filePath
            ]);

            $newInformation->save();
            $request->pdf->storeAs('public/uploads/pdfs/informationsheets', $filenameToStore);
            return redirect(route('information.index'))->with('status', 'Informationsbladet och pdf-filen är tillagd.');

        } catch(Exception $ex) {
            return redirect(route('information.index'))->with('status', 'Ett fel uppstod när informationsbladet skulle laddas upp.');
        }
    }

    public function edit(int $id) {
        $information = InformationSheet::findOrFail($id);
        return view('pages.information.edit-information', [
            'information' => $information
        ]);
    }

    public function update(Request $request) {
        $request->validate([
            'title' => 'required|min:5|max:45'
        ]);

        $information = InformationSheet::findOrFail($request->id);
        $information->title = $request->title;
        try{
            $information->save();
            return redirect(route('information.index'))->with('status', 'Informationsbladets titel är uppdaterat.');
        } catch(Exception) {
            return redirect(route('information.index'))->with('status', 'Ett fel uppstod när informationsbladet skulle uppdateras.');
        }
    }


    public function delete(int $id) {
        $information = InformationSheet::findOrFail($id);
        return view('pages.information.delete-information', [
            'information' => $information
        ]);
    }

    public function destroy(Request $request) {
        $information = InformationSheet::findOrFail($request->id);
        if(InformationSheet::destroy($information->id)){
            if(Storage::delete('public/uploads/pdfs/informationsheets/'.$information->pdfName)) {
                return redirect(route('information.index'))->with('status', 'Informationsbladet och pdf-filen är raderat.');
            } else {
                return redirect(route('information.index'))->with('status', 'Informationsbladet raderat ur databasen men det gick inte radera pdf-filen.');
            }
        } else {
            return redirect(route('information.index'))->with('status', 'Ett fel uppstod, det gick inte radera något.');
        }
    }
}
