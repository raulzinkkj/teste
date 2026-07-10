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
    <title>Pagina de eventos</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            gap: 20px;
        }

        header {
            height: 80px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: black;
            color: white;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            height: calc(100vh - 80px);
            gap: 10px;
        }

        .evento {
            width: 300px;
            height: 400px;
            padding: 15px;
            display: flex;
            justify-content: center;
            text-align: center;
            align-content: center;
            flex-direction: column;
            border: solid 1px black;
            border-radius: 10px;
            gap: 10px;
        }

        img {
            width: 280px;
            border-radius: 8px;
            border: solid 1px black;
        }

        .junto {
            display: flex;
            gap: 10px;
            justify-content: space-around;
        }

        button {
            width: 100%;
            height: 40px;
            background: black;
            color: white;
            border: solid 1px black;
            border-radius: 8px;
            font-weight: bolder;
            transition: 0.5s;
        }

        button:hover {
            color: black;
            background: white;
        }
    </style>
</head>

<body>
    <header>
        <h1>Página de Eventos</h1>
    </header>
    <div class="container">
        <?php
        include 'conexao/conexao.php';

        $sql = "SELECT * FROM eventos ORDER BY data_evento DESC";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        while ($eventos = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='evento'>";
            echo "<img src='uploads/{$eventos['imagem_evento']}' alt='Imagem do evento'>";
            echo "<h2>{$eventos['titulo_evento']}</h2>";
            echo "<div class='junto'>";
            echo "<p>{$eventos['data_evento']}</p>";
            echo "<p>{$eventos['local_evento']}</p>";
            echo "</div>";
            echo "<strong>{$eventos['vagas_evento']}</strong>";
            echo "<form action='inscricoes.php' method='get'>
                    <input type='hidden' name='id_evento' value='{$eventos['id_evento']}'>
                    <button type='submit'>Inscrever-se</button>
                  </form>";
            echo "</div>";
        }

        ?>
    </div>
</body>

</html>