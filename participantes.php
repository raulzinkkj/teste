<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes</title>
</head>

<body>
    <div class="container">
        <label for="nome_participante">Nome:</label>
        <input type="text" name="nome_participante" id="nome_participante">

        <label for="cpf_participante">CPF:</label>
        <input type="number" name="cpf_participante" id="cpf_participante">

        <label for="email_participante">E-mail:</label>
        <input type="email" name="email_participante" id="email_participante">

        <label for="telefone_participante">Telefone:</label>
        <input type="number" name="telefone_participante" id="telefone_participante">

        <label for="senha_participante">Senha:</label>
        <input type="password" name="senha_participante" id="senha_participante">

        <button onclick="gravar()">Salvar</button>

        <a href="login.php">Já tem uma conta?</a>
    </div>
    <script>

        function gravar() {
            const formData = new FormData();

            formData.append(
                "nome_participante",
                document.getElementById("nome_participante").value
            );

            formData.append(
                "cpf_participante",
                document.getElementById("cpf_participante").value
            );

            formData.append(
                "email_participante",
                document.getElementById("email_participante").value
            );


            formData.append(
                "telefone_participante",
                document.getElementById("telefone_participante").value
            );

             formData.append(
                "senha_participante",
                document.getElementById("senha_participante").value
            );


            fetch("api/gravar_participante.php", {
                    method: "POST",
                    body: formData
                })
                .then(resposta => resposta.text())
                .then(dados => {
                    window.location.href = "pagina_eventos.php";
                })

        }

    </script>
</body>

</html>