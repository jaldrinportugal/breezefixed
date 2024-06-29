<x-app-layout>

@section('content')
<style>
    div {
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }
    .container {
        padding: 20px;
        max-width: 500px;
        margin: auto;
    }
    .form-label {
        font-weight: bold;
    }
    .btn {
        width: 25%;
        margin-top: 10px;
    }
</style>
    <div class="container">
        <h2>Create Comment</h2>
            @error('date')
                <div style="color:red">{{ $message }}</div>
            @enderror
        <form method="post" action="{{ route('dentistrystudent.comment.store') }}">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" id="comment" name="comment" placeholder="What's on your mind?" required>
            </div>
            @csrf
            <button class="btn btn-primary">Comment</button>
        </form>
    </div>
@endsection

@section('title')
    Create Comment
@endsection

</x-app-layout>