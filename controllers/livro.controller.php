<?php 

    // Pega os dados
    require 'dados.php';

    // Pegando ID da URI para saber qual livro deve ser mostrado
    $id = $_REQUEST['id'];

    // Filtra o array de livros para pegar o livro certo de acordo com o id na URI
    $filtrado = array_filter($livros, fn($l) => $l['id'] == $id);
    $livro = array_pop($filtrado);

    view('livro', ['livro'=>$livro]);

?>