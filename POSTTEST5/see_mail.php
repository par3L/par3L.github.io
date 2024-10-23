<?php
        require 'process.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM form WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM form WHERE ID = $id";
$result = mysqli_query($conn, $sql);

if ($result){
    $row = $result->fetch_assoc();
    $namez = $row['namez'];
    $email = $row['email'];
    $phone = $row['phone'];
    $device = $row['device'];
    $issue = $row['issue'];
} 

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $device = $_POST['device'];
    $issue = $_POST['issue'];

    $sql = "UPDATE form SET namez='$name', email='$email', phone='$phone', device='$device', issue='$issue' WHERE ID=$id";
    $update = mysqli_query($conn, $sql);

    if ($update) {
        echo "
            <script>
            alert('Update Successful!');
            window.location.href = 'index.php';
            </script>
        ";
    } 
}

if (isset($_POST['delete'])) {
    $sql = "DELETE FROM form WHERE ID=$id";
    $delete = mysqli_query($conn, $sql);

    if ($delete) {
        echo "
            <script>
            alert('Delete Successful!.');
            window.location.href = 'index.php';
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
    <title>Form Review | Bengkuring Techsperts</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
    <link rel="icon" type="image/x-icon" href="./assets/icon-new1.png">
    <link rel="stylesheet" href="./styles/style.css">

    <style>
        body{
            background-image: url(assets/comp-repairs.jpg);
        }
    </style>

</head>
<body>
    <main>
        <section id="form-section" class="see_mail">
            <h2>Edit Service Request</h2>
            <form action="" method="post">
                <div>
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $namez; ?>" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" required>
                </div>
                <div>
                    <label for="device">Device Type:</label>
                    <input type="text" id="device" name="device" value="<?php echo $device; ?>" required>
                </div>
                <div>
                    <label for="issue">Description of the Issue:</label>
                    <textarea id="issue" name="issue" rows="4" required><?php echo $issue; ?></textarea>
                </div>
                <div id="UD-container">
                    <button type="submit" name="update">Update Request</button>
                    <button type="submit" name="delete" style="background-color: red;">Delete Request</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
