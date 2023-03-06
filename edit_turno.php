<?php
require 'conect.php';

$info = [];

$id_turno = filter_input(INPUT_GET, 'id_turno');
if($id_turno) {

    $sql = $pdo->prepare("SELECT * FROM cad_turno WHERE id_turno = :id_turno");
    $sql->bindValue(':id_turno', $id_turno);
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
        Editar Turno
    </title>
</head>

<body>

<div class="container">
    <br>
    <h1>Editar Turno</h1>
    
    <form method="POST" class="form-inline" action="action_edit_turno.php">
    <input type="hidden" name="id_turno" value="<?=$info['id_turno'];?>">
        <div class="row">
            <div class="col">
                <input type="text" name="nome_turno" value="<?=$info['nome_turno'];?>" class="form-control" placeholder="Nome do Turno">
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