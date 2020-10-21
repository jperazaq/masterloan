<!doctype html>
  <html lang="en">

  <?php 
  include  ('conexion.php');


  session_start();  
  $varsession = $_SESSION['emailsess'];

  
  

  $querySes = mysqli_query($conn, "SELECT `idUSERS`, `ID_NUMBER`, `FIRST_NAME`, `LAST_NAME`, `SECOND_LAST_NAME`, `USER_USER`, `PHONE_NUMBER`, `EMAIL_NUMBER`, `DATE_OF_BIRTH`, `AGE`, `JOB`, `USER_PASSWORD`
   FROM `users` WHERE EMAIL_NUMBER = '$varsession'");
  $rowses = mysqli_fetch_array($querySes);
  $nombrein = $rowses['FIRST_NAME'];
 
 
  if ($varsession == NULL || $varsession = ""){
    header("LOCATION: nuevo.php")
    ;
    die();

  }

 
  $query3 = mysqli_query($conn, " SELECT customers.FIRST_NAME, customers.LAST_NAME, customers.SECOND_LAST_NAME, customers.ID_NUMBER, customers.CUSTOMER_ID,
  loans.LOAN_ID, loans.STAR_DATE, loans.MONTO_CUOTA_TOTAL, sum(LOAN_AMOUNT), loans.MONTO_SOLO_INTERESES,loans.USER_CLIENTE_ID
    FROM customers AS customers
  INNER JOIN loans AS loans ON customers.CUSTOMER_ID = loans.CUSTOMER_ID GROUP BY CUSTOMER_ID");

 
  $query3 = mysqli_query($conn, " SELECT customers.FIRST_NAME, customers.LAST_NAME, customers.SECOND_LAST_NAME, customers.ID_NUMBER, customers.CUSTOMER_ID,
  loans.LOAN_ID, loans.STAR_DATE, loans.MONTO_CUOTA_TOTAL, loans.LOAN_AMOUNT, loans.MONTO_SOLO_INTERESES,loans.USER_CLIENTE_ID
    FROM customers AS customers
  INNER JOIN loans AS loans ON customers.CUSTOMER_ID = loans.CUSTOMER_ID");

  
  
  ?>
    <head>
      <title>Clientes</title>
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
      
      <div class="wrapper d-flex align-items-stretch" style="margin-top:50px">
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
        
        <div id="content" class="p-4 p-md-5" style="margin-top:0px; width:100%;background-color:#FFFDF7" >

          <!-- <nav class="navbar navbar-expand-lg " style="background-color:#eeeeee "> -->
            <div class="container-fluid"    >

           

              
            <header >
            <div class="collapse navbar-collapse" id="navbarSupportedContent"  >
                <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Crear Nuevo Prestamo</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Descargar</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </nav>  </header>
              
          <div class="container col-lg-12" >
            
            <h1 >Clientes</h1><hr>
                   <a href="nuevoCliente.php" class="btn btn-primary">Crear Cliente</a>
                  
                  <a href="nuevoPrestamo.php" class="btn btn-primary">Crear nuevo credito</a>
            

          
         
            <div class="container mb-5 mt-3 col-lg-12">
              <table class="table  myDataTable " style="width:100%; text-align:center" >

              
              <thead class= "thead-dark">
                  <tr>
                      <th colspan="1" rowspan="2">Nombre</th>
                     

                  </tr>
                  <tr>
                      
                      <th>Cedula</th>
                      <th>Monto del Prestamo </th>
                      <th>Prestamo ID </th>
                      <th>Fecha Apertura </th>
                      <th>Pago mensual </th>
                      <th>Pago Solo Intereses </th>
                      <th>Pago Amortizacion </th>
                      <th>Analista </th>
                      <th>Dias de Atraso </th>
                      <th>Total Atraso </th>
                      
                      <th>Acciones </th>

                      

                      
                  </tr>
                  
              </thead>
                  
              <tbody>
              <?php 
                  while($datos = mysqli_fetch_array($query3)){   
                    $id= $datos['LOAN_ID'];                     
                    $idnumber= $datos['ID_NUMBER'];  
                    $customer_id= $datos['CUSTOMER_ID']; 
                                             
                ?>
              <tr>
                  <td><?php echo $datos['FIRST_NAME'], ' ', $datos['LAST_NAME']. ' ', $datos['SECOND_LAST_NAME']  ?></td>
                  <td><?php echo $datos['ID_NUMBER']?></td>
                  <td><?php echo $datos['LOAN_AMOUNT']?></td>
                  <td><?php echo $datos['LOAN_ID']?></td>
                  <td><?php echo $datos['STAR_DATE']?></td>
                  <td><?php echo $datos['MONTO_CUOTA_TOTAL']?></td>
                  <td><?php echo $datos['MONTO_SOLO_INTERESES']?></td> 
                  <td><?php echo  $datos['MONTO_CUOTA_TOTAL']-$datos['MONTO_SOLO_INTERESES']?></td>                  
                  <td><?php echo $datos['USER_CLIENTE_ID']?></td>
                  
                  <td>0</td>
                  <td>0</td>

                  <td><?php echo "<a href='detalleCliente.php?LOAN_ID=$id&ID_NUMBER=$idnumber&CUSTOMER_ID=$customer_id&LOANID=$id'>Ver Detalles</a>"?></td>
                  
                  
                    <?php 
                  }
                ?>
                 
                  
                  
              </tr>
             
             </td>
             


              
              </tbody>

              <!-- <tfoot>
              
                      <th>Nombre</th>
                      <th>Cedula</th>
                      <th>Monto del Prestamo </th>
                      <th>Fecha Apertura </th>
                      <th>Pago mensual </th>
                      <th>Fecha de Pago </th>
                      <th>Dias de Atraso </th>
                      <th>Acciones </th>

              </tfoot> -->

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