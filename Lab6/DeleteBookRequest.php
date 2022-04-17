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
function CheckIfBooksExist($books, $title, $author){
    $num = 0;
    foreach($books as $book){

        if($book == null)
            continue;

        $bookParametrs = explode(" ", $book);

        $bookTitle = $bookParametrs[0];
        $bookAuthor = $bookParametrs[1];

        if($bookTitle == $title && $bookAuthor == $author)
            return $num;
            
        else
            $num++;
    }

    return -1;
}

$books = array();
$errors = array();
$resultDelete = array();

$title = $_GET['title'];
empty($title) ? array_push($errors, "Book title field was empty!") : array_push($resultDelete, $title);

$author = $_GET['author'];
empty($author) ? array_push($errors, "Book author field was empty!") : array_push($resultDelete, $author);

$fileInput = fopen(__DIR__ . "/BooksInfo.txt", "r") or die("не удалось открыть файл");

if ($fileInput)
{
    while (!feof($fileInput))
    {
        $received_text  = fgets($fileInput);
        array_push($books, $received_text);
    }
}
else echo "Ошибка при открытии файла";

fclose($fileInput);

if(CheckIfBooksExist($books, $title, $author) == -1)
    array_push($errors, "A book with that name and author has not been found!");

if(count($errors) != 0){
    echo "<h1>One or more errors occurred!<br />The book has not been removed from the file .</h1>";

    echo "<ol class='rectangle'>";

    foreach ($errors as $error){
        echo "<li><a>" . $error . "</a></li>";
    }
    echo "</ol>";
}
else{
    $rowToDelete = CheckIfBooksExist($books, $title, $author);

    $file = fopen(__DIR__ . '/BooksInfo.txt', 'w') or die("не удалось создать файл");

    $num = 0;
    foreach($books as $book){
        if($num++ == $rowToDelete)
            continue;
        if($book != null)
            fputs($file, rtrim($book) . PHP_EOL);
    }

    fclose($file);

    echo "<h1>The data was successfully written to the file.</h1>";
}
?>