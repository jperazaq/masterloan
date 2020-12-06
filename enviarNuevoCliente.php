<?php 

include ("conexion.php");

ini_set( "display_errors", 0); 

error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
    

if(isset($_POST['guardarUsuario'])){
$cedula = $_POST["cedula_user"];
$fisrtName = $_POST['nombre_usuario'];
$lastName = $_POST['papellido_usuario'];
$secondLastName = $_POST['sapellido_usuario'];   
$DOB = $_POST['nacimiento_usuario'];
$dob1 = strtotime($DOB);
$dob2 = date('Y-m-d',$dob1);
$userName = $_POST['usuario_usuario'];
$mail1 = $_POST['correo_usuario'];
$rol = $_POST['rol_usuario'];
$phone = $_POST['telefono'];
$nombreEmpresa = $_POST['nombreEmpresa'];
$empresaID = $_POST['empresaID'];
$pass1 = $_POST['password_usuario'];
$passConf = $_POST['confirm_password_usuario'];

        $fecha_nac = New DateTime($dob1);

        $hoy = New DateTime(date("Y-m-d"));

        $age = $fecha_nac ->diff($hoy);

        $age1 = $age ->format("%r%a");
$seGuardaUsuario1 = true;




};

if($pass1==$passConf){
        $pass = sha1($pass1);
}else{
        echo "<script>window.alert('La contraseña no coincide');
        </script>";

     
}
    
$queryCorreoDoble = mysqli_query($conn, "SELECT * FROM  users");
    $rowCorreo= mysqli_fetch_array($queryCorreoDoble);

    if($rowCorreo['EMAIL_NUMBER']===$mail1 && $mail1 != null){
        echo "<script>window.alert('Correo ya existe');
        </script>";

      
    }else{
            $mail= $mail1;
           
    }



   if($seGuardaUsuario1){
    $sql33 = "INSERT INTO users (ID_NUMBER, FIRST_NAME, LAST_NAME,SECOND_LAST_NAME, PHONE_NUMBER, EMAIL_NUMBER, DATE_OF_BIRTH,AGE,JOB,NOMBRE_EMPRESA,ID_EMPRESA,USER_PASSWORD)
            VALUES ('$cedula','$fisrtName','$lastName', '$secondLastName', '$phone','$mail', '$dob2','$age1',  '$rol', '$nombreEmpresa', '$empresaID','$pass')";


   };
    if(mysqli_query($conn, $sql33)){    
        echo "<script>window.alert('Registro Satisfactorio en la Base de datos!')
                 </script>" ;       
                 
                 header("Location: registroDone.php");
                 $seGuardaUsuario1 = false;
    }else{        
        echo 'ERROR: Could not able to execute $sql. '. mysqli_error($sql33);

        echo "<script>window.alert('Ha ocurrido un error!')
        </script>" ;
        $seGuardaUsuario1 = false;
        }

        
      
        ;
        
?>