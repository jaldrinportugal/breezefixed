<x-app-layout>

@section('content')
    <div class="container">
        <h2>Add Record</h2>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        
        <form method="post" action="{{ route('patient.record.store') }}">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload File</button>
        </form>
    </div>
@endsection

@section('title')
    Add Record
@endsection

</x-app-layout>