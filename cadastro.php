<?php
require 'config.php';

$nome_chapa = filter_input(INPUT_POST, 'nome-chapa');
$matricula_lider = filter_input(INPUT_POST, 'matricula-lider');
$nome_lider = filter_input(INPUT_POST, 'nome-lider');
$matricula_vice = filter_input(INPUT_POST, 'matricula-vice');
$nome_vice = filter_input(INPUT_POST, 'nome-vice');

$sql = $pdo->prepare("SELECT * FROM `cadastro-chapas` WHERE matricula_lider = :matricula_lider OR matricula_vice = :matricula_vice");
$sql->bindValue(':matricula_lider', $matricula_lider);
$sql->bindValue(':matricula_vice', $matricula_vice);
$sql->execute();

if ($sql->rowCount() === 0) {
    $sql = $pdo->prepare("INSERT INTO `cadastro-chapas` (nome_chapa, matricula_lider, nome_lider, matricula_vice, nome_vice) VALUES (:nome_chapa, :matricula_lider, :nome_lider, :matricula_vice, :nome_vice)");

    $sql->bindValue(':nome_chapa', $nome_chapa);
    $sql->bindValue(':matricula_lider', $matricula_lider);
    $sql->bindValue(':nome_lider', $nome_lider);
    $sql->bindValue(':matricula_vice', $matricula_vice);
    $sql->bindValue(':nome_vice', $nome_vice);
    $sql->execute();
} else {
    echo "<script>alert('O código da chapa, a matrícula do líder e a matrícula do vice-líder não podem se repetir.');</script>";

    header("Location: index.html");
    exit;
}

header("Location: index.html");
exit;

?>