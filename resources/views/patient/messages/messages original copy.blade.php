<x-app-layout>

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        height: 100vh;
        background-color: #f0f0f0;

    }
    #container {
        display: flex;
        height: calc(90vh - 60px);
    }
    .patient-list {
        width: 25%;
        background-color: #fff;
        border-right: 1px solid #ddd;
        overflow-y: auto;
        padding: 10px;
    }
    .messages-container {
        width: 75%;
        background-color: #fff;
        display: flex;
        flex-direction: column;
    }
    .message-input {
        display: flex;
        padding: 10px;
        border-top: 1px solid #ddd;
        background-color: #f9f9f9;
    }
    .message-input input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        resize: none;
        margin-right: 10px;
    }
    .message-input button {
        padding-right: 10px;
        padding-left: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .admin {
        margin: 10px 0;
        padding: 10px;
        border-radius: 5px;
        background-color: #d1e7dd;
        text-align: right;
        margin-right: 1rem;
        margin-left: 1rem;
    }
</style>
<html>
<body>
    <div id="container">
        <div class="patient-list">
            <h2>Messages</h2>
        </div>
        <div class="messages-container">
            @foreach ($messages as $message)
            <div class="admin">
                <tr>
                    <td><p>You</p></td>
                    <td>{{ $message->message }}</td>
                </tr>
            </div>
            @endforeach
        </div>
    </div>
    <form method="post" action="{{ route('messages.store') }}" class="message-input">
        @csrf
        <input placeholder="Type your message..." rows="3" type="text" class="form-control" id="message" name="message" required>
        <button class="btn btn-primary">Send</button>
    </form>
</body>  
</html>

@endsection

@section('title')
    Messages
@endsection

</x-app-layout>