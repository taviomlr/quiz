<?php
require 'conect.php';

$nome_turno = filter_input(INPUT_POST, 'nome_turno');

if ($nome_turno) {

    $sql = $pdo->prepare("SELECT * FROM cad_turno WHERE nome_turno = :nome_turno");
    $sql->bindValue(':nome_turno', $nome_turno);
    $sql->execute();

    if($sql->rowCount() === 0) {
        $sql = $pdo->prepare("INSERT INTO cad_turno (nome_turno) VALUES (:nome_turno)");
        $sql->bindValue(':nome_turno', $nome_turno);
        $sql->execute();
        
        header("Location: cad_turno.php");
        exit;
    } else {
        
        header("Location: cad_turno.php");
        exit;
    }    
    
} else {
    header("Location: index.php");
    exit;
}

?>