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

// Consultar o banco de dados para buscar todos os professores
$sql = "SELECT * FROM professor";
$result = $conn->query($sql);

echo '<html>
        <head>
            <meta charset="UTF-8">
            <title>Professores Cadastrados</title>
            <link rel="stylesheet" href="estilo.css">
        </head>
        <body>
            <div id="logo">
                <img src="Imagem/logo.png" alt="Logo da Escola Mundo Feliz">
                <h1>Escola Mundo Feliz - Professores</h1>
            </div>
            <div id="menu">
                <button onclick="window.location.href=\'index.html\'">Voltar</button>
            </div>
            <div id="conteudo">
                <h2>Professores Cadastrados</h2>';

if ($result->num_rows > 0) {
    // Exibir os resultados
    while ($row = $result->fetch_assoc()) {
        echo "Nome do Professor: " . $row["nome_professor"] . "<br>";
        echo "Disciplina: " . $row["disciplina"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Nenhum professor cadastrado.";
}

// Fechar a conexão
$conn->close();

echo '      </div>
        </body>
    </html>';
?>
