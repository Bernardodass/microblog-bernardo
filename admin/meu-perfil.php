<?php 
require_once "../inc/cabecalho-admin.php";



/*
1) Carregue as funções de usuários
2) Pegue o ID do usuário através da SESSÃO
3) Chame a função lerUmUsuario e guarde o que ela retorna (array de dados)
4) Programe uma condicional para detectar se o formulário de atualização foi acionado.
    4.1) Capture os dados digitados no formulário (nome, e-mail)
    4.2) Capture o tipo do usuário através da SESSÃO
    4.3) Faça a programação condicional necessária para a senha (é o mesmo código usado em usuario-atualiza.php)
    4.4) Fora da condicional da senha, chame a função atualizarUsuario e passe os dados pra ela
    4.5) Redirecione para a página index.php (a que está dentro de admin)
5) DESAFIO: faça com que, ao mudar o nome do usuário, automaticamente apareça o novo nome na index.php
*/

// 1) Carregue as funções de usuários
require_once '../inc/funcoes-usuarios.php';

// 2) Pegue o ID do usuário através da SESSÃO

$id = $_SESSION['id'];

// 3) Chame a função lerUmUsuario e guarde o que ela retorna (array de dados)
$dadosDoUsuario = lerUmUsuario($conexao,$id);

// 4) Programe uma condicional para detectar se o formulário de atualização foi acionado.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // 4.1) Capture os dados digitados no formulário (nome, e-mail)
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // 4.2) Capture o tipo do usuário através da SESSÃO
    $tipo = $_SESSION['tipo'];

    // 4.3) Faça a programação condicional necessária para a senha (é o mesmo código usado em usuario-atualiza.php)
    if (empty($_POST['senha']) || password_verify($_POST['senha'], $dadosDoUsuario['senha'])) {
		// manter a mesma senha
		$senha = $dadosDoUsuario['senha'];
    }else {
		$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    }
    // 4.4) Fora da condicional da senha, chame a função atualizarUsuario e passe os dados pra ela
    atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo);

    // 4.5) Redirecione para a página index.php (a que está dentro de admin)
    header('Location:index.php');
}


?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar meus dados
		</h2>
				
		<form autocomplete="off" class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input value="<?=$dadosDoUsuario['nome']?>" class="form-control" type="text" id="nome" name="nome" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">E-mail:</label>
				<input value="<?=$dadosDoUsuario['email']?>" class="form-control" type="email" id="email" name="email" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="senha">Senha:</label>
				<input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
			</div>

			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

