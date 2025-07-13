<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class TutorialController extends Controller
{
    public function html()
    {
        return $this->fetchVideos('html tutorial full course', 'tutorials.html');
    }

      public function python()
    {
        return $this->fetchVideos('python tutorial full course', 'tutorials.python');
    }

        public function laravel()
    {
        return $this->fetchVideos('laravel tutorial full course', 'tutorials.laravel');
    }
    
       public function vue()
    {
        return $this->fetchVideos('vue.js tutorial full course', 'tutorials.vue');
    }
    public function php()
    {
        return $this->fetchVideos('php tutorial full course', 'tutorials.php');
    }
    
    public function react()
    {
        return $this->fetchVideos('react.js tutorial full course', 'tutorials.react');
    }
    public function js()
    {
        return $this->fetchVideos('javascript tutorial full course', 'tutorials.js');
    }
     public function java()
    {
        return $this->fetchVideos('java tutorial full course', 'tutorials.java');
    }

    public function css()
    {
        return $this->fetchVideos('css tutorial full course', 'tutorials.css');
    }

    public function csharp()
    {
        return $this->fetchVideos('C Sharp tutorial full course', 'tutorials.csharp');
    }
    public function ruby()
    {
        return $this->fetchVideos('Ruby tutorial full course', 'tutorials.ruby');
    }

    public function mysql()
    {
        return $this->fetchVideos('mysql tutorial full course', 'tutorials.mysql');
    }
    public function jquery()
    {
        return $this->fetchVideos('jquery tutorial full course', 'tutorials.jquery');
    }

        public function cpp()
    {
        return $this->fetchVideos('cpp tutorial full course', 'tutorials.cpp');
    }

    // Helper method to avoid repeating code
    private function fetchVideos($query, $view)
    {
        $apiKey = env('YOUTUBE_API_KEY');

        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => $query,
            'key' => $apiKey,
            'maxResults' => 8,
            'type' => 'video'
        ]);

        $videos = $response->json()['items'] ?? [];

        return view($view, compact('videos'));
    }
}
