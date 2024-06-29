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
    h1 {
        text-align: left;
        font-size: 25px;
        padding-left: 0.70rem;
        font-weight: bold;
    }
    .chat-container {
        display: flex;
        height: calc(100vh - 60px);
    }
    .users-list {
        width: 25%;
        background-color: #fff;
        border-right: 1px solid #ddd;
        overflow-y: auto;
        padding: 10px;
    }
    .user-item {
        cursor: pointer;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        display: flex;
        align-items: center;
    }
    .user-item:hover, .selected {
        background-color: #cce5ff;
    }
    .user-item img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .recent-message {
        font-size: 12px;
        color: #666;
    }
    .chat-box {
        width: 75%;
        background-color: #fff;
        display: flex;
        flex-direction: column;
    }
    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
        display: none; /* Hide all chat panels initially */
    }
    .chat-input {
        display: flex;
        padding: 10px;
        border-top: 1px solid #ddd;
        background-color: #f9f9f9;
    }
    .chat-input input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        resize: none;
        margin-right: 10px;
    }
    .chat-input button {
        width: 10%;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .admin, .others {
        margin: 10px 0;
        padding: 10px;
        border-radius: 5px;
    }
    .admin {
        background-color: #d1e7dd;
        text-align: right;
    }
    .others {
        background-color: #f8d7da;
        text-align: left;
    }
</style>

<html>
<body>
    <div class="chat-container">
        <div class="users-list" id="users">
            <div>
                <h1>Messages</h1>
            </div>
            <!-- Sample list of users with photos and recent messages -->
            <div class="user-item" data-username="John Smith">
                <div>
                    John Smith
                    <div class="recent-message" id="recent-John Smith"></div>
                </div>
            </div>
        </div>
        <div class="chat-box" id="chat-box">
            <div id="chat-panel-John Smith" class="chat-messages">
                <!-- Chat messages for John Smith -->
                <div class="others">
                    <p>John Smith</p>
                    <p>Hi!</p>
                </div>
                @foreach ($messages as $message)
                    <div class="admin">
                        <tr>
                            <td><p>You</p></td>
                            <td>{{ $message->message }}</td>
                        </tr>
                    </div>
                @endforeach
            </div>

            <form method="post" action="{{ route('patient.messages.store') }}" class="chat-input">
                @csrf
                <input placeholder="Type your message..." rows="3" type="text" class="form-control" id="message" name="message" required>
                <button onclick="sendMessage()">Send</button>
            </form>
        </div>

    </div>

<script>
    let selectedUser = 'John Smith'; // Default selected user

    document.addEventListener('DOMContentLoaded', function() {
        // Add click event listeners to user items
        document.querySelectorAll('.user-item').forEach(item => {
            item.addEventListener('click', function() {
                selectUser(item.dataset.username);
            });
        });

        // Select the default user
        selectUser(selectedUser);
    });

    function selectUser(username) {
        selectedUser = username;
        document.querySelectorAll('.user-item').forEach(item => {
            item.classList.remove('selected');
        });
        document.querySelector(`.user-item[data-username="${username}"]`).classList.add('selected');
        showChatPanel(username);
    }

    function sendMessage() {
        let message = document.getElementById('message').value;
        let senderName = document.getElementById('senderName').value;

        // Add the message to the selected chat panel
        let chatPanel = document.getElementById(`chat-panel-${selectedUser}`);
        let messageDiv = document.createElement('div');
        messageDiv.className = 'you'; // Assuming sender is always 'You'

        let nameP = document.createElement('p');
        nameP.textContent = 'You';

        let messageP = document.createElement('p');
        messageP.textContent = message;

        messageDiv.appendChild(nameP);
        messageDiv.appendChild(messageP);

        chatPanel.appendChild(messageDiv);

        // Update recent message display in user list
        let recentMessage = message.length > 20 ? message.substring(0, 20) + '...' : message; // Limit message length for display
        document.getElementById(`recent-${selectedUser}`).textContent = `You: ${recentMessage}`;

        // Clear the message input after sending
        document.getElementById('message').value = '';
    }

    function showChatPanel(username) {
        // Hide all chat panels
        document.querySelectorAll('.chat-messages').forEach(panel => {
            panel.style.display = 'none';
        });

        // Show the selected user's chat panel
        let chatPanel = document.getElementById(`chat-panel-${username}`);
        if (chatPanel) {
            chatPanel.style.display = 'block';
        }
    }
</script>
    
</html>
</body>
@endsection

@section('title')
    Messages
@endsection

</x-app-layout>