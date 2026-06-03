<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: ../index.php");
    exit();
}

include("../infra/db/connect.php");

$mensagem = ""; // Variável para concentrar os alertas

if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['btn-cadastrar'])){
    $novoUsuario = $_POST['usuario'];
    $novaSenha = $_POST['senha'];
    $sql = "INSERT INTO usuarios (usuario,senha) 
    VALUES ('$novoUsuario','$novaSenha')"; 
    $conn->query($sql);
}

if(isset($_POST['btn-atualizar'])){
    $atualizacaoId = $_POST['id-atualizacao'];
    $atualizacaoUsuario = $_POST['usuario-atualizacao'];
    $atualizacaoSenha = $_POST['senha-atualizacao'];
    
    $sql = "UPDATE usuarios 
    SET usuario = '$atualizacaoUsuario', senha = '$atualizacaoSenha' 
    WHERE id = $atualizacaoId";
    $conn->query($sql);
}
if(isset($_POST['btn-deletar'])){
    $deleteId = $_POST['id-delete'];
    $sql = "DELETE FROM usuarios 
    WHERE id = $deleteId";
    $conn->query($sql);
}
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php 
    // Exibe o alerta JavaScript se houver alguma mensagem
    if(!empty($mensagem)){
        echo "<script>alert('$mensagem');</script>";
    }
    ?>
</head>
<body>
    <h3>Bem-Vindo, <?php echo htmlspecialchars($_SESSION["usuario"]); ?>!</h3>
    <a href="logout.php">Sair</a>

    <hr>
    
    <h4>Cadastro de Novo Usuário</h4>
    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario" required>
        <br><br>
        <label>Senha:</label>
        <input type="password" name="senha" required>
        <br><br>
        <button type="submit" name="btn-cadastrar">Cadastrar</button>
    </form>
    
    <hr>
    
    <h4>Atualização de Usuário</h4>
    <form method="POST">
        <label>ID:</label>
        <input type="number" name="id-atualizacao" required>
        <br><br>
        <label>Novo Usuário:</label>
        <input type="text" name="usuario-atualizacao" required>
        <br><br>
        <label>Nova Senha:</label>
        <input type="password" name="senha-atualizacao" required>
        <br><br>
        <button type="submit" name="btn-atualizar">Atualizar</button>
    </form>
    <hr>
    <h4>Deletar usuario</h4>
    <form method="POST">
        <label>ID:</label>
        <input type="number" name="id-delete" required><br><br>
        <button type="submit" name="btn-deletar">Deletar</button>
    </form>
    
    <hr>

    <?php 
    // Inclui a tabela que lista os usuários
    include("components/table.php"); 
    ?>
</body>
</html>