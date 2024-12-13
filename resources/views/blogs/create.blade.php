<h1>Create New Blog</h1>

<form action="{{ route('blogs.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="content" name="content" class="form-control" required minlength="50"></textarea>
    </div>
    <div class="form-group">
        <label for="blog_category_id">Category</label>
        <select name="blog_category_id" id="blog_category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create Blog</button>
</form>
