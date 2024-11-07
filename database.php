<?php
    class DB
    {
        /*
            Retorna um array com todos os livros do DB.
            @return array[Livro];
        */
        public function livros(){
            $db = new PDO('sqlite:database.sqlite');
            $query = $db->query('select * from livros');
            $itens = $query->fetchAll();
            $retorno = [];

            foreach ($itens as $item) {
                $livro = new Livro();
                $livro->id = $item['id'];
                $livro->titulo = $item['titulo'];
                $livro->autor = $item['autor'];
                $livro->descricao = $item['descricao'];

                $retorno[] = $livro;
            }

            return $retorno;
        }
    }
?>
