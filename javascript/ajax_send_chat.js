function send_chat(){
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "post_chat.php");
    xhttp.send();
}