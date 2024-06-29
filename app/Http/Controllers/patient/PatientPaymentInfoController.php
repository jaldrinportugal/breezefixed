<?php

namespace App\Http\Controllers\patient;
use App\Http\Controllers\Controller;
use App\Models\PaymentInfo;
use Illuminate\Http\Request;

class PatientPaymentInfoController extends Controller
{
    public function index(){   
        $paymentinfo = PaymentInfo::all();
        $paymentinfo = PaymentInfo::paginate(10);
        return view('patient.paymentinfo.paymentinfo', compact('paymentinfo'));
    }

    public function createPayment(){
        return view('patient.paymentinfo.create');
    }

    public function storePayment(Request $request){
        $request->validate([
            'patient' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|integer',
            'balance' => 'required|integer',
            'date' => 'required|date',
        ]);

        $payment = PaymentInfo::create([
            'patient' => $request->input('patient'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'balance' => $request->input('balance'),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('patient.paymentinfo')
            ->with('success', 'Payment added successfully!');
    }

    public function deletePayment($id){
        $payment = PaymentInfo::findOrFail($id);
        $payment->delete();

        return back()
            ->with('success', 'Payment deleted successfully!');
    }

    public function updatePayment($id){
        $payment = PaymentInfo::findOrFail($id);
        return view('patient.paymentinfo.updatePayment')->with('payment', $payment);
    }

    public function updatedPayment(Request $request, $id){

        $patient = PaymentInfo::findOrFail($id);
        
        $request->validate([
            'patient' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|integer',
            'balance' => 'required|integer',
            'date' => 'required|date',
        ]);

        $patient->update([
            'patient' => $request->input('patient'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'balance' => $request->input('balance'),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('patient.paymentinfo')
            ->with('success', 'Payment updated successfully!');
    }
}
