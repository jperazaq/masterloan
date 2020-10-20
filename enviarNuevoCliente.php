<<<<<<< HEAD
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
$dob1 = date('Y-m-d',$dob1);
$userName = $_POST['usuario_usuario'];
$mail = $_POST['correo_usuario'];
$rol = $_POST['rol_usuario'];
$phone = $_POST['telefono'];
$pass = password_hash($_POST['password_usuario'], PASSWORD_BCRYPT);

        $fecha_nac = New DateTime($dob1);

        $hoy = New DateTime(date("Y-m-d"));

        $age = $fecha_nac ->diff($hoy);

        $age1 = $age ->format("%r%a");
$seGuardaUsuario = true;



};
    

   if($seGuardaUsuario){
    $sql = "INSERT INTO users (ID_NUMBER, FIRST_NAME, LAST_NAME,SECOND_LAST_NAME, USER_USER, PHONE_NUMBER, EMAIL_NUMBER, DATE_OF_BIRTH,AGE,JOB,USER_PASSWORD)
            VALUES ('$cedula','$fisrtName','$lastName', '$secondLastName',  '$userName', '$phone','$mail', '$dob1','$age1',  '$rol','$pass')";

        $seGuardaUsuario = false;

   };
    if(mysqli_query($conn, $sql)){    
        echo "<script>window.alert('Registro Satisfactorio en la Base de datos!');
        </script>";  

          
    } else{
            echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conn);
        }

        
        ;
        
=======
<?php 

include ("conexion.php");

      error_reporting(E_ALL ^ E_NOTICE);
      ini_set('error_reporting', E_ALL ^ E_NOTICE);
    

if(isset($_POST['guardarUsuario'])){
$cedula = $_POST["cedula_user"];
$fisrtName = $_POST['nombre_usuario'];
$lastName = $_POST['papellido_usuario'];
$secondLastName = $_POST['sapellido_usuario'];   
$DOB = $_POST['nacimiento_usuario'];
$dob1 = strtotime($DOB);
$dob1 = date('Y-m-d',$dob1);
$userName = $_POST['usuario_usuario'];
$mail = $_POST['correo_usuario'];
$rol = $_POST['rol_usuario'];
$phone = $_POST['telefono'];
$pass = password_hash($_POST['password_usuario'], PASSWORD_BCRYPT);

        $fecha_nac = New DateTime($dob1);

        $hoy = New DateTime(date("Y-m-d"));

        $age = $fecha_nac ->diff($hoy);

        $age1 = $age ->format("%r%a");
$seGuardaUsuario = true;



};
    

   if($seGuardaUsuario){
    $sql = "INSERT INTO users (ID_NUMBER, FIRST_NAME, LAST_NAME,SECOND_LAST_NAME, USER_USER, PHONE_NUMBER, EMAIL_NUMBER, DATE_OF_BIRTH,AGE,JOB,USER_PASSWORD)
            VALUES ('$cedula','$fisrtName','$lastName', '$secondLastName',  '$userName', '$phone','$mail', '$dob1','$age1',  '$rol','$pass')";

        $seGuardaUsuario = false;

   };
    if(mysqli_query($conn, $sql)){    
        echo "<script>window.alert('Registro Satisfactorio en la Base de datos!');
        </script>";  

          
    } else{
            echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conn);
        }

        
        ;
        
>>>>>>> e90219b47302d82c4d9aa683e2636f89eae7be42
?>