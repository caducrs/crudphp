<?php
include('php/conexao.php');

$sql = "SELECT * FROM tb_aluno ORDER BY nome";

try{
    $resultado = $conn->query($sql);
}catch(PDOException $E){
    echo "Erro ao consultar ".$E->getMessage();
}
$i = 1;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastrar.php">Cadastrar Alunos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Consultar Alunos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container mt-5">
        <table class="table table-striped">
            <tr>
                <th>Nº</th>
                <th>Id</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Ação</th>
            </tr>
            <?php foreach($resultado as $valor){?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $valor['id'] ?></td>
                <td><?= $valor['nome'] ?></td>
                <td><?= $valor['idade'] ?></td>
                <td><?= $valor['telefone'] ?></td>
                <td><?= $valor['email'] ?></td>
                <td>
                    <a class="btn btn-warning" href="alterar.php?id=<?= $valor['id'] ?>">Alterar</a>
                    
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$valor['id']?>">
  Deletar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$valor['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deseja realmente deletar?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apagando <?=$valor['nome'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <a class="btn btn-danger" href="php/deletar.php?id=<?= $valor['id'] ?>">Deletar</a>
      </div>
    </div>
  </div>
</div>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>