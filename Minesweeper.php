<?php
//=============產生100數列==============
$frame = [];
for ($i = 0; $i <= 99 ; $i++) {
    $frame[] = 0;
}
// echo $frame[6];
// var_dump($frame) . "<br>";

//==============亂數產生地雷===============
$ranNumberTotal = [];
for ($i = 0; $i <= 39; $i++) {
    $ranNumber = rand(0, 99);
        if (in_array($ranNumber, $ranNumberTotal)) {
            $i--;
        } else {
            $ranNumberTotal[] = $ranNumber;
        }
}
// var_dump($ranNumberTotal);

//=========放入地雷==========
for ($i = 0; $i <= 39; $i++) {
    $LandminePos = $ranNumberTotal[$i];
    $frame[$LandminePos] = "M";
}
// var_dump($frame);

//轉成2維陣列
$frame = array_chunk($frame, 10);
// var_dump($frame);

//=========計算周圍地雷========
for ($i = 0; $i <= 9; $i++) {
    for ($j = 0; $j <= 9; $j++) {
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
// echo "<table>";
// for ($i = 0; $i <= 9; $i++) {
//     echo "<tr>";
//     for ($j = 0; $j <= 9; $j++) {
//         echo "<td>";

//         if ($frame[$i][$j] === "M") {
//             echo $frame[$i][$j];
//         } else {
//             echo $frame[$i][$j];
//         }
//         echo "</td>";
//     }
//     echo "</tr>";
// }
// echo "<table>";

//=========最終輸出==========
for ($i = 0; $i <= 9; $i++) {
    for ($j = 0; $j <= 9; $j++) {
        $output .= $frame[$i][$j];
    }
    $output .= "N";
}
$output = substr($output, 0, -1);
echo $output;
// echo strlen($output);


