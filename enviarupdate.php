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

    echo $nombre;
    $actualizarNombre = "UPDATE users SET NOMBRE_EMPRESA = '$nombreEmpresa' WHERE EMAIL_NUMBER = '$varsession'"; 

    if(mysqli_query($conn, $actualizarNombre)){      
                        
        echo "<script>window.alert('Actualizado con Exito!')
        </script>";            
        sleep(2);
         header('location:perfil.php');
        
   
    }else{
            echo 'ERROR: Could not able to execute $sqlSaldoAbierto. ' . mysqli_error($conn);
        };        
     
    }
    $update = false;   
?>