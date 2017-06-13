<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="Assets/css/foundation.min.css">
        <link rel="stylesheet" href="Assets/css/assets.css">
    </head>
    <body>
        <?php include_once 'Views/static/header.php' ?>

        <?php

        switch ($_GET['p']) {
            case "login":
                include_once 'Views/login.php';
                break;
            case "register":
                include_once 'Views/register.php';
                break;
            default:
                include_once 'Views/home.php';
        }

        ?>

        <?php include_once 'Views/static/footer.php' ?>

        <script src="Assets/js/vendor/jquery.js"></script>
        <script src="Assets/js/vendor/what-input.js"></script>
        <script src="Assets/js/vendor/foundation.js"></script>
        <script src="Assets/js/app.js"></script>
    </body>
</html>