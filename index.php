<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <main>
        <div class="col-md-6 col-lg-7 d-flex align-items-center">
       <form action="php/cadastrarTecido.php" method="POST">
            
                 <H1>Cadastro de tecidos</H1>

                <label for="nome"><b>Nome:</b> </label>
                <input required type="text"  name="nome" >          
                <br>
                <br>
                <label for="cor"><b>Cor: </b></label>
                <input required type="text" name="cor" >
                <br>
                <br>
                <label for="valor"><b>Valor:</b> </label>
                <input required type="number" name="valor" >
                <br>
                <br>
                <button type="submit" class="btn btn-success"  >  <b> Cadastrar </b> </button>
                <button type="reset" class="btn btn-danger" > <b>Limpra     </b> </button>
                <br>
                <br>
</form>
    </div>

    </main>
    
</body>
</html>
 <div class="card-body p-4 p-lg-5 text-black">
<form action="#" method="GET">
		<div >
		  <label  for="textoPesquisa" class="btn btn-warning" ><b> Pesquisa:</b>  </label>  			
			 <input  type="text" name="pesquisa">
			 <button type="submit" class="btn btn-warning" > 
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
             <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
            </button>			 
		</div>
</form>

<?php

require_once("php/conexaoBanco.php");

$comando="SELECT * FROM tecidos";

	if(isset($_GET['pesquisa']) &&  $_GET['pesquisa']!=""){
				$pesquisa = $_GET['pesquisa'];
				$comando = $comando . " WHERE nome LIKE '".$pesquisa."%'";
	}
			
	$resultado=mysqli_query($conexao, $comando);
    $tecidosRetornados= array();
	$linhas=mysqli_num_rows($resultado);

	if($linhas==0){
	echo "<br >Nenhum tecido foi encontrado !<br>";
	}else{
	while($c = mysqli_fetch_assoc($resultado)){
					array_push($tecidosRetornados, $c);
	} 
	foreach($tecidosRetornados as $c){
    echo"<table>";
    echo "<br>";	
	echo "<tr>";
	echo "<td><b> Nome:</b>".$c['nome']."</td><br><tr>";
	echo "<td><b> Cor:</b>".$c['cor']."</td><br><tr>";					
	echo "<td> <b>Valor:</b>".$c['valor']."</td><br><tr>";									
	echo "<br>";	
    echo "</table>";				
    ?>   

<form action="php/editarTecidoForm.php" method="POST" >
				<input type="hidden" name="idTecido" value="<?=$c['idTecido']?>">
				<button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
				</button>				
			    </form>

                <form action="php/excluirTecido.php" method="POST" >
				<input type="hidden" name="idTecido"  value="<?=$c['idTecido']?>">
				<button type="submit" class="btn btn-danger" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
				</button>				
			    </form>	


 <?php
} 
} 
?>

</div>