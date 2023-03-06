
<?php
require 'conect.php';

$alternativa = filter_input(INPUT_POST, 'alternativa');

if ($alternativa) {

    $sql = $pdo->prepare("SELECT * FROM cad_perguntas WHERE pergunta = :pergunta");
    $sql->bindValue(':pergunta', $pergunta);
    $sql->execute();

    if($sql->rowCount() === 0) {
        $sql = $pdo->prepare("INSERT INTO cad_alternativas (alternativa, letra, pergunta) VALUES (:alternativa, :letra, :pergunta)");
        $sql->bindValue(':alternativa', $alternativa);
        $sql->bindValue(':letra', $letra);
        $sql->bindValue(':pergunta', $pergunta);
        $sql->execute();
        
        header("Location: cad_alternativa_pergunta.php");
        exit;
    } else {
        
        header("Location: cad_alternativa_pergunta.php");
        exit;
    }    
    
} else {
    header("Location: index.php");
    exit;
}

?>