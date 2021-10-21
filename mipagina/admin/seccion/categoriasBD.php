<?php include("../template/cabecera.php");?>

<?php
		// incluye la conexión
		include_once('../crud_pdo/connection.php');

			$database = new Connection();
    		$db = $database->open();
				try{	
				    $sql = 'SELECT * FROM categorias';
			    foreach ($db->query($sql) as $row) {
						    	?>
		    	<tr>
						    		
                    <div class="card text-white bg-info mb-4 text-center" style="max-width: 20rem ;">
                        <div class="card-header"></div>
                            <img class="card-img-top" src="<?php echo $row['imagen']; ?>" alt="">
                        <div class="card-body">
                            <h4 class="card-title">
                            <td><?php echo $row['nombre']; ?></td>
                            </h4>
                        <p class="card-text"><td><?php echo $row['descripcion']; ?></td></p>
                            <a name="" id="" class="btn btn-primary" href="<?php echo $url; ?>/admin/seccion/Intento1.php" role="button">Ver Especies</a>
                        </div>
                        </div>
                           </td>
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


<?php include("../template/pie.php");?>