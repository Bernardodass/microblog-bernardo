<?php // Script de conexão com o servidor de banco de dados. Necessário para que o Microblog possa usar o MySQL

// parametros para conexão
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "microblog_bernardo";

// função para conexão com o servidor de banco de dados
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// definindo o charset da conexão 
mysqli_set_charset($conexao, "utf8");


// fazendo o teste de conexão
if(!$conexao){
    // deu problema? "mate/pare" a aplicação!
    die("Ferrou:" .mysqli_connect_error());
} else{
    
}


?>