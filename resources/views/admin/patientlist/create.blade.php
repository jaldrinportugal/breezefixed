<x-app-layout>

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/createpatientlist.css') }}">
    <script src="https://kit.fontawesome.com/c609c0bad9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h2><i class="fa-solid fa-user-plus"></i> Add Patient</h2>
    </div>
    @error('date')
        <div style="color:red">{{ $message }}</div>
    @enderror
    <form method="post" action="{{ route('admin.patient.store') }}">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Patient Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group form-inline">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control" id="gender" name="gender" style="width:30%;" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                
                <label for="age" class="form-label age">Age</label>
                <input type="number" class="form-control" id="age" name="age" style="width:30%;" required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone" class="form-label">Phone No</label>
            <input type="number" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        @csrf
        <div class="btn-container">
            <button type="submit" class="btn btn-light" title="Add Patient"><i class="fa-solid fa-user-plus"></i> Add</button>
            <a href="{{ route('admin.patientlist') }}" class="btn btn-light" title="Cancel"><i class="fa-regular fa-rectangle-xmark"></i> Cancel</a>
        </div>
    </form>
</body>
</html>
@endsection

@section('title')
    New Patient
@endsection

</x-app-layout>