<?php 
// ini_set( "display_errors", 0); 
include ("conexion.php");

if (isset($_POST['borrarRegistro'])){
    $registroABorrar = $_POST['pagoid'];
    $borrar = TRUE;
    $numCuota = $_POST['cuotaNumPen'];
    $monto = $_POST['paymentAmt'];
    $actualizarPago= TRUE;
    $pagoID = $_POST['lineaPendiente'];
    echo $registroABorrar;

}

if($borrar){
    $queryBorrar = "DELETE FROM payments WHERE PAYMENT_ID = $registroABorrar";

    if(mysqli_query($conn, $queryBorrar)){      
        echo "<script>alert('El pago se ha borrado de la base de datos!');
        
        
                          
        </script>";    } else{
            echo 'ERROR: Could not able to execute $pagoPendiente. ' . mysqli_error($conn);
            };    
        
        
   $borrar = false;     
}

if($actualizarPago){
    $queryPagoPen = mysqli_query($conn, "SELECT sum(PAYMENT_AMOUNT) FROM  payments WHERE REF_CUOTA = $numCuota");

    // $totalPagosPen = 0;

    // while($pagosAcuota= mysqli_fetch_array($queryPagoPen)){
    //     $totalPagosPen = $totalPagosPen+ $pagosAcuota['PAYMENT_AMOUNT'];
    // }

    $rowPagoPen = mysqli_fetch_array($queryPagoPen);
    $totalPagosPen= $rowPagoPen['sum(PAYMENT_AMOUNT)'];

    $pagoPenFinal = $totalPagosPen - $monto;


    
   $pagoPendiente= "UPDATE payments SET SUMA_TOTAL_PAGADO = $pagoPenFinal WHERE REF_CUOTA = $numCuota";


if(mysqli_query($conn, $pagoPendiente)){      
                        
               echo $totalPagosPen;             
        
   
} else{
        echo 'ERROR: Could not able to execute $pagoPendiente. ' . mysqli_error($conn);
    };     
    
    $cuota100= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
    $rowSaldo100 = mysqli_fetch_array($cuota100);
    
    $nuevoPagoSaldo = $rowSaldo100['PAYMENT_AMOUNT']-$monto;


    $pago100 = "UPDATE amortization SET PAYMENT_AMOUNT = $nuevoPagoSaldo WHERE AMORT_TABLE_ID = $pagoID";   
    
    if(mysqli_query($conn,$pago100)){
        echo "Actualizado";
    }else{
        echo 'ERROR: Could not able to execute $sqlaMORTI. ' . mysqli_error($conn);
    }
    
    
    $actualizarPago= FALSE;   
    

}
