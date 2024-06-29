<x-app-layout>

@section('content')
    <div class="container">
        <h2>Update Patient</h2>
        <form method="post" action="{{ route('patient.record.updated', [$patientlist->id, $patient->id]) }}">

            @csrf
            @method('GET')

            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="text" class="form-control" id="file" name="file" value="{{ old('file', $record->file) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Record</button>
            
        </form>

        <a href="{{ route('patient.showRecord', $patientlist->id) }}" class="btn btn-secondary mt-3">Back to View Record</a>
    </div>
@endsection

@section('title')
    Update Record
@endsection

</x-app-layout>