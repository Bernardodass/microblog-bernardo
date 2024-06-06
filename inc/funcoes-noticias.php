<?php
require "conecta.php";

function upload($arquivo)
{

    /* array para validação dos tipos permitidos */
    $tiposValidos = ["image/png", "image/jpg", "image/gif", "image/svg+xml"];

    /* verificando se o tipo do arquivo NÃO É um dos existentes no array tiposValidos */
    if (!in_array($arquivo['type'], $tiposValidos)) {
        echo "<script>alert('Formato inválido!');history.back();</script>";
    }

    /* pegando apenas o nome/extensão do arquivo */
    $nome = $arquivo['name'];

    /* obtendo do servidor o local/nome temporário para o processo de upload */
    $temporario = $arquivo['tmp_name'];

    /* definição da pasta de destino + nome do arquivo da imagem */
    $destino = "../imagens/.$nome";

    /* movendo o arquivo/imagem da área temporária da pasta de destino indicada (imagens) */
    move_uploaded_file($temporario, $destino);
}



function inserirNoticia($conexao, $titulo, $texto, $resumo, $nomeImagem, $usuarioId)
{
    $sql = "INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id) VALUES('$titulo', '$texto', '$resumo', '$nomeImagem', '$usuarioId')";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function lerNoticias($conexao, $idUsuario, $tipoUsuario)
{
    $sql = "SELECT * FROM noticias ORDER BY data DESC";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function lerUmaNoticia($conexao)
{

}

function excluirNoticia($conexao)
{

}
