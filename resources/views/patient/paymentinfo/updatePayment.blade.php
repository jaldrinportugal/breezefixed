<x-app-layout>

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/updatepaymentinfo.css') }}">
    <script src="https://kit.fontawesome.com/c609c0bad9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h2><i class="fa-solid fa-money-bill"></i> Update Payment</h2>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('patient.updatedPayment', $payment->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient" class="form-label">Patient</label>
            <input type="text" class="form-control" id="patient" name="patient" value="{{ old('patient', $payment->patient) }}" required>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $payment->description) }}" required>
        </div>
        <div class="form-group form-inline">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" style="width:30%;" id="amount" name="amount" value="{{  old('amount', $payment->amount) }}" required>
            
            <label for="balance" class="form-label balance">Balance</label>
            <input type="number" class="form-control" style="width:30%;" id="balance" name="balance" value="{{ old('balance', $payment->balance) }}" required>
        </div>
        <div class="form-group">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{  old('date', $payment->date) }}" required>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn btn-light"><i class="fa-solid fa-pen-to-square"></i> Update</button>
            <a href="{{ route('patient.paymentinfo') }}" class="btn btn-light"><i class="fa-regular fa-rectangle-xmark"></i> Cancel</a>
        </div>
    </form>
</body>
</html>
@endsection

@section('title')
    Update Payment
@endsection

</x-app-layout>