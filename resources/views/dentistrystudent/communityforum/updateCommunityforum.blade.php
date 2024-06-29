<x-app-layout>

@section('content')
    <div class="container">
        <h2>Update Topic</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('dentistrystudent.updatedCommunityforum', $communityforum->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="text" class="form-control" id="topic" name="topic" placeholder="What's on your mind?" value="{{ old('topic', $communityforum->topic) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('dentistrystudent.communityforum') }}" class="btn btn-info mt-3">Cancel</a>
    </div>
@endsection

@section('title')
    Update Post
@endsection

</x-app-layout>