<?php

    namespace App\Controllers;

    use Core\Validacao;
    use Core\Database;

    class RegisterController{
        public function index(){
            return view('registrar');
        }

        public function register(){
            $validacao = Validacao::validar([
                'nome' => ['required'],
                'email' => ['required', 'email', 'confirmed', 'unique:usuarios'],
                'senha' => ['required', 'min:8', 'max:30', 'strong']
            ], $_POST);
    
            if($validacao->naoPassou()){
                return view('registrar');
                exit();
            }

            $database = new Database(config('database'));

            $database->query(
                query: 'insert into usuarios ( nome, email, senha ) values ( :nome, :email, :senha )',
                params: [
                    'nome'=> $_POST['nome'],
                    'email'=> $_POST['email'],
                    'senha'=> password_hash($_POST['senha'], PASSWORD_DEFAULT)// password_hash encripta a senha
                ]
            );

            flash()->push('mensagem', 'Registrado com sucesso!');
            return redirect('/login');
            exit();
        }
    }
?>