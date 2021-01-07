<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Editar</title>
    <style>
        .formulario{
            text-align: center;
            width: 350px;
            margin:auto;
        }

    </style>
</head>
<body>

<?php 

    require 'config.php';

    $id = filter_input(INPUT_GET, 'id');

    if ($id) {

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ( $sql->rowCount() > 0 ) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);
            
        }
        else {
            header("Location: index.php");
            exit;
        }

    }else{
        header("Location: index.php");
        exit;
    }

?>


    <form class="formulario" method="POST" action="editar_action.php">
        <h2>Editar Usuário</h2>

        <input type="hidden" name="id" value="<?php echo $info['id']; ?>" />

        <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="name" name="nome" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" value="<?php echo $info['nome']; ?>" placeholder="Escreva o nome">
            <small id="emailHelp" class="form-text text-muted">Nome do funcionário a ser cadastrado.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Entre com o email" value="<?php echo $info['email']; ?>">
        </div>


        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>