@extends('layouts.app')

@section('title', 'MySQL Tutorials')

@section('content')
<div class="py-8">
  <h2 class="text-3xl font-bold mb-4 text-center text-gray-900 dark:text-gray-100">
    MySQL Tutorial Videos
  </h2>

  <p class="text-center max-w-2xl mx-auto mb-8 text-gray-700 dark:text-gray-300">
    Learn how to use MySQL, one of the world’s most popular open-source relational databases.
    These video tutorials will help you master SQL basics, design databases, write queries, and interact with data securely.
  </p>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($videos as $video)
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden flex flex-col">
        <div class="aspect-w-16 aspect-h-9">
          <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $video['id']['videoId'] }}" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="p-4 flex flex-col flex-grow">
          <h6 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-200">{{ $video['snippet']['title'] }}</h6>
          <p class="text-sm text-gray-600 dark:text-gray-400">{{ Str::limit($video['snippet']['description'], 100) }}</p>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-12 text-center">
    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">
      Practice SQL Online
    </h3>
    <p class="mb-4 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
      Experiment with SQL queries, create tables, and run SELECT, INSERT, and UPDATE statements online with no setup.
      A great way to test your queries in real-time.
    </p>
    <a href="https://www.w3schools.com/sql/trysql.asp?filename=trysql_select_all" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition">
      Try SQL Playground
    </a>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      What You’ll Learn
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      You’ll learn to design tables and relationships, write powerful SELECT statements, filter and sort data,
      and manage databases efficiently. MySQL is a must-know for web developers, backend engineers, and data analysts.
    </p>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto">
      Once you’re comfortable, try building a small CRUD app or connect your Laravel, PHP, or Node.js projects to MySQL.
    </p>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Keep Exploring
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      For advanced topics like stored procedures, indexing, or database security, check out the
      <a href="https://dev.mysql.com/doc/" target="_blank" class="text-indigo-600 dark:text-indigo-400 underline">MySQL Official Documentation</a>.
    </p>
    <a href="https://dev.mysql.com/doc/" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition">
      Read MySQL Docs
    </a>
  </div>
</div>
@endsection
