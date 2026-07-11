<?php
include '../conexao/conexao.php';

$titulo_evento = $_POST['titulo_evento'];
$descricao_evento = $_POST['descricao_evento'];
$categoria_evento = $_POST['categoria_evento'];
$palestrante_evento = $_POST['palestrante_evento'];
$local_evento = $_POST['local_evento'];
$data_evento = $_POST['data_evento'];
$horario_evento = $_POST['horario_evento'];
$vagas_evento = $_POST['vagas_evento'];
$imagem_evento = $_FILES['imagem_evento'];

for ($i = 0; $i < count($imagem_evento["name"]); $i++) {
    $nome_imagem = time() . "_" . $imagem_evento['name'][$i];

    move_uploaded_file(
        $imagem_evento['tmp_name'][$i],
        '../uploads/' . $nome_imagem
    );
}

$sql = "INSERT INTO eventos (titulo_evento, descricao_evento, categoria_evento, palestrante_evento, local_evento, data_evento, horario_evento, vagas_evento, imagem_evento)
            VALUES (:titulo_evento, :descricao_evento, :categoria_evento, :palestrante_evento, :local_evento, :data_evento, :horario_evento, :vagas_evento, :imagem_evento)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':titulo_evento', $titulo_evento);
$stmt->bindParam(':descricao_evento', $descricao_evento);
$stmt->bindParam(':categoria_evento', $categoria_evento);
$stmt->bindParam(':palestrante_evento', $palestrante_evento);
$stmt->bindParam(':local_evento', $local_evento);
$stmt->bindParam(':data_evento', $data_evento);
$stmt->bindParam(':horario_evento', $horario_evento);
$stmt->bindParam(':vagas_evento', $vagas_evento);
$stmt->bindParam(':imagem_evento', $nome_imagem);
$stmt->execute();
