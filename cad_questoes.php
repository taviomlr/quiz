<?php 
    require 'conect.php';
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
        Cadastrar Pergunta
    </title>
</head>

<body>

    <div class="container">
        <br>
        <h1>Cadastrar Pergunta</h1>
        
        <form method="POST" class="form-inline" action="action_cad_questoes.php">
            <div class="row">
                <div class="col">
                    <input required type="text" name="pergunta" class="form-control" placeholder="Pergunta">
                </div>
                <br>
                <br>
                <div class="col">
                    <input type="text" name="alternativa1" class="form-control" placeholder="Alternativa 1">
                </div>
                <br>
                <br>
                <div class="col">
                    <input type="text" name="alternativa2" class="form-control" placeholder="Alternativa 2">
                </div>
                <br>
                <br>
                <div class="col">
                    <input type="text" name="alternativa3" class="form-control" placeholder="Alternativa 3">
                </div>
                <br>
                <br>
                <div class="col">
                    <input type="text" name="alternativa4" class="form-control" placeholder="Alternativa 4">
                </div>
                <br>
                <br>
                <div class="col">
                    <input type="text" name="alternativa5" class="form-control" placeholder="Alternativa 5">
                </div>
                <br>
                <br>
                <div class="col">
                    <input required type="text" name="resposta" class="form-control" placeholder="Resposta">
                </div>
                <br>
                <br>
                <div class="col">
                    <input required type="text" name="pontuacao" class="form-control" placeholder="Pontuação">
                </div>
                <div>
                    <select required class="form-control" name="classe">
                        <option>Selecione uma classe...</option>
                        
                        <?php foreach($lista1 as $classe): ?>
                        <option value="<?php echo $classe['id_classe'] ?>"><?php echo $classe['nome_classe'] ?></option>    
                        <?php endforeach; ?>

                    </select>
                    <br>
                    <select required class="form-control" name="disciplina">
                        <option>Selecione uma disciplina...</option>
                        
                        <?php foreach($lista2 as $disciplina): ?>
                        <option value="<?php echo $disciplina['id_disciplina'] ?>"><?php echo $disciplina['nome_disciplina'] ?></option>    
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
        <br>
    </div>




    <script type="text/javascript" src="assets/js/code.jquery.comjquery-3.6.0.min.js"/>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"/>
</body>

</html>