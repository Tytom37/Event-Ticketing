<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Attendee;
use App\Models\Schedule;
use  Illuminate\Support\Facades\File;

class AttendeeController extends Controller
{
    public function index() {
        $attendees = Attendee::with('schedule')->orderBy('fullname')->get();

        return inertia('Complete', [
            'attendees' => $attendees
        ]);
    }

    public function create() {
        $schedules = Schedule::orderBy('name')->get();
        return inertia('Booking', [
            'schedules' => $schedules
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'schedule_id' => 'required|exists:schedules,id'
        ]);

        $attendee = Attendee::create($validatedData);

        return redirect('/complete')->with('success', 'Attendee created successfully!');
    }

    public function pdf() {
        $attendees = Attendee::orderBy('fullname')->get();
        $pdf = Pdf::loadView('attendee-list', compact('attendees'));
        return $pdf->stream('attendee-list.pdf');
    }

    public function generateCSV() {
        $attendees = Attendee::orderBy('id')->get();

        $filename = '../storage/attendee.csv';
        
        $file = fopen($filename, 'w+');

        fputcsv($file , [
            'Id', 
            'Fullname',
            'Contact Number',
            'Email',
            'Event ID'
        ]);
        foreach($attendees as $a) {

            fputcsv($file, [
                $a->id,
                $a->fullname,     
                $a->contact_number,
                $a->email,
                $a->schedule_id
            ]);
        }
        fclose($file);

        return response()->download($filename);
    }

    public function importCSV(Request $request) {
        $request->validate([
            'import_file' => 'required|file|max:2048',
        ]);

        $importFile = $request->file('import_file');
        $extension = $importFile->getClientOriginalExtension();

        if ($extension === 'csv') {
            $csv = Reader::createFromPath($importFile->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $csvData = $csv->getRecords();

            foreach ($csvData as $row) {
                Attendee::create([
                    'id' => $row['Id'],
                    'fullname' => $row['Fullname'],
                    'contact_number' => $row['Contact Number'],
                    'email' => $row['Email'],
                    'schedule_id' => $row['Event ID']
                ]);
            }

            return redirect()->back()->with('success', 'CSV uploaded and attendees imported successfully.');
        } elseif ($extension === 'pdf') {

            $pdfData = File::get($importFile->getPathname());

            return redirect()->back()->with('success', 'PDF uploaded and attendees imported successfully.');
        }

        return redirect()->back()->with('error', 'Invalid file format. Please upload a CSV or PDF file.');
    }
    
    
}
