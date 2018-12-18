<?php
	require '../../clases_negocio/clase_conexion.php';
	if(isset($_GET["id"]))
	$id = $_GET['id'];
	if(isset($_GET["idLogin"]))
	$idLogin = $_GET['idLogin'];

	$conexion = new Conexion();
	$query = "SELECT * FROM  foro WHERE idForo = '$id' ORDER BY fecha DESC";
    $consulta = $conexion->prepare($query);
	$consulta->setFetchMode(PDO::FETCH_ASSOC);
	$consulta->execute();
	
	while($row = $consulta->fetch()){
		$id = $row['idForo'];
		$titulo = $row['titulo'];
		//$autor = $row['autor'];
		$mensaje = $row['mensaje'];
		$fecha = $row['fecha'];
		$respuestas = $row['respuestas'];
		
		echo "<tr><td>$titulo</tr></td>";
		echo "<table>";
		//echo "<tr><td>autor: $autor</td></tr>";
		echo "<tr><td>$mensaje</td> </tr>";
		echo "</table>";
		echo "<br /><br /><a href='formulario.php?id&respuestas=$respuestas&identificador=$id&idLogin=$idLogin'>Responder</a><br/>";
	}
	
	$query2 = "SELECT * FROM foro WHERE identificador = '$id' ORDER BY fecha DESC";
	$consulta = $conexion->prepare($query2);
	//$consulta->setFetchMode(PDO::FETCH_ASSO);
	$consulta->execute();

	echo "<br />respuestas:<br /><br />";
	while($row = $consulta->fetch()){
		$id = $row['idForo'];
		$titulo = $row['titulo'];
		//$autor = $row['autor'];
		$mensaje = $row['mensaje'];
		$fecha = $row['fecha'];
		$respuestas = $row['respuestas'];
		
		echo "<tr><td>$titulo</tr></td>";
		echo "<table>";
		//echo "<tr><td>autor: $autor</td></tr>";
		echo "<tr><td>$mensaje</td></tr>";
		echo "</table>";
		echo "<br /><br /><a href='formulario.php?id&respuestas=$respuestas&identificador=$id&idLogin=$idLogin'>Responder</a><br />";
	}
?>