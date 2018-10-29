<?php

require ('model_calle.php');
require ('model_perfil.php');

class Model_Usuario {

    private $id;
    private $nombre;
    private $apellido;
    private $username;
    private $password;
    private $numero;
    private $cuit;
    private $cuil;
    private $calle;
    private $perfil;

    public function construct(){

        $this-> calle = new Calle();
        $this-> perfil = new Perfil();
    }
}