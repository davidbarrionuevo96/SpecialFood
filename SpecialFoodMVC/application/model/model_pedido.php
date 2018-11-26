<?php

class Model_Pedido extends Model{

    public function tomar($idpedido,$idUsuario){
        require('core/helpers/conexion.php');

        $sql="UPDATE pedido SET IdEstadoPedido='3',IdDelivery='$idUsuario' where IdPedido='$idpedido';";

        $result = mysqli_query($conexion, $sql);
    }
    
    public function entregado($idpedido){
        require('core/helpers/conexion.php');

        $sql="UPDATE pedido SET IdEstadoPedido='4' where IdPedido='$idpedido';";

        $result = mysqli_query($conexion, $sql);
    }


    /*
     1	Pendiente
2	Pagado
3	En Transito
4	Entregado
     */
}