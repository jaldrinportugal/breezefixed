<x-app-layout>

@section('content')
    <div class="container"> 

        <h2>{{ $communityforums->topic }}</h2>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Topic : {{ $communityforums->topic }}</th>
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
        
        <a href="{{ route('patient.comment.create') }}" class="btn btn-primary">Add Comment</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>List of Comment</th>
                </tr>
            </thead>
            <tbody>
            @if(is_iterable($comments) && count($comments) > 0)
                @forelse ($comments as $comment)
                    <tr>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            <a href="{{ route('patient.updateComment', [$communityforums->id, $comment->id]) }}" class="btn btn-warning">Edit Comment</a>
                            <form method="post" action="{{ route('patient.deleteComment', [$communityforums->id, $communityforum->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Comment registered yet.</td>
                    </tr>
                @endforelse
            @endif
            </tbody>
        </table>

        <a href="{{ route('patient.communityforum') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection

@section('title')
    Comment
@endsection

</x-app-layout>