<?php
include '../conexao/conexao.php';

$nome_participante = $_POST['nome_participante'];
$cpf_participante = $_POST['cpf_participante'];
$email_participante = $_POST['email_participante'];
$telefone_participante = $_POST['telefone_participante'];
$senha_participante = password_hash($_POST['senha_participante'], PASSWORD_DEFAULT);

$sql = "INSERT INTO participantes (nome_participante, cpf_participante, email_participante, telefone_participante, senha_participante)
        VALUES (:nome_participante, :cpf_participante, :email_participante, :telefone_participante, :senha_participante)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':nome_participante', $nome_participante);
$stmt->bindParam(':cpf_participante', $cpf_participante);
$stmt->bindParam(':email_participante', $email_participante);
$stmt->bindParam(':telefone_participante', $telefone_participante);
$stmt->bindParam(':senha_participante', $senha_participante);
$stmt->execute();
