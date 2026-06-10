<div class=" d-flex flex-column justify-content-center align-items-center">
    
    <h4>Usuários Cadastrados</h4>
        
        <table border="1" cellpadding="3" class='table W-25'>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Senha</th>
                <th scope='col'>Excluir</th>
                <th scope='col'>Editar</th>
            </tr>
            <?php
            $sqlTodosUsuarios = "SELECT * FROM usuarios";
            $resultadoTodosUsuarios = $conn->query($sqlTodosUsuarios);
        
            while ($linha = $resultadoTodosUsuarios->fetch_assoc()) {
                echo "<tr>
                        <td>" . $linha['id'] . "</td>
                        <td>" . $linha['usuario'] . "</td>
                        <td>" . $linha['senha'] . "</td>
                        <td><a class='excluir-usuario' href='excluir.php?id=" . $linha['id'] . "'>Excluir</a></td>
                        <td><a href='editar.php?id=" . $linha['id'] . "'>Editar</a></td>
                        </tr>";
            }
            ?>
        </table>
        
</div>
<script src='../scripts/table.js'></script>