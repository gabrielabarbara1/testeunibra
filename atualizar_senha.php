<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nova_senha = $_POST["nova_senha"];
    $conf_senha = $_POST["conf_senha"];
    
    if($nova_senha == $conf_senha) {
        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "seu_username";
        $password = "sua_senha";
        $dbname = "nome_do_banco_de_dados";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Atualizar senha no banco de dados
        $sql = "UPDATE usuarios SET senha='" . $nova_senha . "' WHERE cpf='" . $_SESSION["cpf"] . "'";
        if ($conn->query($sql) === TRUE) {
            echo "Senha atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a senha: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "As senhas não coincidem!";
    }
}
?>