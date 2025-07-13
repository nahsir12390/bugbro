<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.awesomeFont')
     
</head>
<body class="h-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
<div class="min-h-full">
  <nav class="bg-gray-500 dark:bg-gray-900 shadow-md">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex items-center">
        <div class="shrink-0">
          <a class="text-blue-800 dark:text-blue-700 font-bold text-2xl" href="{{ route('home') }}">
            <span class="bg-blue-600 text-white px-2 py-1 rounded">BB</span> BugBros
          </a>
        </div>
        <!-- Desktop Links -->
        <div class="hidden md:block ml-10">
          <div class="flex items-baseline space-x-4">
             <x-nav-link-desktop href="{{route('home')}}" :active="request()->route()->getName()==='home'">Home</x-nav-link-desktop>
              <x-nav-link-desktop href="{{route('about')}}" :active="request()->route()->getName()==='about'">About</x-nav-link-desktop>
               <x-nav-link-desktop href="{{route('contact')}}" :active="request()->route()->getName()==='contact'">Contact</x-nav-link-desktop>
          <x-nav-link-desktop href="{{route('show.login')}}" :active="request()->route()->getName()==='show.login'">Login</x-nav-link-desktop>
              <x-nav-link-desktop href="{{route('show.register')}}" :active="request()->route()->getName()==='show.register'">Register</x-nav-link-desktop>
          </div>
        </div>
      </div>

      <div class="block">
        <div class="ml-4 flex items-center md:ml-6">
          <button id="theme-toggle" onclick="toggleDarkMode()"
            class="text-xl px-7 py-2 rounded-full bg-white text-blue-800 dark:text-yellow-400 transition duration-300">
            <i id="theme-icon" class="fa-solid fa-moon"></i>
          </button>
        </div>
      </div>

      <!-- Mobile toggle button -->
      <div class="-mr-2 flex md:hidden">
        <button type="button"
          class="relative inline-flex items-center justify-center rounded-md bg-gray-100 dark:bg-gray-100 p-2 text-gray-950 dark:text-gray-900 hover:bg-blue-200 hover:dark:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
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

  <!-- Mobile menu -->
  <div class="md:hidden hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <x-nav-link-phone href="{{route('home')}}" :active="request()->route()->getName()==='home'">Home</x-nav-link-phone>
             <x-nav-link-desktop href="{{route('about')}}" :active="request()->route()->getName()==='About'">About</x-nav-link-desktop>

 <x-nav-link-desktop href="{{route('contact')}}" :active="request()->route()->getName()==='contact'">Contact</x-nav-link-desktop>

      <x-nav-link-phone href="{{route('show.login')}}" :active="request()->route()->getName()==='show.login'">Login</x-nav-link-phone>
              <x-nav-link-phone href="{{route('show.register')}}" :active="request()->route()->getName()==='show.register'">Register</x-nav-link-phone>
    </div>
    <div class="border-t border-gray-700 pt-4 pb-3">
      <div class="flex items-center px-5">
        <div class="shrink-0">
          <img class="size-8 rounded-full" src="{{ asset('profile/portfoilo3.0 img.png') }}" alt="" />
        </div>
        <div class="ml-3">
          <div class="text-base font-medium text-white">Nasiru Zakari</div>
          <div class="text-sm font-medium text-gray-400">nasiruzakari51@gmail.com</div>
        </div>
      </div>
    </div>
  </div>
</nav>

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
