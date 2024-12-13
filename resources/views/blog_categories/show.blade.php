<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blogCategory->name }}</title>
</head>
<body>
<div class="container">
    <h1>{{ $blogCategory->name }}</h1>
    <p><strong>Slug:</strong> {{ $blogCategory->slug }}</p>

    <h3>Blogs in this Category:</h3>
    <ul>
        @foreach ($blogCategory->blogs as $blog)
            <li>
                <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('blog_categories.index') }}" class="btn btn-primary">Back to Categories</a>
</div>
</body>
</html>
