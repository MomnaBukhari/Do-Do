@extends('mainlayout')

@section('title') Login @endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-5 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('loginMatch') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="your-email@example.com" required value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('register') }}" class="btn btn-link">Don't have an account? Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
