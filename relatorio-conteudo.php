<?php
require 'src/modelo/modelo.php';
require 'src/connection.php';
require 'src/repositorio/produtoRepositorio.php';

$produtosRepositorio = new produtoRepositorio($pdo);
$dadosProdutos = $produtosRepositorio ->consultarProdutos();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <style>    
    table{
        width: 90%;
        margin: auto 0;
    }
    table, th, td{
        border: 1px solid #000;
    }

    table th{
        padding: 11px 0 11px;
        font-weight: bold;
        font-size: 18px;
        text-align: left;
        padding: 8px;
    }

    table tr{
        border: 1px solid #000;
    }

    table td{
        font-size: 18px;
        padding: 8px;
    }
    .container-admin-banner h1{
        margin-top: 40px;
        font-size: 30px;
        }
</style>

</head>
<body>
<table>
      <thead>
        <tr>
          <th>Imagem</th>
          <th>Nome</th>
          <th>Quantidade</th>
          <th>Descricão</th>
          
        </tr>
      </thead>
      <tbody>
      <?php foreach ($dadosProdutos as $produto):?>
        <tr>
        <td><img src="<?= $produto->getImagemFormated() ?>" alt="Imagem do produto" width="100"></td>

        <td><?= $produto -> getNome()?></td>
        <td><?= $produto -> getQuantidade()?></td>
        <td><?= $produto -> getDescricao()?></td>
        
           
        </tr>
      <?php endforeach;?>
      </tbody>
    </table>
</body>
</html>