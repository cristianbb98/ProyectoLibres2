<table width="1300px">
	<tr>
		<td width="300px">Usuario</td>
		<td width="300px">Título</td>
		<td width="300px">Fecha</td>
		<td width="300px">Número de respuestas</td>
		<td width="100px"></td>
	</tr>
<?php 
	if(isset($_GET["idLogin"]))
	$idLogin = $_GET['idLogin'];
	else $idLogin = 10;

	if(isset($_GET["nomnbre"]))
	$nombre = $_GET['nombre'];
	else $nombre = 'CB';


	require '../../clases_negocio/clase_conexion.php';
	$conexion = new Conexion();
	$query = "SELECT * FROM foro join usuario on(foro.idUsuario=usuario.idUsuario) WHERE foro.identificador = 0 ORDER BY fecha DESC";
    $consulta = $conexion->prepare($query);
	$consulta->setFetchMode(PDO::FETCH_ASSOC);
	$consulta->execute();

	while($row = $consulta->fetch()){
		$id = $row['idForo'];
		$usuario = $row['usuario'];
		$titulo = $row['titulo'];
		$fecha = $row['fecha'];
		$respuestas = $row['respuestas'];
		echo "<tr>";
			echo "<td>$usuario</td>";
			echo "<td>$titulo</td>";
			echo "<td>".date("d-m-y,$fecha")."</td>";
			echo "<td>$respuestas</td>";
			echo "<td><a href= foro.php?id=".$id."&idLogin=".$idLogin.">Revisar tema</a></td>";
		echo "</tr>";
	}
?>
</table>
<br>
<br>
<?php echo "<a href=formulario.php?idLogin=".$idLogin."&nombre="."$nombre"."> INSERTAR UN NUEVO TEMA </a>";


