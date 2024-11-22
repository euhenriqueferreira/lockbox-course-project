<?php

    namespace Core;

    use PDO;

    class Database
    {
        private $db;

        /* Recebe as configurações de conexão com o DB por parametro no construtor */
        public function __construct($config)
        {
            // Cria a string de conexão com as configurações recebidas por parâmetro
            $connectionString = $config['driver'] . ':' . $config['database'];

            /* 
                Quando a classe Database é instanciada em objeto, ele cria um
                PDO com a conexão recebida do parâmetro $config
            */
             $this->db = new PDO($connectionString);
        }

        /* 
            Função que:
            - recebe a string de uma query,
            - pode ou não receber no parâmetro class uma Classe a qual os resultados 
              recebidos da query serão mapeados para objetos dessa classe.
            - outros parâmetros (geralmente os valores que substituem os parâmetros nomeados da query)
        */
        public function query($query, $class = null, $params = []){
            // Prepara a query de acordo com a string da query recebida por parâmetro
            $prepare = $this->db->prepare($query);

            /* 
                Se foi passada uma classe por parâmetro, ele faz o mapeamento
                do resultado da query para objetos dessa classe
            */
             if($class){
                $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
            }

            // Executa a query e passa os $params
            $prepare->execute($params);

            return $prepare;
        }
    }

?>
