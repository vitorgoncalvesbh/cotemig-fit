<?php
 echo "Inserindo dados abaixo... <br>";
 require('conexao.php'); // Certifique-se de que esta conexão use PDO
 
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $nome = $_POST["nome"];
     $email = $_POST["email"];
     $sexo = $_POST["sexo"];
     $endereco = $_POST["endereco"];
     $numero = $_POST["numero"];
     $complemento = $_POST["complemento"];
     $bairro = $_POST["bairro"];
     $cidade = $_POST["cidade"];
     $uf = $_POST["uf"];
     $modalidade = $_POST["modalidade"];
 
 
     // Função para inserir um novo registro no banco de dados usando PDO
     function inserirRegistro($conexao, $nome, $email, $sexo, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $modalidade) {
         $sql = "INSERT INTO alunos (nome, email, sexo, endereco, numero, complemento, bairro, cidade, uf, modalidade)
                 VALUES (:nome, :email, :sexo, :endereco, :numero, :complemento, :bairro, :cidade, :uf, :modalidade)";
        
         try {
             $stmt = $conexao->prepare($sql); // Preparar a declaração SQL
             // Vincular valores usando parâmetros nomeados
             $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
             $stmt->bindParam(':email', $email, PDO::PARAM_STR);
             $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
             $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
             $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
             $stmt->bindParam(':complemento', $complemento, PDO::PARAM_STR);
             $stmt->bindParam(':bairro', $bairro, PDO::PARAM_STR);
             $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
             $stmt->bindParam(':uf', $uf, PDO::PARAM_STR);
             $stmt->bindParam(':modalidade', $modalidade, PDO::PARAM_STR);
 
             $stmt->execute();
             return true; // Retorna verdadeiro se a execução for bem-sucedida
         } catch (PDOException $e) {
             return false; // Se ocorrer um erro, retorne falso
         }
     }
 
 
     if (inserirRegistro($conexao, $nome, $email, $sexo, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $modalidade)) {
         echo "Registro inserido com sucesso!<br><a href='index.php'>HOME</a>";
     } else {
         echo "Erro ao inserir o registro.";
     }
 }
 

?>