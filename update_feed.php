<?php
    session_start();
    $db = new SQLite3("data/data.db");
    $result = $db->query("SELECT message_ID, sender_email, username, text FROM Message, User WHERE sender_email = email");
    while($row = $result->fetchArray(SQLITE3_ASSOC)){
        if($row['sender_email'] == $_SESSION['email']){
            // If the message was sent by the currently logged in user
            // we want the chat bubble to be yellow
            echo '<div class="friendly_chat_bubble">
            <p class="chat_bubble_message">'.$row['text'].'</p>
            <div class="chat_bubble_sender"><p class="chat_bubble_sender_friendly">'.$row['username'].'</p></div>
        </div>';
        }
        else if($row['sender_email'] == "admin@mail.com"){
            echo '<div class="admin_chat_bubble">
            <p class="chat_bubble_message">'.$row['text'].'</p>
            <div class="chat_bubble_sender"><p class="chat_bubble_sender_admin">'.$row['username'].'</p></div>
        </div>';
        } // #bae2fa
        else{
            // Otehrwise, we want it to be gray
            echo '<div class="enemy_chat_bubble">
            <p class="chat_bubble_message">'.$row['text'].'</p>
            <div class="chat_bubble_sender"><p class="chat_bubble_sender_enemy">'.$row['username'].'</p></div>
        </div>';
        }
    }

?>