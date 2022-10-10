<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo SITENAME; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo FILE_ROOT; ?>css/index.css" />
        <link rel="shortcut icon" type="image/png" href="<?php echo FILE_ROOT; ?>img/homepage/book.png" />
        <style type="text/css">
            body {
                width: 100%;
                background: url(<?php echo FILE_ROOT.'img/homepage/book.png'?>);
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <center>
            <div class="intro">
                <h1> online quiz system </h1>
                <a href="<?php echo URLROOT; ?>usercontroller/login" class="btn"> login </a> &emsp;
                <a href="<?php echo URLROOT; ?>usercontroller/register" class="btn"> register </a>
                <h2> Good &nbsp;Luck. </h2>
            </div>
        </center>
    </body>
</html>

