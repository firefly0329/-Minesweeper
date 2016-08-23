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
        <div id="wrapper" class="">
            <?php for($i = 0; $i <= $col - 1; $i++) : ?>
            <div class="cf">
                <?php for($j = 0; $j <= $row - 1; $j++) :?>
                <div class="float-l relative" id="<?php echo $frame[$i][$j];?>">
                    <span style="display:none;" id="<?php echo $i;?>"><?php echo $j;?>
                    </span><span><?php echo $frame[$i][$j];?>
                    </span><input type="button" class="disappear" onclick="disappear()"></input>
                </div>
                <?php endfor ?>
            </div>
            <?php endfor ?>
        </div>

    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script>
        function disappear(){
            event.srcElement.className = "disappearChange";
            // event.srcElement.className = "red";
            if(event.srcElement.parentNode.id == 'M'){
                alert('boom!!!!!');
            };
            if(event.srcElement.parentNode.id == '0'){
                //右
                // event.srcElement.parentNode.nextSibling.children[1].className = "disappearChange";
                posX = event.srcElement.previousSibling.previousSibling.id;
                posY = event.srcElement.previousSibling.previousSibling.innerHTML;
            };
        }


    </script>
    </body>

</html>