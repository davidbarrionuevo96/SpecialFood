<?php

class Model_menuitems extends Model{
    public function guardar($producto , $precio, $imagen){

        $conn = mysqli_connect("127.0.0.1","root","","specialfooddb");

        if ($conexion->connect_error) {
            die("La conexion falló: " . $conexion->connect_error);
        }

                $sql = "select mni.Descripcion d
                from MenuNegocioItem mni 
                where mni.Descripcion='$producto'";

                $result=mysqli_query($conn,$sql);
                $asd=mysqli_fetch_assoc($result);

                if(!($asd['d'] == $producto)){

                  $c=1;
                  $sql2="Insert Into MenuNegocioItem (Descripcion,Precio, Foto, IdMenuComercio) values('$producto','$precio','imagen','$c')";
                  $result2=mysqli_query($conn,$sql2);

                  return true;
                }
                else{
                   return false;
                }
        }

}}