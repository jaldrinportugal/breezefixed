<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patientlist;
use App\Models\Record;

class AdminRecordController extends Controller
{
    
    public function createRecord()
    {
        return view('admin.record.create');
    }

    public function storeRecord(Request $request)
    {
        $request->validate([
            'file' => 'required|string'
        ]);

        $record = Record::create([
            'file' => $request->input('file'),
        ]);

        return redirect()->route('admin.record.create')->with('success', 'Record added successfully!');
    }

    public function showRecord($patientlistId, $recordId)
    {
        $patientlist = Patientlist::findOrFail($patientlistId);
        $records = $patientlist->records;
        $record = Record::findOrFail($recordId);
    
        return view('admin.patientlist.showRecord', compact('patientlist', 'records', 'record'));
    }

    public function deleteRecord($patientlistId, $recordId)
    {
        $patientlist = Patientlist::findOrFail($patientlistId);
        $record = Record::findOrFail($recordId);

        $record->delete();

        return redirect()->route('admin.showRecord', $patientlist->id)->with('success', 'Record deleted successfully!');
    }

    public function updateRecord($patientlistId, $recordId)
    {
        $patientlist = Patientlist::findOrFail($patientlistId);
        $record = Record::findOrFail($recordId);

        return view('record.updateRecord', compact('patientlist', 'record'));
    }

    public function updatedRecord(Request $request, $patientlistId, $recordId)
    {
        $request->validate([
            'file' => 'string',
        ]);

        $patientlist = Patientlist::findOrFail($patientlistId);
        $record = Record::findOrFail($recordId);

        $record->update([
            'file' => $request->input('file'),
        ]);

        return redirect()->route('admin.showRecord', $patientlist->id)
            ->with('success', 'Record updated successfully!');
    }
}
