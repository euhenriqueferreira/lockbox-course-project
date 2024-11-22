<?php

    namespace App\Controllers;

    use Core\Validacao;
    use Core\Database;
    use App\Models\Usuario;

    class LoginController{
        public function index(){
            return view('login');
        }

        public function login(){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
    
    
            $validacao =  Validacao::validar([
                'email' => ['required', 'email'],
                'senha' => ['required']
            ], $_POST);
    
            if($validacao->naoPassou()){
                return view('login');
            }

            $database = new Database(config('database'));

            $usuario = $database->query(
                query: "select * from usuarios where email = :email",
                class: Usuario::class,
                params: compact('email')
            )->fetch();
            

            if(!($usuario && password_verify($_POST['senha'], $usuario->senha))){
                flash()->push('validacoes', ['email'=>['Usuário ou senha estão incorretos!']]);
                return view('login');
            }

            $_SESSION['auth'] = $usuario;
            flash()->push('mensagem', "Seja Bem Vindo, " . $usuario->nome. "!");
            return redirect('/dashboard');
        }
    }
?>