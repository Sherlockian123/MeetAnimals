<?php //seguridad de sesiones
session_start();
$varsesion = $_SESSION['usuario'];
if($varsesion== null || $varsesion==''){
	header("location:mipagina/login.php");
	die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Administrator</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
</head>
<body>

<?php $url ="http://".$_SERVER['HTTP_HOST']."/mipagina"?>



<div class="container">
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  		<a class="navbar-brand" href="code.html" target="_blank">LOGO</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

	  	<div class="collapse navbar-collapse" id="navbarColor02">
		    <ul class="navbar-nav mr-auto">
		      	<li class="nav-item">
		        <a class="nav-link" href="<?php echo $url;?>" target="_blank">Ver sitio web </a>
		      	</li>

				  <li class="nav-item">
		        <a class="nav-link" href="#" target="_blank">Usuarios </a>
		      	</li>

				<li class="nav-item">
		        <a class="nav-link" href="add_news.php" >Noticias </a>
		      	</li>

		      	<li class="nav-item dropdown">
	              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">Redes Sociales <span class="caret"></span></a>
	              <div class="dropdown-menu" aria-labelledby="download">
	                <a class="dropdown-item" href="https://www.facebook.com/AnthonCode" target="_blank">facebook</a>
	                <div class="dropdown-divider"></div>
	                <a class="dropdown-item" href="https://www.youtube.com/c/AnthonCode" target="_blank">youtube</a>
	                
	              </div>
	            </li>

				<li class="nav-item">
		        <a class="nav-link" href="<?php echo $url; ?>/cerrarSesion.php" >Cerrar Sesion </a>
		      	</li>
		      	
		    </ul>
		    
	  	</div>
	</nav>
	<h1 class="page-header text-center">Administrator</h1>
	<div class="row">
		<div class="col-sm-12">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="fa fa-plus"></span> Nuevo</a>
        	<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>ID</th>
					<th>Especie</th>
					<th>Descripcion</th>
					<th>Categoria</th>
					<th>Imagen</th>
					<th>Acción</th>
				</thead>
				<tbody>
					<?php
						// incluye la conexión
						include_once('connection.php');

						$database = new Connection();
    					$db = $database->open();
						try{	
						    $sql = 'SELECT * FROM animales2';
						    foreach ($db->query($sql) as $row) {
						    	?>
						    	<tr>
						    		<td><?php echo $row['id']; ?></td>
						    		<td><?php echo $row['especie']; ?></td>
						    		<td><?php echo $row['descripcion']; ?></td>
									<td><?php echo $row['idCategoria']; ?></td>
						    		<td><?php echo $row['imagen']; ?></td>
									
									
						    		<td>
						    			<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
						    			<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
						    		</td>
						    		<?php include('edit_delete_modal.php'); ?>
						    	</tr>
						    	<?php 
						    }
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						//cerrar conexión
						$database->close();

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('add_modal.php'); ?>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/custom.js"></script>
</body>
</html>
