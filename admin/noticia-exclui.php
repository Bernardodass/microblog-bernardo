<?php
require_once "../inc/funcoes-noticias.php";
require_once "../inc/funcoes-sessao.php";


verificaAcesso();

$id = $_GET['id'];

excluirNoticia($conexao, $id);

header("location:noticias.php")




?>