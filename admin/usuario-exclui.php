<?php

require_once ".../inc/funcoes-usuarios.php";
require_once "..inc/funcoes-sessao.php";
verificaAcesso();
verificaNivel();
// obter o id do usuário que será excluído
$id = (int)$_GET['id'];

// chamar/execultar a função que irá fazer o DELETE
deletarUsuario($conexao, $id);
    
// redirecionar para a página de usuários
header("location:usuarios.php");