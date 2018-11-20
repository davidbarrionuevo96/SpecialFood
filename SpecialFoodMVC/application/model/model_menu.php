
<?php

class Model_menu extends Model{

    public function guardar($comercio){

        require('core/helpers/conexion.php');

                $sql = "select mc.Descripcion d
                from MenuComercio mc 
                where mc.Descripcion='$comercio'";

                $result=mysqli_query($conexion,$sql);
                $asd=mysqli_fetch_assoc($result);

                if(!($asd['d']==$comercio)) {

                    $c = 1; //$_SESSION['IdUsuario'];
                    $sql2 = "Insert Into MenuComercio (Descripcion, IdComercio) values('$comercio','$c')";
                    $result2 = mysqli_query($conexion, $sql2);
                    return true;
                }
                else{return false;}
            }


    public function getListMenu(){

        require('core/helpers/conexion.php');

        $sql = "select * 
                from MenuComercio mc
                WHERE mc.BajaLogica=0
                ";

        $result = mysqli_query($conexion,$sql);

        $MenuComercio = array();

        while($rows=mysqli_fetch_assoc($result))
        {
            $MenuComercio[] = $rows;
        }

        return $MenuComercio;
    }

    public function getListMenuPorId($id){

        require('core/helpers/conexion.php');

        $sql2 = "select mni.Descripcion 'Descripcion', mni.Precio 'Precio', mni.Foto 'Foto', mc.Descripcion Menu, mni.IdMenuComercioItem id
                from MenuComercio mc join MenuComercioItem mni on mc.IdMenuComercio = mni.IdMenuComercio
                where mni.IdMenuComercio='$id' 
                and mni.BajaLogica=0
                ";

        $result2 = mysqli_query($conexion,$sql2);

        $MenuComercio2 = array();

        while($rows2=mysqli_fetch_assoc($result2))
        {
            $MenuComercio2[] = $rows2;
        }
        return $MenuComercio2;
    }

    public function getListParaEliminar($id){


        require('core/helpers/conexion.php');

        $sql = "update MenuComercio
                SET BajaLogica = 1
                where IdMenuComercio = '$id';";
        $result = mysqli_query($conexion,$sql);


        $sql2 = "select * 
                from MenuComercio mc
                WHERE mc.BajaLogica=0
                ";

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


        $sql = "select mc.Descripcion Descripcion 
                from MenuComercio mc
                WHERE mc.IdMenuComercio='$id'";

        $result = mysqli_query($conexion,$sql);

        $MenuComercio = array();

        while($rows2=mysqli_fetch_assoc($result))
        {
            $MenuComercio[] = $rows2;
        }
        return $MenuComercio;
    }

    public function actualizar($comercio, $id){

        require('core/helpers/conexion.php');


        $sql = "update MenuComercio
                SET Descripcion = '$comercio'
                where IdMenuComercio = '$id';";

        $result = mysqli_query($conexion,$sql);

        $sql2 = "select * 
                from MenuComercio mc
                WHERE mc.BajaLogica=0
                ";

        $result2 = mysqli_query($conexion,$sql2);

        $MenuComercio = array();

        while($rows2=mysqli_fetch_assoc($result2))
        {
            $MenuComercio[] = $rows2;
        }
        return $MenuComercio;
    }
}




