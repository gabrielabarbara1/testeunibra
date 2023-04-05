document.getElementById("cadastro-form").addEventListener("submit", function(event){
    event.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "cadastro.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            document.getElementById("retangulo").innerHTML = xhr.responseText;
        }
    };
    var data = "nome=" + encodeURIComponent(document.getElementById("nome").value) +
               "&cpf=" + encodeURIComponent(document.getElementById("cpf").value) +
               "&email=" + encodeURIComponent(document.getElementById("email").value) +
               "&senha=" + encodeURIComponent(document.getElementById("senha").value);
    xhr.send(data);
});
