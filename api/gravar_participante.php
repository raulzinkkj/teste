<?php
include '../conexao/conexao.php';

$nome_participante = $_POST['nome_participante'];
$cpf_participante = $_POST['cpf_participante'];
$email_participante = $_POST['email_participante'];
$telefone_participante = $_POST['telefone_participante'];
$senha_participante = password_hash($_POST['senha_participante'], PASSWORD_DEFAULT);

$participante = [
    "nome_participante" => $nome_participante,
    "cpf_participante" => $cpf_participante,
    "email_participante" => $email_participante,
    "telefone_participante" => $telefone_participante,
    "senha_participante" => $senha_participante
];

// Caminho do arquivo JSON
$arquivo = "../participantes.json";

// Se o arquivo existir, lê os dados
if (file_exists($arquivo)) {
    $participantes = json_decode(file_get_contents($arquivo), true);
} else {
    $participantes = [];
}

// Adiciona o novo participante
$participantes[] = $participante;

// Salva novamente no JSON
file_put_contents(
    $arquivo,
    json_encode($participantes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);

echo "Participante cadastrado com sucesso!";