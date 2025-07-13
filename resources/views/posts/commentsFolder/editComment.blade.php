<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Comment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Your Comment</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="body" class="form-label">Comment</label>
            <textarea name="body" id="body" rows="4" class="form-control" required>{{ old('body', $comment->body) }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Comment</button>
        </div>
    </form>
</div>

</body>
</html>
