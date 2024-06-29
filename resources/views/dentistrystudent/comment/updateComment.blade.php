<x-app-layout>

@section('content')
    <div class="container">
        <h2>Update Comment</h2>
        <form method="post" action="{{ route('dentistrystudent.comment.updated', [$communityforums->id, $communityforum->id]) }}">

            @csrf
            @method('GET')

            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <input type="text" class="form-control" id="comment" name="comment" value="{{ old('comment', $communityforum->comment) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Comment</button>
            
        </form>

        <a href="{{ route('dentistrystudent.showComment', $communityforums->id) }}" class="btn btn-secondary mt-3">Back to View Comment</a>
    </div>
@endsection

@section('title')
    Update Comment
@endsection

</x-app-layout>