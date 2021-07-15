<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <!-- Fonts -->
    <style>
        .register {
            padding: 50px;
        }

        .body {
            padding: 50px;
        }
    </style>

    <title>Register</title>
</head>

<body class="body">
    <h1>Registration Form</h1>
    <hr>
    <br>
    <form id="registerform" class="register">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" id="registerform-btn">Submit</button>
    </form>
</body>
<script src="main.js"></script>

</html>