<?php

require_once("conexaoBanco.php");

$idTecido=$_POST['idTecido'];

    $comando="DELETE FROM tecidos WHERE idTecido=".$idTecido;
    $exclusao=mysqli_query($conexao, $comando);
  

    header("Location: ../index.php");
   

?>