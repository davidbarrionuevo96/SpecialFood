<?php

class Model_Cobranza extends Model{
    public function liquidardeliverys(){

		require('core/helpers/conexion.php');

        $sql = "UPDATE `Pedido`
				SET 
					LiquidadoDelivery = 1
					,FechaLiquidacionDelivery = now()
					,FechaModificacion = now()
				WHERE 
					IdEstadoPedido = 4
					AND FechaLiquidacionDelivery IS NULL
					AND LiquidadoDelivery IS NULL";

        $result = mysqli_query($conexion, $sql);
    }

    public function liquidarcomercios(){

		require('core/helpers/conexion.php');

        $sql = "UPDATE `Pedido`
				SET 
					LiquidadoComercio = 1
					,FechaLiquidacionComercio = now()
					,FechaModificacion = now()
				WHERE 
					IdEstadoPedido = 4
					AND FechaLiquidacionComercio IS NULL
					AND LiquidadoComercio IS NULL";

        $result = mysqli_query($conexion, $sql);
    }
}