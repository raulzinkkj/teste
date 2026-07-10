<?php
session_start();

if (!isset($_SESSION['id_participante'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
</head>

<body>
    <div class="container">
        <label for="titulo_evento">Titulo do Evento</label>
        <input type="text" name="titulo_evento" id="titulo_evento">

        <label for="descricao_evento">Descrição do Evento</label>
        <textarea name="descricao_evento" id="descricao_evento"></textarea>

        <label for="categoria_evento">Categoria do Evento</label>
        <input type="text" name="categoria_evento" id="categoria_evento">

        <label for="palestrante_evento">Palestrante do Evento</label>
        <input type="text" name="palestrante_evento" id="palestrante_evento">

        <label for="local_evento">Local do Evento</label>
        <input type="text" name="local_evento" id="local_evento">

        <label for="data_evento">Data do Evento</label>
        <input type="date" name="data_evento" id="data_evento">

        <label for="horario_evento">Horário do Evento</label>
        <input type="time" name="horario_evento" id="horario_evento">

        <label for="vagas_evento">Vagas do Evento</label>
        <input type="text" name="vagas_evento" id="vagas_evento">

        <label for="imagem_evento">Imagem do Evento</label>
        <input type="file" name="imagem_evento" id="imagem_evento" multiple acept="image/*">

        <button onclick="gravar()">Salvar</button>
    </div>
    <script>
        let imagem_evento = [];

        function gravar() {
            const formData = new FormData();

            formData.append(
                "titulo_evento",
                document.getElementById("titulo_evento").value
            );

            formData.append(
                "descricao_evento",
                document.getElementById("descricao_evento").value
            );

            formData.append(
                "categoria_evento",
                document.getElementById("categoria_evento").value
            );


            formData.append(
                "palestrante_evento",
                document.getElementById("palestrante_evento").value
            );


            formData.append(
                "local_evento",
                document.getElementById("local_evento").value
            );


            formData.append(
                "data_evento",
                document.getElementById("data_evento").value
            );

            formData.append(
                "horario_evento",
                document.getElementById("horario_evento").value
            );

            formData.append(
                "vagas_evento",
                document.getElementById("vagas_evento").value
            );

            imagem_evento.forEach(imagem => {
                formData.append("imagem_evento[]", imagem);
            });

            fetch("api/gravar_evento.php", {
                    method: "POST",
                    body: formData
                })
                .then(resposta => resposta.text())
                .then(dados => {
                    window.location.href = "pagina_eventos.php";
                })

        }

        document.getElementById("imagem_evento").addEventListener("change", adicionarImagens);

        function adicionarImagens() {
            const arquivos = document.getElementById("imagem_evento").files;

            for (const arquivo of arquivos) {
                if (imagem_evento.length >= 5) {
                    alert("Máximo de 5 imagens.");
                    break;
                }

                imagem_evento.push(arquivo);
            }
        }   
    </script>
</body>

</html>