<?php 
require 'src/modelo/modelo.php';// chamando o modelo de objeto para ser usado;
require 'src/connection.php';
require 'src/repositorio/produtoRepositorio.php';

if(isset($_POST['cadastro'])){
    $produto = new Produto(null,
    $_POST['nome'],
    $_POST['quantidade'],
    $_POST['descricao'],
    $_POST['preco'],);

    if (!empty($_FILES['imagem']['name'])) {
        $nomeImagem = uniqid().$_FILES['imagem']['name'];
        $produto -> setImagem($nomeImagem);
        move_uploaded_file($_FILES['imagem']['tmp_name'],'img/'.$nomeImagem);
    }

    $produtoRepositorio = new produtoRepositorio($pdo);
    $produtoRepositorio -> salvar($produto);
    
    header('location:index.php');
}


?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Cadastrar Produto</title>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        main {
            padding: 20px;
        }

        .container-admin-banner {
            text-align: center;
            margin-bottom: 40px;
        }

        .container-admin-banner .logo-admin {
            max-width: 220px;
            margin-top: 20px;
        }

        .container-admin-banner h1 {
            font-size: 2em;
            font-weight: 600;
            margin: 20px 0;
            color: #ffffff;
        }

        .container-admin-banner .ornaments {
            max-width: 120px;
            opacity: 0.7;
        }

        .container-form {
            background-color: #1e1e1e;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.5);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 6px;
            font-weight: 500;
            color: #f0f0f0;
        }

        input[type="text"],
        input[type="file"],
        input[type="number"],
        input[type="submit"] {
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 6px;
            background-color: #2a2a2a;
            color: #ffffff;
            font-size: 1em;
        }

        input[type="text"]:focus,
        input[type="file"]:focus {
            outline: none;
            box-shadow: 0 0 5px #007BFF;
        }

        .container-radio {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .container-radio label {
            margin-right: 8px;
        }

        input[type="radio"] {
            transform: scale(1.2);
            margin-left: 5px;
        }

        .botao-cadastrar {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .botao-cadastrar:hover {
            background-color: #218838;
        }

    </style>
</head>
<body>
<main>
    <section class="container-admin-banner">
        <img src="img/logo-padrão.png" class="logo-admin" alt="logo-serenatto">
        <h1>Cadastro de Produtos</h1>
        <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form" >
        <form method = "POST"  enctype="multipart/form-data">
            <!-- PAGINA CRIADA PARA FORMULARIO -->
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>

            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" placeholder="Digite uma descrição" required>

            <label for="preco">Valor(UNIDADE)</label>
            <input type="text" id="preco" name="preco" placeholder="Digite uma descrição" required>

            <label for="preco">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" placeholder="Digite a quantidade cadastrada">
            
            <label for="imagem">Envie uma imagem</label>
            <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">

            <input type="submit" name="cadastro" class="botao-cadastrar" value="Cadastrar produto"/>
        </form>
    
    </section>
</main>