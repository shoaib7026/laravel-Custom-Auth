<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
        <h3>Register</h3>
        <form action="{{ 'registeruser' }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" placeholder="Enter your full name">
             @error('name')
            <div class="text-danger">{{ $message }}</div>
             @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Enter your email">
                @error('email')
               <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Create a password">
                @error('password')
               <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>

            <div class="text-center mt-3">
                <small>Already have an account? <a href="{{ url('login') }}">Login</a></small>
            </div>
        </form>
    </div>

</body>
</html>
