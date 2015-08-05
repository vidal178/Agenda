<?php
    class conexion{
        static function conectar(){
            $conexion = mysqli_connect("localhost", "root", "", "agenda") or die("No se pudo realizar la conexión a la BD");
            return $conexion;
        }
    }
?>
