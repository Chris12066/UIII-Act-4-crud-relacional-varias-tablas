<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	tbl_carro.id_carro, '..',  tbl_carro.marca, '..', carros_vendidos.cantidad SEPARATOR '__') AS tbl_carro FROM ventas INNER JOIN carros_vendidos ON carros_vendidos.id_venta = ventas.id INNER JOIN tbl_carro ON tbl_carro.id = carros_vendidos.id_carro GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Carros vendidos</th>
					<th>Total</th>
					<th>Ticket</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Id_Carro</th>
									<th>Marca</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->tbl_carro) as $carrosConcatenados){ 
								$carro = explode("..", $carrosConcatenados)
								?>
								<tr>
									<td><?php echo $carro[0] ?></td>
									<td><?php echo $carro[1] ?></td>
									<td><?php echo $carro[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total ?></td>
					<td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $venta->id?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>