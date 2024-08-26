@extends('mainlayout')

@section('title')
    Update Task
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h2>Update Task</h2>
                <form action="{{ route('updateSave', $task->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" value="{{ $task->title }}" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $task->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-select" id="priority" name="priority" required>
                            <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}">
                    </div>
                    <div class="mb-3">
                        <label for="attachments" class="form-label">Attachments</label>
                        <input type="url" class="form-control" id="attachments" name="attachments" value="{{ $task->attachments }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="postponed" {{ $task->status == 'postponed' ? 'selected' : '' }}>Postponed</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3">{{ $task->notes }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="completed" class="form-label">Completed</label>
                        <select class="form-select" id="completed" name="completed" required>
                            <option value="0" {{ $task->completed == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ $task->completed == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Task</button>
                    <a href="{{ route('tasks') }}" class="btn btn-warning btn-sm">Go Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
