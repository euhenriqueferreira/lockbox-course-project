<?php
    namespace Core;


    // Classe para Adicionar Mensagens FLash na sessão
    class Flash{

        // Adiciona uma Mensagem, recebendo a chave(para o item da sessão) e o valor(mensagem em si)
        public function push($chave, $valor){
            $_SESSION["flash_$chave"] = $valor;
        }

        
        // Busca um item da sessão com base na chave
        public function get($chave){

            if(! isset($_SESSION["flash_$chave"])){
                return false;
            }

            $valor = $_SESSION["flash_$chave"];
        
            unset($_SESSION["flash_$chave"]);


            return $valor;
        }
    }

?>