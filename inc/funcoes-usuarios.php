<?php
/* Acessando os dados da conexão ao servidor */
require "conecta.php";

function inserirusuario($conexao, $nome, $email, $tipo, $senha){
    /* Montando o comando SQL em uma variável */
    $sql = "INSERT INTO usuarios(nome, email, tipo, senha)
    VALUES('$nome', '$email', '$tipo', '$senha')";

/* Execultando o comando no banco */
mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}



function lerUsuarios($conexao){
    // comando SQL
   $sql = "SELECT id, nome, tipo, email FROM usuarios";
   
   // execulção do comando
  $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // retornamos o resultado TRANSFORMADO em array associativo 
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}