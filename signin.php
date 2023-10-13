<?php 

    require 'config/constants.php';

    //get data back from the form
    $username_email = $_SESSION['signin-data']['username_email']?? null;
    $password = $_SESSION['signin-data']['password'] ?? null;

    unset($_SESSION['signin-data']);
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
        .form__section {
        display: grid;
        place-items: center;
        height: 100vh;
        }
        .nav__logo{
            font-size: 3rem;
        }
    </style>
</head>
<body>
    <nav>
        <div class="container nav__container">
            <a href="index.php" class="nav__logo">Blogdopia</a>
            <ul class="nav__items">
                <li><a href="/HTML/blog.html" >Portfolio</a></li>
                <!-- <li><a href="" class="signin.html">Signin</a></li> -->

                <!-- for profile pic  -->
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="/images/author_fix.jpg" alt="">
                    </div>
                    <ul>
                        <li><a href="dashboard.html">Portfolio</a></li>
                    </ul>
                </li> 

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
<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign In</h2>
       <?php if(isset($_SESSION['signup-success'])) : ?>
        <div class="alert__message success">
            <p>
               <?= $_SESSION['signup-success'];
               unset($_SESSION['signup-success']) ;
               ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['signin'])) : ?>
        <div class="alert__message error">
            <p>
               <?= $_SESSION['signin'];
               unset($_SESSION['signin']) 
               ?>
            </p>
        </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">

            <input type="text" name="username_email" value="<?= $username_email ?>"  placeholder="UserName or Email">
            <input type="password" name="password" value="<?= $password ?>" placeholder="Password">
            
            <button type="submit" name="submit" class="btn">Sign In</button>
            <small>Don't have an account ? <a href="signup.php">Sign Up</a></small>
        </form>
    </div>
</section>
<script src="js/darkthems.js"></script>
<script src="js/main.js"></script>
</body>
</html>