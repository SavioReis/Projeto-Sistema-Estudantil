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
$nome = $_POST["nome"];
$idade = $_POST["idade"];
$turma = $_POST["turma"];
$data = $_POST["data"];

// Inserir os dados na tabela aluno
$sql = "INSERT INTO aluno (nome, idade, turma, data) VALUES ('$nome', '$idade', '$turma', '$data')";

if ($conn->query($sql) === TRUE) {
    echo "Aluno matriculado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechar a conexão
$conn->close();
?>
