<?php 

    $pesquisar = $_REQUEST['pesquisar'] ?? '';

    $db = new DB();
    $livros = $db->livros($pesquisar);

    // Seta a variável View com o nome da página
    view('index', ['livros'=>$livros]);
?>