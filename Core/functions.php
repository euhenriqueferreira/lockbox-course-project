<?php

    function base_path($path){
        return __DIR__ . '/../' . $path;
    }

    /*
        Essa função simplifica a maneira de chamar uma view
    */
    function view($view, $data = []){
        foreach ($data as $key => $value) {
            $$key = $value;
        }

         require base_path('views/templates/app.php');
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
        return new Core\Flash;
    }

    function config($chave = null){
        $config =  require base_path('config/config.php');

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


    function old($campo){
        $post = $_POST;

        if(isset($post[$campo])){
            return $post[$campo];
        }

        return '';
    }

    function redirect($uri){
        return header('Location: ' . $uri);
    }
?>