<!DOCTYPE html>
<html>
<head>
    <title>Python Tutorials</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @include('CDNfiles.bootstrapCDN')

  
</head>

<body>
    @include('posts.nav')
    @include('CDNfiles.animateCss')
<div class="container py-4">


    <h2 class="mb-4 text-center">Python Tutorial Videos</h2>

    <div class="row">
        @foreach($videos as $video)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/{{ $video['id']['videoId'] }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">{{ $video['snippet']['title'] }}</h6>
                        <p class="card-text small">{{ Str::limit($video['snippet']['description'], 100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
