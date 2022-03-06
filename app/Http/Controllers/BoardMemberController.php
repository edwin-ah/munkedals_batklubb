<?php

namespace App\Http\Controllers;

use App\Models\BoardMember;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BoardMemberController extends Controller
{
    public function index() {
        return view('pages.board-member.index', [
            'boardMembers' => BoardMember::all()
        ]);
    }

    public function store(Request $request) {
 
        Validator::extend('num_spaces', function($attr, $value){
            return preg_match('/^[0-9 +-]*$/', $value);
        });

        $request->validate([
            'role' => 'required|min:5|max:25',
            'name' => 'required|min:5|max:50',
            'homePhone' => 'nullable|between:9,10|num_spaces',
            'mobile' => 'nullable|between:10,15|num_spaces',
            'email' => 'nullable|min:10|max:50|email',
            'imagePath' => 'nullable|mimes:jpg,jpeg,png'
        ],
        [
            'num_spaces' => 'Inga andra tecken än siffror och mellanslag är tillåtna.'
        ]);

        try {
            $newBoardMember = new BoardMember;
            $newBoardMember->name = $request->name;
            $newBoardMember->role = $request->role;
            $newBoardMember->homePhone = $request->homePhone;
            $newBoardMember->mobile = $request->mobile;
            $newBoardMember->email = $request->email;

            if($request->image) {
                $filenameWithExt = $request->image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->image->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $newBoardMember->imageName = $filenameToStore;
                $newBoardMember->hasImage = true;

                $request->image->storeAs('public/uploads/images/board_members', $filenameToStore);

            } else {
                $newBoardMember->imageName = 'avatar_placeholder.png';
                $newBoardMember->hasImage = false;
            }

            $newBoardMember->save();
            return redirect(route('board-member.index'))->with('status', $request->name.' har lagts till.');

        } catch(Exception $ex) {
            dd($ex);
            return redirect(route('board-member.index'))->with('status', 'Ett fel uppstod när '.$request->name.' skulle läggas till.');
        }
    }

    public function edit(int $id) {
        $boardMember = BoardMember::findOrFail($id);
        return view('pages.board-member.edit-board-member', [
            'boardMember' => $boardMember
        ]);
    }

    public function update(Request $request) {
        $boardMember = BoardMember::findOrFail($request->id);

        Validator::extend('num_spaces', function($attr, $value){
            return preg_match('/^[0-9 +-]*$/', $value);
        });

        $request->validate([
            'role' => 'required|min:5|max:25',
            'name' => 'required|min:5|max:50',
            'homePhone' => 'nullable|between:9,10|num_spaces',
            'mobile' => 'nullable|between:10,15|num_spaces',
            'email' => 'nullable|min:10|max:50|email',
            'imagePath' => 'nullable|mimes:jpg,jpeg,png'
        ],
        [
            'num_spaces' => 'Inga andra tecken än siffror och mellanslag är tillåtna.'
        ]);

        try {
            $boardMember->name = $request->name;
            $boardMember->role = $request->role;
            $boardMember->homePhone = $request->homePhone;
            $boardMember->mobile = $request->mobile;
            $boardMember->email = $request->email;

            if($request->image) {
                if($boardMember->hasImage) {
                    Storage::delete('public/uploads/images/board_members/'.$boardMember->imageName);
                }

                $filenameWithExt = $request->image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->image->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $boardMember->imageName = $filenameToStore;
                $boardMember->hasImage = true;

                $request->image->storeAs('public/uploads/images/board_members', $filenameToStore);
            }

            $boardMember->save();
            return redirect(route('board-member.index'))->with('status', "Informationen för {$boardMember->name} har ändrats.");

        } catch(Exception $ex) {
            return redirect(route('board-member.index'))->with('status', "Ett fel uppstod när informationen för {$boardMember->name} skulle ändras.");
        }
    }

    public function delete(int $id) {
        $boardMember = BoardMember::findOrFail($id);
        return view('pages.board-member.delete-board-member', [
            'boardMember' => $boardMember
        ]);
    }

    public function destroy(Request $request) {
        $boardMember = BoardMember::findOrFail($request->id);
        if(BoardMember::destroy($boardMember->id)) {
            if($boardMember->hasImage) {
                Storage::delete('public/uploads/images/board_members/'.$boardMember->imageName);
            }
            return redirect(route('board-member.index'))->with('status', "'{$boardMember->name}' har tagits bort ur styrelse/funktionärer.");
        } else {
            return redirect(route('board-member.index'))->with('status', "Det gick inte ta bort '{$boardMember->name}' ur styrelse/funktionärer.");
        }
    }

    public function destroyImage(Request $request) {
        $boardMember = BoardMember::findOrFail($request->id);
        try {
            $oldImageName = $boardMember->imageName;
            $boardMember->imageName = "avatar_placeholder.png";
            $boardMember->hasImage = false;
            $boardMember->save();
            if(Storage::delete('public/uploads/images/board_members/'.$oldImageName)) {
                return redirect(route('board-member.index'))->with('status', 'Bilden är borttagen.');
            } else {
                return redirect(route('board-member.index'))->with('status', 'Bilden är raderat ur databasen men det gick inte radera bild-filen.');
            }
        } catch(Exception) {
            return redirect(route('board-member.index'))->with('status', 'Ett fel uppstod, det gick inte radera något.');
        }
    }
}


