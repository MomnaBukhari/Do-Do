@extends('mainlayout')

@section('title') Home @endsection

@section('content')

<style>
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
        background-color: #f7f7f7;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .welcome-section {
        text-align: center;
    }

    .welcome-section h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
        color: #053b92;
    }

    .welcome-section p {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 20px;
    }

    .welcome-section ul {
        text-align: left;
        margin-bottom: 20px;
    }

    .welcome-section ul li {
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .welcome-section ul li span {
        font-weight: bold;
        color: #053b92;
    }

    .btn-primary {
        background-color: #053b92;
        border: none;
        padding: 10px 20px;
        font-size: 1.2rem;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #002f6c;
    }
</style>

<div class="container">
    <div class="welcome-section">
        <h1 style="overflow-y: hidden;">Welcome to Your Productivity Hub</h1>
        <p>Unleash your potential and conquer your day with our Todo Application. Whether you're a busy professional, a student with deadlines, or someone simply trying to stay organized, we've got you covered.</p>
        <p><a href="{{ route('register') }}">Sign up</a> or <a href="{{ route('login') }}">log in</a> now to experience the difference:</p>
        <ul>
            <li><span>Effortless Task Management:</span> Easily organize, prioritize, and track your tasks with our intuitive interface.</li>
            <li><span>Boosted Productivity:</span> Stay focused and on track with reminders, deadlines, and progress tracking.</li>
            <li><span>Seamless Collaboration:</span> Collaborate with your team, delegate tasks, and achieve goals together.</li>
        </ul>
        <a href="{{ route('dashboardpage') }}" class="btn btn-primary">Get Started</a>
    </div>
</div>

@endsection
