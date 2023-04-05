<?php
session_start();

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

// Conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se a conexão com o banco de dados foi bem-sucedida
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Consulta no banco de dados para verificar se o usuário existe
$sql = "SELECT * FROM usuarios WHERE cpf = '$cpf' AND senha = '$senha'";
$result = mysqli_query($conn, $sql);

// Se houver um resultado, o usuário é autenticado
if (mysqli_num_rows($result) > 0) {
    $_SESSION['cpf'] = $cpf;
    echo "success";
} else {
    echo "error";
}

mysqli_close($conn);
?>
