<?php 

    // Pega os dados
    require 'dados.php';

    // Seta a variável View com o nome da página
    view('index', ['livros'=>$livros]);

?>