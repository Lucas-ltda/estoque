<?php 
require 'src/modelo/modelo.php';
require 'src/connection.php';
require 'src/repositorio/produtoRepositorio.php';

$produtosRepositorio = new produtoRepositorio($pdo);
$produtosRepositorio -> excluir($_POST['id']);




header('location:index.php');
?>