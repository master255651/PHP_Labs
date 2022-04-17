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

$title = $_POST['title'];
empty($title) ? array_push($errors, "Book title field was empty!") : array_push($resultToFile, $title);

$author = $_POST['author'];
empty($author) ? array_push($errors, "Book author field was empty!") : array_push($resultToFile, $author);

$publisher = $_POST['publisher'];
empty($publisher) ? array_push($errors, "Book publisher field was empty!") : array_push($resultToFile, $publisher);

$year = $_POST['year'];
!is_numeric($year) || $year <= 1500 ? array_push($errors, "Year of publication must be a number greater than 1500!") : array_push($resultToFile, $year);

$genres = array();

if(isset($_POST['fantasy']))
    array_push($genres, "fantasy");

if(isset($_POST['mystery']))
    array_push($genres, "mystery");

if(isset($_POST['thriller']))
    array_push($genres, "thriller");

if(isset($_POST['romance']))
    array_push($genres, "romance");

!isset($_POST['language']) ? array_push($errors, "Language has not been selected!") : array_push($resultToFile, $_POST ['language']);


count($genres) == 0 ? array_push($errors, "No genre has been selected!") : array_push($resultToFile, implode(" ", $genres));

if(count($errors) != 0){
    echo "<h1>One or more errors occurred!<br />The data was not written to the file.</h1>";

    echo "<ol class='rectangle'>";

    foreach ($errors as $error){
        echo "<li><a>" . $error . "</a></li>";
    }
    echo "</ol>";
}
else{
    $file = fopen(__DIR__ . '/BooksInfo.txt', 'a') or die("не удалось создать файл");

        fputs($file, implode(" ", $resultToFile) . PHP_EOL);

    fclose($file);

    echo "<h1>The data was successfully written to the file.</h1>";
}
?>