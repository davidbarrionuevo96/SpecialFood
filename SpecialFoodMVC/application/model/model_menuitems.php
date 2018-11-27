
<?php

class Model_menuitems extends Model{
    public function guardar($producto,$precio,$destino,$idMenu, $oferta, $Desde, $Hasta){

        require('core/helpers/conexion.php');

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


            mysqli_query($conexion,$sql2);

            if($oferta == true) {
                $sql3 = "INSERT INTO Oferta 
                                ( 
                                   PrecioOferta, 
                                   FechaDesde, 
                                   FechaHasta, 
                                   IdMenuComercioItem, 
                                   BajaLogica, 
                                   FechaModificacion, 
                                   IdUsuarioModificacion 
                                )  
                                VALUES 
                                ( 
                                   '$precio', 
                                   '$Desde', 
                                 '$Hasta',
                                 (SELECT MAX(IdMenuComercioItem) FROM MenuComercioItem Where BajaLogica = 0), 
                                  0, 
                                   NOW(), 
                                    1 
                                );";

                mysqli_query($conexion,$sql3);
                return true;
            }

                return true;

    }

    public function getListParaEliminar($id){


        require('core/helpers/conexion.php');

        $sql = "update MenuComercioItem
                SET BajaLogica = 1
                where IdMenuComercioItem = '$id';";
        mysqli_query($conexion,$sql);

        $sq2 = "update Oferta
                SET BajaLogica = 1
                where IdMenuComercioItem = '$id';";
        mysqli_query($conexion,$sq2);


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

        $sql = "select o.IdOferta 'Oferta', o.FechaDesde 'Desde', o.FechaHasta 'Hasta' ,mc.Descripcion 'Descripcion', mc.Precio 'Precio', mc.Foto 'Foto'
                from MenuComercioItem mc
                 left join Oferta o on o.IdMenuComercioItem = mc.IdMenuComercioItem and o.BajaLogica = 0
                WHERE mc.IdMenuComercioItem='$id';";

        $result = mysqli_query($conexion,$sql);

        $MenuComercio = array();

        while($rows2=mysqli_fetch_assoc($result))
        {
            $MenuComercio[] = $rows2;
        }
        return $MenuComercio;
    }

    public function actualizar($producto , $precio, $destino,$idMenu,$Desde,$Hasta,$Oferta){

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

        $sql4 = "update Oferta
                SET FechaDesde =$Desde
                where IdMenuComercioItem = $idMenu;";
        $result4 = mysqli_query($conexion,$sql4);

        $sql5 = "update Oferta
                SET FechaHasta =$Hasta
                where IdMenuComercioItem = $idMenu;";
        $result5 = mysqli_query($conexion,$sql5);

        if($oferta == null) {

            $sql6 = "update Oferta
                SET IdOferta = null 
                where IdMenuComercioItem = $idMenu;";
            $result6 = mysqli_query($conexion, $sql6);
        }

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




       
