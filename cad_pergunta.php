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
    $lista3 = [];
    $sql3 = $pdo->query("SELECT * FROM cad_disciplina ORDER BY id_disciplina");
    if($sql3->rowCount() > 0) 
    {
        $lista3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
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
        
        <form method="POST" class="form-inline" action="action_cad_pergunta.php">
            <div class="row">
                <div class="col">
                    <input type="text" name="pergunta" class="form-control" placeholder="Pergunta">
                </div>
                <br>
                <br>
                <div>
                    <select class="form-control" name="classe">
                        <option>Selecione uma classe...</option>
                        
                        <?php foreach($lista1 as $classe): ?>
                        <option value="<?php echo $classe['id_classe'] ?>"><?php echo $classe['nome_classe'] ?></option>    
                        <?php endforeach; ?>

                    </select>
                    <br>
                    <select class="form-control" name="disciplina">
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
        <h1>Adicionar Alternativas</h1>

        <form method="POST" class="form-inline" action="action_cad_alternativa_pergunta.php">
            
            <div class="row">
                <div>
                    <input type="text" name="alternativa_a" class="form-control" placeholder="Alternativa a">
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
                        
                        <?php foreach($lista3 as $alternativa_correta): ?>
                        <option value="<?php echo $alternativa_correta['id_classe'] ?>"><?php echo $alternativa_correta['nome_classe'] ?></option>    
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