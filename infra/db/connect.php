<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db = "sistema_simples_m1";
// declaração de variaveis

$conn = new mysqli($host, $user, $pass, $db);
// recebe as variaveis para a validção padrão(local do host, nome do usuario, senha, nome do banco de dados);
if ($conn->connect_error) {
    die("Erro na conexão!");
    // mata a conexão
} else {
    echo "<script>console.log('Banco conectado com sucesso!')</script>";
    // se a conexão for realizada com sucesso, vai mostrar essa mensagem no console
}
;

?>