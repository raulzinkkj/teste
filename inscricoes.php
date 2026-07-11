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
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            background: #f5f5f5;
        }

        header {
            height: 80px;
            width: 100%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            background: #fff;
            color: white;
            border-bottom: solid 1px #c5c0c0;
            z-index: 40;
        }

        img {
            width: 250px;
        }

        h1 {
            color: #5627bc;
        }

        .add_evento {
            background: #5627bc;
            width: 150px;
            height: 50px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            border: none;
        }

        .imagem {
            width: 100%;
            height: 400px;
            z-index: 20;
            display: flex;
            align-items: stretch;
            flex-direction: column;
        }

        .banner {
            z-index: 10;
            height: 400px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
            filter: blur(5px);
        }

        .banner img {
            width: 100%;
            height: 400px;
            filter: blur(5px);
            object-fit: cover;

        }

        .dentro {
            z-index: 30;
            position: absolute;
            padding-top: 40px;
            width: 100%;
            display: flex;
            justify-content: center;
            flex-direction: row-reverse;
            height: 390px;
            top: 90px;
        }

        .imagem_dentro {
            width: 1000px;
            z-index: 30;
            filter: none;
            object-fit: cover;
            object-position: top;
        }

        .principal {
            background: #fff;
        }
    </style>

</head>

<body>
    <header>
        <img src="img/logo.png" alt="">

        <h1>Inscrição</h1>

        <button onclick="criar_evento()" class="add_evento">+ Criar evento</button>

    </header>
    <section class="imagem">
        <?php
        include 'conexao/conexao.php';

        $id_evento = $_GET['id_evento'];

        $sql = "SELECT * FROM eventos WHERE id_evento = :id_evento";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id_evento', $id_evento);
        $stmt->execute();

        $eventos = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<div class='banner' style='background-image: url(\"uploads/{$eventos['imagem_evento']}\");'>";
        echo "</div>";
        echo "<div class='dentro'>";
        echo "<img src='uploads/{$eventos['imagem_evento']}' class='imagem_dentro'>";
        echo "</div>";

        ?>
    </section>
    <section class="principal">


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
            <div class="junto">
                <label for="data_inscricao">Data de Inscrição:</label>
                <input type="date" name="data_inscricao" id="data_inscricao">
            </div>
            <div class="junto">
                <label for="estatus_inscricao">Status:</label>
                <input type="text" name="estatus_inscricao" id="estatus_inscricao">
            </div>
            <button onclick="gravar()">Salvar</button>
        </div>
    </section>
    <script>
        function criar_evento() {
            window.location.href = "eventos.php";
        }

        function gravar() {
            const formData = new FormData();

            formData.append(
                "id_evento",
                document.getElementById("id_evento").value
            );

            formData.append(
                "id_participante",
                document.getElementById("id_participante").value
            );

            formData.append(
                "data_inscricao",
                document.getElementById("data_inscricao").value
            );


            formData.append(
                "telefone_participante",
                document.getElementById("telefone_participante").value
            );


            fetch("api/gravar_inscricao.php", {
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