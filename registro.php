<?php  
 session_start();
ini_set( "display_errors", 0); 

error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
include  ('conexion.php');
include  ("enviarNuevoCliente.php");

if  (isset($_POST['login'])){

  $email = $_POST['email'];
  $pass = $_POST['password'];
  $ingresar = true;

}

if($ingresar){
$query = "SELECT * from users WHERE EMAIL_NUMBER ='$email' AND USER_PASSWORD = '$pass' ";

$resultado = mysqli_query($conn, $query);

$filas = mysqli_num_rows($resultado);



if($filas >0){
  session_start();
  $_SESSION['emailsess'] = $email;
  header("Location: dashboard.php");
}else{
  $mensaje= "Los datos ingresados son incorrectos!";
}

 mysqli_free_result($resultado);

 mysqli_close($conn);
 
 $ingresar = false;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Master Loan Ingreso</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./login/assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container" >
      <div class="card login-card" style="width:1000px">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="./login/assets/images/login.jpg" alt="login" class="login-card-img" >
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <h1> Master Loan </h1>
              </div>
              <p class="login-card-description">Cree su cuenta</p>
              <form action="" method="POST">
              <div class="form-group row">
            
            <label for="cedula" class="col-sm-4 col-form-label">Cedula</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="cedula_usuario" name="cedula_user" placeholder="Ejemplo: 102340567">
            </div>

            <label for="inputPassword3" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder=" Ejemplo: Juan ">
                </div>

                <label for="inputPassword3" class="col-sm-6 col-form-label">Primer Apellido</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="papellido_usuario"  name="papellido_usuario" placeholder="Ejemplo: Perez">
                </div>   

                <label for="inputPassword3" class="col-sm-6 col-form-label">Segundo Apellido</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="sapellido_usuario" name="sapellido_usuario" placeholder="Ejemplo: Rojas">
                </div>

                <label for="inputPassword3" class="col-sm-6 col-form-label">Nombre Empresa</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" placeholder=" Ejemplo: Juan ">
                </div>

                <label for="inputPassword3" class="col-sm-6 col-form-label">Id de Empresa</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="empresaID" name="empresaID" placeholder=" Ejemplo: Juan ">
                </div>


                <label for="inputPassword3" class="col-sm-6 col-form-label">Password</label>
                <div class="col-md-10">
                <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder=" ">
                </div>

                <label for="inputPassword3" class="col-sm-8 col-form-label">Confirmar Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="confirm_password_usuario" name="confirm_password_usuario" placeholder=" ">
                </div>

                <label for="inputPassword3" class="col-sm-4 col-form-label">Correo</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="correo_usuario" name="correo_usuario" placeholder="Ejemplo: correo@correo.com">
                </div>

                <label for="inputPassword3" class="col-sm-4 col-form-label">Telefono</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ejemplo: 555 555 55">
                </div>

                <label for="inputPassword3" class="col-sm-6 col-form-label">Fecha de Nacimiento</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="nacimiento_usuario" name="nacimiento_usuario" placeholder="">
                </div>
            </div>
            <label for="inputPassword3" class="col-sm-2 col-form-label">Rol</label>
            
                        <div class="col-sm-10">

                        <select class="custom-select my-1 mr-sm-2" id="rol_usuario" name="rol_usuario">
                            <option selected>Seleccione...</option>
                                
                            <option value="Administrador">Administrador</option>
                            <option value="Analista">Analista</option>
                            <option value="Consultor">Consultor</option>
                            
                            
                        </select>
                </div>

            
             </div>

             
                    
                  <div class="form-group mb-4">
                    
                  <input name="guardarUsuario" id="guardarUsuario" type="submit" class="btn btn-block login-btn mb-4"  value="Registrarse"><br>
                <h4><?php echo $mensaje ?></h4><br>
                <a href="#!" class="forgot-password-link">Olvido su contraseña?</a><br>
                <a href="index.php" class="forgot-password-link">Login</a>
               
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
