<?php
$map = $_GET['map'];
// echo $map . "<br>";
$message = checkRule($map);
// echo $message;
if($message == ""){
    $message = checkNumber($map);
}

echo $message;

function checkRule($map){
    //驗證字符格式
    $message = "";
    if(!preg_match("/^([0-8MN]+)$/", $map)){
        $message .= "出現0~8,M,N以外的字符、";
        // return $message;
    }
    //驗證字串長度
    if(strlen($map) != 109){
        $message .= "map長度不符,您的字串長度為" . strlen($map) . "、" ;
        // return $message;
    }
    //驗證炸彈數
    if(substr_count($map, "M") != 40){
        $message .= "炸彈數不符,您的炸彈數為" . substr_count($map, "M") . "個、";
        // return $message;
    }
    //驗證換行位置
    for($i = 1; $i <= 9; $i++){
        $checkN .= substr($map, 10, 1);
    }
    if ($checkN != "NNNNNNNNN"){
        $message .= "換行位置錯誤、";
        // return $message;
    }
    return $message;
}

//驗證數字
function checkNumber($map){
    $map = str_replace("N", "", $map);
    // echo $map . "<br>";
    // echo strlen($map) . "<br><br>";
    $frame = str_split($map);
    $frame = array_chunk($frame, 10);
    // var_dump($frame);
    $checkOK = 0;
    $badNumber = "";
    for($i = 0; $i <= 9; $i++){
        for($j = 0; $j <= 9; $j++){
            $LandmineNumber = 0;
            $LandmineNumber += $frame[$i - 1][$j - 1] == "M" ? 1 : 0;
            $LandmineNumber += $frame[$i - 1][$j] == "M" ? 1 : 0;
            $LandmineNumber += $frame[$i - 1][$j + 1] == "M" ? 1 : 0;
            $LandmineNumber += $frame[$i][$j - 1] == "M" ? 1 : 0;
            $LandmineNumber += $frame[$i][$j + 1] == "M" ? 1 : 0;
            $LandmineNumber += $frame[$i + 1][$j - 1] == "M" ? 1 : 0;
            $LandmineNumber += $frame[$i + 1][$j] == "M" ? 1 : 0;
            $LandmineNumber += $frame[$i + 1][$j + 1] == "M" ? 1 : 0;
            if($frame[$i][$j] == "M"){
                $LandmineNumber = "M";
            }
            if($LandmineNumber == $frame[$i][$j]){
                $checkOK++;
            }else if($LandmineNumber - $frame[$i][$j] > 0){
                $badPos = "($i, $j)";
                $badNum = $LandmineNumber - $frame[$i][$j];
                $badMsh .= $badPos . "您多算了" . $badNum . "、";
            }else{
                $badPos = "($i, $j)";
                $badNum = abs($LandmineNumber - $frame[$i][$j]);
                $badMsh .= $badPos . "您少算了" . $badNum . "、";
            }
        }
    }
    if($checkOK == 100){
        return "數字驗證正確";
    }else{
        return $badMsh;
    }
}