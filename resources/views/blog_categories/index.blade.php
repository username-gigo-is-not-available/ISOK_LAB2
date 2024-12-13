<!DOCTYPE html>
<html>
<head>
    <title>Blog Categories</title>
</head>
<body>
<h1>Blog Categories</h1>

<!-- Search Form -->
<form action="{{ route('blog_categories.index') }}" method="GET">
    <input type="text" name="search" placeholder="Search categories..." value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>

<button onclick="window.location='{{ route('blog_categories.create') }}'">Add New Category</button>

<table>
    <thead>
    <tr>
        <th>Category Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($blogCategories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('blog_categories.show', $category->id) }}">Show</a> |
                <a href="{{ route('blog_categories.edit', $category->id) }}">Edit</a>
                <form action="{{ route('blog_categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<p>Total Categories: {{ $blogCategories->count() }}</p>
</body>
</html>
