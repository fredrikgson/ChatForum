<?php

    // Verify user in database with a prepared statement
    $db = new SQLite3("data/data.db");
    $sql = "SELECT email, username, password_rep FROM User WHERE email = :an_email";
    $prep = $db->prepare($sql);
    $prep->bindParam(':an_email', $_POST['email'], SQLITE3_TEXT);
    $result = $prep->execute();
    /* Due to how the signup system is implemented 
        only a single row can exist with a given
        email address */
    $row = $result->fetchArray(SQLITE3_ASSOC);
    if(!empty($row)){ // If email matches one in the DB
        
        // Verify if the user has entered the correct password
        if(password_verify($_POST['pword'], $row['password_rep'])){
            // The password is correct, log the user in
            $db->close();
            session_start();
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['loggedin'] = true;
            header("Location: index.php");
            exit;
        }
        else{ // If the password does not match the one associated with the email
            $db->close();
            header("Location: login_page.php?incorrect_password");
            exit;
        }

    }
    else{ // if the email does not match one in the DB
        $db->close();
        header("Location: login_page.php?invalid_email");
        exit;
    }
    
?>