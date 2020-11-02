
<?php 
// ini_set( "display_errors", 0); 
include ("conexion.php");

if (isset($_POST['guardarPago'])){
    
    $prestamo=$_POST['idPrestamo'];       
    $monto = $_POST['montoPago'];
    $banco = $_POST['banco'];
    $recibo = $_POST['numRecibo'];
    $fechaPago = $_POST['fecha_pago'];
    $metodo = $_POST['metodo'];
    $loan_id = $_GET['LOANID'];
    $pagoID = $_POST['linea'];
    $payDate = $_POST['fecha_pago'];   
    $cuotaApagar = $_POST['cuotaNum']; 
    $seactualizaTotal= TRUE;
    $seguardaPago = TRUE;
    $seguardaMonto = TRUE;
    $seguardaAbierto = TRUE;
    $seguardaSaldoInt= TRUE;
    $seguardaSaldoAmort= TRUE;
    $seguardaFecha= TRUE;
    $seguardaDias= TRUE;
    $seguardaMulta= TRUE;
    $seguardaAmortPagada = TRUE;
    $cedulaCliente= $_GET['ID_NUMBER'];
    $idCliente= $_GET['CUSTOMER_ID'];
    $montoMulta= $_POST['multaPago'];
    $montoMultaSaldoAbierto= $_POST['multaPago'];
    $seguardaAbiertoenPayments = TRUE;

    $newDate = date("Y-m-d", strtotime($payDate));
    
    
    
   
};

$montoMenosMulta = $monto - $montoMultaSaldoAbierto;


//Guardar en tabla de pagos
if($seguardaPago){ 
    
   
    $cedulaCliente= $_GET['ID_NUMBER'];
    $idCliente= $_GET['CUSTOMER_ID'];
    $saldoPendienteARestar= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");

    $cuota55= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
    $rowSaldo55 = mysqli_fetch_array($cuota55);
    $cuotaNuevaConMulta55= $rowSaldo55['CUOTA']+$montoMultaSaldoAbierto;
   
    $saldoAbierto55 = $cuotaNuevaConMulta55-$monto; 
    echo $saldoAbierto55;



    $sql = "INSERT INTO payments (CUSTOMER_ID_NUMBER, PAYMENT_AMOUNT, SALDO_PENDIENTE, REF_CUOTA, PAYMENT_DATE1, PAYMENT_REFERENCE,PAYMENT_METHOD, FINANCIAL_INSTITUTION, CUSTOMER_ID, LOAN_ID,AMORT_TABLE_ID)
            VALUES ('$cedulaCliente','$monto','$saldoAbierto55', '$cuotaApagar','$fechaPago', '$recibo', '$metodo',  '$banco', '$idCliente','$prestamo','$pagoID')";
            $seguardaPago = false;

            

           

            if(mysqli_query($conn, $sql)){      
                echo "<script>alert('Registro Satisfactorio en la Base de datos!');

                
                                  
    </script>";     
    
   
            } else{
                    echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conn);
                };          
                
                
  }

  if($seguardaMonto){ 
    
    $cuota99= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
    $rowSaldo99 = mysqli_fetch_array($cuota99);
    $cuotaNuevaConMulta= $rowSaldo99['CUOTA']+$montoMultaSaldoAbierto;
   
    $saldoAbierto99 = $monto-$cuotaNuevaConMulta; 
    echo $saldoAbierto99;

    $pago99 = "UPDATE amortization SET PAYMENT_AMOUNT = $monto WHERE AMORT_TABLE_ID = $pagoID";   
    $saldo = "UPDATE amortization SET SALDO_PAGO_ABIERTO  = $saldoAbierto99 WHERE AMORT_TABLE_ID = $pagoID";   

   $seguardaMonto= FALSE;  
           

            if(mysqli_query($conn, $pago99)){      
                        
                            
        
   
            } else{
                    echo 'ERROR: Could not able to execute $sqlSaldoAbierto. ' . mysqli_error($conn);
                };        
                
                $seguardaMonto= FALSE;   
                
  }


  if($seguardaMulta){

    if($montoMulta >0){
        $multaDiff = $monto - $montoMulta;
  
        if($multaDiff<0){
  
          $multaAGuardar = $monto;
         
  
        }elseif ($multaDiff>0) {
            $multaAGuardar = $montoMulta;
         
        }elseif ($multaDiff==0) {
          $multaAGuardar = $montoMulta;
          
        }
        }else{
          $multaAGuardar = 0;
    }
    
    $multa1 = "UPDATE amortization SET MULTA_PAGADA = $multaAGuardar WHERE AMORT_TABLE_ID = $pagoID"; 

      if(mysqli_query($conn,$multa1)){

      }else{
        echo 'ERROR: Could not able to execute $sqlMulta. ' . mysqli_error($conn);
      }
      
      $seguardaMulta = FALSE;
  
  
  }


  if($seguardaAbierto){ 
    

    $cuota1= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
    $rowSaldo = mysqli_fetch_array($cuota1);
    $saldoAbierto = $rowSaldo['CUOTA']+$montoMulta-$monto;  
     
    $saldo = "UPDATE amortization SET SALDO_PAGO_ABIERTO = $saldoAbierto WHERE AMORT_TABLE_ID = $pagoID";   
   


    if(mysqli_query($conn, $saldo)){      
         
   
    } else{
            echo 'ERROR: Could not able to execute $sqlMONTO. ' . mysqli_error($conn);
        };        
           

            if(mysqli_query($conn, $saldo)){      
         
   
            } else{
                    echo 'ERROR:NO se puede guardar saldo abierto en amortizacion. ' . mysqli_error($conn);
                };        
                
                $seguardaAbierto= FALSE;
                
  }


  // if($seguardaAbiertoenPayments){ 



  //   $cuota55= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
  //   $rowSaldo55 = mysqli_fetch_array($cuota55);
  //   $cuotaNuevaConMulta55= $rowSaldo55['CUOTA']+$montoMultaSaldoAbierto;
   
  //   $saldoAbierto55 = $cuotaNuevaConMulta55-$monto; 
  //   echo $saldoAbierto55;

    
      
  //   $saldoAbiertoEnPayments = "INSERT INTO payments (SALDO_PENDIENTE) VALUES '$saldoAbierto55' ";


  //   if(mysqli_query($conn, $saldoAbiertoEnPayments)){      
         
   
  //   } else{
  //           echo 'NO SE PUEDO AGREGAR EL SALDO ABIERTO EN PAYMENTS ' . mysqli_error($conn);
  //       };        
           

                
                
  //               $seguardaAbiertoenPayments= FALSE;
                
  // }








  if($seguardaSaldoInt){ 

    $cuota2= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
    $rowSaldo2 = mysqli_fetch_array($cuota2); 
    $interes = $rowSaldo2['INTEREST_AMOUNT'];   
    $alcanzaPago1 = ($monto-$montoMulta)-$interes;
    echo $alcanzaPago1;
        if($alcanzaPago1<0){
            
            $saldoAbiertoInt = $montoMenosMulta- $interes;
            $pagoDeIntereses = $montoMenosMulta;
            
        }
        elseif ($alcanzaPago1>=0) {
            $cubreinteres1 =$interes;
            $saldoAbiertoInt = $cubreinteres1-$interes;
            $pagoDeIntereses = $interes;
            
              };  
    
    $saldoInt1 = "UPDATE amortization SET SALDO_ABIERTO_INTERESES= $saldoAbiertoInt WHERE AMORT_TABLE_ID = $pagoID"; 
   
    $saldoInt2 = "UPDATE amortization SET INTERESES_PAGADOS= $pagoDeIntereses WHERE AMORT_TABLE_ID = $pagoID";     

  
           

            if(mysqli_query($conn, $saldoInt1)){      
        
   
            } else{
                    echo 'ERROR: No se pudo guardar intereses. ' . mysqli_error($conn);
                };        

          if(mysqli_query($conn, $saldoInt2)){      
  

          } else{
                  echo 'ERROR: No se pudo guardar intereses. ' . mysqli_error($conn);
              };        
          $seguardaSaldoInt= FALSE;  
    }



    // Guardar Pago de intereses


    if($seguardaSaldoAmort){ 

        $cuota3= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
        $rowSaldo3 = mysqli_fetch_array($cuota3); 
        $amortization = $rowSaldo3['AMORTIZATION'];
        $interes = $rowSaldo3['INTEREST_AMOUNT'];    
        
    
            if($alcanzaPago1>$interes){
                $restaSaldo = $montoMenosMulta-$interes;
                $saldoAbiertoInt3 = $restaSaldo- $amortization;
               
              
            }
            elseif ($alcanzaPago1<=$interes) {
                $cubreinteres1 =0;
                $saldoAbiertoInt3 = $cubreinteres1-$amortization;
              
                
                  };  
        
         $saldoInt3 = "UPDATE amortization SET SALDO_ABIERTO_CUOTA= $saldoAbiertoInt3 WHERE AMORT_TABLE_ID = $pagoID"; 
           
    
   
               
    
                if(mysqli_query($conn, $saldoInt3)){      
            
       
                 } else{
                         echo 'ERROR: No se pudo guardar amortizacion. ' . mysqli_error($conn);
                 };        
                 $seguardaSaldoAmort= FALSE;      
      }


      if($seguardaAmortPagada){ 

        $cuota04= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
        $rowSaldo04 = mysqli_fetch_array($cuota04); 
        $amortization = $rowSaldo04['AMORTIZATION'];
        $interes = $rowSaldo04['INTEREST_AMOUNT'];    
        $alcanzaPago1 = $monto-$amortizacion;
    
            if($alcanzaPago1>$interes){
           
                $amortizacionPagada = $montoMenosMulta-$interes;
              
            }
            elseif ($alcanzaPago1<=$interes) {
               
                $amortizacionPagada =0;
                
                  };  
        
         
         $saldoInt004 = "UPDATE amortization SET AMORTIZACION_PAGADA= $amortizacionPagada WHERE AMORT_TABLE_ID = $pagoID";     
    
   
               
    
                if(mysqli_query($conn, $saldoInt004)){      
            
       
                 } else{
                         echo 'ERROR: Could not able to execute $sqlaMORTI. ' . mysqli_error($conn);
                 };        
                 $seguardaAmortPagada= FALSE;  
      }



      if($seguardaFecha){ 
    
        
    $date10 = "UPDATE amortization SET PAY_DATE_RECEIVED= '$newDate' WHERE AMORT_TABLE_ID = '$pagoID'";   
     

     
                if(mysqli_query($conn, $date10)){      
            
       
                 } else{
                         echo 'ERROR: Could not able to execute $sqlFecha. ' . mysqli_error($conn);
                 };        
                 $seguardaFecha= FALSE;  
                         
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
         
                   
         
                    if(mysqli_query($conn, $date12)){      
                
           
                     } else{
                             echo 'ERROR: Could not able to execute $sqlFecha. ' . mysqli_error($conn);
                     };        
                     $seguardaDias= FALSE;      
         }


         if($seactualizaTotal){  

          $queryPagoPen = mysqli_query($conn, "SELECT sum(PAYMENT_AMOUNT) FROM  payments WHERE REF_CUOTA = $cuotaApagar");
      
          // $totalPagosPen = 0;
      
          // while($pagosAcuota= mysqli_fetch_array($queryPagoPen)){
          //     $totalPagosPen = $totalPagosPen+ $pagosAcuota['PAYMENT_AMOUNT'];
          // }
      
          $rowPagoPen = mysqli_fetch_array($queryPagoPen);
          $totalPagosPen= $rowPagoPen['sum(PAYMENT_AMOUNT)'];
      
          $pagoPenFinal = $totalPagosPen + $monto-$monto;
      
      
          
         $pagoPendiente= "UPDATE payments SET SUMA_TOTAL_PAGADO = $pagoPenFinal WHERE REF_CUOTA = $cuotaApagar";
      


         

      
      if(mysqli_query($conn, $pagoPendiente)){      
                              
                     echo $totalPagosPen;             
              
         
      } else{
              echo 'ERROR: Could not able to execute $pagoPendiente. ' . mysqli_error($conn);
          };     
          

          $cuota100= mysqli_query($conn, "SELECT * FROM  amortization WHERE AMORT_TABLE_ID = $pagoID");
          $rowSaldo100 = mysqli_fetch_array($cuota100);
          
          $nuevoPagoSaldo = $rowSaldo100['PAYMENT_AMOUNT']-$
          $pago100 = "UPDATE amortization SET PAYMENT_AMOUNT = $monto WHERE AMORT_TABLE_ID = $pagoID";   
          
          $seactualizaTotal= FALSE;   
          
      }
?>

