<?php
$map = $_GET['map'];
// echo $map;
// echo "<br><br>";
// echo gettype($map);
// echo "<br><br>";
$result = checkRule($map);
if($result == "OK"){
    $result = checkNumber($map);
}
echo $result;

function checkRule($map){
    //驗證是否為字串
    if(!is_string($map)){
        $message = "請輸入字串";
        return $message;
    }
    //驗證字串長度
    if(strlen($map) != 109){
        $message = "map長度不符,您的字串長度為" . strlen($map) ;
        return $message;
    }
    //驗證炸彈數
    if(substr_count($map, "M") != 40){
        $message = "炸彈數不符,您的炸彈數為" . substr_count($map, "M") . "個";
        return $message;
    }
    //驗證換行
    for($i = 1; $i <= 9; $i++){
        $checkN .= substr($map, 10, 1);
    }
    if ($checkN != "NNNNNNNNN"){
        $message = "換行位置錯誤";
        return $message;
    }
    return "OK";
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
            }
        }
    }
    if($checkOK == 100){
        return "驗證成功";
    }else{
        return "數字驗證錯誤";
    }
}