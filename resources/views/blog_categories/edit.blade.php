
    <h1>Edit Category: {{ $blogCategory->name }}</h1>

    <form action="{{ route('blog_categories.update', $blogCategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $blogCategory->name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
