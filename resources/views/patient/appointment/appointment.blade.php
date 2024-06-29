<x-app-layout>

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta description="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/appointment.css') }}">
    <script src="https://kit.fontawesome.com/c609c0bad9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h2><i class="fa-regular fa-calendar-check"></i> Appointment</h2>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
            
    @error('date')
        <div style="color:red">{{ $message }}</div>
    @enderror
    <form method="post" action="{{ route('patient.calendar.store') }}">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group form-inline">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" style="width: 35%;" id="date" name="date" required>
        
            <label for="time" class="form-label time">Time</label>
            <input type="time" class="form-control" style="width: 25%;" id="time" name="time" required>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn btn-light"><i class="fa-regular fa-calendar-check"></i> Appoint</button>  
        </div>
    </form>
</body>
</html>
@endsection

@section('title')
    Appointment
@endsection

</x-app-layout>