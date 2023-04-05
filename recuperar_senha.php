<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="stylerecup.css">
</head>
<body>
<section>
    <header id="imagemfixa">
    <img src="unibra-logo.png" id="logo" >
    </header>
        <div id="todo-form">
    <h2>RECUPERAR SENHA</h2>
    <p>Informe os dados abaixo para recuperar sua senha,
        enviaremos um link para o email cadastrado.
    </p>
    <form method="POST" id="cadastro-form">
    
        <label for="cpf">CPF</label><br>
        <input type="text" id="cpf" name="cpf"><br>
        <button type="submit" id="enviar_botao">Enviar</button></br>
        <button type="button" id="voltar_botao">Voltar</button>
        <div id="retangulo"></div>
    </form>
        </div>
</section>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cpf = $_POST['cpf'];
        
        // Faça a verificação do CPF aqui e envie o link para o email cadastrado
        
        // Exemplo de envio de email com a função mail() do PHP
        $to = 'email@dominio.com';
        $subject = 'Recuperação de senha';
        $message = 'Clique no link a seguir para recuperar sua senha: http://exemplo.com/recuperarsenha?cpf='.$cpf;
        $headers = 'From: webmaster@exemplo.com' . "\r\n" .
            'Reply-To: webmaster@exemplo.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
?>
<script>
    $(document).ready(function() {
        $("#cadastro-form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "recuperarsenha.php",
                data: $(this).serialize(),
                success: function() {
                    $("#mensagem").text("Link enviado com sucesso! Verifique seu email.");
                },
                error: function() {
                    $("#mensagem").text("Erro ao enviar o link. Verifique seus dados e tente novamente.");
                }
            });
        });
    });
</script>

</body>
</html>

