<?php
    require '../models/Livro.php';
    require '../models/Usuario.php';
    require '../models/Avaliacao.php';

    session_start();

    // Importando arquivo de funções
    require '../Flash.php';
    require '../functions.php';
    require '../Validacao.php';

    /* Chamada do arquivo do DB, que recebe por cascata o valor da variável $config */
    require '../database.php';
    
    // Index chama o Route php
    require '../routes.php';
?>