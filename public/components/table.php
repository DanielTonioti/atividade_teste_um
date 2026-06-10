<h4>Usuários Cadastrados</h4>

<table border="1" cellpadding="3">

    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Senha</th>
        <th>Excluir</th>
        <th>Editar</th>
    </tr>
    <!-- Quando o usuario clicar no a, antes dele redirecionar, vai mandar um confirm -->
    <?php

    $sqlTodosUsuarios = "SELECT * FROM usuarios";

    $resultadoTodosUsuarios = $conn->query($sqlTodosUsuarios);

    while ($linha = $resultadoTodosUsuarios->fetch_assoc()) {

        // o fetch assoc
    
        echo "  <tr>
                    <td>" . $linha['id'] . "</td>
                    <td>" . $linha['usuario'] . "</td>
                    <td>" . $linha['senha'] . "</td>
                    <td> <a class='excluir-usuario' href='excluir.php?id=" . $linha['id'] . "'> Excluir</td>

                    <td> <a href='editar.php?id=" . $linha['id'] . "'> Editar</td>
                </tr>
                <script src='../scripts/table.js'></script>
                ";
    }

    ?>




</table>