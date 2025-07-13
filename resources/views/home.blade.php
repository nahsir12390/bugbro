@extends('layouts.app')
@section('title', 'Home')
@section('hero')
<div class="w-full flex justify-center  items-center min-h-screen px-6 py-20 bg-white dark:bg-gray-900 transition-colors duration-300" style="
    background-image: 
      linear-gradient(
        to bottom right,
      rgba(12, 17, 32, 0.801), 
        rgba(52, 52, 54, 0.7),
        rgba(10, 3, 3, 0.842)
      ),
      url('{{ asset('bg-image/happy-overjoyed-business-team-celebrate-corporate-victory.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  ">
  <section class="w-full max-w-4xl flex flex-col items-center text-center animate__animated animate__fadeIn">
    <!-- Tagline -->
    <span class="inline-block text-indigo-600 text-xl sm:text-2xl md:text-3xl font-semibold mb-4 animate__animated animate__fadeInDown">
      Connect, Learn & Grow
    </span>

    <!-- Headline -->
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-gray-900 dark:text-white leading-tight animate__animated animate__fadeInUp animate__delay-1s">
      Empower Your <span class="text-indigo-600">Coding</span> Journey <br class="hidden sm:inline"> with Our Community
    </h1>

    <!-- Subheadline -->
    <p class="mt-4 text-base sm:text-lg md:text-xl font-bold text-gray-900 dark:text-gray-300 max-w-3xl animate__animated animate__fadeInUp animate__delay-2s">
      Whether you’re a curious beginner or an advanced developer, join a thriving network of learners, mentors and professionals sharing ideas, solving challenges, and building the future — together.
    </p>

    <!-- CTA Buttons -->
    <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4 animate__animated animate__fadeInUp animate__delay-3s">
      <a href="{{ route('show.login') }}"
         class="inline-block px-8 py-4 bg-indigo-600 text-white text-base sm:text-lg rounded-lg hover:bg-indigo-700 transition">
        Get Started Now
      </a>
      <a href="#section"
         class="inline-block px-8 py-4 border border-indigo-600 text-indigo-600 dark:text-indigo-400 text-base sm:text-lg rounded-lg hover:bg-indigo-600 hover:text-white transition">
        Learn More
      </a>
    </div>

    <!-- Extra mini highlight -->
    <p class="mt-8 text-gray-900 dark:text-gray-400 text-sm sm:text-base animate__animated animate__fadeInUp animate__delay-4s">
      <span class="text-blue-600">5,000+</span> developers worldwide are already connected 🚀
    </p>
  </section>
</div>
@endsection




@section('content')
<!-- Tutorial Highlights -->
<section id="section" class="py-16 bg-white dark:bg-gray-900 transition-colors duration-300">
  <div class="max-w-7xl mx-auto text-center px-4">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Explore Tutorials</h2>
    <p class="text-gray-600 dark:text-gray-300 text-lg mt-2">Get started with the top programming languages</p>
    <div class="grid gap-8 mt-10 md:grid-cols-3">
      <!-- HTML Card -->
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col justify-between" data-aos="fade-up">
        <div data-aos="zoom-in">
          <h5 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">HTML</h5>
          <p class="text-gray-600 dark:text-gray-300 mb-6">Foundation for web development, relatively easy, structures web content.</p>
          <a href="{{route('tutorial.html')}}" class="inline-block px-4 py-2 border border-indigo-600 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-600 hover:text-white transition">Start HTML</a>
        </div>
      </div>
      <!-- CSS Card -->
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col justify-between" data-aos="fade-up">
        <div data-aos="zoom-in">
          <h5 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">CSS</h5>
          <p class="text-gray-600 dark:text-gray-300 mb-6">Styles web pages, controls layout, enhances visual appeal.</p>
          <a href="{{route('tutorial.css')}}" class="inline-block px-4 py-2 border border-indigo-600 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-600 hover:text-white transition">Start CSS</a>
        </div>
      </div>
      <!-- JavaScript Card -->
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col justify-between" data-aos="fade-up">
        <div data-aos="zoom-in">
          <h5 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">JavaScript</h5>
          <p class="text-gray-600 dark:text-gray-300 mb-6">Add interactivity and power to web applications.</p>
          <a href="{{route('tutorial.js')}}" class="inline-block px-4 py-2 border border-indigo-600 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-600 hover:text-white transition">Start JavaScript</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- More to Explore -->
<section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
  <div class="max-w-7xl mx-auto text-center px-4">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">More to Explore</h2>
    <p class="text-gray-600 dark:text-gray-300 text-lg mt-2">Advance your journey with these valuable skills</p>
    <div class="grid gap-8 mt-10 md:grid-cols-3">
      <!-- PHP Card -->
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col justify-between" data-aos="flip-up">
        <div data-aos="zoom-in">
          <h5 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">PHP</h5>
          <p class="text-gray-600 dark:text-gray-300 mb-6">Server-side scripting language for building dynamic websites and APIs.</p>
          <a href="{{route('tutorial.php')}}" class="inline-block px-4 py-2 border border-indigo-600 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-600 hover:text-white transition">Start PHP</a>
        </div>
      </div>
      <!-- Laravel Card -->
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col justify-between" data-aos="flip-up">
        <div data-aos="zoom-in">
          <h5 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">Laravel</h5>
          <p class="text-gray-600 dark:text-gray-300 mb-6">Popular PHP framework for modern web applications with elegant syntax.</p>
          <a href="{{route('tutorial.laravel')}}" class="inline-block px-4 py-2 border border-indigo-600 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-600 hover:text-white transition">Start Laravel</a>
        </div>
      </div>
      <!-- Python Card -->
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col justify-between" data-aos="flip-up">
        <div data-aos="zoom-in">
          <h5 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">Python</h5>
          <p class="text-gray-600 dark:text-gray-300 mb-6">Powerful language for web, data science, automation, and AI development.</p>
          <a href="{{route('tutorial.python')}}" class="inline-block px-4 py-2 border border-indigo-600 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-600 hover:text-white transition">Start Python</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
