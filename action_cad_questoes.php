
<?php
require 'conect.php';

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

if ($pergunta && $classe && $disciplina) {

    $sql = $pdo->prepare("SELECT * FROM cad_questoes WHERE pergunta = :pergunta");
    $sql->bindValue(':pergunta', $pergunta);
    $sql->execute();

    if($sql->rowCount() === 0) {
        $sql = $pdo->prepare("INSERT INTO cad_questoes (pergunta, alternativa1, alternativa2, alternativa3, alternativa4, alternativa5, resposta, pontuacao, classe, disciplina) VALUES (:pergunta, :alternativa1, :alternativa2, :alternativa3, :alternativa4, :alternativa5, :resposta, :pontuacao, :classe, :disciplina)");
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
        
        header("Location: cad_questoes.php");
        exit;
    } else {
        
        header("Location: cad_questoes.php");
        exit;
    }    
    
} else {
    header("Location: index.php");
    exit;
}

?>