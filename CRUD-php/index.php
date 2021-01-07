<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CRUD usuários</title>

    <style>
        body{
            width:90%;
            margin: auto;
            margin-top:15px;
        }
        .button-area{
            display:flex;
            margin: 15px;
        }
        
    </style>
</head>
<body>
    <?php
        require 'config.php';

        $lista = [];
        $sql = $pdo->query("SELECT * FROM usuarios");

        if ($sql->rowCount() > 0) {
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>
    
    <div class="button-area">
        <a href="adicionar.php"><button class="btn btn-primary">ADICIONAR USUÁRIO</button></a>
    </div>

   

    <table class="table " >
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['id'];  ?></td>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $usuario['id'];?>"><button class="btn btn-primary">Editar</button></a>
                        <a href="excluir.php?id=<?php echo $usuario['id'];?>" onclick="return confirm('Tem certeza que deja excluir o funcionário ?')"><button class="btn btn-danger">Excluir</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

