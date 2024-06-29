<x-app-layout>

@section('content')
    <div class="container"> 

        <h2>{{ $patientlist->name }}</h2>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Name: {{ $patientlist->name }}</th>
                    <th>Gender: {{ $patientlist->gender }}</th>
                    <th>Age: {{ $patientlist->age }}</th>
                    <th>Phone No: {{ $patientlist->phone }}</th>
                    <th>Address: {{ $patientlist->address }}</th>
                </tr>
            </thead>
        </table>
        

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <a href="{{ route('admin.record.create') }}" class="btn btn-primary">Add Record</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>List of Record</th>
                </tr>
            </thead>
            <tbody>
            @if(is_iterable($records) && count($records) > 0)
                @forelse ($records as $record)
                    <tr>
                        <td>{{ $record->file }}</td>
                        <td>
                            <a href="{{ route('updateRecord', [$patientlist->id, $record->id]) }}" class="btn btn-warning">Edit patient</a>
                            <form method="post" action="{{ route('deleteRecord', [$patientlist->id, $patient->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Record registered yet.</td>
                    </tr>
                @endforelse
            @endif
            </tbody>
        </table>

        <a href="{{ route('admin.patientlist') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection

@section('title')
    Record
@endsection

</x-app-layout>