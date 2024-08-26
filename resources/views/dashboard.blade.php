<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>D0D0 - Dashboard</title>
    <style>
        .overdue {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="logo"><a href="{{ route('home') }}" style="text-decoration: none; color: inherit;">D0-D0</a></h1>
            <nav>
                <ul class="d-flex list-unstyled">
                    <li class="me-3"><a href="{{ route('addtask') }}" class="btn btn-primary">Add New Task</a></li>
                    <li>
                        <a href="{{ route('logout') }}" class="btn btn-danger"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h1>Welcome {{ Auth::user()->name }} - Manage your Tasks Here</h1>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <h2>All Tasks</h2>
                    @if ($tasks->isEmpty())
                        <p>No tasks found.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
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
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        @php
                                            // Check if task is overdue
                                            $isOverdue = strtotime($task->due_date) < strtotime('now');
                                        @endphp
                                        <tr class="{{ $isOverdue ? 'overdue' : '' }}">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ $task->priority }}</td>
                                            <td class="due-date">{{ $task->due_date }}</td>
                                            <td>{{ $task->attachments }}</td>
                                            <td>{{ $task->status }}</td>
                                            <td>{{ $task->notes }}</td>
                                            <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
                                            <td>{{ $task->created_at }}</td>
                                            <td>
                                                <a href="{{ route('deletetasks', $task->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                                <a href="{{ route('updateTask', $task->id) }}" class="btn btn-warning btn-sm">Update</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Todo App. - Made by Momna - All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('tr').each(function() {
                var dueDate = new Date($(this).find('.due-date').text());
                var currentDate = new Date();
                if (dueDate < currentDate) {
                    $(this).addClass('overdue');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
