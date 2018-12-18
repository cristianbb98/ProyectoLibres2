<?php
	require '../../clases_negocio/clase_conexion.php';
	
	if(isset($_POST["submit"])){
		if(!empty($_POST['mensaje'])){
			//$autor=$_POST['autor'];
			$titulo=$_POST['titulo'];
			$mensaje=$_POST['mensaje'];
			$respuestas=$_POST['respuestas'];
			$identificador=$_POST['identificador'];
			$idLogin=$_POST['idLogin'];
			$fecha=date("d-m-y");
		
			//Evitamos que el usuario ingrese HTML
			$mensaje = htmlentities($mensaje);
			
			$conexion=new Conexion();
			//Grabamos el mensaje en la base de datos.
			
			$query = "	INSERT INTO foro (idUsuario, titulo, mensaje, identificador) 
						VALUES ('$idLogin', '$titulo', '$mensaje', $identificador)	";
			
			echo $query;
						
		   	$consulta = $conexion ->prepare($query);
			 if($consulta->execute()){

			 }
			 else{


			 }
				
			 		
			/* si es un mensaje en respuesta a otro actualizamos los datos */
			if ((int)$identificador != 0)
			{
				$query2 = "UPDATE foro SET respuestas=".($respuestas+1)." WHERE identificador= $identificador ";
				$consulta = $conexion ->prepare($query2);
				if($consulta->execute()){

				}
				else{
   
   
				}
				Header("Location: foro.php?id=$identificador&idLogin=$idLogin");
				exit();
			}
			Header("Location: index.php");
		}
	}
?>