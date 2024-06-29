<x-app-layout>

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <script src="https://kit.fontawesome.com/c609c0bad9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h2><i class="fa-solid fa-calendar-days"></i> Calendar</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calendars as $calendar)
                <tr>
                    <td>{{ $calendar->name }}</td>
                    <td>{{ $calendar->description}}</td>
                    <td>{{ $calendar->date}}</td>
                    <td>{{ $calendar->time }}</td>
                    <td>
                        <a href="{{ route('admin.updateCalendar', $calendar->id) }}" class="btn btn-light"title="Update"><i class="fa-solid fa-pen"></i></a>
                        <form method="post" action="{{ route('admin.deleteCalendar', $calendar->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light" title="Delete" onclick="return confirm('Are you sure you want to delete this appointment?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection

@section('title')
    Calendar
@endsection

</x-app-layout>