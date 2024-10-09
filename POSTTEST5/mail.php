<?php 

    require 'process.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $device = $_POST['device'];
    $issue = $_POST['issue'];

    $sql = "INSERT INTO form (namez, email, phone, device, issue) VALUES ('$name', '$email', '$phone', '$device', '$issue')";
    $result = mysqli_query($conn, $sql);
    
    if ($result){
        echo "
            <script>
            var pilihan = confirm('Form submitted successfully! Would you like to view your submission?');
            if (pilihan) {
                window.location.href = 'see_mail.php?id=" . mysqli_insert_id($conn) . "';
            } else {
                window.location.href = 'mail.php';
            }
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Oh no! There seems to be a problem, please re-submit.');
            window.location.href = 'mail.php';
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
    <title>Mail-in Service | Bengkuring Techsperts</title>

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

    <!-- panggil navbar -->
    <?php include ("./navbar.php")?>

    <main>
        <section id="mail-in-service">
            <h1>Services</h1><br><br>
            <pre>
                Feel free to come by whenever we're open! We're open to walk-in repairs 

                Our shop also offers a mail-in service for our customers that want to use our services but live outside our area.

                Fill the form below and mail your electronics to us!

                After filling the form you will be contacted by our technician to further discuss the shipment and repairs.

                A confirmation email will also be sent at the same time to your email.

                Please describe as detailed as possible! it will help our technicians diagnose and repair your electronics. 


                Price ranges depending on the type of repairs, but basic part replacements and minor mobo repairs usually starts at Rp. 100.000

                For more information please feel free to come by or contact us on our mainpage!

            </pre>
        </section>

        <section id="form-section">
            <h2>Service Request Form</h2>
            <form action='' method="post" id="mail-in-form">
                <div>
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div>
                    <label for="device">Device Type:</label>
                    <input type="text" id="device" name="device" required>
                </div>
                <div>
                    <label for="issue">Description of the Issue:</label>
                    <textarea id="issue" name="issue" rows="4" required></textarea>
                </div>
                <button type="submit" name="submit" value="submit">Submit Request</button>
            </form>
        </section>
    </main>

    <!-- panggil footer -->
     <?php include('./footer.php')?>

    <script src="./scripts/script.js"></script>
</body>
</php>
