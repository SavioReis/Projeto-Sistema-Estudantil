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
$nome = $_GET["nome"];

// Consultar o banco de dados para buscar alunos com o nome fornecido
$sql = "SELECT * FROM aluno WHERE nome LIKE '%$nome%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir os resultados
    while ($row = $result->fetch_assoc()) {
        echo "Nome: " . $row["nome"] . "<br>";
        echo "Data de Nascimento: " . $row["data"] . "<br>";
        echo "Idade: " . $row["idade"] . "<br>"; // Corrigido para exibir a idade
        echo "<hr>";
    }
} else {
    echo "Nenhum aluno encontrado com o nome: $nome";
}

// Fechar a conexão
$conn->close();
?>
