$(document).ready(function() {
	$.ajax({
		url: 'get_user_data.php',
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			$('#username').html(data.username);
		},
		error: function() {
			alert('Erro ao recuperar informações do usuário.');
		}
	});
});
