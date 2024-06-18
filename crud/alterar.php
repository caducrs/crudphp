<?php
    include('php/conexao.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_aluno WHERE id = '$id'";

    try{
        $resultado = $conn->query($sql);
        $valor = $resultado->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $E){
        echo "Erro ao consultar ".$E->getMessage();
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
          <a class="nav-link" href="#">Cadastrar Alunos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="consultar.php">Consultar Alunos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <form action="php/atualizar.php" method="post">
        <input class="form-control mt2"type="text" name="nome" value="<?= $valor['nome'] ?>">
        <input class="form-control mt2"type="text" name="idade" value="<?= $valor['idade'] ?>">
        <input class="form-control mt2"type="text" name="telefone" value="<?= $valor['telefone'] ?>">
        <input class="form-control mt2"type="text" name="email" value="<?= $valor['email'] ?>">
        <input class="form-control mt2"type="hidden" name="id" value="<?= $valor['id'] ?>">

        <input type="submit" value="Alterar">
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>