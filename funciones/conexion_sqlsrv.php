<?php

/*$ServerName = "DESKTOP-MRJC38T";
$conn_info = array("Database" => "BD_UNIBIBLIO");
$conn = sqlsrv_connect($ServerName, $conn_info);

if($conn) {
    echo 'si funciono :3';
}else{
    echo 'no funciono :S';
    die(print_r(sqlsrv_errors(),true));
}*/

class Cconexion{
    function ConexionBD(){
        $host = 'localhost';
        $dbname = 'BD_UNIBIBLIO';
        $username = 'keren';
        $password = '1234';
        $puerto = 3306;
        
        try{
            $conn = new PDO ("sqlsrv:Server-$host,$puerto;Database-$dbname",$username,$password);
            echo 'Si funciono :3';
        }catch(PDOException $exp){
            echo 'no funciono :s, error: $exp';
        }

        return $conn;

    }

}



?>