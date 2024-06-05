<?php
require_once "../inc/cabecalho-admin.php";


/* 1) Carregue as funções de usuários *//*




2) Pegue o ID do usuário através da SESSÃO *//*





3) Chame a função lerUmUsuario e guarde o que ela retorna (array de dados) *//*




4) Programe uma condicional para detectar se o formulário de atualização foi acionado.




4.1) Capture os dados digitados no formulário (nome, e-mail)    



4.2) Capture o tipo do usuário através da SESSÃO   



4.3) Faça a programação condicional necessária para a senha (é o mesmo código usado em usuario-atualiza.php)    



4.4) Fora da condicional da senha, chame a função atualizarUsuario e passe os dados pra ela  



4.5) Redirecione para a página index.php (a que está dentro de admin) *//* 



5) DESAFIO: faça com que, ao mudar o nome do usuário, automaticamente apareça o novo nome na index.php */




?>


<article class="p-5 my-4 rounded-3 bg-white shadow">
    <div class="container-fluid py-1">
        <h2 class="display-4">Olá <?= $_SESSION['nome'] ?></h2>
        <p class="fs-5">Você está no <b>painel de controle e administração</b> do
            site Microblog e seu <b>nível de acesso</b> é <span class="badge bg-dark"><?= $_SESSION['tipo'] ?></span>.</p>
        <hr class="my-4">

        <div class="d-grid gap-2 d-md-block text-center">
            <a class="btn btn-dark bg-gradient btn-lg" href="meu-perfil.php">
                <i class="bi bi-person"></i> <br>
                Meu perfil
            </a>


            <!-- se for usuario do tipo admin, entao mostre o link abaixo -->
            <?php if ($_SESSION['tipo'] === 'admin') { ?>
                <a class="btn btn-dark bg-gradient btn-lg" href="usuarios.php">
                    <i class="bi bi-people"></i> <br>
                    Gerenciar usuários
                </a>
            <?php } ?>

            <a class="btn btn-dark bg-gradient btn-lg" href="noticias.php">
                <i class="bi bi-newspaper"></i> <br>
                Gerenciar notícias
            </a>
        </div>
    </div>
</article>


<?php
require_once "../inc/rodape-admin.php";
?>