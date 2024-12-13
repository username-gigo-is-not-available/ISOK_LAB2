<!-- resources/views/blogs/show.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }}</title>
</head>
<body>
<div class="container">
    <h1>{{ $blog->title }}</h1>
    <p><strong>Slug:</strong> {{ $blog->slug }}</p>
    <p><strong>Category:</strong> {{ $blog->category->name }}</p>
    <p><strong>Content:</strong></p>
    <div class="blog-content">
        <p>{{ $blog->content }}</p>
    </div>

    <a href="{{ route('blogs.index') }}" class="btn btn-primary">Back to Blogs</a>
</div>
</body>
</html>
