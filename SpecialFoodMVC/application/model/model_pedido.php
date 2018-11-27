<?php

class Model_Pedido extends Model{

    public function tomar($idpedido,$idUsuario){
        require('core/helpers/conexion.php');

        $tiempoEntrega = (int)rand(15, 45);

        $sql="UPDATE pedido SET IdEstadoPedido='3', IdDelivery='$idUsuario', TiempoEstimadoEntrega=$tiempoEntrega, FechaModificacion = now() where IdPedido='$idpedido';";

        $result = mysqli_query($conexion, $sql);        
    }
    
    public function entregado($idpedido){
        require('core/helpers/conexion.php');

        $sql="UPDATE pedido SET IdEstadoPedido='4', FechaModificacion = now() where IdPedido='$idpedido';";

        $result = mysqli_query($conexion, $sql);

        $sql = "SELECT 
                    CASE WHEN
                        CASE WHEN 
                            TIMESTAMPDIFF(MINUTE, FechaModificacion, FechaPedido) < 1 
                            THEN TIMESTAMPDIFF(MINUTE, FechaModificacion, FechaPedido) * -1 
                            ELSE TIMESTAMPDIFF(MINUTE, FechaModificacion, FechaPedido) 
                        END
                        > TiempoEstimadoEntrega 
                        THEN 1 
                        ELSE 2 
                    END Penalizar
                FROM 
                    `Pedido`
                WHERE 
                    BajaLogica = 0
                    AND IdPedido = $idpedido;";

        $result = mysqli_query($conexion, $sql);

        $rows = mysqli_fetch_assoc($result);

        if(isset($rows))
        {
            $data["Penalizar"] = $rows['Penalizar'];

            return $data;
        }
    }

    public function crearPenalidad($idpedido){
        require('core/helpers/conexion.php');

        $sql="INSERT INTO PenalidadDelivery 
                (IdDelivery,
                IdPedido,
                MontoPenalidad,
                TiempoExcedido, 
                BajaLogica, 
                FechaModificacion, 
                IdUsuarioModificacion) 
              VALUES(
                (select iddelivery from pedido where idpedido = $idpedido),
                $idpedido,
                (select ((CostoEntrega * 0.5) / 100) from pedido where idpedido = $idpedido),
                (select TIMESTAMPDIFF(MINUTE, FechaModificacion, FechaPedido) from pedido where idpedido = $idpedido),
                0,
                now(),
                1);";

        $result = mysqli_query($conexion, $sql);
    }

    /*
     1	Pendiente
2	Pagado
3	En Transito
4	Entregado
     */
}