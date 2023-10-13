<?php
    require 'config/constants.php';
    //destroy all the session and redirect the user
    // home  page

    session_destroy();
    header('location: '. ROOT_URL);
    die();