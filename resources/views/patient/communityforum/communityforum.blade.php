<x-app-layout>

@section('content')

    <div class="container">
        <h2>Community Forum</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('patient.communityforum.create') }}" class="btn btn-primary">Add Topic</a>
        <br>
        <div class="table">
            <tbody>
                @foreach ($communityforums as $communityforum)
                    <tr>
                        <div class="card" style="text-align: center; padding: 2rem; margin-top: 1rem; margin-bottom: 5px; border: 3px solid black">
                            <td>{{ $communityforum->topic }}</td>
                        </div>
                        
                        <td >
                            <a href="{{ route('patient.showComment', $communityforum->id) }}" class="btn btn-info">View Comment</a>
                            <a href="{{ route('patient.updateCommunityforum', $communityforum->id) }}" class="btn btn-warning">Update</a>
                            <form method="post" action="{{ route('deleteCommunityforum', $communityforum->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </div>

@endsection

@section('title')
    Community Forum
@endsection

</x-app-layout>