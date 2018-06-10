
<?php
echo phpinfo();
//a

$serverName = "saetaserver.database.windows.net";
$connectionOptions = array(
    "Database" => "dbSaeta",
    "Uid" => "adminsaeta@saetaserver",
    "PWD" => "...saeta123",
     "CharacterSet" => "UTF-8"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn ) {
   echo "Conexión estab;ecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}


        ?>
       
                     
                                  <?php
$reporte3 = "exec SP_ListaPasajeroEspera ";          
$queryreporte3 = sqlsrv_query( $conn, $reporte3);
 while( $row = sqlsrv_fetch_array( $queryreporte3, SQLSRV_FETCH_BOTH ) ){
echo 'ddd-'.$row['Pasajero'];

 }
 
 ?> 
                    