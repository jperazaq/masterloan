<!doctype html>
  <html lang="en">

  <?php 
  include  ('conexion.php');


  session_start();  
  $varsession = $_SESSION['emailsess'];

  echo $varsession;
  

  $querySes = mysqli_query($conn, "SELECT * FROM users WHERE EMAIL_NUMBER = '$varsession'");
  $rowses = mysqli_fetch_array($querySes);
  $nombrein = $rowses['FIRST_NAME'];
  $idEmpreasSess= $rowses['ID_EMPRESA'];
  echo $nombrein;

  if ($varsession == NULL || $varsession = ""){
    header("LOCATION: nuevo.php")
    ;
    die();

  }

 
  $query1 = mysqli_query($conn, " SELECT * from users WHERE ID_EMPRESA = $idEmpreasSess");


$row99 = mysqli_fetch_array($query1);

$nombreEmpresa = $row99['NOMBRE_EMPRESA'];
$idEmpresa = $row99['idUSERS'];
$firstName = $row99['FIRST_NAME'];
$lastName = $row99['LAST_NAME'];
$SecondLastName = $row99['SECOND_LAST_NAME'];
$phoneNumber = $row99['PHONE_NUMBER'];
$DOB = $row99['DATE_OF_BIRTH'];
$JOB = $row99['JOB'];
$IdDeEmpresa = $row99['ID_EMPRESA'];
$email = $row99['EMAIL_NUMBER'];


 
  $query3 = mysqli_query($conn, " SELECT customers.FECHA_REG, customers.EMAIL, customers.PHONE_NUMBER,customers.FIRST_NAME, customers.LAST_NAME, customers.SECOND_LAST_NAME, customers.ID_NUMBER, customers.CUSTOMER_ID,customers.EMPRESA_ID,
  loans.LOAN_ID, loans.STAR_DATE, loans.MONTO_CUOTA_TOTAL, loans.LOAN_AMOUNT,loans.MONTO_SOLO_INTERESES,loans.USER_CLIENTE_ID,loans.EMPRESA_ID
    FROM customers AS customers
  INNER JOIN loans AS loans ON customers.EMPRESA_ID = loans.EMPRESA_ID WHERE loans.EMPRESA_ID = $idEmpreasSess "  );

  $query4 = mysqli_query($conn, "SELECT * from customers");

  
  
  ?>
    <head>
      <title>Editar Perfil</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="css/style.css">
          <link rel="stylesheet" href="css/styleTable.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap.min.css" integrity="sha512-0YVVtCCoMlojS9USh8nXXYNhCxaeqJqTPJtJhBvtzrashDrRU8N9VWOxaBA5gfDlXYIDhbB/IxoMGZeZivOjew==" crossorigin="anonymous" />

          
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
          
    </head>
    <body>
    <div class= "wrapper " >
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="height: 50px;color:#222831; ">
    <a href="#" class="navbar-brand">Master Loan</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse" >
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active"></a>
            <a href="#" class="nav-item nav-link"></a>
            <a href="#" class="nav-item nav-link"></a>
            <a href="#" class="nav-item nav-link disabled" tabindex="-1"></a>
        </div>
        <div class="navbar-nav ml-auto">
            <a href="#" class="nav-item nav-link">Bienvenido <?php echo $nombrein?></a> <h2 >|</h2>
            <a href="../masterlender/nuevoPrestamo.php" class="nav-item nav-link">Nuevo Credito </a> 
            <a href="../masterlender/nuevoCliente.php" class="nav-item nav-link">Nuevo Cliente </a> 
            <a href="../masterlender/cerrasesion.php" class="nav-item nav-link">Cerrar Sesion </a> 
        </div>
    </div>
</nav>
</div>
      
      <div class="wrapper d-flex align-items-stretch" style="margin-top:15px">
        <nav id="sidebar" class="active " style="background-color:#343a40" >
         
          <ul class="list-unstyled components mb-5"  style=" position: fixed">

          <h1><a href="index.html" class="logo">ML</a></h1>
            <li class="active" >
              <a href="dashboard.php"><span class="fa fa-home"></span> Dashboard</a>
            </li>
            <li>
                <a href="clientes.php"><span class="fa fa-user"></span> Clientes</a>
            </li>
            <li>
              <a href="prestamos.php"><span class="fa fa-credit-card-alt"></span> Prestamos</a>
            </li>
            <!-- <li>
              <a href="cobros.php"><span class="fa fa-money"></span> Cobros</a>
            </li> -->
            <li>
              <a href="perfil.php"><span class="fa fa-address-card-o"></span> Perfil</a>
            </li>
          </ul>

          <div class="footer">
            <p>
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Barricade Systems <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
            </p>
          </div>
        </nav>
        
        <br><br>

          <!-- Page Content  -->
        
        <div id="content" class="p-4 p-md-5" style="margin-top:0px; width:100%;background-color:#FFFDF7" >

          <!-- <nav class="navbar navbar-expand-lg " style="background-color:#eeeeee "> -->
            <div class="container-fluid"    >

           
<br>
              
            
              
          <div class="container col-lg-12"  >
            
            <h1 ><?php  echo $nombreEmpresa ?></h1><hr>

           <a href='editarperfil.php?nombreempresa="<?php echo $nombreEmpresa?>"&empresaID="<?php echo $IdDeEmpresa?>"&email="<?php echo $email?>"&repName="<?php echo $firstName?>"
            &lastName="<?php echo $lastName?>"
            &scdlastname="<?php echo $SecondLastName?>"
            &telefono="<?php echo $phoneNumber?>"
            &rol="<?php echo $JOB?>"
            '>Editar Perfil</a>
                   
            <a href='cambiarPassword.php?nombreempresa="<?php echo $nombreEmpresa?>"&empresaID="<?php echo $IdDeEmpresa?>"&email="<?php echo $email?>"&repName="<?php echo $firstName?>"
            &lastName="<?php echo $lastName?>"
            &scdlastname="<?php echo $SecondLastName?>"
            &telefono="<?php echo $phoneNumber?>"
            &rol="<?php echo $JOB?>"
            '> |Cambiar Contraseña</a>
            
<br>
          

                  <div class="container col-lg-3  "style ="margin-left:0px">
    <div class="row">
      <div class="col-sm">
    
    <br>

        <table class="table" >
          <thead>
            <tr>
              
            </tr>
          </thead>
          <tbody>

          <tr>
              
              <td>Nombre de la Empresa</td>
              <td><?php echo $nombreEmpresa?></td>
              
            </tr>
  
            <tr>
              
              <td>Empresa Id</td>
              <td><?php echo $IdDeEmpresa?></td>
              
            </tr>
            <tr>
              
              <td>Email</td>
              <td><?php echo $email ?></td>
              
            </tr>

            <tr>     
                                                            
              <td>Nombre representante</td>
              <td><?php echo $firstName," ", $lastName," ",$SecondLastName ?></td>                            
            </tr>

            

            <tr>                                                     
              <td>Telefono</td>
              <td><?php echo $phoneNumber?></td>                            
            </tr>

            <tr>                                                     
              <td>Rol</td>
              <td><?php echo $JOB?></td>                            
            </tr>



</tbody>
        </table>
      </div>
         

        </div>
      </div>
      
        
          
    



        
          
    




    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pooper.js/1.14.7/umd/pooper.min.js" ></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"></script>
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.min.js" integrity="sha512-T970v+zvIZu3UugrSpRoyYt0K0VknTDg2G0/hH7ZmeNjMAfymSRoY+CajxepI0k6VMFBXxgsBhk4W2r7NFg6ag==" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>

      <script src="juliojs.js"></script>

      <script>
      $('.myDataTable').DataTable({
          order:[[5,"desc"]],
          pagingType:'full_numbers'
          
      }); 
  </script>
    
    </body>
  </html>