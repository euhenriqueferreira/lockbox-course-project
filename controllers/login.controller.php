<?php

    $mensagem = $_REQUEST['mensagem'] ?? '';


    // 1. Receber o formulário com email e senha
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $validacao = Validacao::validar([
            'email' => ['required', 'email'],
            'senha' => ['required']
        ], $_POST);

        if($validacao->naoPassou()){
            header('location: /login');
            exit();
        }


        // 2. Fazer uma consulta no DB com email e senha
        $usuario = $database->query(
            query: "select * from usuarios where email = :email and senha = :senha",
            class: Usuario::class,
            params: compact('email', 'senha')
        )->fetch();

        if($usuario){
            // 3. Se existir, vamos adicionar na sessão que o usuário esta autenticado
            $_SESSION['auth'] = $usuario;
            $_SESSION['mensagem'] = "Seja Bem Vindo, " . $usuario->nome. "!";
            header('location: /');
            exit();
        }

        //4. Mudar a informação no nosso navbar para mostrar o nome do usuário
    }


    view('login', compact('mensagem'));
?>