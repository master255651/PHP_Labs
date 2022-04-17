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
</style>
";


function Show($question, $answer)
{
    static $numberOfQuestion = 0;

    return '
    <div class="header">
        <h1>Task number '. $numberOfQuestion++. '</h1>
        <p>'. $question. '</p>
        <p class="answer">'. $answer. '</p>
    </div>
    ';
}

echo Show(
    'Starenco Iurie', 
    'Variant 2'
);

// 1
echo Show(
    'Output March 1, 2025 in timestamp format', 
    mktime(0, 0, 0, 3, 1, 2025)
);

// 2
$diffInSec = time() - mktime(7, 23, 48);
$diffInHours = floor($diffInSec / 60 / 60);

echo Show(
    'Find the number of whole hours that have passed from 7:23:48 of the current day to the present time', 
    $diffInHours
);

// 3
$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
$month = date('n') - 1;

echo Show(
    'Create an array of months $month. Display the name of the current month using the $month array and the date function', 
    $months[$month]
);


// 4
$week = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
$array = explode('.', '31.12.2025');
$timestamp = mktime(0, 0, 0, $array[1], $array[0], $array[2]);
$day = date('w', $timestamp);

echo Show(
    'Given a date. Use the functions mktime and explode to convert this date into timestamp format. Get the day of the week (word) for the entered date', 
    $week[$day]
);

// 5
$year = 2020;
$fridays = 0;
$friday_date = array();

for($month = 1; $month <= 12; $month++){

	$days = date('t', mktime(0, 0, 0, $month, 1, $year));

	for($day = 1; $day <= $days; $day++){

        $timestamp = mktime(0, 0, 0, $month, $day, $year);
	    $d = date('w', $timestamp);

	    if($d == 5){

		    if(date('d', $timestamp) == 13){

			   $fridays++; 
               array_push($friday_date, date('d.m.Y', $timestamp));

		    }

	    }

	}
    
}

echo Show(
    'A year is given. Find all Friday the 13th this year. Output the result as an array of dates', 
    'In '. $year. ' there were '. $fridays. ' fridays the 13th.<br>'. implode(", ", $friday_date)
);


// 6
$numbers = array(-1, 2, 5, 0, 7);
$resultArr = array();

function isNumberInRange($value, $min, $max)
{
    return ($min < $value) && ($value < $max);
}

foreach($numbers as $value)
{
    if(isNumberInRange($value, 0, 10))
        array_push($resultArr, $value);
}

echo Show(
    'An array with numbers is given. Write in the new array only those numbers that are greater than zero and less than 10. To do this, use the isNumberInRange helper function, which takes a number as a parameter and checks that it is greater than zero and less than 10', 
    implode(", ", $resultArr)
);

// 7
$number = 6;

function isEven($value)
{
    return $value % 2 == 0 ? true : false;
}

echo Show(
    'Make an isEven() function (even is even), which takes an integer as a parameter and checks whether it is even or not. If even - let the function return true, if odd - false', 
    'The number '. $number. ' is '. (isEven($number) ? 'even' : 'odd')
);

// 8

function getDivisors($value)
{
    $divisors = array();

    for ($i = 1; $i < $value; $i++)
    {
        if (($value % $i) == 0)
        {
            array_push($divisors, $i);
        }
    }

    return $divisors;
}

function getCommonDivisors($number1, $number2)
{
    $commonDivisors = array();
    return array_intersect(getDivisors($number1), getDivisors($number2));
}

echo Show(
    'Make a getCommonDivisors function that takes 2 numbers as a parameter and returns an array of their common divisors. To do this, use an auxiliary function that takes a number as a parameter and returns an array of its divisors (numbers by which the given number is divisible)', 
    'Common divisors of 12 and 24: {'. implode(", ", getCommonDivisors(24, 12)). '}'
);

// 9

function getSumArray($array)
{
    $sum = 0;

    foreach ($array as $value) {
        $sum += $value;
    }

    return $sum;
}

$Friendly_numbers = array();

for($i = 1; $i < 10000; $i++){
    $sum1 = getSumArray(getDivisors($i));
    $sum2 = getSumArray(getDivisors($sum1));
    
    if($sum2 == $i && $sum1 != $i){ //Убрать одинаковые числа, например 6 и 6
        $friend = '{ ' . $sum1 . '; '. $sum2 . ' }';

        if(!in_array('{ ' . $sum2 . '; '. $sum1 . ' }', $Friendly_numbers)) //Убрать повторения в обратном порядке
            array_push($Friendly_numbers, $friend);
    }

}

echo Show(
    'Find all pairs of friendly numbers between 1 and 10000. To do this, make a helper function that finds all the divisors of a number and returns them as an array. Also make a function that takes an array as a parameter and returns its sum', 
    'All pairs of friendly numbers between 1 and 10000: '. implode(", ", $Friendly_numbers)
);


// 10
$randomArray = array();

for($i = 0; $i < 10; $i++){
    array_push($randomArray, mt_rand(0, 1000));
}

function getTdIndices($array)
{
    $tds = "";

    foreach ($array as $key => $value){
        $tds .= '<td>' . $key . '</td>';
    }

    return $tds;
}

function getTdValues($array)
{
    $tds = "";
    
    foreach ($array as $value){
        $tds .= '<td>' . $value . '</td>';
    }

    return $tds;
}

echo Show(
    'Fill the array with 10 random numbers and display it on the page as a table with element indices', 
    '<table>
        <tr style="background-color: red">'.
        getTdIndices($randomArray).
        '</tr>
        <tr>'.
        getTdValues($randomArray).
        '</tr>
    </table>'
);


// 11
$number = 30;

$divisors = getDivisors($number);

echo Show(
    'Task: make an array of divisors of our number. The number can be anything, not necessarily 30.', 
    'Divisors of '. $number.': '. implode(", ", $divisors)
);

?>