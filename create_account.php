<?php

    // function to check if email is unused
    function email_unused($an_email){
        $db = new SQLite3("data/data.db");
        $sql = "SELECT email FROM User WHERE email = :an_email";
        $prep = $db->prepare($sql);
        $prep->bindParam(':an_email', $an_email, SQLITE3_TEXT);
        $result = $prep->execute();

        $ctr = 0;
        while ($row = $result->fetchArray()){
            $ctr++;
        }
        if($ctr>0){
            $db->close();
            return false;
        }
        else {
            $db->close();
            return true;
        }
    }

    // function to check if username is unused
    function username_unused($a_username){
        $db = new SQLite3("data/data.db");
        $sql = "SELECT username FROM User WHERE username = :a_username";
        $prep = $db->prepare($sql);
        $prep->bindParam(':a_username', $a_username, SQLITE3_TEXT);
        $result = $prep->execute();

        $ctr = 0;
        while ($row = $result->fetchArray()){
            $ctr++;
        }
        if($ctr>0){
            $db->close();
            return false;
        }
        else {
            $db->close();
            return true;
        }
    }


    // Make sure all fields are set, otherwise bounce back
    if(!empty($_POST['email']) && !empty($_POST['uname']) && !empty($_POST['pword'])){
        
        // Validate email address using a built-in php function
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            // Check if email and/or username is already taken
            if(email_unused($_POST['email']) && username_unused($_POST['uname'])){
            
                // Salt and hash password using built-in php function
                $pwhash = password_hash($_POST['pword'], PASSWORD_BCRYPT);
                
                // Add the new account to the database using a prepared statement
                // as to protect the database from SQL injections
                $db = new SQLite3("data/data.db");
                $sql = "INSERT INTO User VALUES (:email, :uname, :pword)";
                $prep = $db->prepare($sql);
                $prep->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
                $prep->bindParam(':uname', $_POST['uname'], SQLITE3_TEXT);
                $prep->bindParam(':pword', $pwhash, SQLITE3_TEXT);
                if($prep->execute()){
                    // If the entry was successfully added to the DB
                    $db->close();
                    header("Location: login_page.php?account_created");
                    exit;
                }
                else{
                    $db->close();
                    header("Location: signup.php?database_error");
                    exit;
                }
            }
            else{  // if email or username is already taken
                header("Location: signup.php?email_or_username_taken");
                exit;
            }

        }
        else{  // If the provided email is invalid (does not follow email structure)
            header("Location: signup.php?invalid_email");
            exit;
        }

    }
    else{  // If user did not fill out all fields, bounce back
        header("Location: signup.php?fields_empty_error");
        exit;
    }

?>