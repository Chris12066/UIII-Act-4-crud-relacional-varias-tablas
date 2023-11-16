<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo carro</h1>
	<form method="post" action="nuevo.php">
		<label for="id_carro">Id del carro:</label>
		<input class="form-control" name="id_carro" required type="text" id="id_carro" placeholder="Escribe el id del carro">

		<label for="marca">Marca:</label>
		<input class="form-control" name="marca" required type="text" id="marca" placeholder="Marca del carro">

		<label for="modelo">Modelo:</label>
		<input class="form-control" name="modelo" required type="text" id="modelo" placeholder="Modelo del carro">

		<label for="anio">Año:</label>
		<input class="form-control" name="anio" required type="text" id="anio" placeholder="Año del carro">

		<label for="color">Color:</label>
		<input class="form-control" name="color" required type="text" id="color" placeholder="Color del carro">

		<label for="tipo">Tipo:</label>
		<input class="form-control" name="tipo" required type="text" id="tipo" placeholder="Tipo del carro">

		<label for="cilindros">Cilindros:</label>
		<input class="form-control" name="cilindros" required type="number" id="cilindros" placeholder="Cilindros del carro">

		<label for="precio">Precio:</label>
		<input class="form-control" name="precio" required type="text" id="precio" placeholder="Precio del carro">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>