@extends('layouts.app')

@section('title', 'About BugBros')

@section('content')

<!-- About Hero -->
<section class="w-full flex justify-center items-center min-h-screen px-6 py-20 bg-white dark:bg-gray-900 transition-colors duration-300">
  <div class="w-full max-w-4xl flex flex-col items-center text-center animate__animated animate__fadeIn">
    <span class="inline-block text-indigo-600 text-xl sm:text-2xl md:text-3xl font-semibold mb-4 animate__animated animate__fadeInDown">
      About BugBros
    </span>
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-gray-900 dark:text-white leading-tight animate__animated animate__fadeInUp animate__delay-1s">
      We Build, Learn & Grow <br class="hidden sm:inline"> Together
    </h1>
    <p class="mt-4 text-base sm:text-lg md:text-xl text-gray-700 dark:text-gray-300 max-w-3xl animate__animated animate__fadeInUp animate__delay-2s">
      BugBros is your hub for fixing bugs, discovering coding solutions, and connecting with developers worldwide. 
    </p>
  </div>
</section>

<!-- About Story -->
<section class="py-16 bg-white dark:bg-gray-900 transition-colors duration-300">
  <div class="max-w-5xl mx-auto px-4 text-center animate__animated animate__fadeInUp">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">Our Story</h2>
    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
      BugBros started with a simple mission — to help developers find answers faster. Too many new coders feel alone when they hit bugs. 
      We’re here to change that by providing practical tutorials, a supportive community, and real project ideas to grow your skills.
    </p>
    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
      From front-end basics like HTML, CSS, and JavaScript, to backend frameworks like PHP and Laravel, we make learning hands-on and fun. 
      We’re building more than just a tutorial site — we’re building a family of learners who help each other level up.
    </p>
  </div>
</section>

<!-- Meet the Founder -->
<section class="py-16 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
  <div class="max-w-5xl mx-auto px-4 text-center animate__animated animate__fadeInUp">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">Meet the Founder</h2>
    <img src="{{asset('profile/profile.png')}}" alt="Nasiru Zakari" class="mx-auto mb-4 rounded-full w-32 h-32 object-cover animate__animated animate__zoomIn">
    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed max-w-3xl mx-auto">
      Hi! I’m <strong>Nasiru Zakari</strong>, a self-taught developer from Nigeria. I created BugBros to make learning to code simpler, more practical, and less lonely.
      I love helping people turn ideas into real projects — and fix those tricky bugs that stop you from moving forward.
    </p>
    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed max-w-3xl mx-auto mt-4">
      If you ever feel stuck, reach out. We’re here to share knowledge, solve problems, and celebrate every little win together.
    </p>
    <div class="mt-6">
      <a href="{{route('contact')}}" class="inline-block px-6 py-3 border border-indigo-600 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-600 hover:text-white transition">
        Connect With Me 👋
      </a>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-white dark:bg-gray-900 transition-colors duration-300">
  <div class="max-w-5xl mx-auto px-4 text-center animate__animated animate__fadeInUp">
    <h3 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Join BugBros Today</h3>
    <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
      Ready to grow your skills with people who get it? Be part of a coding community that has your back.
    </p>
    <a href="{{ route('show.register') }}" class="inline-block px-8 py-4 bg-indigo-600 text-white text-base sm:text-lg rounded-lg hover:bg-indigo-700 transition">
      Get Started 🚀
    </a>
  </div>
</section>

@endsection
