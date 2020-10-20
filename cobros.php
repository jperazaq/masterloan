<<<<<<< HEAD
<!doctype html>
    <html lang="en">

    <?php
    include  ('conexion.php');
    include  ('enviarPago.php');
    include  ('enviarComentarioCliente.php');

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

    $clienteId= $_GET['ID_NUMBER'];
    $customers_id= $_GET['CUSTOMER_ID'];
    $loan_id = $_GET['LOANID'];
    

    
    
    $query9 = mysqli_query($conn, "SELECT * FROM  amortization WHERE CUSTOMER_ID = $customers_id");

    

    $query22 = mysqli_query($conn, "SELECT customers.FIRST_NAME, customers.LAST_NAME, customers.SECOND_LAST_NAME, customers.ID_NUMBER, customers.CUSTOMER_ID,
    amortization.LOAN_ID, amortization.PAYMENT_DATE, amortization.CUOTA, amortization.ARREAR, amortization.LOAN_ID, amortization.NUM_PAGO
      FROM customers AS customers 
    INNER JOIN amortization AS amortization ON customers.CUSTOMER_ID = amortization.CUSTOMER_ID WHERE amortization.ARREAR > 0 AND  amortization.PAYMENT_AMOUNT <amortization.CUOTA");

    $query23 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE CUSTOMER_ID = CUSTOMER_ID");

    $query24 = mysqli_query($conn,"SELECT MAX(ARREAR) FROM amortization WHERE CUSTOMER_ID = $customers_id");
    
    $query25 = mysqli_query($conn,"SELECT payments.PAYMENT_ID, payments.CUSTOMER_ID_NUMBER, payments.PAYMENT_AMOUNT, payments.PAYMENT_DATE, payments.PAYMENT_METHOD, payments.FINANCIAL_INSTITUTION, payments.PAYMENT_REFERENCE,
    payments.CUSTOMER_ID, amortization.CUSTOMER_ID,amortization.PAYMENT_DATE,  amortization.ARREAR, amortization.LOAN_ID, amortization.SALDO_PAGO_ABIERTO, amortization.PAY_DATE_RECEIVED FROM payments AS payments
     INNER JOIN amortization AS AMORTIZATION  ON payments.AMORT_TABLE_ID = amortization.AMORT_TABLE_ID WHERE
    payments.CUSTOMER_ID = $customers_id");

    $query26 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE CUSTOMER_ID = $customers_id");

    $query27 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE CUSTOMER_ID = $customers_id");

    $query28 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE CUSTOMER_ID = $customers_id");

    
    $query29 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE CUSTOMER_ID = $customers_id");

    $query30= mysqli_query($conn, "SELECT  * FROM  comentario_cliente WHERE CUSTOMER_ID = $customers_id ORDER BY TIME_STAMP DESC");

    $query31 = mysqli_query($conn, "SELECT * FROM  customers WHERE ID_NUMBER = $clienteId");

    $row = mysqli_fetch_array($query3);
    $row1 = mysqli_fetch_array($query4);
    $row2 = mysqli_fetch_array($query11);
    $row3 = mysqli_fetch_array($query12);
    $row4 = mysqli_fetch_array($query15);
    $row5 = mysqli_fetch_array($query16);
    $row6 = mysqli_fetch_array($query19);
    $row7 = mysqli_fetch_array($query20);
    $row8 = mysqli_fetch_array($query21);
    $row9 =  mysqli_fetch_array($query23);
   
    $prestamosActivos = $row['count(*)'];
    $monto= $row1['sum(LOAN_AMOUNT)'];
    $cuota= $row2['sum(MONTO_CUOTA_TOTAL)'];
    $pagado= $row3['sum(PAYMENT_AMOUNT)'];
    $promDias= $row5['AVG(LATE_DAYS)'];
    $totalpago= mysqli_fetch_array($query7);
    $totalPagado= $totalpago['sum(PAYMENT_AMOUNT)'];
    $cuenta = $row4['count(*)'];
    $totalPrestamos= $row6['sum(LOAN_AMOUNT)'];
    $totalCuota= $row7['sum(CUOTA)'];
    $amortPagada =$row8['sum(AMORTIZACION_PAGADA)'];
    $diaMayor= $row9['ARREAR'];
   
  



   
    $saldoTotalPrestamos= $monto-$pagado;
    $today= date('Y-m-d');
   
   


    for($i = 0;$i<$cuenta;$i++){
 
      $datos007= mysqli_fetch_array($query14);
      $amortID = $datos007['AMORT_TABLE_ID'];
      $apertura= $datos007['PAYMENT_DATE'];
      $fechaDePago =$datos007['TODAY'];
      $apertura1 = New DateTime($apertura);
    
      $fechaDePago1 = New DateTime($fechaDePago);
    
      $diasParaPagar1 = $apertura1->diff($fechaDePago1);
    
      $diasFaltantes2 = $diasParaPagar1 ->format("%r%a");
      $diasFaltantes = (int)$diasFaltantes2;


      
    
    
    $arrear2= "UPDATE amortization SET ARREAR = $diasFaltantes  WHERE AMORT_TABLE_ID = $amortID";
  
    $result05 = mysqli_query($conn,$arrear2);




    
    if($result05){   
                            
                                   
            
    } else{
      echo 'ERROR: Could not able to execute $sqlAtrasoDias. ' . mysqli_error($conn);  
        };    
          
    
      }

  



  
      

    ?>
<head>
    <title> Cobros <?php    

while($datos = mysqli_fetch_array($query31)){  
  ?>

    <?php echo $datos['FIRST_NAME'],' ', $datos['LAST_NAME'], ' ', $datos['SECOND_LAST_NAME'] ?>
<?php }?>
    
    
  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">





    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleTable.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap.min.css" integrity="sha512-0YVVtCCoMlojS9USh8nXXYNhCxaeqJqTPJtJhBvtzrashDrRU8N9VWOxaBA5gfDlXYIDhbB/IxoMGZeZivOjew==" crossorigin="anonymous" />



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.5.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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


    <div class="wrapper d-flex align-items-stretch" >
    <nav id="sidebar" class="active " style="background-color:#343a40; margin-top:50px" >
    
    <ul class="list-unstyled components mb-5"  style=" position: fixed">
    <li class="active" >
    <h1><a href="index.html" class="logo">ML</a></h1>
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
    <a href="cobros.php"><span class="fa fa-suitcase"></span> Cartera</a>
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

    <div id="content" class="p-4 p-md-5" style="margin-top:0px; width:100%;background-color:#FFFDF7; margin-top:50px" >

    <!-- <nav class="navbar navbar-expand-lg " style="background-color:#eeeeee "> -->
    <div class="container-fluid"    >

    <div class="container col-lg-12">
    <div class="row">
    <div class="col-sm">
    <h1>Cobros</h1><hr>
    <a href="nuevoUsuario.php" class="btn btn-primary">Crear Cobrador</a>
    </div>
    




    <div class="container col-lg-12">
    <div class="row">
      <div class="col-sm">
     
                                                                
         

<!-- 
MODAL DE PAGO -->
   
    <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        <form action="" method='post'>
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Pago  </h5>
        </div>
        <div class="modal-body">
        

        <?php 
    while($datos6 = mysqli_fetch_array($query6)){  
      $idCliente= $datos6['CUSTOMER_ID'];
      ?>

<div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">ID Cliente</label>
                <div class="col-lg-10">

                <label for="<?php $datos6['CUSTOMER_ID'] ?>" type="text" class="col-sm-2 col-form-label" id="idCliente" name="idCliente" ><?php echo $datos6['CUSTOMER_ID'] ?></label>
                
                </div>

                <label for="customerCedula" class="col-sm-2 col-form-label">Cedula</label>
                <div class="col-lg-10">

                <label for="text  " class="col-sm-2 col-form-label " style ="size:100%"><?php echo $datos6['ID_NUMBER'] ?></label>
                
                </div>
        </div>

       
    <?php }?>
         

        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Credito</label>
                                <div class="col-sm-10">                                

                                <select  class="custom-select my-1 mr-sm-2" id="prestamo1" name="prestamo1" required>
                                    <option selected>Seleccione...</option>
                                    <?php 
                                      while($datos = mysqli_fetch_array($query5)){                                    
                                    ?>
                                    <option value="<?php echo $datos['LOAN_ID']?>"> <?php echo $datos['LOAN_ID'] ?> </option>
                                    <?php 
                                      }
                                    ?>
                                       
                                </select>                           
                                     
                            </div>         
          </div>

          <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Aplicar a Cuota</label>
                                <div class="col-sm-10">                                

                                <select  class="custom-select my-1 mr-sm-2" id="prestamoCuota" name="prestamo" required>
                                    <option selected>Seleccione...</option>
                                    <?php 
                                      while($datos9 = mysqli_fetch_array($query9)){                                    
                                    ?>
                                    <option value="<?php echo $datos9['AMORT_TABLE_ID']?>"> <?php echo "Prestamo",' ', $datos9['LOAN_ID'],' ', "Num Cuota", ' ', $datos9['NUM_PAGO']   ?> </option>
                                    <?php 
                                      }
                                    ?>
                                       
                                </select>                           
                                     
                            </div>         
          </div>



          <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Metodo de Pago</label>
                                <div class="col-sm-10">                                

                                <select  class="custom-select my-1 mr-sm-2" id="metodo" name="metodo" required>
                                    <option selected>Seleccione...</option>
                                    <option value="efectivo">Efectivo</option>
                                    <option value="transferencia_bancaria" >Transferencia Bancaria</option>
                                    <option value="otro">Otro</option>

                                    
                                       
                                </select>                           
                                     
                            </div>         
          </div>
        <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Monto del Pago</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="montoPrestamo" name= "montoPago" placeholder=" Ejemplo: 250,000" required>
                </div>
        </div>

        <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Banco</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="montoPrestamo" name= "banco" placeholder=" Ejemplo: BAC, Banco Nacional, BCR" required>
                </div>
        </div>

        <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Numero de Recibo</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="montoPrestamo" name= "numRecibo" placeholder=" Ejemplo: 256352 " required>
                </div>
        </div>

        <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_pago" name= "fecha_pago" placeholder="  " required>
                </div>
        </div>
        

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary"id="guardarPago" name="guardarPago">Registrar Pago</button>

        </div>
        </form>
    </div>
        </div>
      </div>
    </div>

    
    </div>
    </div>
    </div>
    </div><br>



    </div>



    <head>
  

    </head>    


    <table class="table table-striped table-bordered myDataTable " style="width:100%; text-align:center" >
    
    <thead class= "thead-dark">
                  <tr>
                      <th colspan="1" rowspan="2">Nombre</th>
                     

                  </tr>
                  <tr>
                      
                      <th>Cedula</th>
                      <th>Monto del Prestamo </th>
                      <th>Prestamo ID </th>
                      <th>Fecha de Pago </th>
                      <th>Pago mensual </th>
                      <th>Numero de Cuota</th>
                      <th>Dias de Atraso</th>
                      <th>Monto en Atraso </th>
                     
                      
                      <th>Acciones </th>

                      

                      
                  </tr>
                  
              </thead>
                  
              <tbody>
              <?php 
                  while($datos = mysqli_fetch_array($query22)){   
                   $customer_id= $datos['CUSTOMER_ID'];
                   $id = $datos['LOAN_ID'];
                   $idnumber=$datos['ID_NUMBER']
                                             
                ?>
              <tr>
                  <td><?php echo $datos['FIRST_NAME'], ' ', $datos['LAST_NAME']. ' ', $datos['SECOND_LAST_NAME']  ?></td>
                  <td><?php echo $datos['ID_NUMBER']?></td>
                  <td><?php echo number_format($datos['LOAN_AMOUNT'],2)?></td>
                  <td><?php echo $datos['LOAN_ID']?></td>
                  <td><?php echo $datos['PAYMENT_DATE']?></td>
                  <td><?php echo number_format($datos['CUOTA'],2)?></td>
                  <td><?php echo $datos['NUM_PAGO']?></td> 
                  <td><?php echo $datos['ARREAR']?></td>                  
                  <td><?php echo number_format ($datos['CUOTA']-$datos['PAYMENT_AMOUNT'],2)?></td>
                  
                 
        

                  <td><?php echo "<a href='prestamosdetalle.php?LOAN_ID=$id&ID_NUMBER=$idnumber&CUSTOMER_ID=$customer_id&LOANID=$id'>Ver Detalles</a>"?></td>
                  
                  
                    <?php 
                  }
                ?>
                 
                  
                  
              </tr>
             
             </td>
             


              
              </tbody>

    </table>
    </div>

    </div>
    </div> <hr>





   
    
 
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
=======
<!doctype html>
  <html lang="en">
    <head>
      <title>Sidebar 07</title>
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
      
      <div class="wrapper d-flex align-items-stretch" >
        <nav id="sidebar" class="active " style="background-color:#222831" >
          <h1><a href="index.html" class="logo">ML</a></h1>
          <ul class="list-unstyled components mb-5"  style=" position: fixed">
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

           

              <!-- <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
              </button> -->
              <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-bars"></i>
              </button> -->
            <header >
           
              
          <div class="container col-lg-12" >
            <h1  >Prestamos</h1><hr>
            
            <h5 class="card-title"> Resumen de creditos</h5> 
                  <table class="table" style="text-align:center; background-color:#e4e3e3">
                  <thead class= "thead-dark">
                    <tr >

                    
                        <th scope="col">Al dia</th>
                        <th scope="col">%</th>
                        <th scope="col">1-30</th>
                        <th scope="col">%</th>
                        <th scope="col">31-60</th>
                        <th scope="col">%</th>
                        <th scope="col">61-90</th>
                        <th scope="col">%</th>
                        <th scope="col">Mas de 90</th>
                        <th scope="col">%</th>

                       
                    
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th >¢ 90 000 000</th>
                      <th scope="row">90%</th>
                      <th >¢ 7 000 000</th>
                      <th scope="row">7%</th>
                      <td>¢ 1 000 000</td>
                      <th scope="row">1%</th>
                      <td>¢ 500 000</td>
                      <th scope="row">1%</th>
                      <td>¢ 112 000</td>
                      <th scope="row">0.5%</th>
                      
                    </tr>
                   
                  </tbody>
                </table>
          
          <!-- Bloque de graficos -->
            <div class="card-deck">
              <div class="card" class="col-lg-12">
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                <div class="card-body">
                  <h5 class="card-title">Atraso</h5><hr>

                  <p class="card-text"><canvas id="line-chart1" width="200" height="150"></canvas></p>

                  
                  
                </div>
              </div>
              <div class="card">
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                <div class="card-body">
                  <h5 class="card-title">Cantidad de Prestamos</h5><hr>
                  <p class="card-text"><p class="card-text"><canvas id="line-chart" width="200" height="150"></canvas></p></p>
                  
                </div>
              </div>

              
              <div class="card">
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                <div class="card-body">
                  <h5 class="card-title"> Resumen de creditos</h5> <hr>
                  <h5>Total de la Cartera:</h5> <h4  style="color:#00adb5"> ₡ 150 000 000</h4>
                  <h5>Creditos Otorgados:</h5> <h4  style="color:#00adb5"> ₡ 150 000 000</h4>
                  <h5>Dias de Pago promedio:</h5> <h4  style="color:#00adb5"> 43 dias</h4>
                  <h5>Total en Atraso</h5> <h4  style="color:#00adb5"> ₡ 2 650 000</h4>
                  <h5>Cantidad de Clientes</h5> <h4  style="color:#00adb5"> 175</h4>

                  <div class="container">
                      <div class="row">
                        <div class="col-lg">
                          <h5><a href="#" class="btn btn-primary">Ver Clientes</a></h5>
                          
                        </div>
                        <div class="col">
                          <h5><a href="nuevoPrestamo.php" class="btn btn-primary">Crear Credito</a></h5>
                        </div>

                        <div class="col">
                          <h5><a href="#" class="btn btn-primary">Ver Pagos</a></h5>
                        </div>
                        
                      </div>
                    </div>
                  
                  
                
                  
                </div>
              </div>
            </div>  
  </div><br><hr>

  <!-- MAnipulacion de los graficos        -->
  <script>
            new Chart(document.getElementById("line-chart"), {
                responsive:true,
                type: 'line',
                data: {
                  labels: ["Enero","Febrero","Marzo","Abril","Mayo","Julio","Julio","Agosto","Septiembre","Octubre"],
                  datasets: [{ 
                      data: [5500000,1200000,800000,5670000,9900000,1687899,5550700,2300000,7980214,6878543],
                      label: "Prestamos",
                      borderColor: "#3e95cd",
                      fill: false
                    }
                  ]
                },
                options: {
                  title: {
                    display: true,
                    text: 'Total de Prestamos Otorgados'
                  }
                }
              });
            </script>


 

  <script>
            new Chart(document.getElementById("line-chart2"), {
                responsive: true,
                type: 'radar',
                data: {
                  labels: ["Al dia","1-30","31-60","61-90","Mas de 90 dias"],
                  datasets: [{ 
                      data: [5500000,1200000,800000,5670000,9900000],
                      label: "Prestamos",
                      borderColor: "#3e95cd",
                      fill: false
                    }
                  ]
                },
                options: {
                  
                  title: {
                    display: true,
                    text: 'Lista de Periodo de Atraso',
                  }
                  
                }
                
              });
    </script>

<script>
            new Chart(document.getElementById("pie-chart"), {
                responsive: true,
                type: 'pie',
                data: {
                  labels: ["Al dia","1-30","31-60","61-90","Mas de 90 dias"],
                  datasets: [{ 
                      data: [5500000,1200000,800000,5670000,9900000],
                      label: "Prestamos",
                      borderColor: "#3e95cd",
                      fill: false
                    }
                  ]
                },
                options: {
                  
                  title: {
                    display: true,
                    text: 'Lista de Periodo de Atraso',
                  }
                  
                }
                
              });
    </script>

<div class="container">

</div>
      
<div class="container">
  <div class="row">
    <div class="col">
          


    </div>
    
  </div>
  
</div>



            


              <script>
                new Chart(document.getElementById("line-chart1"), {
                  type: 'pie',
                  data: {
                    labels: ["Al dia", "1-30", "31-60", "61-09", "Sobre 90"],
                    datasets: [{
                      label: "Analisis de Mora",
                      backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                      data: [2478,5267,734,784,433]
                    }]
                  },
                  options: {
                    title: {
                      display: true,
                      text: 'Atrasos por periodo'
                    }


                    
                  }
              });
              </script>
              


              <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
              
              <table class="table table-striped table-bordered myDataTable " style="width:100%; text-align:center" >
              <thead class= "thead-dark">
                  <tr>
                      <th colspan="1" rowspan="2">Nombre</th>
                      <!-- <th colspan="2" >Hr Information</th> -->
                      <!-- <th colspan="3">Contact</th> -->

                  </tr>
                  <tr>
                      
                      <th>Cedula</th>
                      <th>Monto del Prestamo </th>
                      <th>Prestamo ID </th>
                      <th>Fecha Apertura </th>
                      <th>Pago mensual </th>
                      <th>Fecha de Pago </th>
                      <th>Dias de Atraso </th>
                      <th>Total Atraso </th>
                      
                      <th>Acciones </th>

                      

                      
                  </tr>
                  
              </thead>
                  
              <tbody>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>


              
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
>>>>>>> e90219b47302d82c4d9aa683e2636f89eae7be42
