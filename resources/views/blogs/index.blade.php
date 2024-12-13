<!DOCTYPE html>
<html>
<head>
    <title>Blogs</title>
</head>
<body>
<h1>Blogs</h1>

<!-- Category Filter Dropdown -->
<form action="{{ route('blogs.index') }}" method="GET">
    <label for="category">Filter by Category:</label>
    <select name="category" id="category" onchange="this.form.submit()">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</form>

<button onclick="window.location='{{ route("blogs.create") }}'">Add New Blog</button>

<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Slug</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($blogs as $blog)
        <tr>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->slug }}</td>
            <td>{{ $blog->category->name }}</td> <!-- Assuming the BlogCategory model has a 'name' field -->
            <td>
                <a href="{{ route('blogs.show', $blog->id) }}">View</a>
                <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<p>Total Blogs: {{ $blogs->count() }}</p>
</body>
</html>
