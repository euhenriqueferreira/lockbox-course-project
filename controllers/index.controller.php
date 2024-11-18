<?php 

    /*
        Realiza uma consulta no DB para buscar todos os livros
    */
    $livros = Livro::all($_REQUEST['pesquisar'] ?? '');

    // dd($livros);

    /* Chama a view index e passa a variavel $livros para que essa view tenha acesso */
    view('index', ['livros'=>$livros]);
?>