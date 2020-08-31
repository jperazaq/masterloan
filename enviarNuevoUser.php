<?php 
  ini_set( "display_errors", 0); 
  
include ("conexion.php");

    if(isset($_POST['crearCliente'])){


    
    $cedula_cliente = $_POST['cedula_cliente'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $primer_apellido_cliente = $_POST['papellido_cliente'];
    $segundo_apellido_cliente = $_POST['sapellido_cliente'];    
    
    $provincia = $_POST['provincia_cliente'];
    $canton = $_POST['canton_cliente'];
    $distrito = $_POST['distrito_cliente'];
    $pais = $_POST['pais_cliente'];
    $senal = $_POST['senas_cliente'];
    $mail = $_POST['email_cliente'];
    $ocupacion = $_POST['ocupacion_cliente'];
    $phone = $_POST['telefono_cliente'];
    $ingreso = $_POST['ingreso_cliente'];
    $dedicacion =$_POST['dedicacion_cliente'];
    $cobrador =$_POST['cobrador_cliente'];
    $fechaReg = date("Y-m-d");
    $seguardaCliente = true;
    $provincia =$_POST['provincia_cliente'];
    $canton =$_POST['canton_cliente'];
    $distrito =$_POST['distrito_cliente'];
    $senas =$_POST['senas_cliente'];


    };
    
    

  if($seguardaCliente){ 
    $sql = "INSERT INTO customers (ID_NUMBER, FIRST_NAME, LAST_NAME,SECOND_LAST_NAME, PHONE_NUMBER, EMAIL,OCUPATION,MONTHLY_AVERAGE_INCOME,TIME_IN_BUSSINESS,ANALYST_ID,FECHA_REG,PROVINCIA,CANTON,DISTRITO,SENAS)
            VALUES ('$cedula_cliente','$nombre_cliente','$primer_apellido_cliente', '$segundo_apellido_cliente',  '$phone', '$mail','$ocupacion', '$ingreso','$dedicacion', '$cobrador', '$fechaReg','$provincia','$canton','$distrito','$senas')";
            $seguardaCliente = false;
            if(mysqli_query($conn, $sql)){      
                echo "<script>window.alert('Registro Satisfactorio en la Base de datos!');
                                  
    </script>";  
                
            } else{
                    echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conn);
                };          
                
                
  }


       

        
?>