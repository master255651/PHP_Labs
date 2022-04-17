<?php

echo "
<style>
.header {
    text-align: center;
    background: #1abc9c;
    color: white;
    font-size: 18px;
  }

p.answer {
    color: blue;
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

function Show($numberOfQuestion, $question, $answer)
{
    return '
    <div class="header">
        <h1>Task number '. $numberOfQuestion. '</h1>
        <p>'. $question. '</p>
        <p class="answer">'. $answer. '</p>
    </div>
    ';
}
// 1

$file = fopen(__DIR__ . '/Task1_integers.txt', 'w') or die("не удалось создать файл");

for ($i = 1; $i < 1000; $i++) {
    ($i % 3 == 0) ? fputs($file, $i . PHP_EOL) : fputs($file, $i . " ");
}

fclose($file);


//2
$file = fopen(__DIR__ . '/Task2_letters.txt', 'w') or die("не удалось создать файл");
$number = 26;

for ($i = 65; $i < 65 + $number; $i++) {
    for ($j = 0; $j < 10; $j++) {
        fputs($file, chr($i));
    }
    fputs($file, PHP_EOL);
}

fclose($file);

//3
$fileInput = fopen(__DIR__ . "/Task3_input.txt", "r") or die("не удалось открыть файл");
$fileOutput = fopen(__DIR__ . '/Task3_output.txt', 'w') or die("не удалось создать файл");
if ($fileInput)
{
    while (!feof($fileInput))
    {
        $received_text  = fgets($fileInput);
        $newLine = str_replace("c", "a", $received_text);
        fputs($fileOutput, $newLine);
    }
}
else echo "Ошибка при открытии файла";

fclose($fileInput);
fclose($fileOutput);

//4
$file_array = file("Task4_MinLine.txt");
$min_length = 255;
$answer = "";

for ($i = 0; $i < count($file_array); $i++) {

    $length = strlen(rtrim($file_array[$i])); //Узнаю длину строки, убирая все лишние \n \r \t с помощью rtrim. Иначе длина строки будет неправильной!
    if($length < $min_length)
        $min_length = $length;
}

$answer .= '<span style="color: yellow">The minimum string length is ' . $min_length . '</span><br /><br />';
$file = fopen("Task4_MinLine.txt", "r") or die("не удалось открыть файл");
if ($file)
{
    while (!feof($file))
    {
        $mytext = fgets($file);

        if(strlen(rtrim($mytext)) == $min_length) //Выводим только строки минимальной длинны, не забываем убирать лишние пробелы и /t /r /n. Потому что иначе строка Hello Будет иметь длину 7, а не 5
            $answer .= $mytext."<br />";
    }
}
else echo "Ошибка при открытии файла";

fclose($file);

echo Show(
    '4',
    'Print all strings of the smallest length in the file', 
    $answer
);
//5
function GetMultiplicationString($a, $b){
    return $a . " * " . $b . " = " . $a * $b . "\n";
}

$file = fopen(__DIR__ . '/Task5_MultiplicationTable.txt', 'w') or die("не удалось создать файл");

for ($i = 0; $i <= 20; $i++) {
    for ($j = 0; $j <= 20; $j++) {
        fputs($file, GetMultiplicationString($i, $j));
    }
    fputs($file, PHP_EOL);
}

fclose($file);

//6
$table = "";

$citizens = array();

function ShowPersonLine($person)
{
    $tableRow = "";

    $tableRow .= "<tr>";

    for($i = 0; $i < 5; $i++) {
        $tableRow .= "<td>" . $person[$i] . "</td>";
    }

    $tableRow .= "</tr>";

    return $tableRow;
}

$file = fopen("Task6_Person.txt", "r") or die("не удалось открыть файл");
if ($file)
{
    $table .= "<table>";

    $table .= 
    "<tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Age</th>
        <th>Height</th>
        <th>Weight</th>
    </tr>";
    while (!feof($file))
    {
        $myperson = fgets($file);
        array_push($citizens, explode(" ", $myperson));
        $table .= ShowPersonLine(explode(" ", $myperson));
    }

    $table .= "</table><br />";
}
else echo "Ошибка при открытии файла";

fclose($file);

echo Show(
    '6',
    'Read from a file and display information about all citizens', 
    $table
);

//Запись в файл
$file = fopen(__DIR__ . '/Task6_output.txt', 'w') or die("не удалось создать файл");

function Get_the_youngest_citizen ($citizens){

    $min_age = 999;
    $min_person;

    foreach($citizens as $person){

        if($person[2] < $min_age){
            $min_age = $person[2];
            $min_person = $person;
        }
    }
    return implode(" ", $min_person);

}

function Get_the_oldest_citizen ($citizens){

    $max_age = 0;
    $max_person;

    foreach($citizens as $person){

        if($person[2] > $max_age){
            $max_age = $person[2];
            $max_person = $person;
        }
    }
    return implode(" ", $max_person);

}

function Get_the_tallest_citizen ($citizens){

    $max_height = 0;
    $max_person;

    foreach($citizens as $person){

        if($person[3] > $max_height){
            $max_height = $person[3];
            $max_person = $person;
        }
    }
    return implode(" ", $max_person);

}

function Get_the_smallest_citizen ($citizens){

    $min_height = 999;
    $min_person;

    foreach($citizens as $person){

        if($person[3] < $min_height){
            $min_height = $person[3];
            $min_person = $person;
        }
    }
    return implode(" ", $min_person);

}

function Get_the_skinniest_citizen ($citizens){

    $min_weight = 999;
    $min_person;

    foreach($citizens as $person){

        if($person[4] < $min_weight){
            $min_weight = $person[4];
            $min_person = $person;
        }
    }
    return implode(" ", $min_person);

}

function Get_the_fattest_citizen ($citizens){

    $max_weight = 0;
    $max_person;

    foreach($citizens as $person){

        if($person[4] > $max_weight){
            $max_weight = $person[4];
            $max_person = $person;
        }
    }
    return implode(" ", $max_person);

}

fputs($file, "Youngest Citizen: " . Get_the_youngest_citizen($citizens) . PHP_EOL);
fputs($file, "Oldest Citizen: " . Get_the_oldest_citizen($citizens) . PHP_EOL);
fputs($file, "Tallest Citizen: " . Get_the_tallest_citizen($citizens) . PHP_EOL);
fputs($file, "Smallest Citizen: " . Get_the_smallest_citizen($citizens) . PHP_EOL);
fputs($file, "Fattest Citizen: " . Get_the_fattest_citizen($citizens) . PHP_EOL);

fclose($file);
?>