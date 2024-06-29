<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class AdminCalendarController extends Controller
{
    public function index(){
        $calendars = Calendar::all();
        return view('admin.calendar.calendar', compact('calendars'));
    }
    public function createCalendar(){
        return view('admin.appointment.appointment');
    }
    
    public function storeCalendar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $calendar = Calendar::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        return redirect()->route('appointment')->with('success', 'Appointment added successfully!');
    }
    public function deleteCalendar($id){
        $calendar = Calendar::findOrFail($id);
        $calendar->delete();

        return back()
            ->with('success', 'Appointment deleted successfully!');
    }

    public function updateCalendar($id){
        $calendar = Calendar::findOrFail($id);
        return view('admin.calendar.updateCalendar')->with('calendar', $calendar);
    }

    public function updatedCalendar(Request $request, $id){

        $calendar = Calendar::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $calendar->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        return redirect()->route('admin.calendar')
            ->with('success', 'Appointment updated successfully!');
    }
}
