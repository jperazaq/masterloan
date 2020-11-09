
<?php 
ini_set( "display_errors", 0); 
include ("conexion.php");

if (isset($_POST['guardarPagoPendiente'])){
    
    $prestamo=$_POST['idPrestamoPen'];       
    $monto = $_POST['montoPagoPendiente'];
    $banco = $_POST['banco'];
    $recibo = $_POST['numRecibo'];
    $fechaPago = $_POST['fecha_pago'];
    $metodo = $_POST['metodo'];
    $loan_id = $_GET['LOANID'];
    $pagoID = $_POST['lineaPendiente'];
    $cuotaAPagar = $_POST['pendiente'];
    $payDate = $_POST['fecha_pago'];   
    $numCuota = $_POST['cuotaNumPen'];
    $saldoPorPagar = $_POST['saldoPorPagar'];
    $intPorPagar = $_POST['interesPorPagar'];
    $seguardaSaldoFinal = TRUE;
    $seguardaMonto = TRUE;
    $seguardaSaldoPendientePayments = TRUE;
    $seguardaPagoPendiente = TRUE;
    $seguardaAbierto = TRUE;
    $seguardaSaldoInt= TRUE;
    $seguardaSaldoAmort= TRUE;
    $seguardaFecha= TRUE;
    $seguardaDias= TRUE;
    $seguardaMulta= TRUE;
    $seguardaAmortPagada = TRUE;
    $cedulaCliente= $_GET['ID_NUMBER'];
    $idCliente= $_GET['CUSTOMER_ID'];
    $seguardaSaldoAmort = TRUE;
    $seguardaSaldoPend = TRUE;
    
    
   

    $newDate = date("Y-m-d", strtotime($payDate)); 
      
};














// Calcular Amortizacion
// if($seguardaSaldoPend){


// $rowSaldo004 = mysqli_fetch_array($cuota004); 

// $amortization = $saldoPorPagar;
// $interes = $rowSaldo004['SALDO_ABIERTO_INTERES'];    
// $alcanzaPago1 = $monto-$amortizacion;

//     if($alcanzaPago1>=$interes){
   
//         $amortizacionPagada = $monto-$interes;
      
//     }
//     elseif ($alcanzaPago1<=$interes) {
       
//         $amortizacionPagada =0;
        
//           };  
//           $seguardaSaldoPend = false;
//         }

//Guardar Arreas
$cuota11= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
        $rowSaldo11 = mysqli_fetch_array($cuota11); 
        $fechaPag= $rowSaldo11['PAYMENT_DATE'];
        $fechaPagada = $rowSaldo11['PAY_DATE_RECEIVED'];

        $datetime1 = New DateTime($fechaPag);
        $datetime2= New DateTime($fechaPagada); 
        
        

        $interval =$datetime1 ->diff($datetime2) ;
        $interval1 = $interval ->format("%R%a");

       
 //Se calcula Intereses  
 $cuota2= mysqli_query($conn, "SELECT * FROM  payments WHERE AMORT_TABLE_ID = $pagoID");
 $rowSaldo2 = mysqli_fetch_array($cuota2); 
 $saldoAbiertoAmort55 = $rowSaldo2['SALDO_ABIERTO_AMORT'];

 $interes = $intPorPagar;   
 $alcanzaPago1 = $monto-$interes;

 
if($interes>0){

    if($alcanzaPago1<0){
        $pagoDeIntereses = $monto;
        $saldoAbiertoInt = $interes- $pagoDeIntereses ;
        $saldoAbiertoAmort = $saldoAbiertoAmort55;
        
        }elseif ($alcanzaPago1>=0) {
       
            $pagoDeIntereses = $interes;
            $saldoAbiertoInt = $interes- $pagoDeIntereses ;
            $amortizacionPagada = $monto-$pagoDeIntereses;
            $saldoAbiertoAmort = $saldoAbiertoAmort55-$amortizacionPagada;
              };     
}elseif($interes<=0){
    $amortizacionPagada = $monto;
    $saldoAbiertoAmort = $saldoAbiertoAmort55-$amortizacionPagada;
}





 
    //  if($alcanzaPago1<0){
         
    //      if($interes>0){
    //      $pagoDeIntereses = $monto;
    //      $saldoAbiertoInt = $interes- $pagoDeIntereses ;
         
    //      }else{
    //     $pagoDeIntereses = 0;
    //      $saldoAbiertoInt = $interes- $pagoDeIntereses ;
    //      }
         
    //  }

    //  elseif ($alcanzaPago1>=0) {
       
    //      $pagoDeIntereses = $interes;
    //      $saldoAbiertoInt = $interes- $pagoDeIntereses ;
    //      $amortizacionPagada = $monto-$pagoDeIntereses;
    //      $saldoAbiertoAmort = $saldoAbiertoAmort1-$amortizacionPagada;
    //        };      
 
        





           






// Guardar en tabla de Pago

if($seguardaPagoPendiente){ 
    
   
    $cedulaCliente= $_GET['ID_NUMBER'];
    $idCliente= $_GET['CUSTOMER_ID'];

    $saldoPendienteARestar= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
    $querySaldoPendienteARestar = mysqli_fetch_array($saldoPendienteARestar);
    
    $saldoAbiertoPendiente = $cuotaAPagar - $monto;

    $sql = "INSERT INTO payments (CUSTOMER_ID_NUMBER, PAYMENT_AMOUNT,PAGO_PENDIENTE, SALDO_PENDIENTE,REF_CUOTA,INTERES_PAGADO,SALDO_ABIERTO_INTERES,AMORTIZACION_PAGADA,SALDO_ABIERTO_AMORT, ARREAR,PAYMENT_DATE1, PAYMENT_REFERENCE,PAYMENT_METHOD, FINANCIAL_INSTITUTION, CUSTOMER_ID, LOAN_ID,AMORT_TABLE_ID)
            VALUES ('$cedulaCliente','$monto','$monto', '$saldoAbiertoPendiente','$numCuota','$pagoDeIntereses',abs('$saldoAbiertoInt'),'$amortizacionPagada', '$saldoAbiertoAmort', '$interval1','$fechaPago', '$recibo', '$metodo',  '$banco', '$idCliente','$prestamo','$pagoID')";
           

            

           

            if(mysqli_query($conn, $sql)){      
                echo "<script>alert('Registro Satisfactorio en la Base de datos!');

                
                                  
    </script>";     
    
   
            } else{
                    echo 'ERROR: No se puedo Actualizar Saldo Pendiente en Tabla de Pagos ' . mysqli_error($conn);
                };          
                
                $seguardaPago = false;       
  }
    





if($seguardaMonto){  

    $queryPagoPen = mysqli_query($conn, "SELECT sum(PAYMENT_AMOUNT) FROM  payments WHERE REF_CUOTA = $numCuota");

    

    $rowPagoPen = mysqli_fetch_array($queryPagoPen);
    $totalPagosPen= $rowPagoPen['sum(PAYMENT_AMOUNT)'];

    $pagoPenFinal = $totalPagosPen + $monto-$monto;


    
   $pagoPendiente= "UPDATE payments SET SUMA_TOTAL_PAGADO = $pagoPenFinal WHERE REF_CUOTA = $numCuota";


if(mysqli_query($conn, $pagoPendiente)){      
                        
               echo $totalPagosPen;             
        
   
} else{
        echo 'ERROR: Could not able to execute $pagoPendiente. ' . mysqli_error($conn);
    };        
    
    $queryPagoPenAmort = "UPDATE amortization SET PAYMENT_AMOUNT = $pagoPenFinal WHERE AMORT_TABLE_ID = $pagoID";

    if(mysqli_query($conn, $queryPagoPenAmort)){      
                              
        echo $totalPagosPen;             
 

} else{
 echo 'ERROR: Could not able to execute $pagoPendiente. ' . mysqli_error($conn);
};     


    $seguardaMonto= FALSE;   
    
}