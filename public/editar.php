<?php

session_start();

include("components/verifica.php");

include("../infra/db/connect.php");

$id = $_GET["id"];

$sql = "SELECT * FROM usuarios WHERE id = $id";
$resultado = $conn->query($sql);

$usuario = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("components/novo-usuario.php");

    $sqlUpdate = " UPDATE usuarios SET usuario = '$novoUsuario', senha = '$novaSenha' WHERE id = $id";

    if ($conn->query($sqlUpdate) === TRUE) {
        header("Location: home.php");
        exit();
    }


}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">
</head>

<body>
    <div class="justify-content-center flex-column d-flex align-items-center">
    
            <div class="w-25">

                <h2>Editar Usuário</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Usuário:</labe l>
                        <input type="text" class="form-control" name="usuario" value=" <?php echo $usuario['usuario'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Senha:</label>
                        <input type="password" class="form-control" name="senha" value=" <?php echo $usuario['senha'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
    </div>

</body>

</html>