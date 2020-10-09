<?php 
// ini_set( "display_errors", 0); 
include ("conexion.php");

if (isset($_POST['guardarPago'])){
    
    $prestamo=$_POST['prestamo1'];       
    $monto = $_POST['montoPago'];
    $banco = $_POST['banco'];
    $recibo = $_POST['numRecibo'];
    $fechaPago = $_POST['fecha_pago'];
    $metodo = $_POST['metodo'];
    $loan_id = $_GET['LOANID'];
    $pagoID = $_POST['prestamo'];
    $payDate = $_POST['fecha_pago'];    
    $seguardaPago = TRUE;
    $seguardaMonto = TRUE;
    $seguardaAbierto = TRUE;
    $seguardaSaldoInt= TRUE;
    $seguardaSaldoAmort= TRUE;
    $seguardaFecha= TRUE;
    $seguardaDias= TRUE;
    $seguardaAmortPagada = TRUE;
    $cedulaCliente= $_GET['ID_NUMBER'];
    $idCliente= $_GET['CUSTOMER_ID'];

    $newDate = date("Y-m-d", strtotime($payDate));
    
    
    
   
};



if($seguardaPago){ 
    
   
    $cedulaCliente= $_GET['ID_NUMBER'];
    $idCliente= $_GET['CUSTOMER_ID'];
    

    $sql = "INSERT INTO payments (CUSTOMER_ID_NUMBER, PAYMENT_AMOUNT, PAYMENT_DATE1, PAYMENT_REFERENCE,PAYMENT_METHOD, FINANCIAL_INSTITUTION, CUSTOMER_ID, LOAN_ID,AMORT_TABLE_ID)
            VALUES ('$cedulaCliente','$monto','$fechaPago', '$recibo', '$metodo',  '$banco', '$idCliente','$prestamo','$pagoID')";
            $seguardaPago = false;

            

           

            if(mysqli_query($conn, $sql)){      
                echo "<script>window.alert('Registro Satisfactorio en la Base de datos!');

                
                                  
    </script>";  
    
   
            } else{
                    echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conn);
                };          
                
                
  }

  if($seguardaMonto){ 
    $pago1 = "UPDATE amortization SET PAYMENT_AMOUNT = $monto WHERE AMORT_TABLE_ID = $pagoID";   
    $saldo = "UPDATE amortization SET SALDO_PAGO_ABIERTO = $saldoAbierto WHERE AMORT_TABLE_ID = $pagoID";   

   $seguardaMonto= FALSE;  
           

            if(mysqli_query($conn, $pago1)){      
                        
                                  
        
   
            } else{
                    echo 'ERROR: Could not able to execute $sqlMONTO. ' . mysqli_error($conn);
                };        
                
        
                
  }


  if($seguardaAbierto){ 

    $cuota1= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
    $rowSaldo = mysqli_fetch_array($cuota1);
    $saldoAbierto = $monto-$rowSaldo['CUOTA'];
     
    $saldo = "UPDATE amortization SET SALDO_PAGO_ABIERTO = $saldoAbierto WHERE AMORT_TABLE_ID = $pagoID";   

   $seguardaAbierto= FALSE;  
           

            if(mysqli_query($conn, $saldo)){      
         
   
            } else{
                    echo 'ERROR: Could not able to execute $sqlMONTO. ' . mysqli_error($conn);
                };        
                
        
                
  }


  if($seguardaSaldoInt){ 

    $cuota2= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
    $rowSaldo2 = mysqli_fetch_array($cuota2); 
    $interes = $rowSaldo2['INTEREST_AMOUNT'];   
    $alcanzaPago1 = $monto-$interes;

        if($alcanzaPago1<0){
            
            $saldoAbiertoInt = $monto- $interes;
            
        }
        elseif ($alcanzaPago1>=0) {
            $cubreinteres1 =$interes;
            $saldoAbiertoInt = $cubreinteres1-$interes;
            
              };  
    
    $saldoInt2 = "UPDATE amortization SET SALDO_ABIERTO_INTERESES= $saldoAbiertoInt WHERE AMORT_TABLE_ID = $pagoID";   

   $seguardaSaldoInt= FALSE;  
           

            if(mysqli_query($conn, $saldoInt2)){      
        
   
            } else{
                    echo 'ERROR: Could not able to execute $sqlMONTO. ' . mysqli_error($conn);
                };        
                
    }


    if($seguardaSaldoAmort){ 

        $cuota3= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
        $rowSaldo3 = mysqli_fetch_array($cuota3); 
        $amortization = $rowSaldo3['AMORTIZATION'];
        $interes = $rowSaldo3['INTEREST_AMOUNT'];    
        
    
            if($alcanzaPago1>$interes){
                $restaSaldo = $monto-$interes;
                $saldoAbiertoInt3 = $restaSaldo- $amortization;
               
              
            }
            elseif ($alcanzaPago1<=$interes) {
                $cubreinteres1 =0;
                $saldoAbiertoInt3 = $cubreinteres1-$amortization;
              
                
                  };  
        
         $saldoInt3 = "UPDATE amortization SET SALDO_ABIERTO_CUOTA= $saldoAbiertoInt3 WHERE AMORT_TABLE_ID = $pagoID"; 
           
    
    $seguardaSaldoAmort= FALSE;  
               
    
                if(mysqli_query($conn, $saldoInt3)){      
            
       
                 } else{
                         echo 'ERROR: Could not able to execute $sqlMONTO. ' . mysqli_error($conn);
                 };        
                    
      }


      if($seguardaAmortPagada){ 

        $cuota04= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
        $rowSaldo04 = mysqli_fetch_array($cuota04); 
        $amortization = $rowSaldo04['AMORTIZATION'];
        $interes = $rowSaldo04['INTEREST_AMOUNT'];    
        $alcanzaPago1 = $monto-$amortizacion;
    
            if($alcanzaPago1>$interes){
           
                $amortizacionPagada = $monto-$interes;
              
            }
            elseif ($alcanzaPago1<=$interes) {
               
                $amortizacionPagada =0;
                
                  };  
        
         
         $saldoInt004 = "UPDATE amortization SET AMORTIZACION_PAGADA= $amortizacionPagada WHERE AMORT_TABLE_ID = $pagoID";     
    
    $seguardaAmortPagada= FALSE;  
               
    
                if(mysqli_query($conn, $saldoInt004)){      
            
       
                 } else{
                         echo 'ERROR: Could not able to execute $sqlaMORTI. ' . mysqli_error($conn);
                 };        
                    
      }



      if($seguardaFecha){ 
    
        
    $date10 = "UPDATE amortization SET PAY_DATE_RECEIVED= '$newDate' WHERE AMORT_TABLE_ID = '$pagoID'";   
     
    $seguardaFecha= FALSE;  
               
     
                if(mysqli_query($conn, $date10)){      
            
       
                 } else{
                         echo 'ERROR: Could not able to execute $sqlFecha. ' . mysqli_error($conn);
                 };        
                    
     }


     if($seguardaDias){ 
        sleep(1);
        $cuota11= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
        $rowSaldo11 = mysqli_fetch_array($cuota11); 
        $fechaPag= $rowSaldo11['PAYMENT_DATE'];
        $fechaPagada = $rowSaldo11['PAY_DATE_RECEIVED'];

        $datetime1 = New DateTime($fechaPag);
        $datetime2= New DateTime($fechaPagada); 
        
        

        $interval =$datetime1 ->diff($datetime2) ;
        $interval1 = $interval ->format("%R%a");
        
       
    
        // echo $interval;
        
        $date12 = "UPDATE amortization SET LATE_DAYS= $interval1 WHERE AMORT_TABLE_ID = $pagoID";   
        // echo $payDate;
        $seguardaDias= FALSE;  
                   
         
                    if(mysqli_query($conn, $date12)){      
                
           
                     } else{
                             echo 'ERROR: Could not able to execute $sqlFecha. ' . mysqli_error($conn);
                     };        
                        
         }


?>