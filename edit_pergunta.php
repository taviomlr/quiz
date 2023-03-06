<?php
require 'conect.php';

$info = [];

$id_pergunta = filter_input(INPUT_GET, 'id_pergunta');
if($id_pergunta) {

    $sql = $pdo->prepare("SELECT * FROM cad_perguntas WHERE id_pergunta = :id_pergunta");
    $sql->bindValue(':id_pergunta', $id_pergunta);
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
    
    <form method="POST" class="form-inline" action="action_edit_pergunta.php">
    <input type="hidden" name="id_pergunta" value="<?=$info['id_pergunta'];?>">
        <div class="row">
            <div class="col">
                <input type="text" name="pergunta" value="<?=$info['pergunta'];?>" class="form-control" placeholder="Pergunta">
            </div>
        </div>
        <br>
        <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Salvar" class="form-control">
                <a class="btn btn-info" href="cad_turno.php" class="form-control">Voltar</a>
            </div>
    </form>


<script type="text/javascript" src="assets/js/code.jquery.comjquery-3.6.0.min.js"/>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"/>
</body>

</html>