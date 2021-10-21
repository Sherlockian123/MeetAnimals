<?php include("../template/cabecera.php");?>
<?php
						// incluye la conexión
						include_once('../crud_pdo/connection.php');

						$database = new Connection();
    					$db = $database->open();
						try{	
						    $sql = 'SELECT * FROM animales2 where idCategoria=3 ORDER BY especie ASC';
						    foreach ($db->query($sql) as $row) {
						    	?>
						    	<tr>
						    		
                                    <div class="card text-dark bg-warning disabled mb-4 text-center" style="max-width: 20rem ;">
                                    <div class="card-header"></div>
                                    <img class="card-img-top" src="<?php echo $row['imagen']; ?>" alt="">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                        <td><?php echo $row['especie']; ?></td>
                                        </h4>
                                        <p class="card-text"><td><?php echo $row['descripcion']; ?></td></p>
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