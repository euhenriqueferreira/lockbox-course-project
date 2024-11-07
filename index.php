<?php
    // Request da página sempre vai cair no index.php (a página não troca)

    // O Controller padrão é index, pois ele controla a página inicial
    $controller = 'index';
    

    // echo '<pre>';
    //     var_dump($_SERVER);
    // echo '<pre>';
    
    // Se na URL tiver o link de algum outro arquivo/página, ele carrega o respectivo controller dessa página
    if(isset($_SERVER['PATH_INFO'])){
        $controller = str_replace('/','', $_SERVER['PATH_INFO']);
    }

    // Carregando o controller dinamicamente
    require "controllers/{$controller}.controller.php";
?>