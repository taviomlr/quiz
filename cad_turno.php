<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    
    <title class="aviso">
        Cadastrar Turno
    </title>
</head>

<body>

<div class="container">
    <br>
    <h1>Adicionar Turno</h1>
    
    <form method="POST" class="form-inline" action="action_cad_turno.php">
        <div class="row">
            <div class="col">
                <input type="text" name="nome_turno" class="form-control" placeholder="Nome do Turno">
            </div>
        </div>
        <br>
        <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Adicionar" class="form-control">
                <a class="btn btn-info" href="index.php" class="form-control">Voltar</a>
            </div>
    </form>

<br>
<h3>Turnos</h3>
<?php 
require 'conect.php';

$lista = [];

$sql = $pdo->query("SELECT * FROM cad_turno ORDER BY id_turno");
if($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<div class="table-responsive">
        <table class="table table-hover"  width="100%">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>TURNO</th>
                    <th>AÇÕES</th>
                </tr>
                </thead>    
                <tbody>
                    <?php foreach($lista as $turno): ?>
                    <tr>
                        <td><?=$turno['id_turno'];?></td>
                        <td><?=$turno['nome_turno'];?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="edit_turno.php?id_turno=<?=$turno['id_turno'];?>">Editar</a>
                            <a class="btn btn-danger btn-sm" href="action_del_turno.php?id_turno=<?=$turno['id_turno'];?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>    
        </table>
    </div> 

    </div>

<script type="text/javascript" src="assets/js/code.jquery.comjquery-3.6.0.min.js"/>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"/>
</body>

</html>