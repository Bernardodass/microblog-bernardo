<?php
// acesso aos dados da conexão do servidor
require "conecta.php";
 
function inserirUsuario($conexao, $nome, $email, $tipo, $senha)
{
    // montando o comando SQL em uma variavel
    $sql = "INSERT INTO usuarios (nome, email, tipo, senha) VALUES ('$nome', '$email', '$tipo','$senha')";
 
    // Executando o comando no banco
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}
 
 
 
function lerUsuarios($conexao)
{
 
    $sql = "SELECT id,nome,tipo,email FROM usuarios ORDER BY nome";
   
    //execução do comando e armazenamento do resultado
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
 
 
    // Retornamos o resultado TRANSFORMADO em array associativo
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}
 
function lerUmUsuario($conexao, $id){
 
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conexao,$sql) or die (mysqli_error($conexao));
 
    // retornamos um unico array associativo com os do usuario selecionado
    return mysqli_fetch_assoc($resultado);
 
}
 
function atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo){
    $sql = "UPDATE usuarios SET 
        nome = '$nome', 
        email = '$email',
        senha = '$senha',
        tipo = '$tipo'
        WHERE id = $id"; // NÃO ESQUEÇA ESSA BAGAÇA NUNCA! 🤦‍♂️

        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

// Função para deletar usuário
function deletarUsuario($conexao, $id) {
    $sql = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}



function buscaUsuario($conexao, $email){
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql)
    or die(mysqli_error($conexao));

    return mysqli_fetch_assoc($resultado);
}

