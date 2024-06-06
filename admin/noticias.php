<?php 
require_once "../inc/cabecalho-admin.php";
require_once "../inc/funcoes-noticias.php";

/* pegando o ID do usuario logado */
$idUsuario = $_SESSION['id'];

/* pegando o tipo do usuario logado */
$tipoUsuario = $_SESSION['tipo'];

// chamando a função, passando os parametros e recebendo os dados
$listaDeNoticias = lerNoticias($conexao, $idUsuario, $tipoUsuario);



?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Notícias <span class="badge bg-dark">X</span>
		</h2>

		<p class="text-center mt-5">
			<a class="btn btn-primary" href="noticia-insere.php">
			<i class="bi bi-plus-circle"></i>	
			Inserir nova notícia</a>
		</p>
				
		<div class="table-responsive">
		
			<table class="table table-hover">
				<thead class="table-light">
					<tr>
                        <th>Título</th>
                        <th>Data</th>
                        <th>Autor</th>
						<th class="text-center">Operações</th>
					</tr>
				</thead>

				<tbody>

					<tr>
						<?php foreach($listaDeNoticias as $noticias){ ?>
                        <td> <?=$noticias['titulo']?> </td>
                        <td><?= date('d/m/Y H:i', strtotime($noticias["data"])) ?></td>
                        <td> <?=$noticias['nome']?> </td>
						<td class="text-center">
							<a class="btn btn-warning" 
							href="noticia-atualiza.php?id=<?=$noticias["id"]?>">
							<i class="bi bi-pencil"></i> Atualizar
							</a>
						
							<a class="btn btn-danger excluir" 
							href="noticia-exclui.php?id=<?=$noticias["id"]?>">
							<i class="bi bi-trash"></i> Excluir
							</a>
						</td>
					</tr>
<?php }?>
				</tbody>                
			</table>
	</div>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

