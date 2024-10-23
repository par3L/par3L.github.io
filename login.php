<?php
session_start();
require "process.php";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true; 
            if ($user['role'] === 'Admin') {
                $_SESSION['role'] = 'admin'; 
                echo "
        <script>
        alert('Login successfull! Welcome Admin.');
        document.location.href = 'index.php';
        </script>
        ";
            } else {
                $_SESSION['role'] = 'user'; 
                echo "
        <script>
        alert('Login Successful! Welcome user!.');
        document.location.href = 'index.php';
        </script>
        ";
            }
        } else {
            echo "
      <script>
      alert('Wrong Password!');
      </script>
      ";
        }
    } else {
        echo "
    <script>
    alert('Username is not found!');
    </script>
    ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bengkuring Techsperts</title>

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

        .card input {
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
        <h1>Login</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="submit">LOGIN</button>
        </form>
        <br>
        <p>Don't have an account? <a href="register.php">Register here!</a> <br><br> <a href="index.php" style="color: white;"> back?</a></p>
    </div>
</body>

</html>