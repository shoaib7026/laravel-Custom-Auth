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
        <h3>Reset Password</h3>
    
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif





        <form action="{{ url('forgotpassword') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label"> Email</label>
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

           

            <button type="submit" class="btn btn-primary w-100">Reset</button>

           
        </form>
    </div>

</body>
</html>
