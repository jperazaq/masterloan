<?php 

// include  ("conexion.php");



ini_set( "display_errors", 0); 

 




if (isset($_POST['guardar'])){
  
    $randomLoanNumber = rand(1000,9999); 
    $openDate= date('Y-m-d');
    $fechaFinal =date ('Y-m-d',strtotime($openDate."$periodoMeses month"));
    $cobradorClienteAcargo = $_POST['cobrador_cliente']; 
    $prestamo = $_POST["montoPrestamo"];
    $tasaInt = $_POST['tasa'];  
    $tasaInt =$_POST['tasa']; 
    $periodoMeses = $_POST['periodo'];
    $periodoMeses = $_POST['periodo'];
    $radioCuotaMonto = $_POST['radioCuota'];  
    $radioMonedaSim = $_POST['radioMoneda']; 
    $clienteIDNumber = $_POST['clienteId'];
    $empresaID = $_POST['idEmpresa'];
    $seGuarda= true;
    
   
};




$montoCuota = $prestamo*((($tasaInt/100)*(pow((1+$tasaInt/100),$periodoMeses)))/(pow(1+($tasaInt/100),$periodoMeses)-1));
$pagoInt = $prestamo*($tasaInt/100);
$fechaFinal =date ('Y-m-d',strtotime($openDate."$periodoMeses month"));
$cuotaPlana = ($prestamo/$periodoMeses)+($prestamo*($tasaInt/100));
$intPlano= $prestamo*($tasaInt/100);
$amortPlano = $prestamo/$periodoMeses;


if($seGuarda){
if($radioCuotaMonto == "cuota_completa"){
$sql = "INSERT INTO loans ( LOAN_AMOUNT, INTEREST_RATE, NET_TERMS,TIPO_DE_CUOTA, MONEDA,MONTO_CUOTA_TOTAL,MONTO_SOLO_INTERESES, STAR_DATE,END_DATE,USER_CLIENTE_ID, CUSTOMER_ID,EMPRESA_ID)
VALUES ('$prestamo', '$tasaInt','$periodoMeses','$radioCuotaMonto','$radioMonedaSim','$montoCuota','$pagoInt','$openDate','$fechaFinal','$cobradorClienteAcargo','$clienteIDNumber', '$empresaID')";

$sqlAmort= "INSERT INTO amortization (TODAY) VALUES ('$openDate')";
 
 
}

elseif($radioCuotaMonto="cuota_plana"){
    $sql = "INSERT INTO loans ( LOAN_AMOUNT, INTEREST_RATE, NET_TERMS,TIPO_DE_CUOTA, MONEDA,MONTO_CUOTA_TOTAL,MONTO_AMORTIZACION,MONTO_SOLO_INTERESES, STAR_DATE,END_DATE,USER_CLIENTE_ID, CUSTOMER_ID,EMPRESA_ID)
VALUES                       ('$prestamo', '$tasaInt','$periodoMeses','$radioCuotaMonto','$radioMonedaSim','$cuotaPlana','$amortPlano','$intPlano','$openDate','$fechaFinal','$cobradorClienteAcargo','$clienteIDNumber','$empresaID')";
$sqlAmort= "INSERT INTO amortization (TODAY) VALUES ('$openDate')";
}
else{
$sql = "INSERT INTO loans ( LOAN_AMOUNT, INTEREST_RATE, NET_TERMS,TIPO_DE_CUOTA, MONEDA,MONTO_SOLO_INTERESES, STAR_DATE,END_DATE,USER_CLIENTE_ID, CUSTOMER_ID, EMPRESA_ID)
VALUES ('$prestamo', '$tasaInt','$periodoMeses','$radioCuotaMonto','$radioMonedaSim','$pagoInt','$openDate','$fechaFinal','$cobradorClienteAcargo','$clienteIDNumber', '$empresaID')";

$sqlAmort= "INSERT INTO amortization (TODAY) VALUES ('$openDate')";

};
$seGuarda=false;
};

unset($montoCuota,$clienteIDNumber,$cobradorClienteAcargo,$fechaFinal,$tasaInt,$radioCuotaMonto,$radioMonedaSim,$randomLoanNumber,$prestamo,$periodoMeses,$pagoInt);



if(mysqli_query($conn, $sql)){      

    $latest_id = $conn->insert_id; 

     

    echo "<script>window.alert('Registro Satisfactorio en la Base de datos!');
    </script>";  
  
    
} else{
       
    }   
    ;

    ini_set( "display_errors", 0); 
   
        
?>