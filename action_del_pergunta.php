<?php
require 'conect.php';

$id_pergunta = filter_input(INPUT_GET, 'id_pergunta');
if($id_pergunta) {

    $sql = $pdo->prepare("DELETE FROM cad_pergunta WHERE id_pergunta = :id_pergunta");
    $sql->bindValue(':id_pergunta', $id_pergunta);
    $sql->execute();
}

header("Location: cad_pergunta.php");
exit;

?>
