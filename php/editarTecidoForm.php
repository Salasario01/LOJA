<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editarTecidoForm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    
</body>
</html>

<?php
require_once("conexaoBanco.php");

$idTecido=$_POST['idTecido'];

$comando="SELECT * FROM tecidos WHERE idTecido=".$idTecido;
$resultado=mysqli_query($conexao, $comando);
$c=mysqli_fetch_assoc($resultado);



?>

<form action="editarTecido.php" method="POST">
                  
                   <h1>   Edição de tecidos   </h1>

                <input type="hidden" value="<?=$c['idTecido']?>" name="idTecido">

                <label for="nome"><b>Nome: </b></label>
                <input required type="text" value="<?=$c['nome']?>" name="nome" id="nome">          
                <br>
                <br>
                <label for="cor"><b>Cor: </b></label>
                <input required type="text" value="<?=$c['cor']?>" name="cor" id="cor">
                <br>
                <br>
                <label for="valor"><b>Valor: </b> </label>
                <input required type="number" value="<?=$c['valor']?>" name="valor" id="valor">
                <br>
                <br>
                <button type="submit" ><b>Editar</b></button>
                <button type="reset" ><b>Limpar</b> </button>
            
</form>



</body>
</html>
