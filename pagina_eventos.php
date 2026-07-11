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

        .container {
            display: flex;
            flex-wrap: wrap;
            height: calc(100vh - 80px);
            gap: 10px;
        }

        .evento {
            width: 200px;
            height: 380px;
            display: flex;
            flex-direction: column;
            border-radius: 10px;
            gap: 10px;
            background: #fff;  
        }

        .detalhes {
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            height: 100vh;
            justify-content: space-between;
        }

        .detalhes button {
            width: 100%;
            height: 40px;
            background: white;
            color: #5627bc;
            border: solid 1px #5627bc;
            border-radius: 8px;
            font-weight: bolder;
            transition: 0.5s;
        }

        .img_evento {
            width: 100%;
            border-radius: 8px 8px 0 0;
            border: none;
            object-position: center;
            height: 135px;
            object-fit: cover;
        }

        .data, .local {
            width: 200px;
            display: flex;
            gap: 10px;
        }

        .data img {
            width: 25px;
        }

         .local img {
            width: 25px;
        }
      
    </style>
</head>

<body>
    <header>
        <img src="img/logo.png" alt="">

        <h1>Página de Eventos</h1>

        <button onclick="criar_evento()" class="add_evento">+ Criar evento</button>

    </header>
    <div class="container">
        <?php
        include 'conexao/conexao.php';

        $sql = "SELECT * FROM eventos ORDER BY data_evento DESC";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        while ($eventos = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='evento'>";
            echo "<img src='uploads/{$eventos['imagem_evento']}' alt='Imagem do evento' class='img_evento'>";
            echo "<div class='detalhes'>";
            echo "<h2>{$eventos['titulo_evento']}</h2>";
            echo "<div class='data'>";
            echo "<img src='img/data.svg'>";
            echo "{$eventos['data_evento']}";
            echo "</div>";
            echo "<div class='local'>";
            echo "<img src='img/local.svg'>";
            echo "{$eventos['local_evento']}";
            echo "</div>";
            echo "<strong>{$eventos['vagas_evento']}-Vagas</strong>";
            echo "<form action='inscricoes.php' method='get'>
                    <input type='hidden' name='id_evento' value='{$eventos['id_evento']}'>
                    <button type='submit'>Inscrever-se</button>
                  </form>";
                  echo "</div>";
            echo "</div>";
        }

        ?>
    </div>
    <script>
        function criar_evento() {
            window.location.href = "eventos.php";
        }
    </script>
</body>

</html>