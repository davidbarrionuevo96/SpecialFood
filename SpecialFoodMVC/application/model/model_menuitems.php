
<?php

class Model_menuitems extends Model{
    public function guardar($producto, $precio, $imagen,$idMenu){

        require('core/helpers/conexion.php');



                $sql = "select mni.Descripcion d
                from MenuComercioItem mni 
                where mni.Descripcion='$producto'";

                $result=mysqli_query($conexion,$sql);
                $asd=mysqli_fetch_assoc($result);

                if(!($asd['d'] == $producto))
                {



                  $sql2 = "";
                  $sql2 = $sql2 . "INSERT INTO MenuComercioItem ";
                  $sql2 = $sql2 . "( ";
                  $sql2 = $sql2 . "   Descripcion, ";
                  $sql2 = $sql2 . "   Precio, ";
                  $sql2 = $sql2 . "   Foto, ";
                  $sql2 = $sql2 . "   IdMenuComercio, ";
                  $sql2 = $sql2 . "   BajaLogica, ";
                  $sql2 = $sql2 . "   FechaModificacion, ";
                  $sql2 = $sql2 . "   IdUsuarioModificacion ";
                  $sql2 = $sql2 . ")  ";
                  $sql2 = $sql2 . "VALUES ";
                  $sql2 = $sql2 . "( ";
                  $sql2 = $sql2 . "   '$producto', ";
                  $sql2 = $sql2 . "   '$precio', ";
                  $sql2 = $sql2 . "   '$imagen', ";
                  $sql2 = $sql2 . "   '$idMenu', ";
                  $sql2 = $sql2 . "    0, ";
                  $sql2 = $sql2 ."    NOW(), ";
                  $sql2 = $sql2 . "    1 ";
                  $sql2 = $sql2 . ");";


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

    public function actualizar($Descripcion,$Precio,$Imagen, $id){

        require('core/helpers/conexion.php');


        $sql1 = "update MenuComercioItem
                SET Descripcion = '$Descripcion'
                where IdMenuComercioItem = '$id';";

        $result1 = mysqli_query($conexion,$sql1);

        $sql2 = "update MenuComercioItem
                SET Precio = '$Precio'
                where IdMenuComercioItem = '$id';";

        $result2 = mysqli_query($conexion,$sql2);

        $sql3 = "update MenuComercioItem
                SET Foto = '$Imagen'
                where IdMenuComercioItem = '$id';";
        $result3 = mysqli_query($conexion,$sql3);


        $idUsuario = $_SESSION['IdUsuario'];

        $sql4 = "select * 
                from MenuComercio mc
                WHERE mc.BajaLogica=0 AND mc.idmenucomercio= '$idUsuario';";

        $result4 = mysqli_query($conexion,$sql4);

        $MenuComercio = array();

        while($rows4=mysqli_fetch_assoc($result4))
        {
            $MenuComercio[] = $rows4;
        }
        return $MenuComercio;
    }
}




       
