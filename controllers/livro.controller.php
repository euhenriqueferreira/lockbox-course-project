<?php 
    // Pegando ID da URI para saber qual livro deve ser mostrado
    $id = $_REQUEST['id'];

    /*
        Consulta no DB para buscar as informações do livro com o $id
    */
    $livro = Livro::get($_GET['id']);
    $avaliacoes = $database->query(
        query:"select * from avaliacoes where livro_id = :id",
        class: Avaliacao::class,
        params: ['id'=> $_GET['id']]
    )->fetchAll();


    // Chama a view livros e passa o livro (resultado da query) como parâmetro.
    view('livro', compact('livro', 'avaliacoes'));

?>