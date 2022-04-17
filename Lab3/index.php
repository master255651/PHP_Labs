<?php

// 1
echo '<h2>Задание 1:</h2>';

function CustomSorting($a, $b)
{
    if($a < 0 || $b < 0){
        return ($a < $b) ? 1 : -1;
    }
    else {
        return ($a < $b) ? -1 : 1;
    }
    return 0;
}

$numbers = array(4, -8, 7, -6, 0, -7, 5);

usort($numbers, "CustomSorting");

foreach($numbers as $value) echo "$value ";

// 2
echo '<h2>Задание 2:</h2>';

function DeleteDuplicates($array)
{
    $uniqueArray = array_unique($array);
    return count($uniqueArray);
}

$numbers = array(14, -2, 3, 14, 3, -2, 5);

$count = DeleteDuplicates($numbers);
echo "Количество идентичных чисел = $count";

// 3
echo '<h2>Задание 3:</h2>';

$numbers = array(-1, 2, 5, 0, 2);

$sum = array_sum($numbers);
$result = array();
 
for($i = 0; $i < count($numbers) - 1; $i++) {
    $result[$i * 2] = $numbers[$i];
    $result[$i * 2 + 1] = $sum - $numbers[$i] - $numbers[$i+1];
    $result[$i * 2 + 2] = $numbers[$i + 1];
}

foreach($result as $value) echo "$value ";

// 4
echo '<h2>Задание 4:</h2>';

$numbers = array(-1, 2, -5, -5, 3); // -5 -5 -1 2 3
$k = 2;

for($i = 0; $i < count($numbers); $i++) {
    $countOfSmaller = 0;

    for($j = 0; $j < count($numbers); $j++) {
        if($numbers[$j] < $numbers[$i]) 
            $countOfSmaller++;
    }

    if($countOfSmaller == $k){
        $result = $numbers[$i];
    }
}


echo 'Элемент на позиции ', $k,' в отсортированном массиве = ', $result;

//5
echo '<h2>Задание 5:</h2>';

$str = "london is the capital of great britain";
$result = ucwords($str);

echo $result;

//6
echo '<h2>Задание 6:</h2>';

$str = "london is the capital of great britain";
$result = substr($str, -3);

echo 'Последние 3 символа: ', $result;

//7
echo '<h2>Задание 7:</h2>';

$str = "ico.png";
$result =
    (substr($str, -4) == '.png' || substr($str, -4) == '.jpg')
        ? "Да" : "Нет";

echo $result;

//8
echo '<h2>Задание 8:</h2>';

$str = "1a2b3c4b5d6e7f8g9h0";
$result = preg_replace('/\d/', '', $str);

echo $result;

//9
echo '<h2>Задание 9:</h2>';

$array = array('html', 'css', 'php');
$result = implode(', ', $array);

echo $result;

?>