<?php
require "conecta.php";

function formataData($data)
{
    return date('d/m/Y H:i', strtotime($data));
}

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
    if ($tipoUsuario == 'admin') {
        // admin pode ver TUDO
        $sql = "SELECT
     noticias.id,
     noticias.titulo,
      noticias.data,
      usuarios.nome
       FROM noticias JOIN usuarios
        ON noticias.usuario_id = usuarios.id
        ORDER BY data DESC";
    } else {
        // editor pode ver SOMENTE DELE/DELA
        $sql = "SELECT titulo, data, id FROM noticias
                WHERE usuario_id = $idUsuario ORDER BY data DESC";
    }



    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function lerUmaNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario)
{
    if ($tipoUsuario == 'admin') {
        // pode carregar/ver qualquer noticia
        $sql = "SELECT * FROM noticias WHERE id = $idNoticia";
    } else {
        // pode carregar/ver SOMENTE SUA noticia (basta saber qual noticia e qual usuario)
        $sql = "SELECT * FROM noticias WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // retornando UM ARRAY com os dados da noticia escolhida
    return mysqli_fetch_assoc($resultado);
}



function atualizarNoticia($conexao, $titulo, $texto, $resumo, $imagem, $idNoticia, $idUsuario, $tipoUsuario)
{

    if ($tipoUsuario == 'admin') {
        // pode atualizar QUALQUER noticia (basta saber qual)
        $sql = "UPDATE noticias SET titulo = '$titulo', texto = '$texto', resumo = '$resumo', imagem = '$imagem' WHERE id = $idNoticia
    
        ";
    } else {
        // pode atualizar SOMENTE suas noticias (basta saber qual noticia e qual usuario)
        $sql = "UPDATE noticias SET titulo = '$titulo', texto = '$texto', resumo = '$resumo', imagem = '$imagem' WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}


function excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario)
{
    if ($tipoUsuario == 'admin') {
        $sql = "DELETE FROM noticias WHERE id = $idNoticia";
    } else {
        $sql = "DELETE FROM noticias WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

/* ************ */

/* funções usadas nas páginas PÚBLICAS no Microblog:
index, noticia, resultados */

// index.php
function lerTodasNoticias($conexao)
{
    $sql = "SELECT titulo, imagem, resumo, id FROM noticias ORDER BY data DESC";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

// noticia.php
function lerNoticiaCompleta($conexao, $id)
{
    $sql = "SELECT noticias.id, noticias.titulo, noticias.data, noticias.imagem, noticias.texto, usuarios.nome FROM noticias JOIN usuarios ON noticias.usuario_id = usuarios.id WHERE noticias.id = $id";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_assoc($resultado);

}

// resultados.php
function busca($conexao, $termoDigitado)
{
    // %% (operador coringa) a palavra pesquisada pode estar em qualquer lugar e o LIKE em vez do = para entender essa possibilidade
 
    $sql = "SELECT id, data, titulo, resumo FROM noticias WHERE titulo LIKE '%$termoDigitado%' OR resumo LIKE '%$termoDigitado%' OR texto LIKE '%$termoDigitado%' ORDER BY DATA DESC";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}
