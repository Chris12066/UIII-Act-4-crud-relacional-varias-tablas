<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["id_carro"]) || !isset($_POST["marca"]) || !isset($_POST["anio"]) || !isset($_POST["modelo"]) || !isset($_POST["color"]) || !isset($_POST["tipo"]) || !isset($_POST["cilindros"]) || !isset($_POST["precio"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_carro = $_POST["id_carro"];
$marca = $_POST["marca"];
$anio = $_POST["anio"];
$modelo = $_POST["modelo"];
$color = $_POST["color"];
$tipo = $_POST["tipo"];
$cilindros = $_POST["cilindros"];
$precio = $_POST["precio"];

$sentencia = $base_de_datos->prepare("INSERT INTO tbl_carro(id_carro, marca, anio, modelo, color, tipo, cilindros, precio) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_carro, $marca, $anio, $modelo, $color, $tipo, $cilindros, $precio]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>