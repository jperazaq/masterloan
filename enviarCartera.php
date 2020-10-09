<?php 
  ini_set( "display_errors", 0); 
  
include ("conexion.php");

    if(isset($_POST['crearCartera'])){


    $montoCartera = $_POST['montoCartera'];
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

    $phone = $_POST['telefono_cliente'];
    
     
    $fechaReg = date("Y-m-d");
        
    $provincia =$_POST['provincia_cliente'];
    $canton =$_POST['canton_cliente'];
    $distrito =$_POST['distrito_cliente'];
    $senas =$_POST['senas_cliente'];
    $seguardaCartera= true;
    $pais= $_POST['pais_cliente'];

    };
    
    

  if($seguardaCartera){ 
    $sql = "INSERT INTO carteras (MONTO_CARTERA,ID_NUMBER, FIRST_NAME, LAST_NAME,SECOND_LAST_NAME, PHONE_NUMBER, EMAIL,FECHA_REG,PROVINCIA,CANTON,DISTRITO,SENAS,PAIS)
            VALUES ('$montoCartera','$cedula_cliente','$nombre_cliente','$primer_apellido_cliente', '$segundo_apellido_cliente',  '$phone', '$mail', '$fechaReg','$provincia','$canton','$distrito','$senas','$pais')";
            $seguardaCartera = false;
            if(mysqli_query($conn, $sql)){      
                echo "<script>window.alert('Registro Satisfactorio en la Base de datos!');
                                  
    </script>";  
                
            } else{
                 echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conn);
                };          
                
                
  }


       

        
?>