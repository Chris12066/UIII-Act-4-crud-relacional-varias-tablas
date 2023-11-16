<?php
if(!isset($_POST["total"])) exit;


session_start();


$total = $_POST["total"];
include_once "base_de_datos.php";


$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO ventas(fecha, total) VALUES (?, ?);");
$sentencia->execute([$ahora, $total]);

$sentencia = $base_de_datos->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO carros_vendidos(id_carro, id_venta, cantidad) VALUES (?, ?, ?);");
// $sentenciacolor = $base_de_datos->prepare("UPDATE carros SET color = color - ? WHERE id = ?;");
foreach ($_SESSION["carrito"] as $carro) {
	$total += $carro->total;
	$sentencia->execute([$carro->id, $idVenta, $carro->cantidad]);
	// $sentenciacolor->execute([$carro->cantidad, $carro->id]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>