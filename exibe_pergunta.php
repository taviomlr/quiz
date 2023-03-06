<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    
    <title class="aviso">
        Cadastrar Perguntas
    </title>
</head>

<body>

<div class="container">
    <br>
    <h1>Adicionar Perguntas</h1>
        <div class="form-group">
            <a class="btn btn-primary" href="cad_questoes.php" class="form-control">Adicionar</a>
            <a class="btn btn-info" href="index.php" class="form-control">Voltar</a>
        </div>
    <br>
    <h3>Perguntas</h3>
    <?php 
    require 'conect.php';

    $lista = [];

    #$sql = $pdo->query("SELECT * FROM cad_perguntas ORDER BY id_pergunta");
    $sql = $pdo->query("SELECT * FROM cad_questoes INNER JOIN cad_classe ON cad_classe.id_classe = cad_questoes.classe INNER JOIN cad_disciplina ON cad_disciplina.id_disciplina = cad_questoes.disciplina");
    if($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    ?>

    <div class="table-responsive">
        <table class="table table-hover"  width="100%">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>PERGUNTA</th>
                    <th>CLASSE</th>
                    <th>DISCIPLINA</th>
                    <th>AÇÕES</th>
                </tr>
                </thead>    
                <tbody>
                    <?php foreach($lista as $pergunta): ?>
                    <tr>
                        <td><?=$pergunta['id'];?></td>
                        <td><?=$pergunta['pergunta'];?></td>
                        <td><?=$pergunta['classe'];?></td>
                        <td><?=$pergunta['disciplina'];?></td>

                        <td>
                        <a class="btn btn-info btn-sm" href="view_questoes.php?id=<?=$pergunta['id'];?>">Visualizar Pergunta</a>
                            <a class="btn btn-info btn-sm" href="edit_questoes.php?id=<?=$pergunta['id'];?>">Editar Pergunta</a>
                            <a class="btn btn-danger btn-sm" href="action_del_questoes.php?id=<?=$pergunta['id'];?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
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