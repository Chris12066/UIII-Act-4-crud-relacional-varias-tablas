<?php
if (!isset($_POST["id_carro"])) {
    return;
}

$id_carro = $_POST["id_carro"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_carro WHERE id_carro = ? LIMIT 1;");
$sentencia->execute([$id_carro]);
$carro = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$carro) {
    header("Location: ./vender.php?status=4");
    exit;
}
# Si no hay cantidad...
if ($carro->cantidad < 1) {
    header("Location: ./vender.php?status=5");
    exit;
}
session_start();
# Buscar carro dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->id_carro === $id_carro) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $carro->cantidad = 1;
    $carro->total = $carro->precio;
    array_push($_SESSION["carrito"], $carro);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $carro->cantidad) {
        header("Location: ./vender.php?status=5");
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio;
}
header("Location: ./vender.php");
