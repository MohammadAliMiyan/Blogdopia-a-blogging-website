<?php

require 'config/constants.php';

//get back form data if there was a registratino error
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
//delete signup data session
unset($_SESSION['signup-data']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    
    <!-- CSS file  -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css" class="">
    <!-- IconsScout CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <style>
       
        /* .nav__logo{
            font-size: 3rem;
        } */
    </style>
</head>
<body>
    <nav>
        <div class="container nav__container">
            <a href="index.php" class="nav__logo">Blogdopia</a>
            <ul class="nav__items">
                <li><a href="#" >Portfolio</a></li>
                <!-- <li><a href="" class="signin.html">Signin</a></li> -->

                <!-- for profile pic 
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="/images/author_fix.jpg" alt="">   <!-- add ali's image in it -->
                    </div>
    
                </li>  -->
                <!-- for theme button  -->
                <li class="spcl">
                    <!-- for theme button  -->
                    <div class="nav__btns">
                        <!-- Theme change button -->
                        <i class="uil uil-sun change-theme" id="theme-button"></i>
                    </div> 
                </li>
                
            </ul>    
        </div>
    </nav>

    <!-- added nav for showing public info of author of website  -->

<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign up</h2>
        <?php if(isset($_SESSION['signup'])): ?>
                <div class="alert__message error">
            <p>
                <?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?>
            </p>
        </div>
        <?php endif ?>

        
        <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" value="<?= $firstname ?>" name="firstname" placeholder="First Name">
            <input type="text" value="<?= $lastname ?>" name="lastname" placeholder="Last Name">
            <input type="text" value="<?= $username?>" name="username" placeholder="UserName">
            <input type="email" value="<?= $email?>" name="email" placeholder="Email">
            <input type="password" value="<?= $createpassword?>" name="createpassword" placeholder="Create Password">
            <input type="password" value="<?= $confirmpassword?>" name="confirmpassword" placeholder="Confirm Password">
            
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar" class="uploadBtn">
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small> Already have an account ? <a href="signin.php">Sign In</a></small>
        </form>
    </div>
</section>
<script src="js/darkthems.js"></script>
<script src="js/main.js"></script>
</body>
</html>