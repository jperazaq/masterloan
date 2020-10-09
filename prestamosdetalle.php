<!doctype html>
    <html lang="en">

    <?php
    include  ('conexion.php');
    include  ('enviarPago.php');
    include  ('enviarComentario.php');
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

    

    $query = mysqli_query($conn, "SELECT * FROM  customers WHERE ID_NUMBER = $clienteId");

    $query2 = mysqli_query($conn, "SELECT * FROM  customers WHERE ID_NUMBER = $clienteId");

    $query3 = mysqli_query($conn, "SELECT count(*) FROM  loans WHERE CUSTOMER_ID = $customers_id");

    $query4 = mysqli_query($conn, "SELECT * FROM  loans WHERE LOAN_ID = $loan_id");

    $query5 = mysqli_query($conn, "SELECT * FROM  loans WHERE LOAN_ID = $loan_id");

    $query6 = mysqli_query($conn, "SELECT * FROM  customers WHERE ID_NUMBER = $clienteId");

    $query7 = mysqli_query($conn, "SELECT sum(PAYMENT_AMOUNT) FROM  payments WHERE LOAN_ID = $loan_id");

    $query8 = mysqli_query($conn, "SELECT * FROM  loans WHERE ID_NUMBER = $clienteId");   

    
    $query9 = mysqli_query($conn, "SELECT * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query10 = mysqli_query($conn, "SELECT * FROM  amortization WHERE CUSTOMER_ID = $customers_id");

    $query11 = mysqli_query($conn, "SELECT sum(MONTO_CUOTA_TOTAL) FROM  loans WHERE LOAN_ID = $loan_id");

    $query12 = mysqli_query($conn, "SELECT sum(AMORTIZACION_PAGADA) FROM  amortization WHERE LOAN_ID = $loan_id");
    
    $query13= mysqli_query($conn, "SELECT * FROM  amortization WHERE CUSTOMER_ID = $customer_id");

    $query14= mysqli_query($conn, "SELECT * FROM amortization");

    $query15 = mysqli_query($conn, "SELECT count(*) FROM  amortization WHERE LOAN_ID = $loan_id");

    $query16 = mysqli_query($conn, "SELECT  AVG(LATE_DAYS) FROM  amortization WHERE LOAN_ID = $loan_id");

    $query17 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query18 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query19 = mysqli_query($conn, "SELECT sum(LOAN_AMOUNT) FROM  loans WHERE CUSTOMER_ID = $customers_id");

    $query20 = mysqli_query($conn, "SELECT sum(CUOTA) FROM  amortization WHERE LOAN_ID = $loan_id");

    $query21 = mysqli_query($conn, "SELECT  sum(AMORTIZACION_PAGADA)FROM  amortization WHERE LOAN_ID = $loan_id");

    $query22 = mysqli_query($conn, " SELECT customers.FIRST_NAME, customers.LAST_NAME, customers.SECOND_LAST_NAME, customers.ID_NUMBER, customers.CUSTOMER_ID,
    loans.LOAN_ID, loans.STAR_DATE, loans.MONTO_CUOTA_TOTAL, loans.LOAN_AMOUNT, loans.MONTO_SOLO_INTERESES,loans.USER_CLIENTE_ID
      FROM customers AS customers
    INNER JOIN loans AS loans ON customers.CUSTOMER_ID = loans.CUSTOMER_ID");

    $query23 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE CUSTOMER_ID = $customers_id");

    $query24 = mysqli_query($conn,"SELECT MAX(ARREAR) FROM amortization WHERE CUSTOMER_ID = $customers_id");
    
    $query25 = mysqli_query($conn,"SELECT payments.PAYMENT_ID, payments.CUSTOMER_ID_NUMBER, payments.PAYMENT_AMOUNT, payments.PAYMENT_DATE1, payments.PAYMENT_METHOD, payments.FINANCIAL_INSTITUTION, payments.PAYMENT_REFERENCE,
    payments.CUSTOMER_ID, amortization.PAYMENT_DATE,  amortization.ARREAR, amortization.LOAN_ID, amortization.SALDO_PAGO_ABIERTO, amortization.PAY_DATE_RECEIVED, amortization.NUM_PAGO FROM payments AS payments INNER JOIN amortization AS AMORTIZATION 
    ON payments.AMORT_TABLE_ID = amortization.AMORT_TABLE_ID WHERE payments.LOAN_ID = $loan_id ");

    $query26 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query27 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query28 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    
    $query29 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query30= mysqli_query($conn, "SELECT  * FROM  comentarios WHERE LOAN_ID = $loan_id ORDER BY TIME_STAMP DESC");

    $query31 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    
    $query32 = mysqli_query($conn, "SELECT sum(CUOTA) FROM  amortization WHERE LOAN_ID = $loan_id");

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
    $row10 =  mysqli_fetch_array($query5);

    
    $tasaMulta = $row1['MULTA'];
    $prestamosActivos = $row['count(*)'];
    $tasaInteres = $row1['INTEREST_RATE'];
    $monto= $row1['LOAN_AMOUNT'];
    $cuota= $row2['sum(MONTO_CUOTA_TOTAL)'];
    $pagado= $row3['sum(AMORTIZACION_PAGADA)'];
    $promDias= $row5['AVG(LATE_DAYS)'];
    $totalpago= mysqli_fetch_array($query7);
    $totalPagado= $totalpago['sum(PAYMENT_AMOUNT)'];
    $cuenta = $row4['count(*)'];
    $totalPrestamos= $row6['sum(LOAN_AMOUNT)'];
    $totalCuota= $row7['sum(CUOTA)'];
    $amortPagada =$row8['sum(AMORTIZACION_PAGADA)'];
    $diaMayor= $row9['ARREAR'];
    $moneda = $row1['MONEDA'];
    $atraso= $row9['ARREAR'];
    $montoPagado = $row9['PAYMENT_AMOUNT'];
    $cuotaAPagar = $row9['CUOTA'];
   
  
echo $cuotaAPagar;


   
    $saldoTotalPrestamos= $monto-$pagado;
    $today= date('Y-m-d');
   
    // for($i = 0;$i<$cuenta;$i++){
    //   $now= date('Y-m-d');
    // $fechaDeHoy= "UPDATE amortization SET TODAY = '$now'  WHERE CUSTOMER_ID = $customers_id";
    
    // if(mysqli_query($conn,$fechaDeHoy)){   
                            
                                   
            
    // } else{
    //   echo 'ERROR: Could not able to execute $Update. ' . mysqli_error($conn,$Update);  
    //     };    
          
    
    //   }


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
    <title>Estado de Cuenta Prestamo <?php echo $loan_id?></title>
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

    <div id="content" class="p-4 p-md-5" style="margin-top:50px; width:100%;background-color:#FFFDF7" >

    <!-- <nav class="navbar navbar-expand-lg " style="background-color:#eeeeee "> -->
    <div class="container-fluid"    >

    <div class="container col-lg-12">
    <div class="row">
    <div class="col-sm">
    <h1>Estado de Cuenta Prestamo #<?php  echo $loan_id ?></h1><hr>
    </div>





    <div class="container col-lg-12">
    <div class="row">
      <div class="col-sm">
      <?php 
    while($datos = mysqli_fetch_array($query2)){  
      ?>

        <h2><?php echo $datos['FIRST_NAME'],' ', $datos['LAST_NAME'], ' ', $datos['SECOND_LAST_NAME'] ?></h2>
    <?php }?>

        <table class="table">
          <thead>
            <tr>
              
            </tr>
          </thead>
          <tbody>
      <?php
    while($datos = mysqli_fetch_array($query)){   
        
                                
    ?>
            <tr>
              
              <td>Cedula</td>
              <td><?php echo $_GET['ID_NUMBER']?></td>
              
            </tr>
            <tr>
              
              <td>Telefono</td>
              <td><?php echo $datos['PHONE_NUMBER'] ?></td>
              
            </tr>

            <tr>     
                                                            
              <td>Correo Electronico</td>
              <td><?php echo $datos['EMAIL'] ?></td>                            
            </tr>

            

            <tr>                                                     
              <td>Fecha de Registro Cliente</td>
              <td><?php echo $datos['FECHA_REG'] ?></td>                            
            </tr>

            <tr>                                                     
              <td>Dirrecion</td>
              <td><?php echo $datos['PROVINCIA'],' ',',',$datos['CANTON'],' ',',',$datos['DISTRITO'],' ',' ,',' ', $datos['SENAS'] ?></td>   
    <?php }?>    

    
</tr>
          </tbody>
        </table>
      </div>



    <div class="col-sm-5 mt-0" style="position:center;">
    <div class="card">
    <h5 class="card-header">Resumen Actividad del Cliente</h5>
    <div class="card-body">

    <div class="container col-lg-12">
    <div class="row">
      <div class="col-sm">

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Monto Prestado</h5>
          </div>
          <div class="col">
            <h5><?php echo   number_format($monto,0); ?></h5>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Tasa de Interes Mensual</h5>
          </div>
          <div class="col">
            <h5><?php echo   number_format($tasaInteres,0),"%"; ?></h5>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Total Intereses Pagados</h5>
          </div>
          <div class="col">
            <h5> <?php echo number_format($totalPagado-$amortPagada,0) ?></h5>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Multa Por Atraso</h5>
          </div>
          <div class="col"><h5>
            <h5><?php echo   number_format($tasaMulta,0), "%"; ?></h5>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Multas Abiertas</h5>

           
          </div>
          <div class="col"><h5>
          <?php
           $multaAPagar = 0;
      while ($calculoMulta = mysqli_fetch_array($query23)){

        
       if($calculoMulta['ARREAR']>0){
          $multaporcentaje = $tasaMulta/100;
          
          $multaAPagar =$multaAPagar+($calculoMulta['CUOTA']*$multaporcentaje);
          
         
      }
    }
    echo $multaAPagar;
    ?></h5>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Total Multas Pagadas</h5>
          </div>
          <div class="col">
            <h5><?php echo   number_format($monto,0); ?></h5>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Amortizacion Pagada </h5>
          </div>
          <div class="col">
            <h5><?php echo   number_format($pagado,0); ?></h5>
          </div>
        </div>
      </div>



      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Saldo Abierto</h5>
          </div>
          <div class="col">
            <h5><?php
            
            if($saldoTotalPrestamos<=0){

              echo number_format(0,2);
            }else{
              echo number_format($saldoTotalPrestamos,2);
            }
              ?>
            
            
          </h5>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Monto Pagado</h5>
          </div>
          <div class="col">
            <h5><?php echo   number_format($totalPagado,0); ?></h5>
          </div>
        </div>
      </div>


    

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Total Cuota</h5>
          </div>
          <div class="col">
            <h5><?php echo number_format($cuota ,0) ?></h5>
          </div>
        </div>
      </div>

      

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Monto Atraso</h5>
          </div>
          <div class="col">
        <?php   
        
        $lateAmount1 = 0;
        $lateAmount= number_format( $lateAmount1,2);
        while($payDateAmounts = mysqli_fetch_array($query17)){

          if($payDateAmounts['ARREAR']>0){
            $lateAmount = $lateAmount + $payDateAmounts['CUOTA'];

          }


        }
        
        
        ?>
          
            <h5><?php echo number_format($lateAmount,0)?></h5>

        
          </div>
        </div>
    </div>
      
    <div class="container">
        <div class="row">
          <div class="col">
            <h5>Dias Promedio de Pago</h5>
          </div>
          <div class="col">
            <h5><?php echo number_format($promDias,0) ?></h5>
          </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
          <div class="col">
            <h5>Moneda </h5>
          </div>
          <div class="col">
            <h5>
              <?php 
              
              if($moneda == "colones"){
                echo "Colones";
              }
              else{
                echo "Dolares";
              }
              
               ?></h5>
          </div>
        </div>
      </div>



    </div>
    </div><br>





    <a href="#" class="btn btn-primary">Descargar</a>

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

                                <select  class="custom-select my-1 mr-sm-2" id="prestamo" name="prestamo" required>
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

    <button type=""  class="btn btn-primary" data-target=".exampleModal" data-toggle="modal">Registrar Pago </button >

    <a href="nuevoPrestamo.php" class="btn btn-primary">Crear nuevo credito</a>
    </div>
    </div>
    </div>
    </div><br>



    </div><br><hr>

    <h2 class="card-title"> Atraso</h2> 
    <table class="table" style="text-align:center; background-color:#e4e3e3">
    <thead class= "thead-dark">
      <tr >

      
          <th scope="col">Saldo al dia</th>
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
      <?php
   

      $aldiaPendiente= 0;
      $unoTreintaPendiente=0;
      $treintaSesentaPendiente=0;
      $sesentanoventaPendiente = 0;
      $over90Pendiente=0;
      $totalAPagar1Pendiente=0;
      $totalAPagar2 = 0;
                                      
      while($pendingAging = mysqli_fetch_array($query31)){

       

      if($pendingAging['SALDO_ABIERTO_CUOTA']<0){

        if($pendingAging['ARREAR']<=0){

          $totalAPagar2 = $totalAPagar1+$pendingAging['CUOTA']-$pendingAging['PAYMENT_AMOUNT'];
          $aldiaPendiente= $aldiaPendiente+abs($pendingAging['SALDO_ABIERTO_CUOTA']);   
               
          
          
          }
        
        
        
        elseif($aging['ARREAR']>0 && $aging['ARREAR']<=30){
          
          $unoTreintaPendiente= ($unoTreintaPendiente+$aging['SALDO_ABIERTO_CUOTA']);

        }elseif($aging['ARREAR']>30 && $aging['ARREAR']<=60){
          
          $treintaSesentaPendiente= $treintaSesentaPendiente+$aging['SALDO_ABIERTO_CUOTA'];

        }
          elseif($aging['ARREAR']>60 && $aging['ARREAR']<=90){
            
            $sesentanoventa= $sesentanoventaPendiente+$aging['SALDO_ABIERTO_CUOTA'];

          }else{
           
            $over90Pendiente = $over90Pendiente+$aging['SALDO_ABIERTO_CUOTA'];
          }
        
        
      }
      }

      $aldia= 0;
      $unoTreinta=0;
      $treintaSesenta=0;
      $sesentanoventa = 0;
      $over90=0;
      $totalAPagar1=0;



      while($aging = mysqli_fetch_array($query18) ){

        
        
       if($aging['PAYMENT_AMOUNT']<=0 ) {

        

          if($aging['ARREAR']<=0){
            
          $totalAPagar1 = $totalAPagar1+$aging['AMORTIZATION'];
          $aldia= $aldia+$aging['AMORTIZATION'];          
          
          
          }
        
        
        
        elseif($aging['ARREAR']>0 && $aging['ARREAR']<=30){
          $totalAPagar1 = ($totalAPagar1+$aging['CUOTA']);
          $unoTreinta= ($unoTreinta+$aging['CUOTA'])-$aging['AMORTIZACION_PAGADA'];

        }elseif($aging['ARREAR']>30 && $aging['ARREAR']<=60){
          $totalAPagar1 = $totalAPagar1+$aging['CUOTA'];
          $treintaSesenta= $treintaSesenta+$aging['CUOTA'];

        }
          elseif($aging['ARREAR']>60 && $aging['ARREAR']<=90){
            $totalAPagar1 = $totalAPagar1+$aging['CUOTA'];
            $sesentanoventa= $sesentanoventa+$aging['CUOTA'];

          }else{
            $totalAPagar1 = $totalAPagar1+$aging['CUOTA'];
            $over90 = $over90+$aging['CUOTA'];
          }
        
        
        
      }
    
    }
      //  
  $alDiaFinal = $aldia+$aldiaPendiente; 
  $unoTreintaFinal=$unoTreinta+$unoTreintaFinal;
  $treintaSesentaFinal=$treintaSesenta+$treintaSesentaPendiente;
  $sesentanoventaFinal = $sesentanoventa+$sesentanoventaPendiente;
  $over90Final=$over90+$over90Pendiente;
  $totalAPagarfinal = $totalAPagar1+$totalAPagar2;

?>
        <th ><?php echo number_format($alDiaFinal,2) ?></th>
        <th scope="row"><?php echo ($alDiaFinal/$totalAPagarfinal)*100 ?></th>
        <th ><?php echo number_format($unoTreintaFinal,2) ?></th>
        <th scope="row"><?php echo ($unoTreintaFinal/$totalAPagarfinal)*100  ?></th>
        <th><?php echo number_format($treintaSesentaFinal,2) ?></td>
        <th scope="row"><?php echo  ($treintaSesentaFinal/$totalAPagarfinal)*100  ?></th>
        <th><?php echo number_format($sesentanoventaFinal,2) ?></td>
        <th scope="row"><?php echo($sesentanoventaFinal/$totalAPagarfinal)*100  ?></th>
        <th><?php echo number_format($over90Final,2) ?></td>
        <th scope="row"><?php echo($over90Final/$totalAPagarfinal)*100  ?></th>
    
      </tr>
      
    </tbody>
    </table> <hr>


    <head>
    <div class="col-sm">

    <h2>Totales Actualizados </h2><hr>
    </div>
    <div class="container col-lg-12" style="width:1850px">
    <div class="row">

    <div class="col-lg">
    <div class="card-deck">
      <div class="card lg-4">           
          <div class="card-body">
              <h5 class="card-title" style="text-align:center">Montos Pendientes</h5>

          
              <h3 style="text-align:center"><?php echo number_format( $lateAmount,2) ?></h3> 
          </div>
      </div>    
    </div>
    </div>



    <div class="col-sm">
    <div class="card-deck">
      <div class="card lg-4">           
          <div class="card-body">
              <h5 class="card-title" style="text-align:center ">Dias Prom. de pago</h5>
              <h3 style="text-align:center"><?php echo number_format($promDias,2) ?></h3> 
          </div>
      </div>    
    </div>
    </div>

    <div class="col-sm">
    <div class="card-deck">
      <div class="card lg-4">           
          <div class="card-body">
              <h5 class="card-title" style="text-align:center">Intereses Pagados</h5>
              <h3 style="text-align:center">  <?php echo number_format($totalPagado-$amortPagada,2) ?></h3> 
          </div>
      </div>    
    </div>
    </div>

    <div class="col-sm">
    <div class="card-deck">
      <div class="card lg-4">           
          <div class="card-body">
              <h5 class="card-title" style="text-align:center">Pago al Capital</h5>
              <h3 style="text-align:center">  <?php echo number_format( $amortPagada,2)?></h3> 
          </div>
      </div>    
    </div>
    </div>

    <div class="col-sm">
    <div class="card-deck">
      <div class="card lg-4">           
          <div class="card-body">
              <h5 class="card-title" style="text-align:center">Total Pagado</h5>
              <h3 style="text-align:center">  <?php echo   number_format($totalPagado,2); ?></h3> 
          </div>
      </div>    
    </div>
    </div>

              



    <div class="col-sm">
    <div class="card-deck">
    <div class="card lg-12">           
      <div class="card-body"style="text-align:center">
          <h5 class="card-title">Saldo</h5>
          <h3 class="card-title" style="text-align:center"><?php if($saldoTotalPrestamos<=0){

            echo number_format(0,2);
            }else{
            echo number_format($saldoTotalPrestamos,2);
            }?></h3>
      </div>
    </div>    
    </div>
    </div>
    </div>
    </div>  <hr>

    </head>    


    
    </div>

    </div>
    </div> 





    <div class="col-sm">
    <h2>Pagos</h2><hr><br>
    </div>
    <div class="container mb-5 mt-3 col-lg-12">
    <table class="table table-striped table-bordered myDataTable " style="width:100%; text-align:center" >
    <thead class= "thead-dark">
    <tr>
        <th colspan="1" rowspan="2">Fecha de Vencimiento</th>
        

    </tr>
    <tr>
        <th>Fecha de Pago</th>
        <th>Numero de Cuota</th>
        <th>Monto de Pago</th>
        <th>Dias de Atraso </th>
        <th>Saldo Abierto</th>
        <th>Numero de Deposito </th>
        <th>ID Prestamo</th>        
        <th>Banco Deposito</th>
       
        
                         

        
    </tr>

    </thead>

    <tbody>
    <?php  
      while($pagosTabla= mysqli_fetch_array($query25) ){

      

    ?>
    
    <td><?php echo $pagosTabla['PAYMENT_DATE'] ?></td>
    <td><?php echo $pagosTabla['PAYMENT_DATE1'] ?></td>
    <td><?php echo $pagosTabla['NUM_PAGO'] ?></td>
    <td><?php echo number_format($pagosTabla['PAYMENT_AMOUNT'],2) ?></td>
    <td><?php echo number_format($pagosTabla['ARREAR'],2) ?></td>
    <td><?php echo number_format($pagosTabla['SALDO_PAGO_ABIERTO'],2) ?></td>
    <td><?php echo $pagosTabla['PAYMENT_REFERENCE'] ?></td>
    <td><?php echo $pagosTabla['LOAN_ID'] ?></td>
    <td><?php echo $pagosTabla['FINANCIAL_INSTITUTION'] ?></td>
    
    

    
    </tr>



<?php } ?>


    </tbody>



    </table>
    </div>
    <div class="col-sm">
    <h2>Tabla de Proximos Pagos</h2><hr><br>

    </div>

    <div class="flex col-sm-4">
    <table class="table">

    <tbody>
      <tr>
      <th scope="row">Monto Abierto</th>
      <td><?php
            
            if($saldoTotalPrestamos<=0){

              echo number_format(0,2);
            }else{
              echo number_format($saldoTotalPrestamos,2);
            }
              ?> </td>                    
      </tr>

      <tr>
      <th scope="row">Cuotas Pendientes</th>
      <td>
      <?php  
      
      $cuotasPorPagar=0;
      while($cuotasAbiertas = mysqli_fetch_array($query26)){
        if($cuotasAbiertas['PAYMENT_AMOUNT'] <=0){
          $cuotasPorPagar+=1;
        }
      }
      
      ?>
      <?php echo $cuotasPorPagar ?>
      </td>                   
      </tr>

      <tr>
      <th scope="row">Monto en Atraso</th>
      <td>

      <?php   
        
        $lateAmount2 = 0;
        $lateAmount= number_format( $lateAmount2,2);
        while($payDateAmounts2 = mysqli_fetch_array($query28)){

          if($payDateAmounts2['ARREAR']>0){
            $lateAmount2 = $lateAmount2 + $payDateAmounts['CUOTA'];

          }


        }
        echo $lateAmount2;
        
        ?>
      </td>                   
      </tr>

      <tr>
      <th scope="row">Cuotas en Atraso</th>
      <td>
      
      <?php  
      
      $cuotasEnAtraso=0;
      while($cuotasAbiertas01 = mysqli_fetch_array($query27)){
        if($cuotasAbiertas01['ARREAR'] >0){
          $cuotasEnAtraso+=1;
        }
      }
      
      ?>
      <?php echo $cuotasEnAtraso; ?>
      
      </td>                   
      </tr>

      <tr>
      </th>                 
      </tr>


      

    </tbody>
    </table><hr>

    </div>

    </tbody>
    </table>
    <div class="container mb-5 mt-3 col-lg-12">
    <table class="table table-striped table-bordered myDataTable " style="width:100%; text-align:center" >
    <thead class= "thead-dark">
    <tr>
        <th colspan="1" rowspan="2">Fecha de Pago</th>
        <!-- <th colspan="2" >Hr Information</th> -->
        <!-- <th colspan="3">Contact</th> -->

    </tr>
    <tr>
        
        <th>Cuota</th>
        <th>Multa</th>
        <th>Total A Pagar</th>
        <th>ID Cliente</th>
        <th>ID Prestamo</th>
        <th>Dias de Atraso </th>
       
        
        
        <th>Acciones </th>                    

        
    </tr>

    </thead>

    <tbody>
      <?php 
      while($tablaPendientes = mysqli_fetch_array($query29)){
        if($tablaPendientes['PAYMENT_AMOUNT']<=0){

        
      
      ?>
    
    <tr>
    <td><?php echo $tablaPendientes['PAYMENT_DATE'] ?></td>
    <td><?php echo number_format( $tablaPendientes['CUOTA'],2) ?></td>

    
                                 
    <td>
    <?php
      if ($tablaPendientes['ARREAR']>0){

       
          $multaporcentaje = $tasaMulta/100;
          
          $multaAPagar = $tablaPendientes['CUOTA']*$multaporcentaje;
          
          echo $multaAPagar;
      }else{
        echo 0;
      }

    ?>
    </td>

    <td>
    <?php
    
   echo number_format($tablaPendientes['CUOTA']+$multaAPagar,2);
    
    
    ?>
    </td>
    <td><?php echo $tablaPendientes['CUSTOMER_ID'] ?></td>
    <td><?php echo $tablaPendientes['LOAN_ID'] ?></td>
    <td><?php echo $tablaPendientes['ARREAR'] ?></td>
    <td>
    <button type=""  class="btn btn-primary" data-target=".exampleModal" data-toggle="modal">Registrar Pago </button >
    </td>
    </tr>

      <?php }}?>




    </tbody>

    
    </table><hr>
    </div>

    
    
    <h1>Notas</h1><hr>
    
    <div class="container col-lg-12" >
    
    <div class="card col-12" style="width:100%;">
        <div class="card-body">
        <h5>Agregar nueva nota</h5>
        <form method=post action="">
          <textarea  type="text-box" method="POST" class="commentInput"  id="commentInput" name="commentInput" style="width:100%; height:75px;"></textarea>
          <button type="submit" class="btn btn-primary" name="agregar_comentario" id="agregar_comentario">Agregar Comentario</button>         
        </div>
      </div><br>
     </form>
     <?php  
     while($comentario = mysqli_fetch_array($query30)){   
     
     ?>
    
      <div class="card"style="background-color:		#F8F8F8">
  <div class="card-header">
  
  <h6><strong>Creado por:</strong> <?php echo $comentario['CREADO_POR'] ?> &nbsp <strong>Fecha:</strong>&nbsp<?php echo $comentario['TIME_STAMP'] ?></h6>
  </div>
  <div class="card-body">
    
  <h6><?php echo $comentario['COMENTARIO'] ?></h6>
    
  </div>
</div> <br>

     <?php  }?>   


    </div> <br>
          
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