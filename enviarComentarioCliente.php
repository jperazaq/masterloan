<?php  

ini_set( "display_errors", 0); 

error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);

if (isset($_POST['agregar_comentarioCliente'])){
    $comentario= $_POST['commentInputCliente'];
    $date= date('Y-m-d H:i:s', time());
    $codCreador = 0107;
    $creadorName="Julio Peraza";
    $customerId= $_GET['CUSTOMER_ID'];
    $loan_id = $_GET['LOANID'];
    $company_id= 232;
    $time = time('Y-m-d H:i:s', time());
    $seguarda = TRUE;
    
    
}
if($seguarda){
$sql = "INSERT INTO comentario_cliente ( COMENTARIO, CREADO_POR, COD_CREADOR, FECHA_COMENTARIO, CUSTOMER_ID, LOAN_ID, COMPANY_ID) VALUES ('$comentario','$creadorName', '$codCreador', '$date','$customerId','$loan_id','$company_id')";

if(mysqli_query($conn,$sql)){
   
}else{
    echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conn);
}
$seguarda=false;
}


?>