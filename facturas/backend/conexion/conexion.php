<?php

    class Conexion{
        static public function conectar(){
			$conn = new PDO("mysql:host=auth-db884.hstgr.io;dbname=u155011905_contabilidad", "u155011905_lmzt", "0w1A~Fuyz=H");
            $conn->exec("set names utf8");
            return $conn;
        }
    }
//tengo mis dudas con este host=https
?>