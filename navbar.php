<?php
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
?>
    <header>
        <div class="navbar">
            <div class="logo"><a href="#">Bengkuring Techsperts</a></div>
            <ul class="links">
                <li class="nav-items"><a href="./index.php">Home</a></li>
                <li class="nav-items"><a href="#about">About Us</a></li>
                <li class="nav-items"><a href="./mail.php">Services</a></li>
                <li class="nav-items"><a href="#contact">Contact Us</a></li>
                <?php if (!(isset($_SESSION['login']))) : ?>
                    <li class="nav-items"><a href="./login.php">Login</a></li>  
                <?php else : ?>
                    <li class="nav-items"><a href="destroy_session.php">Logout</a></li>  
                <?php endif?>
            </ul>

            <div class="hamburger">
                <i class="fa-solid fa-bars"></i>
                <!-- </div>
            <div class="mode-toggle">
            <i class="fa-solid fa-moon"></i>    
            </div> -->
            </div>
            <div class="drop-menu">
                <li class="nav-items"><a href="./index.php">Home</a></li>
                <li class="nav-items"><a href="#about">About Us</a></li>
                <li class="nav-items"><a href="./mail.php">Services</a></li>
                <li class="nav-items"><a href="#contact">Contact Us</a></li>
                <?php if (!(isset($_SESSION['login']))) : ?>
                    <li class="nav-items"><a href="./login.php">Login</a></li>  
                <?php else : ?>
                    <li class="nav-items"><a href="destroy_session.php">Logout</a></li>  
                <?php endif?>
            </div>
    </header>