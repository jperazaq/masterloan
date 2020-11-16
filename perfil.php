<!doctype html>
<html lang="en">
  <head>
  	<title>Perfil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">


<?php
    include  ('conexion.php');


session_start();  
$varsession = $_SESSION['emailsess'];




$querySes = mysqli_query($conn, "SELECT `idUSERS`, `ID_NUMBER`, `FIRST_NAME`, `LAST_NAME`, `SECOND_LAST_NAME`, `USER_USER`, `PHONE_NUMBER`, `EMAIL_NUMBER`, `DATE_OF_BIRTH`, `AGE`, `JOB`,  `NOMBRE_EMPRESA`,`ID_EMPRESA`,`USER_PASSWORD`
 FROM `users` WHERE EMAIL_NUMBER = '$varsession'");
$rowses = mysqli_fetch_array($querySes);
$nombrein = $rowses['FIRST_NAME'];
$idEmpreasSess= $rowses['ID_EMPRESA'];
echo $idEmpreasSess;

if ($varsession == NULL || $varsession = ""){
  header("LOCATION: nuevo.php")
  ;
  die();

}



$query1 = mysqli_query($conn, " SELECT customers.FIRST_NAME, customers.LAST_NAME, customers.SECOND_LAST_NAME, customers.ID_NUMBER, customers.CUSTOMER_ID,
loans.LOAN_ID, loans.STAR_DATE, loans.MONTO_CUOTA_TOTAL, sum(LOAN_AMOUNT), loans.MONTO_SOLO_INTERESES,loans.USER_CLIENTE_ID
  FROM customers AS customers
INNER JOIN loans AS loans ON customers.EMPRESA_ID = loans.EMPRESA_ID GROUP BY EMPRESA_ID WHERE EMPRESA_ID = $idEmpreasSess");


$query3 = mysqli_query($conn, " SELECT customers.FECHA_REG, customers.EMAIL, customers.PHONE_NUMBER,customers.FIRST_NAME, customers.LAST_NAME, customers.SECOND_LAST_NAME, customers.ID_NUMBER, customers.CUSTOMER_ID,customers.EMPRESA_ID,
loans.LOAN_ID, loans.STAR_DATE, loans.MONTO_CUOTA_TOTAL, loans.LOAN_AMOUNT,loans.MONTO_SOLO_INTERESES,loans.USER_CLIENTE_ID,loans.EMPRESA_ID
  FROM customers AS customers
INNER JOIN loans AS loans ON customers.EMPRESA_ID = loans.EMPRESA_ID WHERE loans.EMPRESA_ID = $idEmpreasSess "  );

$query4 = mysqli_query($conn, "SELECT * from customers");



?>
  <head>


  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active" style="background-color:#222831">
				<h1><a href="index.html" class="logo">ML</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="dashboard.php"><span class="fa fa-home"></span> Dashboard</a>
          </li>
          <li>
              <a href="clientes.php"><span class="fa fa-user"></span> Clientes</a>
          </li>
          <li>
            <a href="prestamos.php"><span class="fa fa-credit-card-alt"></span> Prestamos</a>
          </li>
          <li>
            <a href="cobros.php"><span class="fa fa-money"></span> Cobros</a>
          </li>
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

        <!-- Page Content  -->
        <head>
      <div id="content" class="p-4 p-md-5" style="margin-top:0px; width:100%;background-color:#FFFDF7">

        <nav class="navbar navbar-expand-lg " style="background-color:#eeeeee">
          <div class="container-fluid"  >

          <h2>Howleet Capital</h2>

            <!-- <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button> -->
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent"   >
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container col-lg-12">
          <h1>Perfil</h1>

        </div>
    

        </div>
    </div>
   

    
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>