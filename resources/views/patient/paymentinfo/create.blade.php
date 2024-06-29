<x-app-layout>

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/createpaymentinfo.css') }}">
    <script src="https://kit.fontawesome.com/c609c0bad9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h2><i class="fa-solid fa-hand-holding-dollar"></i> Add Payment</h2>
    </div>
        
    @error('date')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <form method="post" action="{{ route('patient.payment.store') }}">
        @csrf
        <div class="form-group">
            <label for="patient" class="form-label">Patient</label>
            <input type="text" class="form-control" id="patient" name="patient" required>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group form-inline">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" style="width:30%;" required>

            <label for="balance" class="form-label balance">Balance</label>
            <input type="number" class="form-control" id="balance" name="balance" style="width:30%;" required>
        </div>
        <div class="form-group">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        @csrf
        <div class="btn-container">
            <button class="btn btn-light"><i class="fa-solid fa-plus"></i> Add</button>
            <a href="{{ route('patient.paymentinfo') }}" class="btn btn-light"><i class="fa-regular fa-rectangle-xmark"></i> Cancel</a>
        </div>
    </form>
</body>
</html>
@endsection

@section('title')
    Add Payment
@endsection

</x-app-layout>