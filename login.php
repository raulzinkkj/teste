<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <label for="email_participante">Email:</label>
        <input type="email" name="email_participante" id="email_participante">

        <label for="senha_participante">Senha:</label>
        <input type="password" name="senha_participante" id="senha_participante">

        <button onclick="validar()">Entrar</button>

        <p id="mensagem"></p>
    </div>
    <script>
        function validar() {
            const formData = new FormData();

            formData.append(
                "email_participante",
                document.getElementById("email_participante").value
            );

            formData.append(
                "senha_participante",
                document.getElementById("senha_participante").value
            );


            fetch("api/verificar_login.php", {
                    method: "POST",
                    body: formData
                })
                .then(resposta => resposta.json())
                .then(dados => {
                    if (dados.sucesso) {
                        window.location.href = "pagina_evento.php"
                    } else {
                        document.getElementById("mensagem").innerHTML = dados.mensagem;
                    }
                })

                .catch(erro => {
                    console.error(erro);
                    document.getElementById("mensagem").innerHTML = "Erro ao realizar login.";
                });

        }
    </script>
</body>

</html>