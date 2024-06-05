<?php
require_once "../inc/cabecalho-admin.php";
require_once "../inc/funcoes-usuarios.php";
 
/* mensagens de feedback */
if(isset($_GET['campos_obrigatorios'])){
    $mensagem = "preencha e-mail e senha";
} elseif(isset($_GET['dados_incorretos'])){
    $mensagem = "dados incorretos, verifique e tente novamente";
} elseif(isset($_GET['saiu'])){
    $mensagem = "voce saiu do sistema... até mais!";
} elseif(isset($_GET['acesso_negado'])) {
    $mensagem = "voce deve logar primeiro!";
}

if(isset($_POST['entrar'])){

}

// chamando a função que carrega/lista/lê os usuarios
$listaUsuarios = lerUsuarios($conexao);
?>
 
<div class="row">
    <article class="col-12 bg-white rounded shadow my-1 py-4">
       
        <h2 class="text-center">
        Usuários <span class="badge bg-dark"><?=count($listaUsuarios)?></span>
        </h2>
 
        <p class="text-center mt-5">
            <a class="btn btn-primary" href="usuario-insere.php">
            <i class="bi bi-plus-circle"></i>  
            Inserir novo usuário</a>
        </p>
               
        <div class="table-responsive">
       
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th class="text-center">Operações</th>
                    </tr>
                </thead>
 
                <tbody>
<?php foreach($listaUsuarios as $usuario){ ?>
                    <tr>
                        <td> <?=$usuario["nome"]?> </td>
                        <td> <?=$usuario["email"]?> </td>
                        <td> <?=$usuario["tipo"]?></td>

<!-- Atencao ao endereço/url indicado no link : nós ciramos um parametro de url chamado id contendo o valor dinamico do id de cada usuario -->

                        <td class="text-center">
                            <a class="btn btn-warning"
		href="usuario-atualiza.php?id=<?=$usuario["id"]?>">
                            <i class="bi bi-pencil"></i> Atualizar
                            </a>
                       
                            <a class="btn btn-danger excluir"
                            href="usuario-exclui.php">
                            <i class="bi bi-trash"></i> Excluir
                            </a>
                        </td>
                    </tr>
                   
                <?php } ?>
                </tbody>                
            </table>
    </div>
       
    </article>
</div>
 
 
<?php
require_once "../inc/rodape-admin.php";
?>