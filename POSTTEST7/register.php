<?php
require "process.php";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 
    $role = $_POST["role"];
    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        echo "
        <script>
        alert('Username has already been used!');
        document.location.href = 'registrasi.php';
        </script>
        ";
    } else {
        $query = "INSERT INTO users (username, password, role) VALUES ('$username',
'$password', '$role')";
        if (mysqli_query($conn, $query)) {
            echo "
            <script>
            alert('Registration Succesful! Please log into your account!');
            document.location.href = 'login.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Registration failed!');
            document.location.href = 'index.php';
            </script>
            ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail-in Service | Bengkuring Techsperts</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" type="image/x-icon" href="./assets/icon-new1.png">

    <link rel="stylesheet" href="./styles/style.css">

    <style>
        body {
            background-image: url(assets/comp-repairs.jpg);
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Open Sans', sans-serif;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .card h1 {
            color: #fff;
            margin-bottom: 1rem;
        }

        .card form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .card input, .card select {
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .card button {
            background-color: #0066ff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .card button:hover {
            background-color: orangered;
        }

        p a {
            color: #ffa500;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Register</h1>

        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
            <button type="submit" name="submit">Register</button>
        </form>
        <br>
        <p>Already have an account? <a href="login.php">Login here!</a> <br><br> <a href="index.php" style="color: white;"> back?</a></p> 
    </div>

    <script src="./scripts/script.js"></script>
</body>
</php>