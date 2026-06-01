<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: ../index.php");
    exit();
}
// nao permite a entrada se não tiver logado

include("../infra/db/connect.php");
// vai chamar o connect para essa página

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $novoUsuario = $_POST['usuario'];
    $novaSenha = $_POST['senha'];
    // variaveis que vão definir o novo usuario
    $sql = "INSERT INTO usuarios (usuario,senha) 
    VALUES ('$novoUsuario','$novaSenha')"; 
    // insere novos valores para o db

    if($conn->query($sql) === TRUE){
        //query sql vai pesquisar no db
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
    }else{
        echo "<script> alert('Erro ao cadastrar')</script>";
    }

};

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h3>Bem-Vindo! <?php echo $_SESSION["usuario"]; ?></h3>
    <!-- Mostra a mensagem de boas vindas -->
    <a href="logout.php"> Sair</a>

    <hr>
    <h4>Cadastro de Novo Usuário.</h4>
    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <?php
        
            if(isset($erro)){
                echo $erro;
            // exibe a mensagem de erro
            };
        
        ?>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
    <hr>
    <?php
    
    include("components/table.php")
    // chama o documento de table que mostra os usuarios

    ?>



</body>
</html>