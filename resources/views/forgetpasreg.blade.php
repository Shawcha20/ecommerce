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
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card">
            <h2 class="text-center mb-4">Create New Password</h2>
            <form action="/login/{{$id->id}}/forgetdone" method="post">
                @csrf
                <div class="form-group">
                    <label for="password">Enter New Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                  <span class="text-danger">  
                    @error('password')
                    
                        {{$message}}
                    
                    @enderror
                </span>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
