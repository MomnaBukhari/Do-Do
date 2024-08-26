<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Priority</th>
            <th scope="col">Due Date</th>
            <th scope="col">Attachments</th>
            <th scope="col">Status</th>
            <th scope="col">Notes</th>
            <th scope="col">Completed</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $x = 1; @endphp
        @foreach ($tasks as $task)
            <tr>
                <th scope="row">{{ $x }}</th>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->priority }}</td>
                <td class="due-date">{{ $task->due_date }}</td>
                <td>{{ $task->attachments }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->notes }}</td>
                <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
                <td>{{ $task->created_at }}</td>
                <td>{{ $task->updated_at }}</td>
                <td>
                    <a href="{{ route('deletetasks', $task->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    <a href="{{ route('updateTask', $task->id) }}" class="btn btn-warning btn-sm">Update</a>
                </td>
            </tr>
            @php $x++; @endphp
        @endforeach
    </tbody>
</table>
