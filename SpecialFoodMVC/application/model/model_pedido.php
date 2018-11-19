<?php

class Model_Pedido extends Model{
    public function guardar($costoentrega,$tiempoestimadoentrega,$idcomercio,$idcliente,$idpuntodeventa,$idusuariomodificacion){

        require('core/helpers/conexion.php');

            $sql = "INSERT INTO `specialfooddb`.`pedido`
                    (
                    `FechaPedido`,
                    `CostoEntrega`,
                    `TiempoEstimadoEntrega`,
                    `IdComercio`,
                    `IdCliente`,
                    `IdPuntoDeVenta`,
                    `BajaLogica`,
                    `FechaModificacion`,
                    `IdUsuarioModificacion`)
                    VALUES
                    (
                    now(),
                    $costoentrega,
                    $tiempoestimadoentrega,
                    $idcomercio,
                    $idcliente,
                    $idpuntodeventa,
                    0,
                    now(),
                    $idusuariomodificacion);"
                    ;

            $result = mysqli_query($conexion, $sql);

            return 1;

    }
    public function eliminar($idpedido){
        require('core/helpers/conexion.php');

        $sql="UPDATE pedido SET BajaLogica='1' where IdPedido='$idpedido'";

        $result = mysqli_query($conexion, $sql);
    }
}