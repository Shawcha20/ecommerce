<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px; /* Set the desired width */
            max-width: 90%; /* Limit the maximum width */
            height: auto; /* Automatically adjust the height */
            padding: 30px; /* Add padding for better appearance */
        }
    </style>
</head>
<body>
    @if(isset($success))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $success }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">

        <div class="card">
            <h2 class="text-center mb-4">Sign In</h2>
            <form action="{{route('login.index')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                    <span class="text-danger">
                        @error('email')

                            {{$message}}

                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                  <span class="text-danger">
                    @error('password')

                        {{$message}}

                    @enderror
                </span>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>

            </form>
            <a href="{{ route('home.signup') }}" class="btn btn-primary mb-2 mt-2">Sign Up</a>
            <div class="text-center mt-3">
                <a href="{{route('login.forget')}}">Forgot password?</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
