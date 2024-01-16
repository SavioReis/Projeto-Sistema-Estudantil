<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escola";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obter os dados do formulário
$nome_professor = $_POST["nome_professor"];
$disciplina = $_POST["disciplina"];

// Inserir os dados na tabela de professores
$sql = "INSERT INTO professor (nome_professor, disciplina) VALUES ('$nome_professor', '$disciplina')";

if ($conn->query($sql) === TRUE) {
    echo "Professor cadastrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechar a conexão
$conn->close();
?>
