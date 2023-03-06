<?php
require 'conect.php';

$id = filter_input(INPUT_POST, 'id');
$pergunta = filter_input(INPUT_POST, 'pergunta');
$alternativa1 = filter_input(INPUT_POST, 'alternativa1');
$alternativa2 = filter_input(INPUT_POST, 'alternativa2');
$alternativa3 = filter_input(INPUT_POST, 'alternativa3');
$alternativa4 = filter_input(INPUT_POST, 'alternativa4');
$alternativa5 = filter_input(INPUT_POST, 'alternativa5');
$resposta = filter_input(INPUT_POST, 'resposta');
$pontuacao = filter_input(INPUT_POST, 'pontuacao');
$classe = filter_input(INPUT_POST, 'classe');
$disciplina = filter_input(INPUT_POST, 'disciplina');



if ($id && $pergunta) {

    $sql = $pdo->prepare("UPDATE cad_questoes SET pergunta = :pergunta, alternativa1 = :alternativa1, alternativa2 = :alternativa2, alternativa3 = :alternativa3, alternativa4 = :alternativa4, alternativa5 = :alternativa5, resposta = :resposta, pontuacao = :pontuacao, classe = :classe, disciplina = :disciplina WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':pergunta', $pergunta);
    $sql->bindValue(':alternativa1', $alternativa1);
    $sql->bindValue(':alternativa2', $alternativa2);
    $sql->bindValue(':alternativa3', $alternativa3);
    $sql->bindValue(':alternativa4', $alternativa4);
    $sql->bindValue(':alternativa5', $alternativa5);
    $sql->bindValue(':resposta', $resposta);
    $sql->bindValue(':pontuacao', $pontuacao);        
    $sql->bindValue(':classe', $classe);
    $sql->bindValue(':disciplina', $disciplina);
    $sql->execute();

    header("Location: exibe_pergunta.php");
    exit;

} else {
    header("Location: index.php");
    exit;
}
