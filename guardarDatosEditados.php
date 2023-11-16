<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["id_carro"]) || 
	!isset($_POST["marca"]) || 
	!isset($_POST["modelo"]) || 
	!isset($_POST["anio"]) || 
	!isset($_POST["color"]) || 
	!isset($_POST["tipo"]) || 
	!isset($_POST["cilindros"]) ||
	!isset($_POST["precio"]) ||  
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$id_carro = $_POST["id_carro"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$anio = $_POST["anio"];
$color = $_POST["color"];
$tipo = $_POST["tipo"];
$cilindros = $_POST["cilindros"];
$precio = $_POST["precio"];

$sentencia = $base_de_datos->prepare("UPDATE tbl_carro SET id_carro = ?, marca = ?, modelo = ?, anio = ?, color = ?, tipo = ?, cilindros = ?, precio = ? WHERE id = ?;");
$resultado = $sentencia->execute([$id_carro, $marca, $modelo, $anio, $color, $tipo, $cilindros, $precio, $id]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del carro";
?>