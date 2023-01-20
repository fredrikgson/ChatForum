<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to ChatForum!</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <!-- CHECK IF USER IS LOGGED IN, OTHERWISE REDIRECT -->
        <?php include "loggedin_check.php";?>

        
        <!-- NAV BAR -->
        <header>
            <h1 class="logo">Chat<span class="logo_forum">Forum</span></h1>
            <nav>
                <ul class="navbar_options">
                    <li><a href="index.php">Feed</a></li>
                    <li><a style="color: #CA9D0C" href="#">Profile</a></li>
                    <li><a class="log_out_button" href="#">Log out</a></li>
                </ul>
            </nav>
        </header>

        <!-- PROFILE -->
        <p>TODO: Add profile page</p>

    </body>
</html>