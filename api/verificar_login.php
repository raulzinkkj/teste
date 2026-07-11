<?php
include '../conexao/conexao.php';

session_start();

$email_participante = $_POST['email_participante'];
$senha_participante = $_POST['senha_participante'];

$sql = "SELECT * FROM participantes WHERE email_participante = :email_participante";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':email_participante', $email_participante);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    if (password_verify($senha_participante, $usuario['senha_participante'])) {
        $_SESSION['id_participante'] = $usuario['id_participante'];
        $_SESSION['email_participante'] = $usuario['email_participante'];
        $_SESSION['senha_participante'] = $usuario['senha_participante'];

        echo json_encode([
            "sucesso" => true,
        ]);
    } else {
        echo json_encode([
            "sucesso" => false,
            "mensagem" => "Senha Inválida."
        ]);
    }
} else {
    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Usuário não encontrado."
    ]);
}
