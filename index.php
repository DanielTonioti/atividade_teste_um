<?php
    session_start();

    include("infra/db/connect.php");
    // Chama o arquivo connect para ser executado
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // verifica o método do formulario
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
        // Verificia a existencia no db

        $resultado = $conn->query($sql);
        //Resultado vai receber o valor

        if ($resultado->num_rows > 0){
            // Verifica a quantidade de colunas
            $_SESSION["usuario"] = $usuario;
            // compara com o db
            header("Location: public/home.php");
            // manda para a pagina home
            exit();
        }else{
            $erro = "Usuário ou senha inválidos!";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Sitema de Login Simples</h1>

    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <br>
        <?php
        
            if(isset($erro)){
                echo $erro;
            };
            
        
        ?>
        <button type="submit">Entrar</button>
    </form>

</body>
</html>