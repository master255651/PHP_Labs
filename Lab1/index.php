<?php

// 1
echo '<h2>Задание 1:</h2>';
$a = 3;
echo '<b>$a</b>';


// 2
echo '<h2>Задание 2:</h2>';
$a = 10;
$b = 2;
echo 'Сумма: <b>', $a + $b, '</b><br>';
echo 'Разность: <b>', $a - $b, '</b><br>';
echo 'Произведение: <b>', $a * $b, '</b><br>';
echo 'Частное: <b>', $a / $b, '</b><br>';

// 3
echo '<h2>Задание 3:</h2>';
$c = 15;
$d = 2;
$result = $c + $d;
echo 'Ответ: <b>', $result, '</b><br>';

// 4
echo '<h2>Задание 4:</h2>';
$a = 10;
$b = 2;
$c = 5;
echo '(a + b + c) = <b>', $a + $b + $c, '</b><br>';

//5
echo '<h2>Задание 5:</h2>';
$a = 17;
$b = 10;
$c = $a - $b;
$d = 7;
$result = $c + $d;
echo 'Ответ: <b>', $result, '</b><br>';

//6
echo '<h2>Задание 6:</h2>';
$hour = 60 * 60;
$day = 24 * $hour;
$month = 30 * $day;
echo 'В часе - <b>', $hour, '</b> секунд<br>';
echo 'В сутках - <b>', $day, '</b> секунд<br>';
echo 'В месяце - <b>', $month, '</b> секунд<br>';

// 7
echo '<h2>Задание 7:</h2>';
date_default_timezone_set('Europe/Chisinau');
$date = date('h:i:s', time());
echo 'Время: <b>', $date, '</b><br>';

// 8
echo '<h2>Задание 8:</h2>';
$a = 2;
$b = 4;
echo 'Сумма: <b>', $a + $b, '</b><br>';
echo 'Произведение: <b>', $a * $b, '</b><br>';
echo 'Сумма квадратов: <b>', $a * $a + $b * $b, '</b><br>';

// 9 floor($x*100)/100 - Это для округления
echo '<h2>Задание 9:</h2>';
$a = 10;
$b = 12;
$b = 14;
echo 'Среднее арифметическое: <b>', floor(($a + $b + $c) / 3 * 100) / 100, '</b><br>';

// 10 floor($x*100)/100 - Это для округления
echo '<h2>Задание 10:</h2>';
$x = 2;
$y = 3;
$z = 5;
echo 'Ответ: <b>', floor((pow($x + 1, 4) - 2 * ($z - 2 * pow($x , 2) + pow($y, 2)) + sqrt( abs( sin($y) ) )) * 100) / 100, '</b><br>';

// 11
echo '<h2>Задание 11:</h2>';
$x = 8;
$y = 4;
$z = 2;
echo 'Результаты деления:<br>';
echo ($x + $y) / $z, '<br>';
echo ($x + $z) / $y, '<br>';
echo ($z + $y) / $x, '<br>';

// 12
echo '<h2>Задание 12:</h2>';
$x = 8;
$y = 4;
echo 'Даны числа: <b>', $x, ' и ', $y, '</b><br>';
echo 'Остатки от деления на 3:<br>';
echo $x % 3, '<br>';
echo $y % 3, '<br>';
echo 'Остатки от деления на 5:<br>';
echo $x % 5, '<br>';
echo $y % 5, '<br>';

// 13
echo '<h2>Задание 13:</h2>';
$x = 8;
echo 'Число ', $x, ' + 30% = <b>', $x + $x * 0.3, '</b><br>';
echo 'Число ', $x, ' + 120% = <b>', $x + $x * 1.2, '</b><br>';

// 14
echo '<h2>Задание 14:</h2>';
$x = 8;
$y = 4;
echo 'Суума двух чисел: <b>', $x * 0.4 + $y * 0.84, '</b><br>';
$number = 123;
$c1 = $number % 10;
$number /= 10;
$c2 = $number % 10;
$number /= 10;
$c3 = $number % 10;
echo 'Сумма цифр числа: <b>', $c1 + $c2 + $c3, '</b><br>';

// 15
echo '<h2>Задание 15:</h2>';
$number = 123;
$c1 = $number % 10;
$number /= 10;
$c2 = $number % 10;
$number /= 10;
$c3 = $number % 10;
$c2 = 0;
echo 'Цифры наборот + вторая цифра = ноль. Ответ: <b>', $c1 * 100 + $c2 * 10 + $c3, '</b>';
?>