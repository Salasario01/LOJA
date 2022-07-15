<?php
require_once("conexaoBanco.php");

$nome=$_POST['nome'];
$cor=$_POST['cor'];
$valor=$_POST['valor'];


$comando="INSERT INTO tecidos (nome, cor, valor )
VALUES ('".$nome."', '".$cor."', '".$valor."')";

$resultado=mysqli_query($conexao, $comando);



header("Location: ../index.php");
 
?>