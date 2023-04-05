$(document).ready(function() {
    $('#login_botao').click(function(e) {
        e.preventDefault();
        var cpf = $('#cpf').val();
        var senha = $('#senha_login').val();

        $.ajax({
            type: 'POST',
            url: 'autenticar.php',
            data: {
                cpf: cpf,
                senha: senha
            },
            success: function(data) {
                if (data == "success") {
                    window.location.href = "dashboard.php";
                } else {
                    $('#mensagem').html("<p>CPF ou senha inválidos</p>");
                }
            },
            error: function() {
                alert('Erro ao enviar dados.');
            }
        });
    });
});
