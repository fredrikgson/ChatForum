<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to ChatForum!</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="login_page_styles.css">
    </head>
    <body>
        <div id="wrapper">
            <h2>Chat<span>Forum</span></h2>
            <div id="divider"></div>
            <div id=error_message_div>
                <p id="error_message">
                    <?php
                        if(isset($_GET['invalid_email'])){
                            echo '<script>
                                document.getElementById("error_message").style.color = "#ce3133";
                            </script>';
                            echo "There is no account associated with the given email address.";
                        }
                        else if(isset($_GET['logged_out'])){
                            echo '<script>
                                document.getElementById("error_message").style.color = "#ababab";
                            </script>';
                            echo "You are now logged out!";
                        }
                        else if(isset($_GET['login_prompt'])){
                            echo '<script>
                                document.getElementById("error_message").style.color = "#ce3133";
                            </script>';
                            echo "Your session has expired, please log in!";
                        }
                        else if(isset($_GET['account_created'])){
                            echo '<script>
                                document.getElementById("error_message").style.color = "#ababab";
                            </script>';
                            echo "Account successfully created, please log in!";
                        }
                        else if(isset($_GET['incorrect_password'])){
                            echo '<script>
                                document.getElementById("error_message").style.color = "#ce3133";
                            </script>';
                            echo "The password you provided was incorrect.";
                        }
                    ?>
                </p>
            </div>
            <form action="login.php" method="POST">

                <!-- Username -->
                <input class="text_input" type="text" name="email"></input>
                <p>Email</p>

                <!-- Password -->
                <input class="text_input" type="password" name="pword"></input>
                <p>Password</p>

                <input class="submit_btn" type="submit" value="Log in"></input>

            </form>
            <div id="create_acc_div"><a href="signup.php">Create account</a></div>
        </div>
    </body>
</html>