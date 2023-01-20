<?php

    // Make sure the user is logged in
    include("loggedin_check.php");

    if(!empty($_POST['input_field'])){

        /*  CHAT COMMANDS, FOR DEV PURPOSES  */
        if($_POST['input_field'] == "/cls"){
            $db = new SQLite3("data/data.db");
            $db->query("DELETE FROM Message");
            $db->close();
            header("Location: index.php");
            exit;
        }

        /* Create a message ID (for the primary key)
            by counting the rows of the Message table,
            effectively giving each message a unique
            ID based on how many came before it.
            
            Since there is no user input involved here
            we don't need to make a prepared statement */
        $db = new SQLite3("data/data.db");
        $result = $db->query("SELECT COUNT(message_ID) AS messages FROM Message");
        $row = $result->fetchArray(SQLITE3_ASSOC);
        $messageID = $row['messages'];

        // Insert the message into the database
        session_start();
        $sql = "INSERT INTO Message VALUES (:msgID, :sender, :msg)";
        $prep = $db->prepare($sql);
        $prep->bindParam(":msgID", $messageID, SQLITE3_TEXT);
        $prep->bindParam(":sender", $_SESSION['email'], SQLITE3_TEXT);
        $prep->bindParam(":msg", $_POST['input_field'], SQLITE3_TEXT);
        if($prep->execute()){
            $db->close();
            header("Location: index.php");
            exit;
        }
        else{
            $db->close();
            header("Location: index.php");
            alert("Something went wrong when trying to add your message to the database.");
            exit;
        }

    }
    else{ // If the chat message was empty
        header("Location: index.php");
        exit;
    }

?>