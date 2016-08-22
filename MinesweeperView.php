<?php
require_once("Minesweeper_1.php");
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
            <?php for($i = 0; $i <= 9; $i++) : ?>
            <div class="cf">
                <?php for($j = 0; $j <= 9; $j++) :?>
                <div class="float-l relative">
                    <span><?php echo $frame[$i][$j];?></span>
                    <input type="button" class="disappear" onclick="disappear()"></input>
                </div>
                <?php endfor ?>
            </div>
            <?php endfor ?>
        </div>

    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script>
        function disappear(){
            event.srcElement.className = "disappearChange";
        }


    </script>
    </body>

</html>