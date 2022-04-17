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

    
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!($stmt = $conn->prepare("INSERT INTO eLib(Title, Author, Book_year, Publishing, Subjects, Price, Photo)  VALUES (?, ?, ?, ?, ?, ?, ?)"))) {
    echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
}

$errors = array();
$resultToFile = array();

$title = $_POST['title'];
empty($title) ? array_push($errors, "Book title field was empty!") : array_push($resultToFile, $title);

$author = $_POST['author'];
empty($author) ? array_push($errors, "Book author field was empty!") : array_push($resultToFile, $author);

$book_year = $_POST['book_year'];
empty($book_year) ? array_push($errors, "Book year field was empty!") : array_push($resultToFile, $book_year);

$publishing = $_POST['publishing'];
empty($publishing) ? array_push($errors, "Book publishing field was empty!") : array_push($resultToFile, $publishing);

$subjects = $_POST['subjects'];
empty($subjects) ? array_push($errors, "Book subjects field was empty!") : array_push($resultToFile, $subjects);

$price = $_POST['price'];
!is_numeric($price) ? array_push($errors, "Book price must be a number ") : array_push($resultToFile, $price);

$photo = htmlspecialchars( basename( $_FILES["photo"]["name"]));
empty($photo) ? array_push($errors, "Book photo field was empty!") : array_push($resultToFile, $photo);

if(count($errors) != 0){
    echo "<h1>One or more errors occurred!<br />The data was not written to the database .</h1>";

    echo "<ol class='rectangle'>";

    foreach ($errors as $error){
        echo "<li><a>" . $error . "</a></li>";
    }
    echo "</ol>";
}
else{

    if (!$stmt->bind_param("ssissis", $title, $author, $book_year, $publishing, $subjects, $price, $photo)) {
        echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
    }

    $stmt->close();

    $target_dir = "Images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {

        $check = getimagesize($_FILES["photo"]["tmp_name"]);

        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    echo "<h1>The data was successfully written to the database .</h1>";
}
?>