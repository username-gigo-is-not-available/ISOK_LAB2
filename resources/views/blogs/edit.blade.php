
    <h1>Edit Blog: {{ $blog->title }}</h1>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" required minlength="50">{{ old('content', $blog->content) }}</textarea>
        </div>
        <div class="form-group">
            <label for="blog_category_id">Category</label>
            <select name="blog_category_id" id="blog_category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $blog->blog_category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
