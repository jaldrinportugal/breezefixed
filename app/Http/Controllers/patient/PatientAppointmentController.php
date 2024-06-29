<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;

class PatientAppointmentController extends Controller
{
    public function index(){
        return view('patient.appointment.appointment');
    }
    
}
