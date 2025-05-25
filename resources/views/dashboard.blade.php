<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body text-center">
            <h1 class="mb-4">Welcome to Dashboard</h1>
            <p class="lead">You are logged in as: <strong>{{ Auth::user()->name }}</strong></p>
<a href="{{ url('logout') }}" class="btn btn-danger">Logout</a>

           
        </div>
    </div>
</div>

</body>
</html>
