<?php
    // Representação de 1 registro do banco de dados em forma de classe
    class Livro
    {
        public $id;
        public $titulo;
        public $autor;
        public $descricao;

        public static function make($item){
            $livro = new self();
            
            $livro->id = $item['id'];
            $livro->titulo = $item['titulo'];
            $livro->autor = $item['autor'];
            $livro->descricao = $item['descricao'];

            return $livro;
        }
    }
?>