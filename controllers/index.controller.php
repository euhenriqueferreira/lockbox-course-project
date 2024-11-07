<?php 

    $db = new DB();
    $livros = $db->livros();

    // Seta a variável View com o nome da página
    view('index', ['livros'=>$livros]);
?>