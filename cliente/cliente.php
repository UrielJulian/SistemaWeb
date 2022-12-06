<?php 
    include '../session.php';
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM cliente";
    $query=mysqli_query($con,$sql);
   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Datos Cliente</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../style_m.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
    <nav>
			<ul>
			<li><a href="../menu.php">Inicio</a></li>
      <li><a href="../venta/venta.php">Ventas</a></li>
        <?php if($_SESSION['rol'] == 1) {?>
        <li><a href="../empleado/empleado.php">Empleados</a></li>
        <?php }?>
				<li><a href="cliente.php">Clientes</a></li>
				<li><a href="../garrafon/garrafon.php">Garrafones</a></li>
				<li><a href="#">Bienvenido, <?php echo $_SESSION['nombre']; ?></a>
				<div>

					<ul>
						<li class="titulo"><a href="../logout.php">Cerrar Sesión</a></li>
					</ul>
			
				</div>
            </li>
			</ul>
		</nav>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">

                                <a>Nombres</a>
                                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                                <a>Apellidos</a>
                                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">
                                <a>Telefono</a>
                                    <input type="text" class="form-control mb-3" name="telefono" placeholder="Telefono">
                                <a>Calle</a>
                                    <input type="text" class="form-control mb-3" name="calle" placeholder="Calle">
                                <a>Número</a>
                                    <input type="text" class="form-control mb-3" name="numero" placeholder="Número">
                                <a>Colonia</a>
                                    <input type="text" class="form-control mb-3" name="colonia" placeholder="Colonia">
                                <a>Municipio</a>
                                    <input type="text" class="form-control mb-3" name="Municipio" placeholder="Municipio">
                                    <input type="submit" class="btn btn-primary">
                                    
                                </form>

                        </div>

                        

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Id_Cliente</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Calle</th>
                                        <th>Número</th>
                                        <th>Colonia</th>
                                        <th>Municipio</th>
                                        <th>Operaciones</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['Id_Cliente']?></th>
                                                <th><?php  echo $row['nombres']?></th>
                                                <th><?php  echo $row['apellidos']?></th>
                                                <th><?php  echo $row['telefono']?></th>
                                                <th><?php  echo $row['calle']?></th>  
                                                <th><?php  echo $row['numero']?></th> 
                                                <th><?php  echo $row['colonia']?></th>
                                                <th><?php  echo $row['Municipio']?></th>  
                                                <th><a href="actualizar.php?id=<?php echo $row['Id_Cliente'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['Id_Cliente'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            <div>
                            <th><a href="../cliente/crearxml.php">CREAR XML</a></th>
            </div>
            <div>
            <th><a href="../cliente/descargarxml.php">DESCARGAR XML</a></th>
            </div>
            <th><a href="../cliente/crearjson.php">CREAR JSON</a></th>
            </div>
            <div>
            <th><a href="../cliente/descargarjson.php">DESCARGAR JSON</a></th>
                            </div>
                                
                            </table>

                        </div>
                    </div>  
            </div>
    </body>
</html>

