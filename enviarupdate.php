<?php
    include ("conexion.php");

    session_start();
    $varsession = $_SESSION['emailsess'];

    if(isset($_POST['actualizar'])){
        $nombreEmpresa = $_POST["nombreEmpresa"];
        $empresaID = $_POST["empresaID"];
        $email = $_POST["email"];
        $nombre = $_POST["nombre"];
        $papellido = $_POST["papellido"];
        $sapellido = $_POST["sapellido"];
        $telefono = $_POST["telefono"];
        $rol = $_POST["rol"];

       

        $update = true;

    }

    

if($update){

        
        

    $actualizarNombrePer = "UPDATE users SET FIRST_NAME = '$nombre' WHERE EMAIL_NUMBER = '$varsession'";
    if(mysqli_query($conn, $actualizarNombrePer)){                           
    }else{
            echo 'ERROR: No se pudo guardar nombre ' . mysqli_error($conn);
        };       

    $actualizarpapellido = "UPDATE users SET LAST_NAME = '$papellido' WHERE EMAIL_NUMBER = '$varsession'";
    if(mysqli_query($conn, $actualizarpapellido)){                           
    }else{
            echo 'ERROR: No se pudo guardar apellido ' . mysqli_error($conn);
        };       
   
        
    $actualizarsapellido = "UPDATE users SET SECOND_LAST_NAME = '$sapellido' WHERE EMAIL_NUMBER = '$varsession'";
    if(mysqli_query($conn, $actualizarpapellido)){                           
    }else{
            echo 'ERROR: No se pudo guardar segundo apellido ' . mysqli_error($conn);
        };
    
    $actualizarphone = "UPDATE users SET PHONE_NUMBER = '$telefono' WHERE EMAIL_NUMBER = '$varsession'";
    if(mysqli_query($conn, $actualizarphone)){                           
    }else{
            echo 'ERROR: No se pudo guardar telefono ' . mysqli_error($conn);
        };  
    
        $actualizarrol = "UPDATE users SET ID_EMPRESA = '$empresaID' WHERE EMAIL_NUMBER = '$varsession'";
    if(mysqli_query($conn, $actualizarrol)){                           
    }else{
            echo 'ERROR: No se pudo guardar Rol ' . mysqli_error($conn);
        };  


    $actualizaIdempresa = "UPDATE users SET JOB = '$rol' WHERE EMAIL_NUMBER = '$varsession'";
    if(mysqli_query($conn, $actualizaIdempresa)){                           
    }else{
            echo 'ERROR: No se pudo guardar Rol ' . mysqli_error($conn);
        };  

    

    echo $nombreEmpresa;
    $actualizarNombre = "UPDATE users SET NOMBRE_EMPRESA = '$nombreEmpresa' WHERE EMAIL_NUMBER = '$varsession'"; 

    if(mysqli_query($conn, $actualizarNombre)){      
                        
        echo "<script>window.alert('Actualizado con Exito!')
        </script>";            
        sleep(1);
         header('location:perfil.php');
        
    
    }else{
            echo 'ERROR: Could not able to execute $sqlSaldoAbierto. ' . mysqli_error($conn);
        };

    $update = false;   

    }
    
?>