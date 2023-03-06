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

$lista = [];
$sql = $pdo->query("SELECT * FROM cad_alternativas ORDER BY id_alternativa");
if($sql->rowCount() > 0) 
{
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    
    <title class="aviso">
        Cadastrar Alternativa
    </title>
</head>

<body>

    <div class="container">
        <br>
        <h1>Cadastrar Alternativa</h1>
        
        <form method="POST" class="form-inline" action="action_cad_alternativa_pergunta.php">
            <div class="row">
                <div>
                    <input type="text" name="alternativa" class="form-control" placeholder="Alternativa"><br>
                    <input type="text" name="letra" class="form-control" placeholder="Letra">
                </div>
                <br><br><br>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Adicionar" class="form-control">
                </div>
<br><br>
                <div>
                    <label>
                        <h3>
                            Resposta Correta
                        </h3>
                    </label>
                    <select class="form-control" name="letra">
                        <option>Selecione...</option>
                        
                        <?php foreach($lista as $resposta): ?>
                        <option value="<?php echo $resposta['id_alternativa'] ?>"><?php echo $resposta['letra'] ?></option>    
                        <?php endforeach; ?>

                    </select>
                    
                </div>
    
            </div>
            <br>
            <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Adicionar" class="form-control">
                    <a class="btn btn-info" href="exibe_pergunta.php" class="form-control">Voltar</a>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="assets/js/code.jquery.comjquery-3.6.0.min.js"/>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"/>
</body>

</html>