<?php
/* Sessões no PHP
Funcionalidade usado para o controle de acesso à determinadas páginas e/ou recursos de site.

Exemplos: área administrativa, painel de controle, área de cliente/aluno etc.

Nestas áreas o acesso só é possivel mediante alguma forma de autenticação. Exemplos: login/senha, digital, facial, etc. */

// verificando se não há/existe uma sessão em funcionamento 
if (!isset($_SESSION)) {
    // se não tem, inicie uma sessão
    session_start();
}

function verificaAcesso()
{
    /* Se NÃO EXISTIR uma variável de sessão chamada "id" (baseada nos ids usuários do banco), então significa que o usuário NÃO ESTÁ LOGADO. */
    if (!isset($_SESSION['id'])) {
        // portanto, destruimos a sessão
        session_destroy();
        // fazemos o usuário voltar para a página login
        header("location:../login.php?acesso_negado");
        // paramos qualquer outra execução/processamento
        exit; // ou die()
    }
}

function login($id, $nome, $tipo)
{
    // variáveis de sessão
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;
}

function logout()
{
    session_destroy();
    header("location:../login.php?saiu");
    exit; // ou die();
}

function verificaNivel()
{
    /* se o tipo do usuario logado na sessão NÃO FOR admin */
    if ($_SESSION['tipo'] != "admin") {
        // então, redirecione para nao-autorizado
        header("location:nao-autorizado.php");
        exit; 
    }
}

