<?php
require 'conect.php';

$id_turno = filter_input(INPUT_POST, 'id_turno');
$nome_turno = filter_input(INPUT_POST, 'nome_turno');

if ($id_turno && $nome_turno) {

    $sql = $pdo->prepare("UPDATE cad_turno SET nome_turno = :nome_turno WHERE id_turno = :id_turno");
    $sql->bindValue(':nome_turno', $nome_turno);
    $sql->bindValue(':id_turno', $id_turno);
    $sql->execute();

    header("Location: cad_turno.php");
    exit;

} else {
    header("Location: index.php");
    exit;
}

