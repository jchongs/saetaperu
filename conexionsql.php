
<?php


$serverName = "saetaserver.database.windows.net";
$connectionOptions = array(
    "Database" => "dbSaeta",
    "Uid" => "adminsaeta",
    "PWD" => "...saeta123",
     "CharacterSet" => "UTF-8"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn ) {
   echo "Conexión estabecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}


        ?>             
