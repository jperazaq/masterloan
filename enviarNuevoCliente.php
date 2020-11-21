<?php 

include ("conexion.php");

// ini_set( "display_errors", 0); 

// error_reporting(E_ALL ^ E_NOTICE);
// ini_set('error_reporting', E_ALL ^ E_NOTICE);
    

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
$seGuardaUsuario = true;


echo $cedula;
echo $fisrtName;
echo $lastName;
echo $secondLastName;
echo $dob1;
echo $userName;
echo $mail1;
echo $rol;
echo $phone;
echo $nombreEmpresa;
echo $empresaID;
echo $pass1;
echo $passConf;

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



   if($seGuardaUsuario){
    $sql = "INSERT INTO users (ID_NUMBER, FIRST_NAME, LAST_NAME,SECOND_LAST_NAME, USER_USER, PHONE_NUMBER, EMAIL_NUMBER, DATE_OF_BIRTH,AGE,JOB,NOMBRE_EMPRESA,ID_EMPRESA,USER_PASSWORD)
            VALUES ('$cedula','$fisrtName','$lastName', '$secondLastName',  '$userName', '$phone','$mail', '$dob2','$age1',  '$rol', '$nombreEmpresa', '$empresaID','$pass')";

        $seGuardaUsuario = false;

   };
    if(mysqli_query($conn, $sql)){    
        header('Location: indexDone.html');
        exit;

          
    } else{
        echo 'ERROR: Could not able to execute $sql. '. mysqli_error($sql);
     
      $seGuardaUsuario = false;
        }

        
        ;
        
?>