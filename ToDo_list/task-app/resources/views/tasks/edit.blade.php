<!DOCTYPE html>
<html>

<head>
    <title>Edit Task</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Edit Task</h1>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Task List</a>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Task Form -->
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control"
                    rows="4">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_completed" name="is_completed" 
                value="1" {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_completed">Mark as Completed</label>
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>