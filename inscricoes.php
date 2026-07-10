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
    <title>Inscrições</title>
</head>

<body>
    <div class="container">
        <?php  
        include 'conexao/conexao.php';
        $id_evento = $_GET['id_evento'];

        $sql = "SELECT * FROM eventos WHERE id_evento = :id_evento";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id_evento', $id_evento);
        $stmt->execute();

        $idevento = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        
        <input type="hidden" name="id_evento" value="<?= $idevento['id_evento'] ?>" id="id_evento">

        <input type="hidden" value="<?= $_SESSION['id_participante'] ?>" name="id_participante" id="id_participante">

        <label for="data_inscricao">Data de Inscrição:</label>
        <input type="date" name="data_inscricao" id="data_inscricao">

        <label for="estatus_inscricao">Status:</label>
        <input type="text" name="estatus_inscricao" id="estatus_inscricao">

        <button onclick="gravar()">Salvar</button>
    </div>
    <script>

        function gravar() {
            const formData = new FormData();

            formData.append(
                "id_evento",
                document.getElementById("id_evento").value
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