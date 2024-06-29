<x-app-layout>

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/updatepatient.css') }}">
    <script src="https://kit.fontawesome.com/c609c0bad9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h2><i class="fa-solid fa-user-pen"></i> Update Patient</h2>
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
    <form method="post" action="{{ route('admin.updatedPatient', $patient->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="form-label">Patient Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $patient->name) }}" required>
        </div>
        <div class="form-group form-inline">
            <label for="gender" class="form-label">Gender:</label>
            <select class="form-control" style="width:30%;" id="gender" name="gender" value="{{ old('gender', $patient->gender) }}" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
                
            <label for="age" class="form-label age">Age</label>
            <input type="number" class="form-control" style="width:30%;" id="age" name="age" value="{{ old('age', $patient->age) }}" required>
        </div>
        <div class="form-group">
            <label for="phone" class="form-label">Phone No.</label>
            <input type="number" class="form-control" id="phone" name="phone" value="{{  old('phone', $patient->phone) }}" required>
        </div>
        <div class="form-group">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{  old('address', $patient->address) }}" required>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn btn-light"><i class="fa-solid fa-user-pen"></i> Update</button>
            <a href="{{ route('admin.patientlist') }}" class="btn btn-light" title="Cancel"><i class="fa-regular fa-rectangle-xmark"></i> Cancel</a>
        </div>
    </form>
</body>
</html>
@endsection

@section('title')
    Update Patient
@endsection

</x-app-layout>