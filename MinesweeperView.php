<?php
require_once("Minesweeper_1forView.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/firefly_frame.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/form.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/Minesweeper2.css" media="screen">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">

    </head>
    <body>
        <div id="wrapper" class="margin-center">
            <?php for($i = 0; $i <= $col - 1; $i++) : ?>
            <div class="cf" id="www">

                <div style="display:none;">
                    <span style="display:none;" id="<?php echo $i;?>"><?php echo 0;?>
                    </span><span><?php echo $frame[$i][0];?>
                    </span><input type="button" class="disappear" onclick="disappear()"></input>

                <?php for($j = 0; $j <= $row - 1; $j++) :?>
                </div><div class="float-l relative" id='<?php echo "i = $i, j = $j";?>'>
                    <span style="display:none;" id="<?php echo $i;?>"><?php echo $j;?>
                    </span><span><?php echo $frame[$i][$j];?></span><input type="button" class="disappear" onclick="disappear()"></input>

                <?php endfor ?>
                </div>
            </div>
            <?php endfor ?>
        </div>

    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script>
        function disappear(){
            event.srcElement.className = "disappearChange";
            // event.srcElement.className = "red";
            if(event.srcElement.previousSibling.innerHTML == 'M'){
                alert('boom!!!!!');
            };
            if(event.srcElement.previousSibling.innerHTML == '0'){
                var posX = parseInt(event.srcElement.previousSibling.previousSibling.id);
                var posY = parseInt(event.srcElement.previousSibling.previousSibling.innerHTML);
                posY = posY + 1;
                // alert(event.srcElement.parentNode.parentNode.parentNode.children[posY].children[posX].id);
                number0(posX, posY);
                // event.srcElement.parentNode.nextSibling.children[1].className = "disappearChange";

            };
        }
        function number0(posX, posY){
            // alert(event.srcElement.parentNode.parentNode.parentNode.children[posY].children[posX].id);
            // alert(event.srcElement.parentNode.parentNode.parentNode.children[posX].children[posY].children[1].innerHTML);
            //上
            event.srcElement.parentNode.parentNode.parentNode.children[posX - 1].children[posY].children[2].className = "disappearChange";
            // if(event.srcElement.parentNode.parentNode.parentNode.children[posX - 1].children[posY].children[1].innerHTML == 0){
                // number0(posX - 1, posY);
            // }
            //下
            event.srcElement.parentNode.parentNode.parentNode.children[posX + 1].children[posY].children[2].className = "disappearChange";
            // if(event.srcElement.parentNode.parentNode.parentNode.children[posX + 1].children[posY].children[1].innerHTML == 0){
                // number0(posX + 1, posY);
            // }
            //左
            event.srcElement.parentNode.parentNode.parentNode.children[posX].children[posY - 1].children[2].className = "disappearChange";
            // if(event.srcElement.parentNode.parentNode.parentNode.children[posX].children[posY].children[1].innerHTML == 0){
                // number0(posX, posY - 1);
            // }
            //右
            event.srcElement.parentNode.parentNode.parentNode.children[posX].children[posY + 1].children[2].className = "disappearChange";
            // if(event.srcElement.parentNode.parentNode.parentNode.children[posX].children[posY].children[1].innerHTML == 0){
            //     number0(posX, posY);
            // }

            //左上
            event.srcElement.parentNode.parentNode.parentNode.children[posX - 1].children[posY - 1].children[2].className = "disappearChange";
            //右上
            event.srcElement.parentNode.parentNode.parentNode.children[posX - 1].children[posY + 1].children[2].className = "disappearChange";
            //左下
            event.srcElement.parentNode.parentNode.parentNode.children[posX + 1].children[posY - 1].children[2].className = "disappearChange";
            //右上
            event.srcElement.parentNode.parentNode.parentNode.children[posX + 1].children[posY + 1].children[2].className = "disappearChange";

        }


    </script>
    <br><br><br><br><br><br><br><br>
    </body>

</html>