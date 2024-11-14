<?php 
    // Pegando ID da URI para saber qual livro deve ser mostrado
    $id = $_REQUEST['id'];

    /*
        Consulta no DB para buscar as informações do livro com o $id
    */
    $livro = $database->query("select * from livros where id = :id", Livro::class, ['id'=> $id])->fetch();

    // Chama a view livros e passa o livro (resultado da query) como parâmetro.
    view('livro', ['livro'=>$livro]);

?>