<?php
session_start();
include("components/verifica.php");

include("../infra/db/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("components/novo-usuario.php");

    $sql = "INSERT INTO usuarios (usuario,senha) 
    VALUES ('$novoUsuario','$novaSenha')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
    } else {
        echo "<script> alert('Erro ao cadastrar')</script>";
    }

}
;

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h3>Bem-Vindo, <?php echo $_SESSION["usuario"]; ?>!</h3>
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
        <br>
        <?php

        if (isset($erro)) {
            echo $erro;
        }
        ;

        ?>
        <button type="submit">Cadastrar</button>
    </form>
    <hr>
    <?php

    include("components/table.php")

        ?>



</body>

</html>