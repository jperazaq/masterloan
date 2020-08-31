<?php 
include  ("conexion.php");
include  ("enviarNuevoPrestamo.php");

ini_set( "display_errors", 0); 




if (isset($_POST["guardar"])){
    $periodo = $_POST['periodo'];
    $tasa= $_POST['tasa'];  
    $monto= $_POST['montoPrestamo'];   
    $tipoPrestamo = $_POST['radioCuota'];   
    $clienteID = $_POST['clienteId'];
    
    $count = 0;         sleep(1);   

  

    $loanID  = $latest_id;

    $ranLoanNumber = $randomLoanNumber;    

    $cuota =$monto*((($tasa/100)*(pow((1+$tasa/100),$periodo)))/(pow(1+($tasa/100),$periodo)-1)); 
    $fecha_actual = date('Y-m-d');

   if( $tipoPrestamo == 'cuota_completa'){
        for($i = 0; $i<$periodo; $i++ ){
            
            
            
         $fechaPago =date ('Y-m-d',strtotime($fecha_actual."+ 1 month"));
         $fecha_actual = $fechaPago;
         


         $pagoInteres = $monto*($tasa/100);
        

         $amortizacion = $cuota-$pagoInteres;

         $monto = $monto -$amortizacion;

         $loanI = $loanID;
         $cliente=$clienteID;

         $count+=1;        
         
         
         

         $sql2 = "INSERT INTO amortization (NUM_PAGO,PAYMENT_DATE, INTEREST_AMOUNT, AMORTIZATION,CUOTA, SALDO,LOAN_ID,CUSTOMER_ID)
         VALUES ('$count','$fecha_actual', '$pagoInteres','$amortizacion','$cuota','$monto', '$loanI','$cliente')";
        
        $result = mysqli_query($conn,$sql2);

         
if(!$result){
       die('Invalid QUery:'.mysqli_error($conn));
};

   }   

}


elseif($tipoPrestamo == 'cuota_plana'){

  
    for($i = 0; $i<$periodo; $i++ ){
        
        
        
     $fechaPago1 =date ('Y-m-d',strtotime($fecha_actual."+ 1 month"));

     $fecha_actual = $fechaPago1;
     
     $cuotaPlana = ($monto/$periodo)+($monto*($tasa/100));

     $amortizacionPlana = $monto/$periodo;

     $pagoInteres = $monto*($tasa/100);
     $amortizacionPlana=$amortizacionPlana;
     $cuotaPlana= $cuotaPlana;  
     
    

    

     $loanI = $loanID;
     $cliente=$clienteID;

     $count+=1;        
     
     
     

     $sql2 = "INSERT INTO amortization (NUM_PAGO,PAYMENT_DATE, INTEREST_AMOUNT, AMORTIZATION,CUOTA, LOAN_ID,CUSTOMER_ID)
     VALUES ('$count','$fecha_actual', '$pagoInteres','$amortizacionPlana','$cuotaPlana', '$loanI', '$cliente')";
    
    $result = mysqli_query($conn,$sql2);

     
if(!$result){
   die('Invalid QUery:'.mysqli_error($conn));
};

}   

}






else{


    for($i = 0; $i<$periodo; $i++ ){
            
            
            
        $fechaPago =date ('Y-m-d',strtotime($fecha_actual."+ 1 month"));
        $fecha_actual = $fechaPago;
        
      

        $pagoInteres = $monto*($tasa/100);
        

        

        $monto = $monto;

        $loanI = $loanID;

        $count+=1;        
        
        
        

        $sql2 = "INSERT INTO amortization (NUM_PAGO,PAYMENT_DATE, INTEREST_AMOUNT, AMORTIZATION,CUOTA, SALDO, LOAN_ID, CUSTOMER_ID)
        VALUES ('$count','$fecha_actual', '$pagoInteres','$amortizacion','$pagoInteres','$monto', '$loanI','$cliente')";
       
       $result = mysqli_query($conn,$sql2);

       
if(!$result){
      die('Invalid Query:'.mysqli_error($conn));

};
    

    


}

};

};       


   
        
?>