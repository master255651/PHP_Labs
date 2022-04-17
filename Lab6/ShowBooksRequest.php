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
   th, td {
    padding: 15px;
    text-align: center;
}

table, th, td {
    border: 1px solid black;
    margin-left: auto;
    margin-right: auto;
}

tr:nth-child(even){background-color: #caebd3;}
tr:nth-child(odd){background-color: #a2bce0;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
";

    $table = "";

    function ShowBookLine($book)
    {
        $tableRow = "";
    
        $tableRow .= "<tr>";
    
        for($i = 0; $i < count($book); $i++) {
            $tableRow .= "<td>" . $book[$i] . "</td>";
        }
    
        $tableRow .= "</tr>";
    
        return $tableRow;
    }
    
    $file = fopen("BooksInfo.txt", "r") or die("не удалось открыть файл");
    if ($file)
    {
        $table .= "<table>";
    
        $table .= 
        "<tr>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Year</th>
            <th>Language</th>
            <th>Genres</th>
        </tr>";
        while (!feof($file))
        {
            $mybook = fgets($file);

            if($mybook != null)
                $table .= ShowBookLine(explode(" ", $mybook));
        }
    
        $table .= "</table><br />";
    }
    else echo "Ошибка при открытии файла";
    
    fclose($file);
    
    echo "<h1>Information about all books from the BooksInfo file.</h1>";

    echo $table;
?>