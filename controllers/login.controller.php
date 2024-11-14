<?php
    // Se o metodo do formulário de login for POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Pega os valores dos input
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        /* 
            Chama a função de validação e passa em array
            por quais validações o valor deve passar
        */
        $validacao = Validacao::validar([
            'email' => ['required', 'email'],
            'senha' => ['required']
        ], $_POST);

        // Verifica se não passou, e caso não passe na validacao, redireciona para o login
        if($validacao->naoPassou('login')){
            header('location: /login');
            exit();
        }


        // Faz uma consulta no DB para ver se o usuário existe
        $usuario = $database->query(
            query: "select * from usuarios where email = :email and senha = :senha",
            class: Usuario::class,
            params: compact('email', 'senha')
        )->fetch();

        // Se o usuário existir, adiciona um item 'auth' na sessão, com o valor da variável $usuario
        if($usuario){
            $_SESSION['auth'] = $usuario;
            flash()->push('mensagem', "Seja Bem Vindo, " . $usuario->nome. "!");
            header('location: /');
            exit();
        }
    }


    view('login');
?>