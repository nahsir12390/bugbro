@extends('layouts.app')
@section('title', 'Register')
@section('content')
  <!-- Register Form Section -->
  <div class="flex items-center justify-center min-h-screen px-4">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
      <h1 class="text-3xl font-bold text-indigo-600 text-center mb-6">Register</h1>
      <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
          <input type="text" name="name" id="name" placeholder="Username" value="{{ old('name') }}"
            required
            class="w-full px-4 py-3 rounded border border-gray-300 dark:border-gray-700 text-lg text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
          >
        </div>

        <div>
          <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}"
            required
            class="w-full px-4 py-3 rounded border border-gray-300 dark:border-gray-700 text-lg text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
          >
        </div>

        <div>
          <input type="password" name="password" id="password" placeholder="Password"
            required
            class="w-full px-4 py-3 rounded border border-gray-300 dark:border-gray-700 text-lg text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
          >
        </div>

        <div>
          <input type="password" name="password_confirmation" placeholder="Confirm Password"
            required
            class="w-full px-4 py-3 rounded border border-gray-300 dark:border-gray-700 text-lg text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
          >
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition">
          Register
        </button>
      </form>
    </div>
  </div>

  <!-- Form Errors -->
  @if($errors->any())
    <div class="max-w-md mx-auto mt-4 p-4 bg-red-100 text-red-800 rounded">
      <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
@endsection
