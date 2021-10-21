<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO animales2 (especie, descripcion, idCategoria, imagen) VALUES (:especie, :descripcion, :idCategoria, :imagen)");
			// declaración if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':especie' => $_POST['especie'] , ':descripcion' => $_POST['descripcion'] , ':idCategoria' => $_POST['idCategoria'], ':imagen' => $_POST['imagen'])) ) ? 'Agregado correctamente' : 'Something went wrong. Cannot add member';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: index.php');
	
?>
