<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kezik A">
    <title>PHP. ДЗ-3</title>
    <style>
        body {
            padding: 20px;
        }

        div {
            border-bottom: 1px solid #000;
            padding: 0 0 10px 16px;
            margin-bottom: 50px;
        }   

        td {
            padding-right: 60px;
        }
    </style>
</head>
<body>
    
<p>1. Сделайте функцию, которая возвращает куб числа. Число передается параметром.</p>

<?php 
    function cube($a) {
        return $a ** 3;
    }

    $b = 4;
?>

<div>Куб числа <?=$b?> = <?=cube($b)?></div>

<p>2. Сделайте функцию, которая возвращает сумму двух чисел. Числа передаются параметрами функции.</p>

<?php 
    function sum($n1, $n2) {
        return $n1 + $n2;
    }

    $a = 5;
    $b = 10;
?>

<div><?=$a?> + <?=$b?> = <?=sum($a, $b)?></div>

<p>3. Сделайте функцию, которая принимает параметром число от 1 до 7, а возвращает день недели на русском языке.</p>

<?php 
    function dayName($day) {
        switch($day) {
            case 1:
                return 'понедельник';
                break;
            case 2:
                return 'вторник';
                break;
            case 3:
                return 'среда';
                break;
            case 4:
                return 'четверг';
                break;
            case 5:
                return 'пятница';
                break;
            case 6:
                return 'суббота';
                break;
            case 7:
                return 'воскресенье';
                break;
            default: 
                return 'не попадает в диапазон от 1 до 7';
        }
    }

    $dayNumber = 5;
?>

<div>Число <?=$dayNumber?> - <?=dayName($dayNumber)?></div>

<p>4. Сделайте функцию, которая параметром принимает число и проверяет - отрицательное оно или нет. Если отрицательное - пусть функция вернет true, а если нет - false.</p>

<?php 
    function checkNumber($a) {
        if($a > 0) return true;
        elseif ($a < 0 ) return false;
        else return 'Число = 0';
    }

    $num = -15;
?>

<div><?=var_dump(checkNumber($num))?></div>

<p>5. Сделайте функцию getDigitsSum (digit - это цифра), которая параметром принимает целое число и возвращает сумму его цифр.</p>

<?php
    function getDigitsSum($a) {
        $sum = 0;
        $b = str_split($a);

        foreach ($b as $val) {
            $sum += $val;
        }

        return $sum;
    }

    $num = 12345;
?>

<div>Дано число <?=$num?>. Сумма его цифр = <?=getDigitsSum($num)?></div>

<p>6. Найдите все года от 1 до 2020, сумма цифр которых равна 13. Для этого используйте вспомогательную функцию getDigitsSum из предыдущей задачи.</p>

<?php 
    $year = '';

    for ($i = 1; $i <= 2020; $i++) {
        if (getDigitsSum($i) == 13) $year .= $i . ' ';
    }
?>

<div><?=$year?></div>

<p>7. Сделайте функцию isEven() (even - это четный), которая параметром принимает целое число и проверяет: четное оно или нет. Если четное - пусть функция возвращает true, если нечетное - false.</p>

<?php
    function isEven($a) {
        if (is_int($a)) {
            if(!($a % 2)) return true;
            else return false;
        } else {
            return 'число не целое';
        }
    }

    $num = 29;
?>

<div>Число <?=$num?> - возвращает <?=var_dump(isEven($num))?></div>

<p>8. Сделайте функцию, которая принимает строку на русском языке, а возвращает ее транслит.</p>

<?php 

    function transLit($text) {
        $letters = array('а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'e', 'ж'=>'zh', 'з'=>'z', 'и'=>'i', 'к'=>'k', 'л'=>'l','м'=>'m', 'н'=>'n','о'=>'o', 'п'=>'p','р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u','ф'=>'f','х'=>'h', 'ц'=>'ts', 'ч'=>'ch', 'ш'=>'sh','щ'=>'tch', 'ъ'=>'`', 'ы'=>'y', 'ь'=>'`', 'э'=>'e', 'ю'=>'yu', 'я'=>'ya', 'А'=>'A', 'Б'=>'B', 'В'=>'V', 'Г'=>'G', 'Д'=>'D', 'Е'=>'E', 'Ё'=>'E', 'Ж'=>'Zh', 'З'=>'Z', 'И'=>'I', 'К'=>'K', 'Л'=>'L','М'=>'M', 'Н'=>'N','О'=>'O', 'П'=>'P','Р'=>'R', 'С'=>'S', 'Т'=>'T', 'У'=>'U','Ф'=>'F','Х'=>'H', 'Ц'=>'Ts', 'Ч'=>'Ch', 'Ш'=>'Sh','Щ'=>'Tch', 'Ъ'=>'`', 'Ы'=>'Y', 'Ь'=>'`', 'Э'=>'E', 'Ю'=>'Yu', 'Я'=>'Ya');

        $text_arr = preg_split('~~u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $text = '';

        foreach($text_arr as $val) {
            if (isset($letters[$val])) $text .= $letters[$val];
            else $text .= $val;
        }
        return $text;
    }

    $phrase = "Меня зовут Антон. Я учу PHP. Скоро буду проходить объекты!";
    
?>

<div><?=transLit($phrase)?></div>

<p>9. Сделайте функцию, которая возвращает множественное или единственное число существительного. Пример: 1 яблоко, 2 (3, 4) яблока, 5 яблок. Функция первым параметром принимает число, а следующие 3 параметра — форма для единственного числа, для чисел два, три, четыре и для чисел, больших четырех, например, func(3, 'яблоко', 'яблока', 'яблок').</p>

<?php 
    function my_func_1($num, $a, $b, $c) {
        switch($num){
            case 1: 
                return $num . ' ' . $a;
                break;
            case 2:
                return $num . ' ' . $b;
            case 3:
                return $num . ' ' . $b;
            case 4: 
                return $num . ' ' . $b;
                break;
            default: 
                return $num . ' ' . $c;
        }
    }
?>

<div><?=my_func_1(1, 'яблоко', 'яблока', 'яблок')?></div>

<p>10. Дан массив с числами. Выведите последовательно его элементы используя рекурсию и не используя цикл.</p>

<?php 
    function echoArray($arr, $i = 0) {
        if (isset($arr[$i])) {
            echo $arr[$i] . ' ';

            $i++;

            echoArray($arr, $i);
        } 
    }
?>

<div><?=echoArray([1, 2, 4, 6, -9, 12, 0])?></div>

<p>11. Дано число. Сложите его цифры. Если сумма получилась более 9-ти, опять сложите его цифры. И так, пока сумма не станет однозначным числом (9 и менее).</p>

<?php 

    function getSum($a) {

        $sum = getDigitsSum($a);

        if ($sum > 9) {
            echo $sum . '<br>';
            getSum($sum);
        }
        else echo 'конечное число - ' . $sum;
    }

?>

<div><?=getSum('6758978768769787687667678367846378676')?></div>

<p>12. Рассчитать скорость движения машины и выведите её в удобочитаемом виде. Осуществить возможность вывода в км/ч, м/c. Представить решение задачи с помощью одной функции.</p>

<?php

    function speed($s, $t, $val){
        $speed = $s / $t;
        switch($val) {
            case 1:
                return round($speed, 2) . ' км/ч';
            case 2:
                return round($speed / 3.6, 2) . ' м/с';
        }
    }

    $res = 'результат';
    $dist = 'пройденный путь (км)';
    $time = 'время в пути';
    
    if(!empty($_POST['submit'])) {
        if($_POST['dist'] <= 0 || $_POST['time'] <= 0) {
            $res = 'проверьте данные';
        } else {
            $dist = $_POST['dist'];
            $time = $_POST['time'];
            $res = speed($dist, $time, $_POST['val']);
        }
    }
?>
<div>
    <form method="post" action="/">
        <input type="text" name="dist" placeholder="<?=$dist?>"/><br><br>
        <input type="text" name="time" placeholder="<?=$time?>"/><br><br>
        <input type="radio" name="val" value="1" /> - км/ч <input type="radio" name="val" value="2" /> - м/с<br><br>
        <input type="submit" name="submit" value="Рассчитать" /> - <input type="text" name="val" value="<?=$res?>" disabled/>
    </form>
</div>

<p>13. Даны 2 слова, определить можно ли из 1ого слова составить 2ое, при условии что каждую букву из строки 1 можно использовать только один раз.</p>

<?php 

    function wordsСomparison($a, $b) {
        sort($a);
        sort($b);
        return $a == $b;
    }

    $world1 = mb_convert_case('антон2', MB_CASE_LOWER, "UTF-8");
    $world2 = mb_convert_case('Нотан', MB_CASE_LOWER, "UTF-8");
    
    $arr1 = preg_split('~~u', $world1, -1, PREG_SPLIT_NO_EMPTY);
    $arr2 = preg_split('~~u', $world2, -1, PREG_SPLIT_NO_EMPTY);
        
    if (wordsСomparison($arr1, $arr2)) $res = 'Можно';
    else $res = 'Нельзя';

?>

<div>Даны два слова: <?=$world1?> и <?=$world2?>. <strong><?=$res?></strong> составить из первого слова второе.</div>

<p>14. Палиндромом называют последовательность символов, которая читается как слева направо, так и справа налево. Напишите функцию по определению палиндрома по переданному параметру.</p>

<?php 
    $a = 'довод';

    $world = preg_split('~~u', mb_convert_case($a, MB_CASE_LOWER, "UTF-8"), -1, PREG_SPLIT_NO_EMPTY);

    function isPalindrom($arr) {
        $length  = count($arr)-1;
        $param = ceil($length /2);

        for($i = 0; $i < $param; ++$i) {
    
            if($arr[$i] != $arr[$length-$i]) return 'не полиндром';

            return 'полиндром';

        }
    }
?>

<div>Слово <?=$a?> - это <?=isPalindrom($world)?></div>

<p>15. Создание функцию создания таблицы умножения в HTML-документе в виде таблицы с использованием соотв. тегов.</p>

<?php 
    function multiplicationTable(){
        for($i = 1; $i < 10; $i++) {
            echo "<tr>";
           
            for($j = 1; $j < 10; $j++) {
                
                $res = $i * $j;
                echo "<td>{$j} х {$i} = {$res}</td>";
            
            }
    
            echo "</tr>";
        }
    }
?>

<table><?=multiplicationTable()?></table>

<p>16. Дана строка с текстом. Напишите функцию определения самого длинного слова.</p>

<?php 
    function maxWordLength($string) {
        $arr = explode(" ",$string);
        $val = 0;
        for ($i = 0; $i < count($arr); $i++) {

            $let1 = preg_split('~~u', $arr[$i], -1, PREG_SPLIT_NO_EMPTY);

            if (count($let1) > $val) {
                $val = count($let1);
                $res = $i;
            }

        }
        return $arr[$res];
    } 

    $string = 'Напишите функцию определения самого длинного слова';
?>

<div>Самое длинное слово из строки <i>"<?=$string?>"</i> - это слово <strong><?=maxWordLength($string)?></strong></div>

<p>17. Напишите функцию определения суммарного количества единиц в числах от 1 до 100.</p>

<?php 

    function unitsSum()
    {
        $counter = 0;
        for ($i = 1; $i <= 100; $i++) {
            $arr = str_split($i);
            for ($j = 0; $j < count($arr); $j++) {
                if ($arr[$j] == 1) $counter++;
            }
        }  
        return $counter;
    }

?>

<div>Сумма единиц от 0 до 100 = <?=unitsSum()?> </div>

<p>18. Напишите функцию, которая разбивает длинную строку тегами br так, чтобы длина каждой подстроки была не более N символов. Новая подстрока не должна начинаться с пробела.</p>

<?php 


    $string ="Белорусские деревни за 20 лет потеряли 970 тыс. человек. Это немногим меньше населения Могилевской области. Если все будет продолжаться такими темпами, последнего жителя деревни мы можем лишиться в 2062 году. На прошедшем Всебелорусском народном собрании снова говорили о неустанном повышении качества жизни на селе. А что скажут статистика и сами сельские жители?";

    $n = 80;


    function getBr($string, $n) {
        $arr = explode(" ", $string);
        print_r($arr);
        echo '<hr>';
    
        $count = 0;
        $res = '';

        for($i = 0; $i < count($arr); $i++) {

            $count = count(preg_split('~~u', $res . ' ' . $arr[$i], -1, PREG_SPLIT_NO_EMPTY));

            if ($count >= $n) {   
                $res .=  '<br>';
                echo $res;
                $res = $arr[$i] . ' ';
            } else {
                $res .= $arr[$i] . ' ';
            }

           
        }

        echo $res;

    }

   
getBr($string, $n);

?>

</body>
</html>