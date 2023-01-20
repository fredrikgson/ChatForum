<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to ChatForum!</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="signup_styles.css">
        <script src="javascript/validation.js"></script>
    </head>
    <body>
        <div id="header">
            <a href="login_page.php"><img src="assets/icon_back.png"></img></a>
        </div>
        <div id="wrapper">
            <h2>Create a new account</h2>
            <div id="divider"></div>
            <div id="error_msg_div"><p id="error_msg">
                <?php
                    if(isset($_GET['fields_empty_error'])){
                        echo "Please fill out all fields!";
                    }
                    else if(isset($_GET['invalid_email'])){
                        echo "Please enter a valid email address!";
                    }
                    else if(isset($_GET['database_error'])){
                        echo "An unknown error occurred.";
                    }
                    else if(isset($_GET['email_or_username_taken'])){
                        echo "The email or username you entered is already in use.";
                    }
                ?>
            <p></div>
            <form action="create_account.php" method="POST" onsubmit="return validate_signup_form()">

                <!-- E-mail -->
                <input class="text_input" id="email" type="text" name="email"></input>
                <p>E-mail</p>

                <!-- Username -->
                <input class="text_input" id="uname" type="text" name="uname"></input>
                <p>Username</p>

                <!-- Password -->
                <input class="text_input" id="pword" type="password" name="pword"></input>
                <p>Password</p>

                <input class="submit_btn" type="submit" value="Create account"></input>

            </form>
            <div id="login_div"><a href="login_page.php">Log in to an existing account</a></div>
        </div>
    </body>
</html>