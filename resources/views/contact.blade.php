@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

<!-- Contact Hero -->
<section class="w-full flex justify-center items-center min-h-[60vh] px-6 py-20 bg-white dark:bg-gray-900 transition-colors duration-300">
  <div class="w-full max-w-4xl flex flex-col items-center text-center animate__animated animate__fadeIn">
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-gray-900 dark:text-white leading-tight animate__animated animate__fadeInDown">
      Get in Touch
    </h1>
    <p class="mt-4 text-base sm:text-lg md:text-xl text-gray-700 dark:text-gray-300 max-w-3xl animate__animated animate__fadeInUp animate__delay-1s">
      Questions? Feedback? Or just want to say hello? Drop us a message — we’d love to hear from you!
    </p>

    @if (session('success'))
      <div class="mt-6 p-4 bg-green-100 text-green-700 rounded animate__animated animate__fadeInUp">
        {{ session('success') }}
      </div>
    @endif

  </div>
</section>

<!-- Contact Form -->
<section class="py-16 bg-white dark:bg-gray-900 transition-colors duration-300">
  <div class="max-w-3xl mx-auto px-4 animate__animated animate__fadeInUp">
    <form action="" method="POST" class="bg-gray-50 dark:bg-gray-800 shadow rounded-lg p-8 space-y-6">
      @csrf
      <div>
        <label for="name" class="block text-gray-700 dark:text-gray-300 mb-2">Your Name</label>
        <input type="text" name="name" id="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
      </div>
      <div>
        <label for="email" class="block text-gray-700 dark:text-gray-300 mb-2">Your Email</label>
        <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
      </div>
      <div>
        <label for="message" class="block text-gray-700 dark:text-gray-300 mb-2">Your Message</label>
        <textarea name="message" id="message" rows="5" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
      </div>
      <button type="submit" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
        Send Message
      </button>
    </form>
  </div>
</section>

<!-- Contact Info -->
<section class="py-16 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
  <div class="max-w-5xl mx-auto px-4 text-center animate__animated animate__fadeInUp">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">Other Ways to Reach Us</h2>
    <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
      Prefer direct contact? Feel free to reach out via social media or email.
    </p>
    <div class="flex justify-center space-x-4 mt-4">
      <a href="https://github.com/nahsir12390" target="_blank" aria-label="GitHub" class="text-gray-700 dark:text-white hover:text-black dark:hover:text-gray-300 transition">
        <i class="fab fa-github fa-2xl"></i>
      </a>
      <a href="https://linkedin.com/in/nasiru-zakari-a5ba7a31b" target="_blank" aria-label="LinkedIn" class="text-blue-600 hover:text-blue-800 transition">
        <i class="fab fa-linkedin fa-2xl"></i>
      </a>
      <a href="https://twitter.com/nasiru_zakari" target="_blank" aria-label="Twitter" class="text-blue-400 hover:text-blue-600 transition">
        <i class="fab fa-twitter fa-2xl"></i>
      </a>
      <a href="https://wa.me/2347083881546" target="_blank" aria-label="WhatsApp" class="text-green-500 hover:text-green-600 transition">
        <i class="fab fa-whatsapp fa-2xl"></i>
      </a>
    </div>
  </div>
</section>

@endsection
