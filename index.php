<?php
    session_start();

    // Importando arquivo de funções
    require 'functions.php';

    require 'models/Livro.php';
    
    $config = require 'config.php';

    // Arquivo do DB
    require 'database.php';
    // Request da página sempre vai cair no index.php (a página não troca)
    require 'routes.php';
?>