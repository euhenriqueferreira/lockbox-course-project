<?php
    namespace Core;
    
    class Validacao{
        
        public $validacoes = [];

        public static function validar($regras, $dados){
            // Instancia um objeto Validacao na variavel $validacao
            $validacao = new Self;

            // Percorre $regras
            foreach($regras as $campo => $regrasDoCampo){
                // Percorre a array de regras em cada item do array $regras
                foreach($regrasDoCampo as $regra){
                    // Pega o valor do campo nos $dados e seta na variavel $valorDoCampo
                    $valorDoCampo = $dados[$campo];

                    // Testa se a regra é 'confirmed'
                    if($regra == 'confirmed'){
                        $validacao->$regra($campo, $valorDoCampo, $dados["{$campo}_confirmacao"]);
                    } else if(str_contains($regra, ':')){// Testa se a regra tem ':', como 'min:8' e 'max:30'
                        $temp = explode(':', $regra);//Explode a string com base no divisor, retorna uma array com as partes que sobraram
                        $regra = $temp[0]; // Regra, como 'min'
                        $regraAr = $temp[1];// Valor, como '8'
                        // Chama o método dinamicamente através do $regra, dependendo da regra que for, ele chama a função correspondente
                        $validacao->$regra($regraAr, $campo, $valorDoCampo);
                    } else{
                        // Validação normal
                        $validacao->$regra($campo, $valorDoCampo);
                    }
                }
            }

            return $validacao;
        }

        private function required($campo, $valor){
            if(strlen($valor) == 0){
                $this->addError($campo,  "O campo de $campo é obrigatório");
            }
        }

        private function unique($table, $campo, $valor){
            if(strlen($valor) == 0){
                return;
            }

            $db = new Database(config('database'));
            
            $resultado = $db->query(
                query: "select * from $table where $campo = :valor",
                params: compact('valor')
            )->fetch();

            if($resultado){
                $this->addError($campo,  'Esse e-mail já está em uso');
            }
        }

        private function email($campo, $valor){
            if( ! filter_var($valor, FILTER_VALIDATE_EMAIL)){
                $this->addError($campo,  "O $campo é inválido!");
            }
        }

        private function confirmed($campo, $valor, $valorDeConfirmacao){
            if( $valor != $valorDeConfirmacao){
                $this->addError($campo,  "O $campo de confirmação está diferente!");
            }
        }

        private function min($min, $campo, $valor){
            if(strlen($valor) <= $min){
                $this->addError($campo,  "O $campo precisa ter no mínimo $min caracteres!");
            }
        }

        private function max($max, $campo, $valor){
            if(strlen($valor) > $max){
                $this->addError($campo, "O $campo precisa ter no máximo $max caracteres!");
            }
        }

        private function strong($campo, $valor){
            if( ! strpbrk($valor, '!@#$%&*().,;?/')){
                $this->addError($campo, "A $campo precisa conter pelo menos um caractere especial");
            }
        }

        private function addError($campo, $erro){
            $this->validacoes[$campo][] = $erro;
        }

        public function naoPassou($nomeCustomizado = null){
            $chave = 'validacoes';
            
            if($nomeCustomizado){
                $chave .= '_'.$nomeCustomizado;
            }
        
            flash()->push($chave, $this->validacoes);
            return sizeof($this->validacoes) > 0;
        }
    }

?>