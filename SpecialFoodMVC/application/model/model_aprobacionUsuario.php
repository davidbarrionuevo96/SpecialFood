<?php

class Model_aprobacionUsuario extends Model{

    public function getListAprobacionUsuario(){

        require('core/helpers/conexion.php');

        $sql = "select * 
                from Usuario
                WHERE IdEstadoAprobacionUsuario = 1
                AND (IdPerfil = 2
                OR IdPerfil = 3)";

        $result = mysqli_query($conexion,$sql);

        $MenuComercio = array();

        while($rows=mysqli_fetch_assoc($result))
        {
            $MenuComercio[] = $rows;
        }

        return $MenuComercio;
    }

    public function Aceptar($id, $idcomercio){

        require('core/helpers/conexion.php');

        
        if(isset($idcomercio))
        {
            $sql3 = "SELECT COUNT(*) as Cantidad
                    FROM UsuarioComercio uc
                    LEFT JOIN Usuario u ON u.IdUsuario = uc.IdUsuario and u.BajaLogica = 0
                    WHERE uc.IdComercio = '$idcomercio' ANd u.IdEstadoAprobacionUsuario = 2;
                    ";

            $result3 = mysqli_query($conexion,$sql3);
            
            $data=mysqli_fetch_assoc($result3);

            if($data['Cantidad'] <= 5){
                    $sql = "update Usuario
                    SET IdEstadoAprobacionUsuario = 2
                    where IdUsuario = '$id';";

                $result = mysqli_query($conexion,$sql);

            }else{
                return $MenuComercio = null;
            }
        }else{
            
            $sql = "update Usuario
                SET IdEstadoAprobacionUsuario = 2
                where IdUsuario = '$id';";

            $result = mysqli_query($conexion,$sql);
        }
        
        $sql2 = "select * 
                from Usuario
                WHERE IdEstadoAprobacionUsuario = 1
                AND (IdPerfil = 2
                OR IdPerfil = 3)";
        
        $result2 = mysqli_query($conexion,$sql2);

        $MenuComercio = array();

        while($rows=mysqli_fetch_assoc($result2))
        {
            $MenuComercio[] = $rows;
        }

        return $MenuComercio;
    }

    public function Rechazar($id){

        require('core/helpers/conexion.php');

        $sql = "update Usuario
                SET IdEstadoAprobacionUsuario = 3
                where IdUsuario = '$id';";

        $result = mysqli_query($conexion,$sql);

        $sql2 = "select * 
                from Usuario
                WHERE IdEstadoAprobacionUsuario = 1
                AND (IdPerfil = 2
                OR IdPerfil = 3)";
        
        $result2 = mysqli_query($conexion,$sql2);

        $MenuComercio = array();

        while($rows=mysqli_fetch_assoc($result2))
        {
            $MenuComercio[] = $rows;
        }

        return $MenuComercio;
    }
}