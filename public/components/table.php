<h4>Usuários Cadastrados</h4>

<table border="1" cellpadding="3">

    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Senha</th>
    </tr>

    <?php
    
    $sqlTodosUsuarios = "SELECT * FROM usuarios";
    // seleciona todos da tabela usuarios
    $resultadoTodosUsuarios = $conn->query($sqlTodosUsuarios);
    // pega o resultado ddo select all from usuarios
    while($linha = $resultadoTodosUsuarios->fetch_assoc()){
    // o fetch assoc associa pega as info e separa pelas colunas

        echo "  <tr>
                    <td>". $linha['id'] . "</td>
                    <td>". $linha['usuario'] . "</td>
                    <td>". $linha['senha'] . "</td>
                </tr>
        ";

    }
    
    ?>

    


</table>