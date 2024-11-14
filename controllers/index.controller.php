<?php 
    /* 
        Verifica pelo $_REQUEST se alguma pesquisa 
        foi feita através do input de pesquisa 
    */
    $pesquisar = $_REQUEST['pesquisar'] ?? '';

    /*
        Realiza uma consulta no DB para buscar todos os livros
    */
    $livros = $database->query(
            query: "select * from livros where titulo like :filtro",
            class: Livro::class,
            params: ['filtro'=>"%$pesquisar%"])
            ->fetchAll();


    // dd($livros);

    /* Chama a view index e passa a variavel $livros para que essa view tenha acesso */
    view('index', ['livros'=>$livros]);
?>