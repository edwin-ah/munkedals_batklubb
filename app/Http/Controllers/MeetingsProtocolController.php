<?php

namespace App\Http\Controllers;

use App\Models\meetingsProtocol;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MeetingsProtocolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.protocol.index', [
            'protocols' => MeetingsProtocol::orderByDesc('year')
                                            ->paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:45',
            'date' => 'required|date',
            'pdf' => 'required|mimes:pdf|max:1000'
        ]);

        try {
            $year = substr($request->date, 0, 4);

            $filenameWithExt = $request->pdf->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->pdf->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $filePath = 'storage/uploads/pdfs/memberprotocols/'.$filenameToStore;
            
            $newProtocol = MeetingsProtocol::create([
                'title' => $request->input('title'),
                'year' => $year,
                'date' => $request->input('date'),
                'pdfName' => $filenameToStore,
                'filePath' => $filePath
            ]);
            $newProtocol->save();
            $request->pdf->storeAs('public/uploads/pdfs/memberprotocols', $filenameToStore);
            return redirect(route('protocol.index'))->with('status', 'Medlemsprotokollet och pdf-filen är tillagd.');

        } catch(Exception $ex) {
            dd($ex);
            return redirect(route('protocol.index'))->with('status', 'Ett fel uppstod när medlemsprotokollet skulle laddas upp.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $protocol = MeetingsProtocol::findOrFail($id);
        return view('pages.protocol.edit-protocol', [
            'protocol' => $protocol
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:45',
            'year' => 'required|numeric|digits:4',
            'date' => 'required|date',
        ]);

        $protocol = MeetingsProtocol::findOrFail($request->id);
        $protocol->title = $request->title;
        $protocol->year = $request->year;
        $protocol->date = $request->date;
        try{
            $protocol->save();
            return redirect(route('protocol.index'))->with('status', 'Protokollets information är uppdaterat.');
        } catch(Exception) {
            return redirect(route('protocol.index'))->with('status', 'Ett fel uppstod när protokollet skulle uppdateras.');
        }
    }

    public function delete(int $id) 
    {
        $protocol = MeetingsProtocol::findOrFail($id);
        return view('pages.protocol.delete-protocol', [
            'protocol' => $protocol
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Request $request)
    {
        $protocol = MeetingsProtocol::findOrFail($request->id);
        if(MeetingsProtocol::destroy($protocol->id)){
            if(Storage::delete('public/uploads/pdfs/memberprotocols/'.$protocol->pdfName)){
                return redirect(route('protocol.index'))->with('status', 'Protokollet och pdf-filen är raderat.');
            } else {
                return redirect(route('protocol.index'))->with('status', 'Protokollet raderat ur databasen men det gick inte radera pdf-filen.');
            }
        } else {
            return redirect(route('protocol.index'))->with('status', 'Ett fel uppstod, det gick inte radera något.');
        }
    }
}
