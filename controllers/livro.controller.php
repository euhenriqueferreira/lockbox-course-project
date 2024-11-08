<?php 
    // Pegando ID da URI para saber qual livro deve ser mostrado
    $id = $_REQUEST['id'];

    $livro = $database->query("select * from livros where id = :id", Livro::class, ['id'=> $id])->fetch();

    // dd($livro);
    view('livro', ['livro'=>$livro]);

?>