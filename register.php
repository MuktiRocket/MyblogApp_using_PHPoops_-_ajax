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
    <center>
        <h1>Registration Form</h1>
    </center>
    <hr>
    <br>
    <center>
        <form id="registerform" name="register" action="login.php" class='card p-3 bg-light' style="width: 300px;">
            <div class="mb-3">
                <label class="form-label">
                    <h5>Username</h5>
                </label>
                <input type="text" class="form-control form-control-sm" id="username" name="username" required style="width: 200px;">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    <h5>Email address</h5>
                </label>
                <input type="email" class="form-control form-control-sm" id="email" name="email" required style="width: 200px;">
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h5>Password</h5>
                </label>
                <input type="password" class="form-control form-control-sm" id="password" name="password" required style="width: 200px;">
            </div>
<<<<<<< HEAD
            <center> <button type="submit" class="btn btn-primary" value="Register" id="registerform-btn" style="width: 100px;">Register</button>
                <a href="login.php" class="btn btn-success" value="Login Page" id="registerform-btn">Login Page</a>
            </center>
=======
            <br><br>
            <center> <button type="submit" class="btn btn-primary" value="Register" id="registerform-btn" style="width: 100px;">Register</button>
                <a href="login.php" class="btn btn-success" value="Login Page" id="registerform-btn">Login Page</a>
            </center>
            <br><br>
>>>>>>> 751095daf9299bbdb6e1e2ca388e9cf70bf7fa45
        </form>

    </center>
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