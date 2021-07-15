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
    <form id="registerform" class="register" name="register" action="login.php">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" value="Register" id="registerform-btn">Register</button>
    </form>
</body>
<script>
    const registerform = document.getElementById("registerform");
    registerform.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formdata = new FormData(registerform);
        formdata.append("register", 1);

        if (registerform.checkValidity() === false) {
            e.stopPropagation();
            registerform.classList.add("was-validated");
            return false;
        } else {
            document.getElementById('registerform-btn').value = 'Please Wait ...';
            const data = await fetch("action.php", {
                method: "POST",
                body: formdata,
            });
            const response = await data.text();
            document.getElementById('registerform-btn').value = "Register";
            registerform.reset();
            registerform.classList.remove("was-validated");
            window.location.href = "http://localhost/Myblog/login.php";

        }

    });
</script>

</html>