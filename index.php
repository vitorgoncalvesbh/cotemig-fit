<!DOCTYPE html>
<html>
<head>
    <title>CRUD de USUARIO</title>
</head>
<body>
    <h1>Lista de USUARIO</h1>
    <a href="cadastro.php">Adicionar Novo Usuario</a>
    <?php
        require ('conexao.php');

        // Função para listar todos os registros do banco de dados
        function listarRegistros($conexao) {
            $sql = "SELECT * FROM alunos";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Listar registros
        $registros = listarRegistros($conexao);

        // Exibir os dados em uma tabela
        echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Sexo</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Modalidade</th>
            </tr>";

        foreach ($registros as $registro) {
            echo "<tr>";
            echo "<td>" . $registro['id'] . "</td>";
            echo "<td>" . $registro['nome'] . "</td>";
            echo "<td>" . $registro['email'] . "</td>";
            echo "<td>" . $registro['sexo'] . "</td>";
            echo "<td>" . $registro['endereco'] . "</td>";
            echo "<td>" . $registro['numero'] . "</td>";
            echo "<td>" . $registro['complemento'] . "</td>";
            echo "<td>" . $registro['bairro'] . "</td>";
            echo "<td>" . $registro['cidade'] . "</td>";
            echo "<td>" . $registro['uf'] . "</td>";
            echo "<td>" . $registro['modalidade'] . "</td>";
            echo "<td>
                <a href='edit.php?id=" . $registro['id'] . "'>Editar</a>
                <a href='delete.php?id=" . $registro['id'] . "'>Excluir</a>
            </td>";
            echo "</tr>";
        }

        echo "</table>";
    ?>
</body>
</html>
