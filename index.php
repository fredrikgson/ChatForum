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
            <div id="welcome_msg_div">
                <p>
                    <?php
                        session_start();
                        if(isset($_SESSION['username'])){
                            echo 'Welcome, <span>'.$_SESSION['username'].'</span>!';
                        }
                    ?>
                </p>
            </div>
            <nav>
                <ul class="navbar_options">
                    <li><a style="color: #CA9D0C" href="#">Feed</a></li>
                    <!-- <li><a href="profile.php">Profile</a></li> -->
                    <li><a class="log_out_button" href="logout.php">Log out</a></li>
                </ul>
            </nav>
        </header>

        <!-- FEED -->
        <div class="feed">
            <div class="chat_field" id="chat_field"> <!-- MAIN FEED -->

                <!--
                <div class="friendly_chat_bubble">
                    <p class="chat_bubble_message">Chat message...</p>
                    <div class="chat_bubble_sender"><p class="chat_bubble_sender_friendly">Sender</p></div>
                </div>

                <div class="enemy_chat_bubble">
                    <p class="chat_bubble_message">Chat message...</p>
                    <div class="chat_bubble_sender"><p class="chat_bubble_sender_enemy">Sender</p></div>
                </div>
                -->
                

                <?php include("update_feed.php");?>


            </div><br>
            <div class="chat_input_area">
                <form action="post_chat.php" method="POST">
                    <input type="text" class="input_field" name="input_field" id="input_field" style="width:450px" placeholder="Type your chat message here..." autocomplete="off" autofocus="true"></input>
                    <button id="send_button" name="send_button"><img class="send_icon" src="assets/send_icon.png" width="20" height="20"></img></button>
                </form>
            </div>
        </div>
        <script>

            var feed = document.getElementById("chat_field");
            feed.scrollTop = feed.scrollHeight;

        </script>
    </body>
</html>