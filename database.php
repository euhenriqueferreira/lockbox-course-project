<?php
    class DB
    {
        private $db;

        public function __construct()
        {
            $this->db = new PDO('sqlite:database.sqlite');
        }
        /*
            Retorna um array com todos os livros do DB.
            @return array[Livro];
        */
        public function livros(){

            $query = $this->db->query("select * from livros");
            $itens = $query->fetchAll();

            return array_map(fn($item) => Livro::make($item), $itens);
        }

        public function livro($id){
            $db = new PDO('sqlite:database.sqlite');

            $sql = "select * from livros";
            $sql = $sql . " where id = " . $id;
            $query = $this->db->query($sql);
            $itens = $query->fetchAll();
 

            return array_map(fn($item) => Livro::make($item), $itens)[0];
        }
    }
?>
