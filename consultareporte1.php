<?php
include 'conexionsql.php';

switch ($_POST['accion']) {
            case 'pasajerosespera1':
$reporte3 = "exec SP_ListaPasajeroEspera ";          
$queryreporte3 = sqlsrv_query( $conn, $reporte3);

?>

 
                                    <table id="trporte3" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Codigo Vuelo</th>
                                                <th>Pasajero</th>
                                      
                                                <th>Numero Doc</th>
                                                <th>Tipo Pasaje</th>
                                                <th>Precio</th>
                                                <th>Fecha Vuelo</th>
                                                <th>Origien</th>
                                                <th>Destino</th>
                                            </tr>
                                        </thead>
                           
                                 
                                        <tbody>
<?php

 while( $row = sqlsrv_fetch_array( $queryreporte3, SQLSRV_FETCH_BOTH ) ){
     ?>

                                            <tr style="font-size: 13px;">
                                                <td> <?=$row['CodigoVuelo']?>  </td>
                                                <td> <?=$row['Pasajero']?></td>
                                                <td>  <?=$row['Doc']?> : <?=$row['NumDNI']?></td>
                                               
                                                <td> <?=$row['TipoPax']?></td>
                                                <td> S/. <?=$row['Precio']?></td>
                                                 <td> <?=$row['FechaVuelo']->format('d/m/Y')?>  </td>
                                                <td> <?=$row['Origen']?></td>
                                                <td><?=$row['Destino']?></td> 
                                            </tr>
                             
<?php


 }
 
 ?>          
                                        </tbody>
                                        <tfoot>
       <tr>
                                                <th>Codigo Vuelo</th>
                                                <th>Pasajero</th>
                                                <th>Documento</th>
                                          
                                                <th>Tipo Pasaje</th>
                                                <th>Precio</th>
                                                <th>Fecha Vuelo</th>
                                                <th>Origien</th>
                                                <th>Destino</th>
                                            </tr>
                                       
                                                          </tfoot>     
                                    </table>
                      
<?php
        break;
        case 'pasajerosespera':
$reporte3 = "exec SP_ListaPasajeroEspera ";          
$queryreporte3 = sqlsrv_query( $conn, $reporte3);

?>
      <div class="table-responsive m-t-40">
          
 
                                    <table id="trporte3" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Codigo Vuelo</th>
                                                <th>Pasajero</th>
                                      
                                                <th>Numero Doc</th>
                                                <th>Tipo Pasaje</th>
                                                <th>Precio</th>
                                                <th>Fecha Vuelo</th>
                                                <th>Origien</th>
                                                <th>Destino</th>
                                            </tr>
                                        </thead>
                           
                                 
                                        <tbody>
<?php

 while( $row = sqlsrv_fetch_array( $queryreporte3, SQLSRV_FETCH_BOTH ) ){
     ?>

                                            <tr style="font-size: 13px;">
                                                <td> <?=$row['CodigoVuelo']?>  </td>
                                                <td> <?=$row['Pasajero']?></td>
                                                <td>  <?=$row['Doc']?> : <?=$row['NumDNI']?></td>
                                               
                                                <td> <?=$row['TipoPax']?></td>
                                                <td> S/. <?=$row['Precio']?></td>
                                                 <td> <?=$row['FechaVuelo']->format('d/m/Y')?>  </td>
                                                <td> <?=$row['Origen']?></td>
                                                <td><?=$row['Destino']?></td> 
                                            </tr>
                             
<?php


 }
 
 ?>          
                                        </tbody>
                                        <tfoot>
       <tr>
                                                <th>Codigo Vuelo</th>
                                                <th>Pasajero</th>
                                                <th>Documento</th>
                                          
                                                <th>Tipo Pasaje</th>
                                                <th>Precio</th>
                                                <th>Fecha Vuelo</th>
                                                <th>Origien</th>
                                                <th>Destino</th>
                                            </tr>
                                       
                                                          </tfoot>     
                                    </table>
                                </div>
<?php
        break;
    case 'ingresooficina':
$reporte1 = "declare @fechai smalldatetime ='".$_POST['inicio']."' ,@fechaf smalldatetime ='".$_POST['fin']."' exec SP_ListarIngresosOficina @fechai, @fechaf";          
$queryreporte1 = sqlsrv_query( $conn, $reporte1);

?>
      <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Oficina</th>
                                                <th>Nombre</th>
                                                <th>Total</th>
                                                
                                            </tr>
                                        </thead>
                                 
                                 
                                        <tbody>
<?php
$suma=0;
 while( $row = sqlsrv_fetch_array( $queryreporte1, SQLSRV_FETCH_BOTH ) ){
     ?>

                                            <tr  style="cursor:pointer;" onclick="abrirdetalle(<?=$row['ofID']?> ,'<?=$row['ofNombre']?>')">
                                                <td> <?=$row['ofID']?>  </td>
                                                <td> <?=$row['ofNombre']?></td>
                                                <td> S/. <?=$row['Total']?></</td>
                                             
                                            </tr>
                             
<?php
$suma=$suma+$row['Total'];

 }
 
 ?>          
                                        </tbody>
                                        <tfoot>

                                            <tr>
                                                <td colspan="2" ><b style="text-align: center">SUMA TOTAL</b></td>
                                                  
                                                <td><b>S/. <?=$suma?></b></td>
                                             
                                             
                                            </tr>
                                                          </tfoot>     
                                    </table>
                                </div>
<?php
        break;
      case 'reportevuelos':
$reporte4 = "declare @fechai smalldatetime ='".$_POST['inicio']."' ,@fechaf smalldatetime ='".$_POST['fin']."' exec SP_ReporteVuelo_ListarXFechasWeb @fechai, @fechaf";          
$queryreporte4 = sqlsrv_query( $conn, $reporte4);

?>

<table id="treporte4"  class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch cellspacing="0" width="100%">
<thead>
<tr style="font-size: 13px;">

<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" >Codigo Vuelo</th>
<th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="11">Fecha Vuelo</th>

<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">Origen</th> 
<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">Destino</th>
<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">Avion</th>
<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">Piloto</th>
<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">Hora Desp</th>
<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">Hora Ater</th>
<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"><abbr title="Rotten Tomato Rating">Min</abbr></th>

<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Total</th>
</tr>
</thead>
<tbody>
<?php
$suma=0;
 while( $row = sqlsrv_fetch_array( $queryreporte4, SQLSRV_FETCH_BOTH ) ){
     ?>

    <tr style="font-size: 11px;">

<td class="title"><a href="javascript:void(0)"> <?=$row['pvCodigoVuelo']?></a>   </td>
<td> <?=$row['pvFechaVuelo']->format('d/m/Y')?></td>

<td> <?=$row['OriNombre']?>  </td>
<td> <?=$row['DesNombre']?>  </td>
<td> <?=$row['avNombre']?>  </td>
<td> <?=$row['piloto']?>  </td>
<td> <?=$row['HoraDespegue']?>  </td>
<td> <?=$row['HoraAterrizaje']?>  </td>
<td> <?=$row['Minutos']?>  </td>

<td> S/. <?=$row['Total']?></</td>
                                             
                                            </tr>
                             
<?php
$suma=$suma+$row['Total'];

 }
 
 ?>          
                                        
                                        </tbody>
                                
                                    </table>
                            
<?php
        break;    
    case 'detalleingresooficina':
        $detallereporte1 = "declare @fechai smalldatetime ='".$_POST['inicio']."' ,@fechaf smalldatetime ='".$_POST['fin']."' ,@ofID int =".$_POST['id']." exec  SP_ListarIngresosOficinaDetallado @fechai, @fechaf , @ofID";          
$querydetallereporte1 = sqlsrv_query( $conn, $detallereporte1);

        ?>
                  <div id="mdetallereporte1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              
                                                <h4 class="modal-title" style="text-align: justify;">LISTA DETALLADA DEL INGRESOO DE LA <u><?= $_POST['ofi']?></u> DESDE: <u><?= $_POST['inicio']?></u> HASTA: <u><?= $_POST['fin']?> </u> </h4>
                                            </div>
                                            <div class="modal-body">
                                      <div class="table-responsive m-t-40">
                                    <table id="detalleingresooficinad" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Servicio</th>
                                         
                                                <th>Total</th>
                                                
                                            </tr>
                                        </thead>
                                 
                                 
                                        <tbody>
<?php
$suma=0;
 while( $row = sqlsrv_fetch_array( $querydetallereporte1, SQLSRV_FETCH_BOTH ) ){
     ?>

                                            <tr   >
                                                <td> <?=$row['Servicio']?>  </td>
                                                <td> S/. <?=$row['Total']?></</td>
                                             
                                            </tr>
                             
<?php
$suma=$suma+$row['Total'];

 }
 
 ?>          
                                        </tbody>
                                        <tfoot>

                                            <tr>
                                                <td  ><b style="text-align: center">SUMA TOTAL</b></td>
                                                  
                                                <td><b>S/. <?=$suma?></b></td>
                                             
                                             
                                            </tr>
                                                          </tfoot>     
                                    </table>
                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
<script>

    
  $("#mdetallereporte1").modal("show");
</script>
<?php
        break;
    default:
        break;
}
?>

    <!-- jQuery peity -->
    <script src="../assets/plugins/tablesaw-master/dist/tablesaw.js"></script>
    <script src="../assets/plugins/tablesaw-master/dist/tablesaw-init.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
 
  <script>

           var table4 = $('#treporte4').DataTable( {
           responsive: true,           
        "bDestroy": true,
        "paging":   false,
        "ordering": false,
        "info":     false
  
    } );
           var table3 = $('#trporte3').DataTable( {
                    "bDestroy": true, 
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return ' PASAJERO: '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            }
        }
    } );

                var table2 = $('#detalleingresooficina').DataTable({
              "bDestroy": true, 
                responsive: true,
        dom: 'Bfrtip'
    
    });
      
          var table = $('#example23').DataTable({
             "bDestroy": true, 
               responsive: true,
        dom: 'Bfrtip'
    
    });
  
//    $('#example23 tbody').on('click', 'tr', function () {
//       abrirdetalle();
// 
//    } );
function abrirdetalle(id,ofi){
         $('#divdetalle').html('');

            
        var data =  table.row( this ).data();
            $.post('consultareporte1.php',{inicio:$('#finicio').val(),fin:$('#ffin').val(),id:id,ofi:ofi,accion:'detalleingresooficina'},function(data){$('#divdetalle').html(data);     });
 
};
    </script>
