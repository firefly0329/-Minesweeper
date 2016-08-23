<?php
$col = 20;
$row = 20;
$landmine = 40;
$area = $col * $row;
$time1 = microtime(true);
//=============產生100數列==============
$frame = [];
for ($i = 0; $i <= $area - 1; $i++) {
    $frame[] = 0;
}
// echo $frame[6];
// var_dump($frame) . "<br>";

//==============亂數產生地雷===============
$ranNumberTotal = [];
for ($i = 0; $i <= $landmine - 1; $i++) {
    $ranNumber = rand(0, $area - 1);
        if (in_array($ranNumber, $ranNumberTotal)) {
            $i--;
        } else {
            $ranNumberTotal[] = $ranNumber;
        }
}
// var_dump($ranNumberTotal);

//=========放入地雷==========
for ($i = 0; $i <= $landmine - 1; $i++) {
    $LandminePos = $ranNumberTotal[$i];
    $frame[$LandminePos] = "M";
}
// var_dump($frame) . "<br>";

//轉成2維陣列
$frame = array_chunk($frame, $row);
// var_dump($frame);

//=========計算周圍地雷========
for ($i = 0; $i <= $col - 1; $i++) {
    for ($j = 0; $j <= $row - 1; $j++) {
        if($frame[$i][$j] === 0){
            $frameNumber = 0;
            $frameNumber += $frame[$i - 1][$j - 1] === "M" ? 1 : 0;
            $frameNumber += $frame[$i - 1][$j] === "M" ? 1 : 0;
            $frameNumber += $frame[$i - 1][$j + 1] === "M" ? 1 : 0;
            $frameNumber += $frame[$i][$j - 1] === "M" ? 1 : 0;
            $frameNumber += $frame[$i][$j + 1] === "M" ? 1 : 0;
            $frameNumber += $frame[$i + 1][$j - 1] === "M" ? 1 : 0;
            $frameNumber += $frame[$i + 1][$j] === "M" ? 1 : 0;
            $frameNumber += $frame[$i + 1][$j + 1] === "M" ? 1 : 0;
            $frame[$i][$j] = $frameNumber;
        }
    }
}
//========輸出測試============
echo "<table>";
for ($i = 0; $i <= $col - 1; $i++) {
    echo "<tr>";
    for ($j = 0; $j <= $row - 1; $j++) {
        echo "<td style='width:20px; height:20px;'>";

        if ($frame[$i][$j] === "M") {
            echo $frame[$i][$j];
        } else {
            echo $frame[$i][$j];
        }
        echo "</td>";
    }
    echo "</tr>";
}
echo "<table>";

//=========最終輸出==========
for ($i = 0; $i <= $col - 1; $i++) {
    for ($j = 0; $j <= $row - 1; $j++) {
        $output .= $frame[$i][$j];
    }
    $output .= "N";
}
$output = substr($output, 0, -1);
echo $output;
// echo "<br>" . strlen($output);
$time2 = microtime(true);
$last = $time2 - $time1 ;
echo "<br>" . $last;


