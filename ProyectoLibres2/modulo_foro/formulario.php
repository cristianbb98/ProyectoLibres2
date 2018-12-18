<?php
  require '../../clases_negocio/clase_conexion.php';
	if(isset($_GET["respuestas"]))
		$respuestas = $_GET['respuestas'];
	else
		$respuestas = 0;
	if(isset($_GET["identificador"]))
		$identificador = $_GET['identificador'];
	else
    $identificador = 0;
  if(isset($_GET["nombre"]))
		$nombre = $_GET['nombre'];
	else
    $nombre = 'CristianBetancourt0';
  if(isset($_GET["idLogin"]))
		$idLogin = $_GET['idLogin'];
	else
    $idLogin = '10';
    
    $conexion = new Conexion();
	$query = "SELECT * FROM  foro WHERE idForo = '$id' ORDER BY fecha DESC";
    $consulta = $conexion->prepare($query);
	$consulta->setFetchMode(PDO::FETCH_ASSOC);
	$consulta->execute();
?>
<table>
<form name="form" action="agregar.php" method="post">
	<input type="hidden" name="identificador" value="<?php echo $identificador;?>">
	<input type="hidden" name="respuestas" value="<?php echo $respuestas;?>">
  <input type="hidden" name="idLogin" value="<?php echo $idLogin;?>">
    <tr>
		<td>Autor </td>
		<td><input type="text" name="autor" value="<?php echo $nombre;?>"></td>
    </tr>
    <tr>
      <td>Titulo</td>
      <td><input type="text" name="titulo"></td>
    </tr>
    <tr>
      <td>Mensaje</td>
      <td><textarea name="mensaje" cols="50" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td><input type="submit" id="submit" name="submit" value="Enviar Mensaje"></td>
    </tr>
  </form>
</table>