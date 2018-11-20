<?php

class Model_Pedido extends Model{

    public function tomar($idpedido){
        require('core/helpers/conexion.php');

        //$sql="UPDATE pedido SET BajaLogica='1' where IdPedido='$idpedido'";
        $sql="UPDATE pedido SET IdEstadoEntrega='2' where IdPedido='$idpedido';";

        $result = mysqli_query($conexion, $sql);
    }
    public function entregado($idpedido){
        require('core/helpers/conexion.php');

        //$sql="UPDATE pedido SET BajaLogica='1' where IdPedido='$idpedido'";
        $sql="UPDATE pedido SET IdEstadoEntrega='3' where IdPedido='$idpedido';";

        $result = mysqli_query($conexion, $sql);
    }
}