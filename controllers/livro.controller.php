<?php 
    // Pegando ID da URI para saber qual livro deve ser mostrado

    $id = $_REQUEST['id'];

    $db = new DB();
    $livro = $db->livro($id);

    // dd($livro);
    view('livro', ['livro'=>$livro]);

?>