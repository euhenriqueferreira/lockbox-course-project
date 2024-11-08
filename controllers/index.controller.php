<?php 

    $pesquisar = $_REQUEST['pesquisar'] ?? '';

    $livros = $database->query(
            query: "select * from livros where titulo like :filtro",
            class: Livro::class,
            params: ['filtro'=>"%$pesquisar%"])
            ->fetchAll();

    // dd($livros);

    // Seta a variável View com o nome da página
    view('index', ['livros'=>$livros]);
?>