
<?php

class Model_menuitems extends Model{
    public function guardar($producto,$precio,$destino,$idMenu){

        require('core/helpers/conexion.php');
        $sql = "select mni.Descripcion d
                from MenuComercioItem mni 
                where mni.Descripcion='$producto'";

        $result=mysqli_query($conexion,$sql);

        $asd=mysqli_fetch_assoc($result);

        if(!($asd['d'] == $producto)) {
            $sql2 = "";
            $sql2 = "INSERT INTO MenuComercioItem 
                                ( 
                                   Descripcion, 
                                   Precio, 
                                   Foto, 
                                   IdMenuComercio, 
                                   BajaLogica, 
                                   FechaModificacion, 
                                   IdUsuarioModificacion 
                                )  
                                VALUES 
                                ( 
                                   '$producto', 
                                   $precio, 
                                 '" . $destino . "', 
                                   $idMenu, 
                                    0, 
                                   NOW(), 
                                    1 
                                );";


            $result2=mysqli_query($conexion,$sql2);

            return true;
        }
        else
        {
            return false;
        }

    }

    public function getListParaEliminar($id){


        require('core/helpers/conexion.php');

        $sql = "update MenuComercioItem
                SET BajaLogica = 1
                where IdMenuComercioItem = '$id';";
        $result = mysqli_query($conexion,$sql);

        $idUsuario = $_SESSION['IdUsuario'];

        $sql2 = "select * 
                from MenuComercio mc
                WHERE mc.BajaLogica=0 AND mc.idmenucomercio= '$idUsuario';";

        $result2 = mysqli_query($conexion,$sql2);

        $MenuComercio = array();

        while($rows2=mysqli_fetch_assoc($result2))
        {
            $MenuComercio[] = $rows2;
        }

        return $MenuComercio;
    }

    public function getListParaModificar($id){

        require('core/helpers/conexion.php');

        $idUsuario = $_SESSION['IdUsuario'];

        $sql = "select mc.Descripcion Descripcion, mc.Precio Precio 
                from MenuComercioItem mc
                WHERE mc.IdMenuComercioItem='$id'";

        $result = mysqli_query($conexion,$sql);

        $MenuComercio = array();

        while($rows2=mysqli_fetch_assoc($result))
        {
            $MenuComercio[] = $rows2;
        }
        return $MenuComercio;
    }

    public function actualizar($producto , $precio, $destino,$idMenu){

        require('core/helpers/conexion.php');


        $sql1 = "update MenuComercioItem
                SET Descripcion = '$producto'
                where IdMenuComercioItem = $idMenu;";

        $result1 = mysqli_query($conexion,$sql1);

        $sql2 = "update MenuComercioItem
                SET Precio = $precio
                where IdMenuComercioItem = $idMenu;";

        $result2 = mysqli_query($conexion,$sql2);

        $sql3 = "update MenuComercioItem
                SET Foto = '" . $destino . "'
                where IdMenuComercioItem = $idMenu;";
        $result3 = mysqli_query($conexion,$sql3);


        $idUsuario = $_SESSION['IdUsuario'];

        $sql4 = "select * 
                from MenuComercio mc
                WHERE mc.BajaLogica=0 AND mc.idmenucomercio= 'idUsuario';";

        $result4 = mysqli_query($conexion,$sql4);

        $MenuComercio = array();

        while($rows4=mysqli_fetch_assoc($result4))
        {
            $MenuComercio[] = $rows4;
        }
        return $MenuComercio;
    }
}




       
