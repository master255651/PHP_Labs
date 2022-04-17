<?php

echo "
<style>
body{
    background: rgb(251,168,129);
    background: linear-gradient(90deg, rgba(251,168,129,1) 50%, rgba(240,193,38,1) 100%);
}
h1 {
    font-family: 'Trebuchet MS', sans-serif;
    font-size: 5em;
    letter-spacing: -2px;
    border-bottom: 2px solid black;
    text-transform: uppercase;
   }
   .rectangle {
    counter-reset: li; 
    list-style: none; 
    font: 14px 'Trebuchet MS', 'Lucida Sans';
    padding: 0;
    text-shadow: 0 1px 0 rgba(255,255,255,.5);
    }
    .rectangle a {
    position: relative;
    display: block;
    padding: .4em .4em .4em .8em;
    margin: .5em 0 .5em 2.5em;
    background: #D3D4DA;
    color: #444;
    text-decoration: none;
    transition: all .3s ease-out;
    }
    .rectangle a:hover {background: #DCDDE1;}       
    .rectangle a:before {
    content: counter(li);
    counter-increment: li;
    position: absolute;
    left: -2.5em;
    top: 50%;
    margin-top: -1em;
    background: #9097A2;
    height: 2em;
    width: 2em;
    line-height: 2em;
    text-align: center;
    font-weight: bold;
    }
</style>
";

$errors = array();
$resultToFile = array();

$login = $_POST['login'];
empty($login) ? array_push($errors, "Login field was empty!") : array_push($resultToFile, $login);

$password = $_POST['password'];
empty($password) ? array_push($errors, "Password field was empty!") : array_push($resultToFile, $password);

$email = $_POST['email'];
empty($email) ? array_push($errors, "Email field was empty!") : array_push($resultToFile, $email);

if(count($errors) != 0){
    echo "<h1>One or more errors occurred!<br />The data was not written to the database.</h1>";

    echo "<ol class='rectangle'>";

    foreach ($errors as $error){
        echo "<li><a>" . $error . "</a></li>";
    }
    echo "</ol>";
}
else{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "User";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE user_data SET Password = '{$_POST['password']}', Email = '{$_POST['email']}' WHERE Login = '{$_POST['login']}'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<h1>The data was successfully modified in the database.</h1>";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>