<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, fecha, total FROM ventas WHERE id = ?");
$sentencia->execute([$id]);
$venta = $sentencia->fetchObject();
if (!$venta) {
    exit("No existe venta con el id proporcionado");
}

$sentenciacarros = $base_de_datos->prepare("SELECT c.id_carro, c.marca,c.precio, cv.cantidad
FROM tbl_carro c
INNER JOIN 
carros_vendidos cv
ON c.id = cv.id_carro
WHERE cv.id_venta = ?");
$sentenciacarros->execute([$id]);
$carros = $sentenciacarros->fetchAll();
if (!$carros) {
    exit("No hay carros");
}

?>
<style>
    * {
        font-size: 12px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.carro,
    th.carro {
        width: 75px;
        max-width: 75px;
    }

    td.cantidad,
    th.cantidad {
        width: 50px;
        max-width: 50px;
        word-break: break-all;
    }

    td.precio,
    th.precio {
        width: 50px;
        max-width: 50px;
        word-break: break-all;
        text-align: right;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 175px;
        max-width: 175px;
    }

    img {
        max-width: inherit;
        width: inherit;
    }

    @media print {

        .oculto-impresion,
        .oculto-impresion * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">
        <img src="./logo.png" alt="Logotipo">
        <p class="centrado">TICKET DE VENTA
            <br><?php echo $venta->fecha; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANT</th>
                    <th class="carro">carro</th>
                    <th class="precio">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($carros as $carro) {
                    $subtotal = $carro->precio * $carro->cantidad;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $carro->cantidad;  ?></td>
                        <td class="carro"><?php echo $carro->marca;  ?> <strong>$<?php echo number_format($carro->precio, 2) ?></strong></td>
                        <td class="precio">$<?php echo number_format($subtotal, 2)  ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="precio">
                        <strong>$<?php echo number_format($total, 2) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./ventas.php";
        }, 1000);
    });
</script>