@php
    $unreadCount = auth()->check()
        ? auth()->user()->unreadNotifications()
            ->where('type', 'App\Notifications\NewMessageNotification')
            ->count()
        : 0;
@endphp

@php
  $otherUsersPostCount = auth()->check()
      ? \App\Models\Post::where('user_id', '!=', auth()->id())->count()
      : 0;
@endphp



<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.awesomeFont')
     
<style>
  /* Hide scrollbar for WebKit browsers */
  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }
  /* Hide scrollbar for Firefox */
  .scrollbar-hide {
    scrollbar-width: none;
    -ms-overflow-style: none;
  }
</style>
</head>
<body class="h-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
<div class="min-h-full">
  <nav class=" bg-gray-500 dark:bg-gray-900 shadow-md">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <a class="text-blue-800 dark:text-blue-700 font-bold text-2xl" href="#">
              <span class="bg-blue-600 text-white px-2  py-1 rounded">BB</span> BugBros
            </a>
          </div>
          <div class="hidden lg:block">
            <div class="ml-10 flex items-baseline space-x-4">
        <x-nav-link-desktop href="{{ route('show.post') }}">
  Community
  @if ($otherUsersPostCount > 0)
    <span class="ml-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
      {{ $otherUsersPostCount }}
    </span>
  @endif
</x-nav-link-desktop>



<x-nav-link-desktop href="{{ route('user.myprofile')}}" :active="request()->route()->getName() === 'user.myprofile'">
  Profile
</x-nav-link-desktop>

<x-nav-link-desktop href="{{ route('createData') }}" :active="request()->route()->getName() === 'createData'">
  Create Post
</x-nav-link-desktop>
<x-nav-link-desktop href="{{ route('chat.index') }}" :active="request()->route()->getName() === 'chat.index'">
  Chat With Friends
  @if ($unreadCount > 0)
    <span class="ml-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
      {{ $unreadCount }}
    </span>
  @endif
</x-nav-link-desktop>


            </div>
          </div>
        </div>

        

        <div class="flex items-center space-x-2">
          <div class="ml-4 flex items-center md:ml-6">
           <button id="theme-toggle" onclick="toggleDarkMode()"
          class="text-xl py-2 px-7 rounded-full bg-white  text-blue-800  dark:text-yellow-400 transition duration-300">
          <i id="theme-icon" class="fa-solid fa-moon"></i>
        </button>

   
          </div>
          

          <form action="{{ route('logout') }}" method="GET" class="inline">
    @csrf
    <button
        class="inline-flex items-center px-4 py-2   font-bold text-white dark:text-blue-100  rounded-2xl hover:bg-red-600 hover:text-white transition">
        Logout
    </button>
</form>

        </div>

        <div class="-mr-2 flex lg:hidden">
          <button type="button"
            class="relative inline-flex items-center justify-center rounded-md bg-gray-100 dark:bg-gray-100 p-2 text-gray-950 dark:text-gray-4 hover:bg-blue-200  hover:dark:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
            aria-controls="mobile-menu" aria-expanded="false">
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div class="lg:hidden hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                   <x-nav-link-desktop href="{{ route('show.post') }}">
  Community
  @if ($otherUsersPostCount > 0)
    <span class="ml-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
      {{ $otherUsersPostCount }}
    </span>
  @endif
</x-nav-link-desktop>


<x-nav-link-desktop href="{{ route('user.profile', ['user' => auth()->user()->id])}}" :active="request()->route()->getName() === 'user.profile'">
  Profile
</x-nav-link-desktop>

<x-nav-link-desktop href="{{ route('createData') }}" :active="request()->route()->getName() === 'createData'">
  Create Post
</x-nav-link-desktop>

<x-nav-link-desktop href="{{ route('chat.index') }}" :active="request()->route()->getName() === 'chat.index'">
  Chat With Friends
  @if ($unreadCount > 0)
    <span class="ml-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
      {{ $unreadCount }}
    </span>
  @endif
</x-nav-link-desktop>

      </div>
      <div class="border-t border-gray-700 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <img class="size-8 rounded-full" src="{{asset('profile/portfoilo3.0 img.png')}}" alt="" />
          </div>
          <div class="ml-3">
            <div class="text-base font-medium text-white">Nasiru Zakari</div>
            <div class="text-sm font-medium text-gray-400">nasiruzakari51@gmail.com</div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  

<nav class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-md">
  <div class="relative flex items-center px-4 py-3">

    <!-- Left Scroll Button -->
    <button
      class="scroll-button left-scroll hidden absolute left-0 top-1/2 -translate-y-1/2 z-10 p-2 bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 rounded-full transition"
      aria-label="Scroll left">
      <!-- Use your icon preference -->
      <i class="bi bi-chevron-left text-xl"></i>
    </button>

    <!-- Scrollable Nav -->
    <div id="tutorialScroller"
         class="overflow-x-auto whitespace-nowrap flex space-x-4 px-10 scrollbar-hide">
      <a href="{{ route('tutorial.html') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.html') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        HTML
      </a>
      <a href="{{ route('tutorial.css') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.css') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        CSS
      </a>
      <a href="{{ route('tutorial.js') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.js') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        JavaScript
      </a>
      <a href="{{ route('tutorial.php') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.php') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        PHP
      </a>
      <a href="{{ route('tutorial.laravel') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.laravel') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        Laravel
      </a>
      <a href="{{ route('tutorial.vue') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.vue') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        Vue.JS
      </a>
      <a href="{{ route('tutorial.react') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.react') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        React.JS
      </a>
      <a href="{{ route('tutorial.python') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.python') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        Python
      </a>
      <a href="{{ route('tutorial.java') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.java') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        Java
      </a>
      <a href="{{ route('tutorial.csharp') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.csharp') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        C#
      </a>
      <a href="{{ route('tutorial.cpp') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.cpp') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        C++
      </a>
      <a href="{{ route('tutorial.ruby') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.ruby') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        Ruby
      </a>
      <a href="{{ route('tutorial.mysql') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.mysql') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        MySQL
      </a>
      <a href="{{ route('tutorial.jquery') }}"
         class="inline-block px-4 py-2 rounded transition
                hover:bg-blue-600 hover:text-white
                {{ request()->routeIs('tutorial.jquery') ? 'bg-blue-600 text-white font-bold' : 'bg-gray-200 dark:bg-gray-800' }}">
        jQuery
      </a>
    </div>

    <!-- Right Scroll Button -->
    <button
      class="scroll-button right-scroll absolute right-0 top-1/2 -translate-y-1/2 z-10 p-2 bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 rounded-full transition"
      aria-label="Scroll right">
      <i class="bi bi-chevron-right text-xl"></i>
    </button>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const scroller = document.getElementById('tutorialScroller');
    const leftBtn = document.querySelector('.left-scroll');
    const rightBtn = document.querySelector('.right-scroll');

    checkScrollPosition();

    scroller.addEventListener('scroll', checkScrollPosition);

    leftBtn.addEventListener('click', () => {
      scroller.scrollBy({ left: -200, behavior: 'smooth' });
    });

    rightBtn.addEventListener('click', () => {
      scroller.scrollBy({ left: 200, behavior: 'smooth' });
    });

    function checkScrollPosition() {
      leftBtn.classList.toggle('hidden', scroller.scrollLeft <= 0);
      rightBtn.classList.toggle('hidden', scroller.scrollLeft >= scroller.scrollWidth - scroller.clientWidth - 1);
    }

    window.addEventListener('resize', checkScrollPosition);
  });
</script>





<script>
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.querySelector('[aria-controls="mobile-menu"]');
    const menu = document.getElementById('mobile-menu');
    const icons = btn.querySelectorAll('svg');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
      icons.forEach(icon => icon.classList.toggle('hidden'));
    });

    menu.classList.add('hidden');
  });
</script>

@include('components.dark&light')
</body>
</html>
