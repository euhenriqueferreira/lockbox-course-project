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
            query: "select * from usuarios where email = :email",
            class: Usuario::class,
            params: compact('email')
        )->fetch();

        // Se o usuário existir, adiciona um item 'auth' na sessão, com o valor da variável $usuario
        if($usuario){
            // Pega a senha que o usuario digitou
            $senhaDoPost = $_POST['senha'];

            // Pega a senha do usuário encontrado no banco de dados através do email
            $senhaDoBanco = $usuario->senha;

            // password_verify() função nativa que verifica com a encriptação se as senhas batem
            if( ! password_verify($senhaDoPost, $senhaDoBanco)){
                // Se não bater, cria uma mensagem flash
                flash()->push('validacoes_login', ['Usuário ou senha não encontrados!']);
                header('location: /login');
                exit();
            }

            $_SESSION['auth'] = $usuario;
            flash()->push('mensagem', "Seja Bem Vindo, " . $usuario->nome. "!");
            header('location: /');
            exit();
        }
    }


    view('login');
?>