<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('CDNfiles.animateCss')
    @include('posts.sweetAlertFunction')
    @include('CDNfiles.sweetAlert2CDN')
    @include('CDNfiles.scrollAnimateCDN')
    @include('CDNfiles.bootsrapIconCDN')
@include('CDNfiles.fontawesomeCDN')
    <title>@yield('title')</title>
</head>
<body>
    <header class=" shadow-md">
        @auth
        @include('components.navbar')     
        @endauth
        @guest
        @include('components.guest-navbar') 
        @endguest
       
    </header>
 @if (request()->route()->getName() === 'home')
  @yield('hero')
@endif

 
    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">

        
            @yield('content')
    
        
    </main>

@stack('scripts')




<footer class="bg-gray-300 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-12 ">
  <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">

    <!-- Brand & About -->
    <div>
      <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">About BugBros</h2>
      <p class="text-gray-700 dark:text-gray-300 text-sm">
        BugBros is a growing tech community helping developers squash bugs, share knowledge, and build better software together.
        Explore tutorials, join discussions, and level up your coding skills.
      </p>
    </div>

    <!-- Quick Links -->
    <div>
      <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Quick Links</h2>
      <ul class="space-y-2 text-sm">
        <li><a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Home</a></li>
        <li><a href="{{ route('tutorial.php') }}" class="text-gray-700 dark:text-gray-300 hover:underline">PHP Tutorials</a></li>
        <li><a href="{{ route('tutorial.laravel') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Laravel Tutorials</a></li>
        <li><a href="{{ route('show.post') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Community Posts</a></li>
        <li><a href="{{route('contact')}}" class="text-gray-700 dark:text-gray-300 hover:underline">Contact Us</a></li>
      </ul>
    </div>

    <!-- Resources -->
    <div>
      <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Resources</h2>
      <ul class="space-y-2 text-sm">
        <li><a href="https://laravel.com/" target="_blank" class="text-gray-700 dark:text-gray-300 hover:underline">Laravel Docs</a></li>
        <li><a href="https://tailwindcss.com/" target="_blank" class="text-gray-700 dark:text-gray-300 hover:underline">Tailwind CSS</a></li>
        <li><a href="https://developer.mozilla.org/en-US/" target="_blank" class="text-gray-700 dark:text-gray-300 hover:underline">MDN Web Docs</a></li>
        <li><a href="https://github.com/nahsir12390" target="_blank" class="text-gray-700 dark:text-gray-300 hover:underline">GitHub Projects</a></li>
      </ul>
    </div>

    <!-- Contact & Social -->
    <div>
      <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Connect with Us</h2>
      <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">
        Have questions or ideas? Let’s build something awesome together.
      </p>
      <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">
        Email: <a href="mailto:contact@bugbrosng.name.ng" class="hover:underline">contact@bugbrosng.name.ng</a>
      </p>
      <div class="flex justify-center md:justify-start space-x-4">
        <a href="https://github.com/nahsir12390" target="_blank" class="text-gray-700 dark:text-white hover:text-black dark:hover:text-gray-300">
          <i class="fab fa-github fa-xl"></i>
        </a>
        <a href="https://linkedin.com/in/nasiru-zakari-a5ba7a31b" target="_blank" class="text-blue-600 hover:text-blue-800">
          <i class="fab fa-linkedin fa-xl"></i>
        </a>
        <a href="https://twitter.com/nasiru_zakari" target="_blank" class="text-blue-400 hover:text-blue-600">
          <i class="fab fa-twitter fa-xl"></i>
        </a>
        <a href="https://wa.me/2347083881546" target="_blank" aria-label="WhatsApp" class="text-green-500 hover:text-green-600 transition">
          <i class="fab fa-whatsapp fa-xl"></i>
        </a>
      </div>
    </div>

  </div>

  <div class="mt-8 text-center text-gray-600 dark:text-gray-400 text-sm">
    &copy; {{ date('Y') }} Nasiru Zakari — BugBros. All rights reserved.
  </div>
</footer>


@include('posts.scrollAnimate')
@include('CDNfiles.dark&light')
@include('CDNfiles.horizontalScroll')
</body>
</html>