<?php
$arr = array();
$result = null;
$time = null;
for ($i = 0; $i <= $_POST['arrLength']; $i++) {
    $temp = $_POST["element$i"];
    array_push($arr, $temp);
}
$start = microtime(true);
switch ($_POST['opt']){
    case 'Пузырьковый алгоритм':
        $result = bubbleSort($arr);

}
$time = microtime(true) - $start;
echo "$time  ;";
var_dump($result);
function bubbleSort($ownArray)
{
    $array = $ownArray;
    if (!$length = count($array)) {
        return $array;
    }
    for ($outer = 0; $outer < $length; $outer++) {
        for ($inner = 0; $inner < $length; $inner++) {
            if ($array[$outer] < $array[$inner]) {
                $tmp = $array[$outer];
                $array[$outer] = $array[$inner];
                $array[$inner] = $tmp;
            }
        }
    }
    return $array;
}

function quickSort($array)
{
    if (!$length = count($array)) {
        return $array;
    }

    $k = $array[0];
    $x = $y = array();

    for ($i=1;$i<$length;$i++) {
        if ($array[$i] <=$k) {
            $x[] = $array[$i];
        } else {
            $y[] = $array[$i];
        }
    }
    return array_merge(quickSort($x),array($k),quickSort($y));
}

function shellSort($array)
{
    if (!$length = count($array)) {
        return $array;
    }
    $k = 0;
    $gap[0] = (int)($length/2);
    while($gap[$k]>1){
        $k++;
        $gap[$k] = (int)($gap[$k-1]/2);
    }

    for ($i = 0; $i <=$k; $i++) {
        $step = $gap[$i];
        for ($j = $step; $j<$length; $j++) {
            $temp = $array[$j];
            $p = $j-$step;
            while ($p >=0 &&$temp < $array[$p]) {
                $array[$p+$step] = $array[$p];
                $p = $p-$step;
            }
            $array[$p+$step] = $temp;
        }
    }
    return $array;
}

function gnomeSort(&$a) {
    $n = count($a);
    $i = 1;
    $j = 2;
    while ($i < $n) {
        if ($a[$i - 1] < $a[$i]) {
            $i = $j;
            $j++;
        } else {
            list($a[$i], $a[$i - 1]) = array($a[$i - 1], $a[$i]);
            $i--;
            if ($i == 0) {
                $i = $j;
                $j++;
            }
        }
    }
}