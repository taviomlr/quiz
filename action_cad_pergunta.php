
<?php
require 'conect.php';

$pergunta = filter_input(INPUT_POST, 'pergunta');
$classe = filter_input(INPUT_POST, 'classe');
$disciplina = filter_input(INPUT_POST, 'disciplina');

if ($pergunta && $classe && $disciplina) {

    $sql = $pdo->prepare("SELECT * FROM cad_perguntas WHERE pergunta = :pergunta");
    $sql->bindValue(':pergunta', $pergunta);
    $sql->execute();

    if($sql->rowCount() === 0) {
        $sql = $pdo->prepare("INSERT INTO cad_perguntas (pergunta, classe, disciplina) VALUES (:pergunta, :classe, :disciplina)");
        $sql->bindValue(':pergunta', $pergunta);
        $sql->bindValue(':classe', $classe);
        $sql->bindValue(':disciplina', $disciplina);
        $sql->execute();
        
        header("Location: cad_pergunta.php");
        exit;
    } else {
        
        header("Location: cad_pergunta.php");
        exit;
    }    
    
} else {
    header("Location: index.php");
    exit;
}

?>