function validate_signup_form(){
    var email = document.getElementById("email").value;
    var email_regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(email_regex.test(String(email).toLowerCase())){
        var uname = document.getElementById("uname").value;
        if(uname.replace(/\s/g, "") === uname){
            return true;
        }
        else{
            document.getElementById("error_msg").innerHTML = "Username cannot contain any whitespaces!";
            return false;
        }
    }
    else{
        document.getElementById("error_msg").innerHTML = "Please enter a valid email address!";
        return false;
    }
}