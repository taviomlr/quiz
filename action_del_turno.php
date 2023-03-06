<?php
require 'conect.php';

$id_turno = filter_input(INPUT_GET, 'id_turno');
if($id_turno) {

    $sql = $pdo->prepare("DELETE FROM cad_turno WHERE id_turno = :id_turno");
    $sql->bindValue(':id_turno', $id_turno);
    $sql->execute();
}

header("Location: cad_turno.php");
exit;

?>