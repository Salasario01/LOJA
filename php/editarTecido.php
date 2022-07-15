<?php
require_once("conexaoBanco.php");

$idTecido=$_POST['idTecido'];

$nome=$_POST['nome'];
$cor=$_POST['cor'];
$valor=$_POST['valor'];


$comando="UPDATE tecidos SET nome='".$nome."', cor='".$cor."',
 valor='".$valor."' WHERE idTecido=".$idTecido;

$resultado=mysqli_query($conexao, $comando);



header("Location: ../index.php");








?>