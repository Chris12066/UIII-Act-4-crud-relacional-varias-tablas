<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_carro WHERE id = ?;");
$sentencia->execute([$id]);
$carro = $sentencia->fetch(PDO::FETCH_OBJ);
if($carro === FALSE){
	echo "¡No existe algún carro con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar carro con el ID <?php echo $carro->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $carro->id; ?>">
	
			<label for="id_carro">Id del carro:</label>
			<input value="<?php echo $carro->id_carro ?>" class="form-control" name="id_carro" required type="text" id="id_carro" placeholder="Escribe el id del carro">

			<label for="marca">Marca:</label>
			<input value="<?php echo $carro->marca ?>" class="form-control" name="marca" required type="text" id="marca" placeholder="Marca del carro">

			<label for="modelo">Modelo:</label>
			<input value="<?php echo $carro->modelo ?>" class="form-control" name="modelo" required type="text" id="modelo" placeholder="Modelo del carro">

			<label for="anio">Año:</label>
			<input value="<?php echo $carro->anio ?>" class="form-control" name="anio" required type="text" id="anio" placeholder="Año del carro">

			<label for="color">Color:</label>
			<input value="<?php echo $carro->color ?>" class="form-control" name="color" required type="text" id="color" placeholder="Color del carro">

			<label for="tipo">Tipo:</label>
			<input value="<?php echo $carro->tipo ?>" class="form-control" name="tipo" required type="text" id="tipo" placeholder="Tipo del carro">

			<label for="cilindros">Cilindros:</label>
			<input value="<?php echo $carro->cilindros ?>" class="form-control" name="cilindros" required type="number" id="cilindros" placeholder="Cilindros del carro">

			<label for="precio">Precio:</label>
			<input value="<?php echo $carro->precio ?>" class="form-control" name="precio" required type="number" step="0.01" id="precio" placeholder="Año del carro">
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
