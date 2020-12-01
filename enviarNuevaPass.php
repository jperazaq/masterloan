<?php
    include ("conexion.php");

    ini_set( "display_errors", 0); 
  
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('error_reporting', E_ALL ^ E_NOTICE);

    session_start();
    $varsession = $_SESSION['emailsess'];

    if(isset($_POST['actualizar'])){
        $pass = $_POST["pass"];
        $cpass = $_POST["pass"];

       

        $update = true;

    }
    if($pass==$cpass){

        $npass= sha1($pass);
                        
       
    
    }else{
        echo "<script>window.alert('Password No coincide')
        </script>";            
        sleep(1);
         header('location:perfil.php');
        
        };
    

if($update){

        
        

    $actualizarPass = "UPDATE users SET USER_PASSWORD = '$npass' WHERE EMAIL_NUMBER = '$varsession'";
     

    if(mysqli_query($conn, $actualizarPass)){      
                        
        echo "<script>window.alert('Actualizado con Exito!')
        </script>";            
        sleep(1);
         header('location:cerrasesion.php');
        
    
    }else{
            echo 'ERROR: Could not able to execute $sqlSaldoAbierto. ' . mysqli_error($conn);
        };

    $update = false;   

    }
    
?>