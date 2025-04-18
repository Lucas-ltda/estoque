<?php 
require 'src/modelo/modelo.php';
require 'src/connection.php';
require 'src/repositorio/produtoRepositorio.php';

$podutosRepositorio = new produtoRepositorio($pdo);
$dadosProdutos = $podutosRepositorio ->consultarProdutos();



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Estoque - Listagem</title>
    <style>
      body {
        background-color: #121212;
        color: #e0e0e0;
        font-family: Arial, sans-serif;
        padding: 20px;
        margin: 0;
      }

      h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #ffffff;
      }

      .container-table {
        max-width: 1000px;
        margin: auto;
        background-color: #1e1e1e;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.6);
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: #2a2a2a;
        border-radius: 8px;
        overflow: hidden;
      }

      thead {
        background-color: #333;
      }

      th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #444;
      }

      th {
        color: #ffffff;
      }

      td {
        color: #ddd;
      }

      img {
      border-radius: 8px;
      object-fit: cover;
    }
    tr:hover {
      background-color: #383838;
    }

      a.botao-editar, input.botao-excluir, a.botao-cadastrar, input[type="submit"].botao-cadastrar {
        display: inline-block;
        padding: 8px 12px;
        margin: 5px 0;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      a.botao-editar {
        background-color: #1e90ff;
        color: white;
      }

      a.botao-editar:hover {
        background-color: #1c7ed6;
      }

      input.botao-excluir {
        background-color: #e74c3c;
        color: white;
      }

      input.botao-excluir:hover {
        background-color: #c0392b;
      }

      a.botao-cadastrar, input[type="submit"].botao-cadastrar {
        background-color: #28a745;
        color: white;
        text-align: center;
      }

      a.botao-cadastrar:hover, input[type="submit"].botao-cadastrar:hover {
        background-color: #218838;
      }

      form {
        display: inline;
      }
</style>

</head>
<body>  
    <h2>Listagem De Produtos</h2>
    <section class="container-table">
    <table>
      <thead>
        <tr>
          <th>Imagem</th>
          <th>Nome</th>
          <th>Quantidade</th>
          <th>Descricão</th>
          <th colspan="2" style="text-align: center;">Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($dadosProdutos as $produto):?>
        <tr>
        <td><img src="<?= $produto->getImagemFormated() ?>" alt="Imagem do produto" width="100"></td>

        <td><?= $produto -> getNome()?></td>
        <td><?= $produto -> getQuantidade()?></td>
        <td><?= $produto -> getDescricao()?></td>
        
        <td><a class="botao-editar" href="editar-produto.php?id=<?=$produto ->getId()?>">Editar</a></td>
        <td>
          <form action="excluir-produto.php" method = 'post'>
            <input type="hidden" name = "id" value ="<?= $produto->getId()?>">
            <input type="submit" class="botao-excluir" value="Excluir">
          </form>
        </td>      
        </tr>
      <?php endforeach;?>
      </tbody>
    </table>
  <a class="botao-cadastrar" href="cadastrar-produto.php">Cadastrar produto</a>
  <form action="relatorio.php" method="post">
    <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>
  </form>
  </section>
</body>
</html>