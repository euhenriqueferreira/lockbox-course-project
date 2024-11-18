<?php

    /*
        Essa função simplifica a maneira de chamar uma view
    */
    function view($view, $data = []){
        /*
            Cria variaveis com o $key = $value dinamicamente;
        */
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        /* 
            Chama o app.php, que dinamicamente consegue ler a variavel $view,
            por causa do escopo, e usar dentro do arquivo para chamar a view certa
        */
         require 'views/templates/app.php';
    }


    function dd(...$dump){
        dump($dump);
        exit();
    }


    function dump(...$dump){
        echo "<pre>";
        var_dump($dump);
        echo "</pre>";
    }

    /* 
        A função abort é usada para responder requisições
        e chamar views dinamicamente.
    */ 
    function abort($code){
        http_response_code($code);
        view($code);
        die();
    }

    // Cria um novo objeto da classe Flash
    function flash(){
        return new Flash;
    }

    function config($chave = null){
        $config =  require 'config.php';

        if(strlen($chave) > 0){
            return $config[$chave];
        }

        return $config;
    }


    function auth(){
        if(!isset($_SESSION['auth'])){
            return false; 
        }

        return $_SESSION['auth'];
    }
?>