<?php
session_start();
include_once "encabezado.php";
if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<div class="col-xs-12">
	<h1>Vender</h1>
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div class="alert alert-success">
				<strong>¡Correcto!</strong> Venta realizada correctamente
			</div>
		<?php
		} else if ($_GET["status"] === "2") {
		?>
			<div class="alert alert-info">
				<strong>Venta cancelada</strong>
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div class="alert alert-info">
				<strong>Ok</strong> carro quitado de la lista
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div class="alert alert-warning">
				<strong>Error:</strong> El carro que buscas no existe
			</div>
		<?php
		} else if ($_GET["status"] === "5") {
		?>
			<div class="alert alert-danger">
				<strong>Error: </strong>El carro está agotado
			</div>
		<?php
		} else {
		?>
			<div class="alert alert-danger">
				<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
			</div>
	<?php
		}
	}
	?>
	<br>
	<form method="post" action="agregarAlCarrito.php">
		<label for="id_carro">Código de barras:</label>
		<input autocomplete="off" autofocus class="form-control" name="id_carro" required type="text" id="id_carro" placeholder="Escribe el código">
	</form>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id_Venta</th>
				<th>Id del carro</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Cantidad</th>
				<th>Precio total</th>
				<th>Quitar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($_SESSION["carrito"] as $indice => $carro) {
				$granTotal += $carro->total;
			?>
				<tr>
					<td><?php echo $carro->id ?></td>
					<td><?php echo $carro->id_carro ?></td>
					<td><?php echo $carro->marca ?></td>
					<td><?php echo $carro->modelo ?></td>
					<td>
						<form action="cambiar_cantidad.php" method="post">
							<input name="indice" type="hidden" value="<?php echo $indice; ?>">
							<input min="1" name="cantidad" class="form-control" required type="number" value="<?php echo $carro->cantidad; ?>">
						</form>
					</td>
					<td><?php echo $carro->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<h3>Total: <?php echo $granTotal; ?></h3>
	<form action="./terminarVenta.php" method="POST">
		<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
		<button type="submit" class="btn btn-success">Terminar venta</button>
		<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
	</form>
</div>
<?php include_once "pie.php" ?>