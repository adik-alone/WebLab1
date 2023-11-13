<?php
$time_start = microtime(true);

$json = json_decode(file_get_contents('php://input'));

$x = $json->X;
$y = $json->Y;
$r = $json->R;

//echo implode(" ", $_POST);

//echo "X: " . $x . "<br>";


//
//$x = (float)$_POST["X"] !== null;
//$y = (float)$_POST["Y"] !== null;
//$r = (float)$_POST["R"] !== null;

$date_now = date('d.m.Y');
$result = "Промах";


//if($r > 5 || $r < 0 || $x <=-2 || $x >= 2){
//
//
//}







preg_match('/\-?\d+\.?\d{0,}/', $x, $matches);
if (count($matches) == 1 && $matches[0] == $x) {
    $x = (float)$x;
} else {
    exit("Недопустимые значения");
}

preg_match('/\-?\d+\.?\d{0,}/', $y, $matches);
if (count($matches) == 1 && $matches[0] == $y) {
    $y = (float)$y;
} else {
    exit("Y должен быть float");
}

preg_match('/\-?\d+\.?\d{0,}/', $r, $matches);
if (count($matches) == 1 && $matches[0] == $r) {
    $r = (int)$r;

    if ($r <= 0 || $r > 5) {
        exit("R не попадает в диапозон");
    }
} else {
    exit("Недопустимые значение");
}

if ($x < -2 || $x > 2) {
    exit("X вне диапазона (-2, 2)");
}
if ($y < -5 || $y > 5) {
    exit("Y вне диапазона (-5; 5)");
}
if (!($r == 1 || $r == 2 || $r == 3 || $r == 4 || $r == 5)) {
    exit("R должен быть одним из [1, 2, 3, 4, 5]");
}





















if($x >= 0 && $y >= 0){
    if($x <= $r && $y <= $r/2){
        $result = "Попал";
    }
}else if($x >= 0 && $y < 0){
//    в любом случае промах
}else if($x < 0 && $y >= 0){
    if($y <= $x/2 + $r/2){
        $result = "Попал";
    }
}else if($x < 0 && $y < 0){
    $dot = $x*$x + $y*$y;
    if($dot <= ($r/2)*($r/2)){
        $result = "Попал";
    }
}


//$tableRow = '<tr>';
//$tableRow .= '<td>' . $x .'</td>';
//$tableRow .= '<td>' . $y . '</td>';
//$tableRow .= '<td>' . $r . '</td>';
//$tableRow .= '<td>' . $result . '</td>';
//$tableRow .= '<td>' . $date_now . '</td>';
//$tableRow .= '<td>' . $execute_time . '</td>';
//$tableRow .= '</tr>';
//
//echo $tableRow

//echo $x;
//echo $y;
//echo $r;




/// Можно возвращать json



//echo "<tr>";
//echo "<td>$x</td>";
//echo "<td>$y</td>";
//echo "<td>$r</td>";
//echo "<td>$result</td>";
//$execute_time = round((microtime(true) - $time_start) * 1000, 5);
//echo "<td>$execute_time</td>";
//echo "<td>$date_now</td>";
//echo "</tr>";
$execute_time = round((microtime(true) - $time_start) * 1000, 5);


$table_row = array(
    "X" => $x,
    "Y" => $y,
    "R" => $r,
    "Result" => $result,
    "Execute_time" => $execute_time,
    "Date_now" => $date_now
);

// echo json_encode($table_row);

//
echo $x;
echo $y;
echo $r;
echo $result;
echo $execute_time;
echo $date_now;


//echo $x," ", $y, " ",  $r, "<br>";
//echo "Результат: ", $result, "<br>";
//
//
//echo "Текущая дата: ", $date_now, "<br>";
//

//echo "Время выполнения: ", $execute_time;





//echo $X," ", $Y, " ",  $R, "<br>";
//echo "Текущая дата: ", $date_now, "<br>";

//echo "<tr>";
//echo "<td><p class='crop'>$X</p></td>";
//echo "<td><p class='crop'>$Y</p></td>";
//echo "<td><p class='crop'>$R</p></td>";
//echo "<td><p class='crop'>hello</p></td>";
//echo "<td><p class='crop'>28</p></td>";


?>
