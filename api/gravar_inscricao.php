<?php

include '../conexao/conexao.php';

$id_evento = $_POST['id_evento'];
$id_participante = $_POST['id_participante'];
$data_inscricao = $_POST['data_inscricao'];
$telefone_participante = $_POST['telefone_participante'];

$sql = "INSERT INTO inscricoes (id_evento, id_participante, data_inscricao, telefone_participante)
        VALUES (:id_evento, :id_participante, :data_inscricao, :telefone_participante )";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id_evento', $id_evento);
$stmt->bindParam(':id_participante', $id_participante);
$stmt->bindParam(':data_inscricao', $data_inscricao);
$stmt->bindParam(':telefone_participante', $telefone_participante);
$stmt->bindParam(':senha_participante', $senha_participante);
$stmt->execute();
