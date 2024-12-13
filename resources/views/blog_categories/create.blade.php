
    <h1>Create New Category</h1>

    <form action="{{ route('blog_categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
