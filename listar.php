<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM tbl_carro;");
$carros = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Carros</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Id_Carro</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>AÑo</th>
					<th>Color</th>
					<th>Tipo</th>
					<th>Cilindros</th>
					<th>Precio</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($carros as $carro){ ?>
				<tr>
					<td><?php echo $carro->id ?></td>
					<td><?php echo $carro->id_carro ?></td>
					<td><?php echo $carro->marca ?></td>
					<td><?php echo $carro->modelo ?></td>
					<td><?php echo $carro->anio ?></td>
					<td><?php echo $carro->color ?></td>
					<td><?php echo $carro->tipo ?></td>
					<td><?php echo $carro->cilindros ?></td>
					<td><?php echo $carro->precio ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $carro->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $carro->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>