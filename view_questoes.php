<?php
require 'conect.php';

$info = [];

$id = filter_input(INPUT_GET, 'id');
if($id) {

    $sql = $pdo->prepare("SELECT * FROM cad_questoes INNER JOIN cad_classe ON cad_classe.id_classe = cad_questoes.classe INNER JOIN cad_disciplina ON cad_disciplina.id_disciplina = cad_questoes.disciplina");
    $sql->bindValue(':id', $id);
    $sql->execute();
    
    if($sql->rowCount() > 0) {

        $info = $sql->fetch( PDO::FETCH_ASSOC );
 
    } else {
        header("Location: index.php");
        exit;
    }

} else {
    header("Location: index.php");
    exit;
}

$lista1 = [];
$sql1 = $pdo->query("SELECT * FROM cad_classe ORDER BY id_classe");
if($sql1->rowCount() > 0) 
{
    $lista1 = $sql1->fetchAll(PDO::FETCH_ASSOC);
}
$lista2 = [];
$sql2 = $pdo->query("SELECT * FROM cad_disciplina ORDER BY id_disciplina");
if($sql2->rowCount() > 0) 
{
    $lista2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
}



?>

<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    
    <title class="aviso">
        Editar Pergunta
    </title>
</head>

<body>

<div class="container">
    <br>
    <h1>Editar Pergunta</h1>
    
    <form method="POST" class="form-inline" action="action_edit_questoes.php">
    <input type="hidden" name="id" value="<?=$info['id'];?>">
    <div class="row">
                <label>Pergunta</label>
                <div class="col">
                    <input readonly type="text" name="pergunta" value="<?=$info['pergunta'];?>" class="form-control" placeholder="Pergunta">
                </div>
                <br>
                <br>
                <label>Alternativa A</label>
                <div class="col">
                    <input readonly type="text" name="alternativa1" value="<?=$info['alternativa1'];?>" class="form-control" placeholder="Alternativa 1">
                </div>
                <br>
                <br>
                <label>Alternativa B</label>
                <div class="col">
                    <input readonly type="text" name="alternativa2" value="<?=$info['alternativa2'];?>" class="form-control" placeholder="Alternativa 2">
                </div>
                <br>
                <br>
                <label>Alternativa C</label>
                <div class="col">
                    <input readonly type="text" name="alternativa3" value="<?=$info['alternativa3'];?>" class="form-control" placeholder="Alternativa 3">
                </div>
                <br>
                <br>
                <label>Alternativa D</label>
                <div class="col">
                    <input readonly type="text" name="alternativa4" value="<?=$info['alternativa4'];?>" class="form-control" placeholder="Alternativa 4">
                </div>
                <br>
                <br>
                <label>Alternativa E</label>
                <div class="col">
                    <input readonly type="text" name="alternativa5" value="<?=$info['alternativa5'];?>" class="form-control" placeholder="Alternativa 5">
                </div>
                <br>
                <br>
                <label>Resposta</label>
                <div class="col">
                    <input readonly type="text" name="resposta" value="<?=$info['resposta'];?>" class="form-control" placeholder="Resposta">
                </div>
                <br>
                <br>
                <label>Pontuação</label>
                <div class="col">
                    <input readonly type="text" name="pontuacao" value="<?=$info['pontuacao'];?>" class="form-control" placeholder="Pontuação">
                </div>
                
                <div>
                <label>Classe</label>
                    <select readonly class="form-control" name="classe">
                        <optionreadonly >Selecione uma classe...</option>
                        
                        <?php foreach($lista1 as $classe): ?>
                            <option readonly value="<?php echo $classe['id_classe'] ?>"><?php echo $classe['nome_classe'] ?></option>    
                        <?php endforeach; ?>
                        
                        

                    </select>
                    <br>
                    <label>Disciplina</label>
                    <select readonly class="form-control" name="disciplina">
                        <option readonly >Selecione uma disciplina...</option>
                        
                        <?php foreach($lista2 as $disciplina): ?>
                        <option readonly value="<?php echo $disciplina['id_disciplina'] ?>"><?php echo $disciplina['nome_disciplina'] ?></option>    
                        <?php endforeach; ?>

                    </select>
                </div>
                
            </div>
            <br>
        <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Salvar" class="form-control">
                <a class="btn btn-info" href="exibe_pergunta.php" class="form-control">Voltar</a>
            </div>
    </form>


<script type="text/javascript" src="assets/js/code.jquery.comjquery-3.6.0.min.js"/>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"/>
</body>

</html>