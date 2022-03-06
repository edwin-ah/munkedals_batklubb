<?php

namespace App\Http\Controllers;

use App\Models\HolidayClosedDate;
use Illuminate\Http\Request;

class HolidayClosedDateController extends Controller
{
    public function index() {
        $holidayClosedDate = HolidayClosedDate::firstOrCreate(
            ['id' => 1],
            ['year' => 2021, 'startWeek' => 26, 'endWeek' => 29, 'isVisible' => true]
        );

        return view('pages.index', ['holidayClosedDate' => $holidayClosedDate]);
    }

    public function update(Request $request) {
        $request->validate([
            'year' => 'required|numeric|digits:4',
            'startWeek' => 'required|numeric|min:1|max:53|digits:2',
            'endWeek' => 'required|numeric|min:1|max:53|digits:2'
        ]);
        $holidayClosedDate = HolidayClosedDate::find($request->id);
        $holidayClosedDate->year = $request->input('year');
        $holidayClosedDate->startWeek = $request->input('startWeek');
        $holidayClosedDate->endWeek = $request->input('endWeek');
        
        if($request->has('visible')){
            $holidayClosedDate->isVisible = true;
        } else {
            $holidayClosedDate->isVisible = false;
        }
        
        $holidayClosedDate->save();

        return view('pages.index', ['holidayClosedDate' => $holidayClosedDate]);
    }
}
