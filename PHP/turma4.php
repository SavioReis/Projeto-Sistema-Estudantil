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

// Consultar o banco de dados para buscar alunos da Turma 1
$sql = "SELECT * FROM aluno WHERE turma = 4";
$result = $conn->query($sql);

echo '<html>
        <head>
            <meta charset="UTF-8">
            <title>Turma 1</title>
            <link rel="stylesheet" href="style/estilo.css">
        </head>
        <body>
            <div id="logo">
                <img src="Imagem/logo.png" alt="Logo da Escola Mundo Feliz">
                <h1>Escola Mundo Feliz - Turma 4</h1>
            </div>
            <div id="menu">
                <button onclick="window.location.href=\'index.html\'">Voltar</button>
            </div>
            <div id="conteudo">
                <h2>Alunos da Turma 4</h2>';

if ($result->num_rows > 0) {
    // Exibir os resultados
    while ($row = $result->fetch_assoc()) {
        echo "Nome: " . $row["nome"] . "<br>";
        echo "Data de Nascimento: " . $row["data"] . "<br>";
        echo "Idade: " . $row["idade"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Nenhum aluno encontrado na Turma 5";
}

// Fechar a conexão
$conn->close();

echo '      </div>
        </body>
    </html>';
?>
