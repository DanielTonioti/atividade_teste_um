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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h3>Bem-Vindo, <?php echo $_SESSION["usuario"]; ?>!</h3>
            <a href="logout.php"> Sair</a>
        </div>
    </header>

    <hr>
    <main>

        <div class="justify-content-center flex-column d-flex align-items-center">

            <div class="w-25">
                <h4 class="text-center">Cadastro de Novo Usuário.</h4>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <?php

                        if (isset($erro)) {
                            echo $erro;
                        }
                        ;

                        ?>
                </form>
            </div>
        </div>
        <hr>
        <div class=" d-flex flex-column justify-content-centeralign-items-center">
            <?php

            include("components/table.php")

                ?>
        </div>

    </main>


</body>

</html>