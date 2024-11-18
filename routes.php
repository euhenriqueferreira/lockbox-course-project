<?php
    /* 
    Verifica a URI para definir qual será chamado, 
    e guarda a string com o nome do controller dentro
    da variavel $controller;
    */
    $controller = str_replace('/','', parse_url($_SERVER['REQUEST_URI'])['path']);

    /*
        Verifica se a variavel controller tem um valor
        Se não tiver, significa que o caminho da url é vazio
        Então ele define como index.
    */
    if(! $controller){
        $controller = 'index';
    }

    /*
        Verifica se o arquivo ".controller" referente ao controller
        guardado na variavel $controller existe. Se não existir, ele
        aborta com o status code 404;
    */
    if( ! file_exists("../controllers/{$controller}.controller.php")){
        abort(404);
    }

    /*
        Carrega dinamicamente o controller através do nome do controller
        guardado na variável $controller;
    */
    require "../controllers/{$controller}.controller.php";
    
?>