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

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>DateOfDay</th><th>Temperature</th><th>Sign</th><th>Speed</th><th>Direction</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }

}

function ShowImage($sigh){

  switch ($sigh) {
    case "Sunny":
      $result = "<img src='Images/Sunny.png' width='50' height='50'>";
      break;
    case "Cloudy":
      $result = "<img src='Images/Cloudy.png' width='50' height='50'>";
      break;
    case "Rainy":
      $result = "<img src='Images/Rainy.png' width='50' height='50'>";
      break;
  }

  return $result;
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "weather_bd";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$selectedDate = "'".str_replace("-", ".", $_GET['selectedDate'])."'";

$sql = "SELECT * FROM weather_table WHERE DateOfDay = ". $selectedDate;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>"
        .$row["Id"]."</td><td>"
        .$row["DateOfDay"]."</td><td>"
        .$row["Temperature"]." °C</td><td>"
        .ShowImage($row["Sign"])."</td><td>"
        .$row["Speed"]." m/s</td><td>"
        .$row["Direction"]."</td></tr>"
    ;
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();

?>