<?php
    require '../Core/functions.php';

    spl_autoload_register(function($class){
        require base_path("{$class}.php");
    });

    session_start();
   
    require base_path('/config/routes.php');
?>