
<?php 
// ini_set( "display_errors", 0); 
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
    $payDate = $_POST['fecha_pago'];    
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
    
   

    $newDate = date("Y-m-d", strtotime($payDate)); 
      
};


// Acutalizar Pago de Saldo Pendiente

if($seguardaMonto){  


   $pagoPendiente= "UPDATE amortization SET SALDO_PENDIENTE_PAGADO = $monto WHERE AMORT_TABLE_ID = $pagoID";


if(mysqli_query($conn, $pagoPendiente)){      
                        
                            
        
   
} else{
        echo 'ERROR: Could not able to execute $pagoPendiente. ' . mysqli_error($conn);
    };        
    
    $seguardaMonto= FALSE;   
    
}



// Actualizar Saldo Final
if($seguardaSaldoFinal){
    $nuevoSaldoPendiente= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
    $querySaldoPendiente = mysqli_fetch_array($nuevoSaldoPendiente);

    $nuevoSaldoPendienteFinal = $querySaldoPendiente['SALDO_PAGO_ABIERTO']-$monto;

    $actualizarSaldoFinal = "UPDATE amortization SET SALDO_PAGO_ABIERTO = $nuevoSaldoPendienteFinal WHERE AMORT_TABLE_ID = $pagoID";
}
if(mysqli_query($conn, $actualizarSaldoFinal)){      
                        
                            
        
   
} else{
        echo 'ERROR: Could not able to execute $pagoPendiente. ' . mysqli_error($conn);
    };        
    
    $seguardaMonto= FALSE;   

// Guardar en tabla de Pago

if($seguardaPagoPendiente){ 
    
   
    $cedulaCliente= $_GET['ID_NUMBER'];
    $idCliente= $_GET['CUSTOMER_ID'];

    $saldoPendienteARestar= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
    $querySaldoPendienteARestar = mysqli_fetch_array($saldoPendienteARestar);
    
    $saldoAbiertoPendiente = $querySaldoPendienteARestar['SALDO_PAGO_ABIERTO'] - $monto;

    $sql = "INSERT INTO payments (CUSTOMER_ID_NUMBER, PAYMENT_AMOUNT,PAGO_PENDIENTE, SALDO_PENDIENTE, PAYMENT_DATE1, PAYMENT_REFERENCE,PAYMENT_METHOD, FINANCIAL_INSTITUTION, CUSTOMER_ID, LOAN_ID,AMORT_TABLE_ID)
            VALUES ('$cedulaCliente','$monto','$monto', '$saldoAbiertoPendiente','$fechaPago', '$recibo', '$metodo',  '$banco', '$idCliente','$prestamo','$pagoID')";
           

            

           

            if(mysqli_query($conn, $sql)){      
                echo "<script>alert('Registro Satisfactorio en la Base de datos!');

                
                                  
    </script>";     
    
   
            } else{
                    echo 'ERROR: No se puedo Actualizar Saldo Pendiente en Tabla de Pagos ' . mysqli_error($conn);
                };          
                
                $seguardaPago = false;       
  }
    

// if($seguardaSaldoPendientePayments){
//     $saldoPendienteARestar= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
//     $querySaldoPendienteARestar = mysqli_fetch_array($saldoPendienteARestar);

//     // $TablaDePago= mysqli_query($conn, "SELECT * FROM  payments WHERE AMORT_TABLE_ID = $pagoID");
//     // $queryTablaDePago = mysqli_fetch_array($TablaDePago);

//     $saldoAbiertoPendiente = $querySaldoPendienteARestar['SALDO_PAGO_ABIERTO'] - $monto;



// }