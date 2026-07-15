<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <label for="nome_usuario">Nome do Usuário</label>
        <input type="text" name="nome_usuario" id="nome_usuario">

        <button type="submit" onclick="gravar()">Enviar</button>
    </div>

    <script>
        function gravar() {
            const formData = new FormData();

            formData.append(
                "nome_usuario",
                document.getElementById("nome_usuario").value
            );

            fetch("gravar_usuario.php", {
                method: "POST",
                body: formData         
            })
            .then(resposta => resposta.text())
            .then(dados => {
                window.location.href = "login.php"
            });
        }
    </script>
</body>
</html>