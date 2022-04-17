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
    define("keys", array("Id", "Title", "Author", "Book_year", "Publishing", "Subjects", "Price", "Photo"));

    $table = "";

    function ShowBookLine($book)
    {
        $tableRow = "";
    
        $tableRow .= "<tr>";
        
        for($i = 0; $i < count($book) - 1; $i++) {
            $tableRow .= "<td>" . $book[keys[$i]] . "</td>";
        }
        
        $imageName = $book[keys[count($book) - 1]];
        $tableRow .= "<td><img src='Images/{$imageName}'></td>";
        $tableRow .= "</tr>";
    
        return $tableRow;
    }
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "Library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conditions = array();
    $types = "";
    $values = array();

    $title = $_GET['title'];
    $author = $_GET['author'];
    $price = $_GET['price'];

    if(!empty($title)){
        array_push($conditions, "title like ?");
        $types .= "s";
        array_push($values, $title);
    }

    if(!empty($author)){
        array_push($conditions, "author like ?");
        $types .= "s";
        array_push($values, $author);
    }

    if(!empty($price)){
        array_push($conditions, "price <= ?");
        $types .= "i";
        array_push($values, $price);
    }

    $query = "SELECT * FROM eLib";

    if(count($conditions) != 0){
        $query .= " where ";

        for($i = 0; $i < count($conditions); $i++){
            $i == count($conditions) - 1 ? $query .= $conditions[$i] : $query .= $conditions[$i] . " and ";
        }
    }

    if (!($stmt = $conn->prepare($query))) {
        echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
    }

    if(count($conditions) != 0){
        if (!$stmt->bind_param($types, ...$values)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
    }
    
    if (!$stmt->execute()) {
        echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
    }

    $result = $stmt->get_result();

    if ($result->num_rows != 0)
    {
        $table .= "<table>";
    
        $table .= 
        "<tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Publishing</th>
            <th>Subjects</th>
            <th>Price</th>
            <th>Photo</th>
        </tr>";

        while($row = $result->fetch_assoc()) {
            $table .= ShowBookLine($row);
        }

        $table .= "</table><br />";
    }
    else echo "Request result is empty!";
    
    $stmt->close();

    echo "<h1>Information about all books from the BooksInfo file.</h1>";

    echo $table;
?>