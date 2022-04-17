<?php

// 1
echo '<h2>Задание 1:</h2>';
function Returns_true_if_prime_number  ($numberToCheck)
{
    for( $i = 2; $i < $numberToCheck; $i++){
        if($numberToCheck % $i == 0)
            return false;
    }

    return true;
}

function Returns_prime_numbers  ()
{
    for( $i = 2; $i < 100; $i++){
        if(Returns_true_if_prime_number($i))
            echo '<b>', $i, '</b><br>';
    }
}

Returns_prime_numbers();

// 2
echo '<h2>Задание 2:</h2>';

function Returns_multiplication_table   ()
{
    echo '<table style="border: 1px solid black;">';
    for($i = 1; $i < 10; $i++){
        echo '<tr>';
        for($j = 1; $j < 10; $j++){
            echo '<td style="text-align: center; width: 25px;">', $i * $j, '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

Returns_multiplication_table();

// 3
echo '<h2>Задание 3:</h2>';

$vowel = array('A', 'E', 'I', 'O', 'U', 'Y');

$i = 'A';
while($i != 'AA'){
    $color = in_array($i, $vowel) ? "blue" : "red";
    echo '<b style="color:', $color, '">', $i++, ' </b>';
}

// 4
echo '<h2>Задание 4:</h2>';
for( $i = 0; $i < 100; $i++){
    $color = ($i % 2 == 0) ? "grey" : "white";
    echo '<div style="background-color:', $color, ';">', $i, '</div>';
}

//5
echo '<h2>Задание 5:</h2>';

$days  = array("Su", "Mo", "Tu", "We", "Th", "Fr", "Sa");

echo '<table style="border: 1px solid black;">';

echo '<tr>';
for($i = 0; $i < 7; $i++){

    $color = ($i == 0 || $i == 6) ? "red" : "blue";
    echo '<td style="text-align: center; width: 25px; color:', $color, '">', $days[$i], '</td>';
}
echo '</tr>';

$day = -5; // Первое января начинается с субботы, для компенсации я отнял (1 - 6 = -5)

for($j = 0; $j < 6; $j++){
    echo '<tr>';

    for($i = 0; $i < 7; $i++){

        if($day < 1){
            echo '<td></td>';
            $day++;
        }
        else{
            $color = ($i == 0 || $i == 6) ? "red" : "blue";
            echo '<td style="text-align: center; width: 25px; color:', $color, '">', $day++, '</td>';    
        }
        
        if($day == 32) break;
    }

    echo '</tr>';
}

echo '</table>';

//6
echo '<h2>Задание 6:</h2>';

echo '<table style="border: 1px solid black;">';

$color = true;;
for($i = 0; $i < 8; $i++){

    echo '<tr>';
    $color = !$color;
    for($j = 0; $j < 8; $j++){
        $color = !$color;
        echo '<td style="width: 50px; height: 50px; background-color:', $color ? "black" : "white", '"></td>';    
    } 

    echo '</tr>';
}

echo '</table>';
?>