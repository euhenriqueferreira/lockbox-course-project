<?php

    $db = new PDO('sqlite:database.sqlite');

    $query = $db->query('select * from livros');

    $livros = $query->fetchAll();

    // $livros = [
    //     [
    //     'id'=>1,
    //     'titulo'=>'Os Segredos da Mente Milionária',
    //     'autor'=>'T. Harv Eker',
    //     'descricao'=>'Livro de autoajuda que fala sobre a diferença de mindset sobre dinheiro dos ricos para os pobres.'
    //     ],
    //     [
    //     'id'=>2,
    //     'titulo'=>'Quem Pensa Enriquece',
    //     'autor'=>'Napoleon Hill',
    //     'descricao'=>'Livro que ensina pensamentos e planos para prosperar financeiramente.'
    //     ],
    //     [
    //     'id'=>3,
    //     'titulo'=>'A Coragem de Não Agradar',
    //     'autor'=>'Ichiro Kishimi',
    //     'descricao'=>'Livro asiático que apresenta uma conversa entre um adolescente e um filósofo, abordando vários assuntos sobre filososia e sobre a vida.'
    //     ],
    //     [
    //     'id'=>4,
    //     'titulo'=>'O Poder do Hábito',
    //     'autor'=>'Charles Duhigg',
    //     'descricao'=>'Livro que ensina sobre como os hábitos são formados no cérebro humano.'
    //     ],
    //     [
    //     'id'=>5,
    //     'titulo'=>'O Poder da China',
    //     'autor'=>'Ricardo Geromel',
    //     'descricao'=>'Livro que fala um pouco sobre a história da China e sobre como a o país irá se tornar o principal lider mundial em IA.'
    //     ],
    //     [
    //     'id'=>6,
    //     'titulo'=>'Ansiedade: Como Enfrentar o Mal do Século',
    //     'autor'=>'Augusto Cury',
    //     'descricao'=>'Livro que fala sobre a ansiedade e como ela afeta as pessoas cada vez mais.'
    //     ],
    //     [
    //     'id'=>7,
    //     'titulo'=>'A Fábrica de Cretinos Digitais',
    //     'autor'=>'Michel Desmurget',
    //     'descricao'=>'Livro que orienta sobre o perigo de crianças entrarem em contato com as telas de maneira precoce e isso prejudicar o desenvolvimento do cérebro.'
    //     ],
    //     [
    //     'id'=>8,
    //     'titulo'=>'A Sutil Arte de Ligar o F#da-se',
    //     'autor'=>'Mark Manson',
    //     'descricao'=>'Livro em que o autor reflete e ensina sobre a "arte" de não se importar com certas coisas que não merecem nossa atenção.'
    //     ],
    //     [
    //     'id'=>9,
    //     'titulo'=>'Como Fazer Amigos e Influenciar Pessoas',
    //     'autor'=>'Dale Carnegie',
    //     'descricao'=>'Guia clássico para se relacionar com pessoas da melhor forma.'
    //     ],
    // ];


    $varTeste = 'Essa é minha variavel teste para testar a lógica MVC.';
?>
