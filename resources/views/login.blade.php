<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

    <div class="card">
        <h3>Login</h3>
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif





        <form action="{{ url('loginuser') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       placeholder="Enter your email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       id="password" 
                       name="password" 
                       placeholder="Enter your password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>

            <div class="text-center mt-3">
                <small>Don't have an account? <a href="{{ url('/register') }}">Register</a></small>
                <small>Forgot Password <a href="{{ url('/forgotpassword') }}">Forgot</a></small>

            </div>
        </form>
    </div>

</body>
</html>
