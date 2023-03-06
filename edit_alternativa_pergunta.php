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
        Editar Alternativa
    </title>
</head>

<body>

    <div class="container">
        <br>
        <h1>Editar Alternativa</h1>
        
        <form method="POST" class="form-inline" action="action_cad_pergunta.php">
            <div class="row">
                <div>
                    <input type="text" name="alternativa_a" class="form-control" placeholder="Alternativa a">
                </div>
                <br><br>
                <div>
                    <input type="text" name="alternativa_b" class="form-control" placeholder="Alternativa b">
                </div>
                <br><br>
                <div>
                    <input type="text" name="alternativa_c" class="form-control" placeholder="Alternativa c">
                </div>
                <br><br>
                <div>
                    <input type="text" name="alternativa_d" class="form-control" placeholder="Alternativa d">
                </div>
                <br><br>
                <div>
                    <input type="text" name="alternativa_e" class="form-control" placeholder="Alternativa e">
                </div>
                <br><br>
                     
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
                    <select class="form-control" name="classe">
                        <option>Selecione...</option>
                        
                        <?php foreach($lista1 as $classe): ?>
                        <option value="<?php echo $classe['id_classe'] ?>"><?php echo $classe['nome_classe'] ?></option>    
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