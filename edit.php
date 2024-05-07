<?php
require ('conexao.php');

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Função para listar todos os registros do banco de dados
    function listarRegistros($conexao, $id) {
        $sql = "SELECT * FROM alunos WHERE id = $id";
        $stmt = $conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        // Listar registros
        $registros = listarRegistros($conexao, $id);
        foreach ($registros as $registro) {
            if ($registro['id'] == $id) {
                $aux = true;
            }
        }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <h1>Editar Usuario</h1>
    <?php if (isset($aux)) : ?>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $registro['nome']; ?>" required>
            <br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $registro['email']; ?>" required>
            <br>
            <label>Sexo:</label>
            <input type="text" name="sexo" value="<?php echo $registro['sexo']; ?>" required>
            <br>
            <label>Endereço:</label>
            <input type="text" name="endereco" value="<?php echo $registro['endereco']; ?>" required>
            <br>
            <label>Numero:</label>
            <input type="text" name="numero" value="<?php echo $registro['numero']; ?>" required>
            <br>
            <label>Complemento:</label>
            <input type="text" name="complemento" value="<?php echo $registro['complemento']; ?>" required>
            <br>
            <label>bairro:</label>
            <input type="text" name="bairro" value="<?php echo $registro['bairro']; ?>" required>
            <br>
            <label>cidade:</label>
            <input type="text" name="cidade" value="<?php echo $registro['cidade']; ?>" required>
            <br>
            <label>UF:</label>
            <input type="text" name="UF" value="<?php echo $registro['uf']; ?>" required>
            <br>
            <label>Modalidade:</label>
            <input type="text" name="modalidade" value="<?php echo $registro['modalidade']; ?>" required>
            <input type="submit" value="Salvar">
        </form>
    <?php else : ?>
        <p>Usuario não encontrado.</p>
    <?php endif; ?>
</body>
</html>
