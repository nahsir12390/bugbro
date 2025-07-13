@extends('layouts.app')

@section('title', 'Chat With Friends')

@section('content')

@php
  $grouped = auth()->user()->unreadNotifications->groupBy(fn($n) => $n->data['sender_id']);
@endphp

{{--  Notifications --}}
@foreach($grouped as $senderId => $notifications)
  @php $latest = $notifications->last(); @endphp
  <div class="flex items-start gap-3 bg-blue-200 border-l-4 border-blue-500 text-blue-900 dark:bg-blue-900 dark:text-blue-100 px-4 py-3 rounded mb-4">
    <i class="bi bi-chat-left-text-fill text-xl"></i>
    <div class="flex-1">
      <p class="font-semibold">{{ $latest->data['sender_name'] }} sent you a message:</p>
      <p>"{{ $latest->data['message'] }}"</p>
      <small class="text-gray-600 dark:text-gray-300">{{ $latest->data['time'] }}</small>
    </div>
    <button type="button" onclick="this.parentElement.remove()" class="text-xl">&times;</button>
  </div>
@endforeach

<h1 class="text-3xl font-bold text-center mb-8">Chat with Friends</h1>

<div class="flex flex-col md:flex-row gap-6">
  <div class="md:w-1/3">
    <input id="userSearch" type="text" placeholder="Search users..."
      class="w-full px-4 py-2 border rounded dark:bg-gray-800 dark:text-white">
    <ul id="userList" class="mt-4 space-y-2">
      @foreach ($users as $user)
        <li class="user-item px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded cursor-pointer hover:bg-indigo-100"
            data-id="{{ $user->id }}">
          {{ $user->name }}
        </li>
      @endforeach
    </ul>
  </div>

  <div id="chatSection" class="md:w-2/3 hidden">
    <h2 id="chatHeader" class="text-xl font-semibold text-indigo-600 mb-4"></h2>
    <div id="chatMessages"
         class="h-80 overflow-y-auto p-4 bg-gray-50 dark:bg-gray-800 border rounded mb-4 space-y-3">
    </div>

    <form id="messageForm" class="flex gap-2">
      @csrf
      <input type="hidden" name="receiver_id" id="receiverId">
      <input id="messageInput" name="message" placeholder="Type a message..." disabled
             class="flex-1 px-4 py-2 border rounded dark:bg-gray-800 dark:text-white">
      <button id="sendButton" type="submit" disabled
              class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
        <i class="bi bi-send-fill"></i>
      </button>
    </form>
  </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const userSearch = document.getElementById('userSearch');
  const userList = document.getElementById('userList');
  const chatSection = document.getElementById('chatSection');
  const chatHeader = document.getElementById('chatHeader');
  const chatMessages = document.getElementById('chatMessages');
  const receiverIdInput = document.getElementById('receiverId');
  const messageInput = document.getElementById('messageInput');
  const sendButton = document.getElementById('sendButton');
  const messageForm = document.getElementById('messageForm');

  const authId = {{ auth()->id() }};
  const chatUserUrl = `{{ url('chat/user') }}`;

  userSearch.addEventListener('input', function () {
    const search = this.value.toLowerCase();
    userList.querySelectorAll('.user-item').forEach(item => {
      item.style.display = item.textContent.toLowerCase().includes(search) ? '' : 'none';
    });
  });

  userList.querySelectorAll('.user-item').forEach(item => {
    item.addEventListener('click', function () {
      userList.querySelectorAll('.user-item').forEach(i => i.classList.remove('bg-indigo-100', 'dark:bg-gray-700'));
      this.classList.add('bg-indigo-100', 'dark:bg-gray-700');

      const userId = this.dataset.id;
      const userName = this.textContent;

      receiverIdInput.value = userId;
      messageInput.disabled = false;
      sendButton.disabled = false;
      chatSection.classList.remove('hidden');
      chatHeader.textContent = `Chat with ${userName}`;
      chatMessages.innerHTML = '<p class="text-gray-500 dark:text-gray-400">Loading...</p>';

      fetch(`${chatUserUrl}/${userId}`)
        .then(res => res.json())
        .then(messages => {
          chatMessages.innerHTML = '';
          if (messages.length === 0) {
            chatMessages.innerHTML = '<p class="text-gray-500 dark:text-gray-400">No messages yet.</p>';
            return;
          }
          messages.forEach(msg => {
            const isMe = msg.sender_id === authId;
            const bubble = document.createElement('div');
            bubble.className = `flex flex-col ${isMe ? 'items-end' : 'items-start'} space-y-1`;
            bubble.innerHTML = `
              <div class="px-4 py-2 rounded-lg ${isMe ? 'bg-indigo-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100'}">
                <strong>${isMe ? 'You' : msg.sender.name}:</strong> ${msg.message}
              </div>
              <small class="text-xs text-gray-500">${msg.created_at}</small>
            `;
            chatMessages.appendChild(bubble);
          });
          chatMessages.scrollTop = chatMessages.scrollHeight;
        });
    });
  });

  messageForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const receiverId = receiverIdInput.value;
    const message = messageInput.value.trim();
    if (!message) return;

    fetch(`{{ route('chat.send') }}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
      },
      body: JSON.stringify({ receiver_id: receiverId, message: message })
    }).then(() => {
      messageInput.value = '';
      messageInput.focus();
      document.querySelector(`.user-item[data-id='${receiverId}']`).click();
    });
  });
});
</script>
@endpush
