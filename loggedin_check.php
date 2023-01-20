<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        session_destroy();
        header("Location: login_page.php?login_prompt");
        exit;
    }
?>