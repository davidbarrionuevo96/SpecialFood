
<?php

class Model_menuitems extends Model{
    public function guardar($producto, $precio, $imagen){

        require('core/helpers/conexion.php');

        try {

                $sql = "select mni.Descripcion d
                from MenuNegocioItem mni 
                where mni.Descripcion='$producto'";

                $result=mysqli_query($conexion,$sql);
                $asd=mysqli_fetch_assoc($result);

                if(!($asd['d'] == $producto))
                {

                  $c=1;
                  
                  $sql2 = "";
                  $sql2 = $sql2 . "INSERT INTO MenuNegocioItem ";
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
                  $sql2 = $sql2 . "   '$c', ";
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
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

}