<!doctype html>
    <html lang="en">

    <?php
    include  ('conexion.php');
    include  ('enviarPago.php');
    include  ('enviarSaldoPendiente.php');
    include  ('enviarComentario.php');
    include ('borralinea.php');
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
    loans.LOAN_ID, loans.STAR_DATE, loans.MONTO_CUOTA_TOTAL, loans.TIPO_DE_CUOTA, loans.LOAN_AMOUNT, loans.MONTO_SOLO_INTERESES,loans.USER_CLIENTE_ID
      FROM customers AS customers
    INNER JOIN loans AS loans ON customers.CUSTOMER_ID = loans.CUSTOMER_ID");

    $query23 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE CUSTOMER_ID = $customers_id");

    $query24 = mysqli_query($conn,"SELECT MAX(ARREAR) FROM amortization WHERE CUSTOMER_ID = $customers_id");
    
    $query25 = mysqli_query($conn,"SELECT payments.SALDO_ABIERTO_INTERES, payments.SALDO_ABIERTO_AMORT, payments.PAYMENT_ID, payments.SALDO_PENDIENTE,payments.CUSTOMER_ID_NUMBER,payments.SUMA_TOTAL_PAGADO, payments.PAYMENT_AMOUNT, payments.PAYMENT_DATE1, payments.PAYMENT_METHOD, payments.FINANCIAL_INSTITUTION, payments.PAYMENT_REFERENCE,
    payments.CUSTOMER_ID, payments.SALDO_PENDIENTE, amortization.PAYMENT_DATE,  amortization.ARREAR, amortization.LOAN_ID, amortization.CUOTA, amortization.AMORT_TABLE_ID,amortization.SALDO_PAGO_ABIERTO, amortization.PAY_DATE_RECEIVED, amortization.NUM_PAGO FROM payments AS payments INNER JOIN amortization AS AMORTIZATION 
    ON payments.AMORT_TABLE_ID = amortization.AMORT_TABLE_ID WHERE payments.LOAN_ID = $loan_id ");

    $query26 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query27 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query28 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    
    $query29 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query30= mysqli_query($conn, "SELECT  * FROM  comentarios WHERE LOAN_ID = $loan_id ORDER BY TIME_STAMP DESC");

    $query31 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    
    $query32 = mysqli_query($conn, "SELECT sum(CUOTA) FROM  amortization WHERE LOAN_ID = $loan_id");

    $query33 = mysqli_query($conn, " SELECT customers.FIRST_NAME, customers.LAST_NAME, customers.SECOND_LAST_NAME, customers.ID_NUMBER, customers.CUSTOMER_ID,
    loans.LOAN_ID, loans.STAR_DATE, loans.MONTO_CUOTA_TOTAL, loans.TIPO_DE_CUOTA, loans.LOAN_AMOUNT, loans.MONTO_SOLO_INTERESES,loans.USER_CLIENTE_ID
      FROM customers AS customers
    INNER JOIN loans AS loans ON customers.CUSTOMER_ID = loans.CUSTOMER_ID");

    $queryInt = mysqli_query($conn, "SELECT sum(INTERES_PAGADO) from payments WHERE LOAN_ID = $loan_id");
    $intpaidrow= mysqli_fetch_array($queryInt);
    $intPaid = $intpaidrow['sum(INTERES_PAGADO)'];



    $queryAmort = mysqli_query($conn, "SELECT sum(AMORTIZACION_PAGADA) from payments WHERE LOAN_ID = $loan_id");
    $intpaidrowamort= mysqli_fetch_array($queryAmort);
    $amortPaid = $intpaidrowamort['sum(AMORTIZACION_PAGADA)'];

    $queryPaidTotal = mysqli_query($conn, "SELECT sum(PAYMENT_AMOUNT) from payments WHERE LOAN_ID = $loan_id");
    $paidTotalF= mysqli_fetch_array($queryPaidTotal);
    $TotalPaid = $paidTotalF['sum(PAYMENT_AMOUNT)'];

    $queryAmort1 = mysqli_query($conn, "SELECT sum(AMORTIZACION_PAGADA) from payments WHERE LOAN_ID = $loan_id");
    $intpaidrowamort1= mysqli_fetch_array($queryAmort1);
    $amortPaid1 = $intpaidrowamort1['sum(AMORTIZACION_PAGADA)'];

    $queryFromAmort = mysqli_query($conn ,"SELECT * FROM loans WHERE LOAN_ID = $loan_id");
    $saldoAmort = mysqli_fetch_array($queryFromAmort);
    $montoPrestamo = $saldoAmort['LOAN_AMOUNT'];
    $saldoDelPrestamo = $montoPrestamo- $amortPaid1;

    $queryPayDays = mysqli_query($conn, "SELECT  AVG(ARREAR) FROM  payments WHERE LOAN_ID = $loan_id");
    $rowPayDays = mysqli_fetch_array($queryPayDays);
    $promPayDays= $rowPayDays['AVG(ARREAR)'];

    $query81 = mysqli_query($conn, "SELECT * FROM  loans WHERE LOAN_ID = $loan_id"); 
    
    $queryMultaPagada = mysqli_query($conn, "SELECT sum(MULTA_PAGADA) FROM  payments WHERE LOAN_ID = $loan_id");
    $rowMulta= mysqli_fetch_array($queryMultaPagada);
    $totalDeMultas = $rowMulta['sum(MULTA_PAGADA)'];

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
    $row11 = mysqli_fetch_array($query81);

    $porcMulta = $row11['MULTA'];
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
   
  



   
    $saldoTotalPrestamos= $monto-$pagado;
    $today= date('Y-m-d');
   
    for($i = 0;$i<$cuenta;$i++){
      $now= date('Y-m-d');
    $fechaDeHoy= "UPDATE amortization SET TODAY = '$now'  WHERE CUSTOMER_ID = $customers_id";
    
    if(mysqli_query($conn,$fechaDeHoy)){   
                            
                                   
            
    } else{
      echo 'ERROR: Could not able to execute $Update. ' . mysqli_error($conn,$Update);  
        };    
          
    
      }


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
    <a href="dashboard.php" class="navbar-brand">Master Loan</a>
   

     <div class="collapse navbar-collapse" id="navbarCollapse" >
            <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active"></a>
            <a href="#" class="nav-item nav-link"></a>
            <a href="#" class="nav-item nav-link"></a>
            <a href="#" class="nav-item nav-link disabled" tabindex="-1"></a>
        </div> 
        <div class="navbar-nav ml-auto">
            <a href="#" class="nav-item nav-link">Bienvenido <?php echo $nombrein?></a> <h2 >|</h2>
            <a href="nuevoPrestamo.php" class="nav-item nav-link">Nuevo Credito </a> 
            <a href="nuevoCliente.php" class="nav-item nav-link">Nuevo Cliente </a> 
            <a href="masterlender/cerrasesion.php" class="nav-item nav-link">Cerrar Sesion </a> 
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
            <h5> <?php echo number_format($intPaid,0) ?></h5>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Multa Por Atraso</h5>
          </div>
          <div class="col"><h5>
            <h5><?php echo   number_format($porcMulta,0), "%"; ?></h5>
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
            <h5><?php echo   number_format($totalDeMultas,0); ?></h5>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Amortizacion Pagada </h5>
          </div>
          <div class="col">
            <h5><?php echo   number_format($amortPaid,0); ?></h5>
          </div>
        </div>
      </div>



      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Saldo Del Prestamo</h5>
          </div>
          <div class="col">
            <h5><?php
            
            if($saldoTotalPrestamos<=0){

              echo number_format(0,2);
            }else{
              echo number_format($saldoDelPrestamo,2);
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
            <h5>Tipo de Cuota</h5>
          </div>
          <div class="col">
            <h5><?php 
            while($tipoCuota = mysqli_fetch_array($query33)){
             $tipoCuote = $tipoCuota['TIPO_DE_CUOTA'];
            }
            echo $tipoCuote;
           ?></h5>
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
            <h5><?php 
                     
            echo number_format($promPayDays,0) ?></h5>
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

   



    

<!-- 
MODAL DE PAGO -->
   
    <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="exampleModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        <form action="" method='post'>
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Pago  </h5>
        </div>
        <div class="modal-body">

        <h1 style="text-align:center">TOTAL A PAGAR</h1><hr>
        <h1 style="text-align:center" ><span class="ids"></span></h1><hr>


      
        <div class="form-group row">
        <div class="col-lg-12">
        <label for="inputPassword3" class="col-lg-2 col-form-label"> <h5 style="text-align:center">Principal</h5></label>
        <label for="inputPassword3" class="col-lg-4 col-form-label"><h5 style="text-align:center" ><span class="cuota"></span></h5></label>
       </div>
       <div class="col-lg-12">
        <label for="inputPassword3" class="col-lg-2 col-form-label"> <h5 style="text-align:center">Multa</h5></label>
        <label for="inputPassword3" class="col-lg-4 col-form-label"><h5 style="text-align:center" ><span name="multa" class="multa"></span></h5></label>
        <input type="hidden"class= "multaPago" name = "multaPago" id= "multaPago">
        </div>
        </div><hr>
       
        
        

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

                <label for="text  " class="col-sm-4 col-form-label " style ="size:100%"><?php echo $datos6['ID_NUMBER'] ?></label>
                
                </div>
        </div>

       
    <?php }?>
         

        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Credito</label>
                                <div class="col-sm-10">                                
                                <label for="inputPassword3" class="col-lg-4 col-form-label"><span style="text-align:center" class="prestamoID"></span></label>
                                <input type="hidden"class= "idPrestamo" name = "idPrestamo" id= "idPrestamo">
                                <input type="hidden"class= "linea" name = "linea" id= "linea">
                            </div>         
          </div>

          <div class="form-group row" method ="POST">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Aplicar a Cuota</label>
                                <div class="col-sm-10">                                

                                <label for="inputPassword3" class="col-lg-4 col-form-label"><span style="text-align:center" value="numCuota" id="numCuota" name= "numCuota" class="numCuota"></span></label>                 
                                     <input type="hidden"class= "cuotaNum" name = "cuotaNum" id= "cuotaNum">
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

    <!-- Final del modal -->


<!-- 
MODAL DE PAGO PENDIENTE -->
   
<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalPendiente">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        <form action="" method='post'>
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Pago Pendiente </h5>
        </div>
        <div class="modal-body">

        <h1 style="text-align:center">TOTAL A PAGAR</h1><hr>
        <h1 style="text-align:center" ><span class="pendiente" id="cuota"></span></h1><hr>
        <input type="hidden"class= "pendinte" name = "pendiente" id= "pendiente">

      
       
        
        

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

                <label for="text  " class="col-sm-4 col-form-label " style ="size:100%"><?php echo $datos6['ID_NUMBER'] ?></label>
                
                </div>
        </div>

       
    <?php }?>
         

        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Credito</label>
                                <div class="col-sm-10">                                
                                <label for="inputPassword3" class="col-lg-4 col-form-label"><span style="text-align:center" class="prestamoID"></span></label>
                                <input type="hidden"class= "idPrestamoPen" name = "idPrestamoPen" id= "idPrestamoPen">
                                <input type="hidden"class= "lineaPendiente" name = "lineaPendiente" id= "lineaPendiente">
                                <input type="hidden"class= "saldoPorPagar" name = "SaldoPorPagar" id= "saldoPorPagar">
                                <input type="hidden"class= "interesPorPagar" name = "interesPorPagar" id= "interesPorPagar">
                            </div>         
          </div>

          <div class="form-group row" method ="POST">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Aplicar a Cuota</label>
                                <div class="col-sm-10">                                

                                <label for="inputPassword3" class="col-lg-4 col-form-label"><span style="text-align:center" value="numCuota" id="numCuota" name= "numCuota" class="numCuota"></span></label>                 
                                     <input type="hidden"class= "cuotaNumPen" name = "cuotaNumPen" id= "cuotaNumPen">
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
                <input type="text" class="form-control" id="montoPrestamo" name= "montoPagoPendiente" placeholder=" Ejemplo: 250,000" required>
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
        <button type="submit" class="btn btn-primary"id="guardarPagoPendiente" name="guardarPagoPendiente">Registrar Pago</button>

        </div>
        </form>
    </div>
        </div>
      </div>
    </div>

    <!-- Final del modal de pago pendiente -->





<!-- 
MODAL de Borrado-->
   
<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalBorrarPago">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        <form action="" method='post'>
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar Pago </h5>
        </div>
        <div class="modal-body">     
      
                            <div class="form-group row" >
                                
                                <label for="inputPassword3" class="col-lg-12 col-form-label"><h4>Seguro que desea borrar pago #<span style="text-align:center" value="pagoid" id="pagoid" name= "pagoid" class="pagoid"></span></h4></label> 
                                <input type="hidden"class="pagoid" name ="pagoid"  id="pagoid">
                                <input type="hidden"class="paymentAmt" name ="paymentAmt"  id="paymentAmt">
                                <input type="hidden"class="cuotaNumPen" name ="cuotaNumPen"  id="cuotaNumPen">
                                <input type="hidden"class="lineaPendiente" name ="lineaPendiente"  id="lineaPendiente">                        

                                  
                                            
                               
                            </div>         
          </div>          
        

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-danger"id="borrarRegistro" name="borrarRegistro">Borrar</button>

        </div>
        </form>
    </div>
        </div>
      </div>
    </div>

    <!-- Final del modal de Borrado -->













    <!-- <button type=""  class="btn btn-primary" data-target=".exampleModal" data-toggle="modal">Registrar Pago </button > -->

    <!-- <a href="nuevoPrestamo.php" class="btn btn-primary">Crear nuevo credito</a>
    <a href="#" class="btn btn-primary">Descargar</a> -->
    </div>
    </div>
    </div>
    </div><br>



    </div><br><hr>
<!--  
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
      <tr> -->
      <?php
   

      // $aldiaPendiente= 0;
      // $unoTreintaPendiente=0;
      // $treintaSesentaPendiente=0;
      // $sesentanoventaPendiente = 0;
      // $over90Pendiente=0;
      // $totalAPagar1Pendiente=0;
      // $totalAPagar2 = 0;
                                      
      // while($pendingAging = mysqli_fetch_array($query31)){

       

      // if($pendingAging['SALDO_ABIERTO_CUOTA']<0){

      //   if($pendingAging['ARREAR']<=0){

      //     $totalAPagar2 = $totalAPagar1+$pendingAging['CUOTA']-$pendingAging['PAYMENT_AMOUNT'];
      //     $aldiaPendiente= $aldiaPendiente+abs($pendingAging['SALDO_ABIERTO_CUOTA']);   
               
          
          
      //     }
        
        
        
      //   elseif($aging['ARREAR']>0 && $aging['ARREAR']<=30){
          
      //     $unoTreintaPendiente= ($unoTreintaPendiente+$aging['SALDO_ABIERTO_CUOTA']);

      //   }elseif($aging['ARREAR']>30 && $aging['ARREAR']<=60){
          
      //     $treintaSesentaPendiente= $treintaSesentaPendiente+$aging['SALDO_ABIERTO_CUOTA'];

      //   }
      //     elseif($aging['ARREAR']>60 && $aging['ARREAR']<=90){
            
      //       $sesentanoventa= $sesentanoventaPendiente+$aging['SALDO_ABIERTO_CUOTA'];

      //     }else{
           
      //       $over90Pendiente = $over90Pendiente+$aging['SALDO_ABIERTO_CUOTA'];
      //     }
        
        
      // }
      // }

      // $aldia= 0;
      // $unoTreinta=0;
      // $treintaSesenta=0;
      // $sesentanoventa = 0;
      // $over90=0;
      // $totalAPagar1=0;



      // while($aging = mysqli_fetch_array($query18) ){

        
        
      //  if($aging['PAYMENT_AMOUNT']<=0 ) {

        

      //     if($aging['ARREAR']<=0){
            
      //     $totalAPagar1 = $totalAPagar1+$aging['AMORTIZATION'];
      //     $aldia= $aldia+($aging['AMORTIZATION']);          
          
          
      //     }
        
        
        
      //   elseif($aging['ARREAR']>0 && $aging['ARREAR']<=30){
      //     $totalAPagar1 = ($totalAPagar1+$aging['CUOTA']);
      //     $unoTreinta= ($unoTreinta+$aging['CUOTA'])-$aging['AMORTIZACION_PAGADA'];

      //   }elseif($aging['ARREAR']>30 && $aging['ARREAR']<=60){
      //     $totalAPagar1 = $totalAPagar1+$aging['CUOTA'];
      //     $treintaSesenta= $treintaSesenta+$aging['CUOTA'];

      //   } 
//           elseif($aging['ARREAR']>60 && $aging['ARREAR']<=90){
//             $totalAPagar1 = $totalAPagar1+$aging['CUOTA'];
//             $sesentanoventa= $sesentanoventa+$aging['CUOTA'];

//           }else{
//             $totalAPagar1 = $totalAPagar1+$aging['CUOTA'];
//             $over90 = $over90+$aging['CUOTA'];
//           }
        
        
        
//       }
    
//     }
//       
  
//   $unoTreintaFinal=$unoTreinta+$unoTreintaFinal;
//   $treintaSesentaFinal=$treintaSesenta+$treintaSesentaPendiente;
//   $sesentanoventaFinal = $sesentanoventa+$sesentanoventaPendiente;
//   $over90Final=$over90+$over90Pendiente;
//   $totalAPagarfinal = $saldoTotalPrestamos;
//   $alDiaFinal = $saldoTotalPrestamos-$unoTreintaFinal-$treintaSesentaFinal-$sesentanoventaFinal-$over90Final; 
// ?>
        <!-- <th ><?php echo number_format($alDiaFinal,2) ?></th>
        <th scope="row"><?php echo number_format(($alDiaFinal/$totalAPagarfinal)*100,0) ?></th>
        <th ><?php echo number_format($unoTreintaFinal,2) ?></th>
        <th scope="row"><?php echo number_format(($unoTreintaFinal/$totalAPagarfinal)*100,0)  ?></th>
        <th><?php echo number_format($treintaSesentaFinal,2) ?></td>
        <th scope="row"><?php echo  number_format(($treintaSesentaFinal/$totalAPagarfinal)*100,0)  ?></th>
        <th><?php echo number_format($sesentanoventaFinal,2) ?></td>
        <th scope="row"><?php echo number_format(($sesentanoventaFinal/$totalAPagarfinal)*100,0)  ?></th>
        <th><?php echo number_format($over90Final,2) ?></td>
        <th scope="row"><?php echo number_format(($over90Final/$totalAPagarfinal)*100,0)  ?></th>
    
      </tr>
      
    </tbody>
    </table> <hr> -->


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
              <h3 style="text-align:center"><?php echo number_format($promPayDays,0)?></h3> 
          </div>
      </div>    
    </div>
    </div>

    <div class="col-sm">
    <div class="card-deck">
      <div class="card lg-4">           
          <div class="card-body">
              <h5 class="card-title" style="text-align:center">Intereses Pagados</h5>
              <h3 style="text-align:center">  <?php 
              
              if($intPaid >0){
                echo  $intPaid;
              } else{
                echo 0;
                }
              
              ?></h3> 
          </div>
      </div>    
    </div>
    </div>

    <div class="col-sm">
    <div class="card-deck">
      <div class="card lg-4">           
          <div class="card-body">
              <h5 class="card-title" style="text-align:center">Pago al Capital</h5>
              <h3 style="text-align:center">  <?php 
                if($intPaid >0){
                 echo  $amortPaid;
               } else{
                echo 0;
                 }
              
              
              ?></h3> 
          </div>
      </div>    
    </div>
    </div>

    <div class="col-sm">
    <div class="card-deck">
      <div class="card lg-4">           
          <div class="card-body">
              <h5 class="card-title" style="text-align:center">Total Pagado</h5>
              <h3 style="text-align:center">  <?php 
               if($intPaid >0){
                 echo  $TotalPaid  ;
               } else{
                 echo 0;
                 }
              
              
              
               ?></h3> 
          </div>
      </div>    
    </div>
    </div>

              



    <div class="col-sm">
    <div class="card-deck">
    <div class="card lg-12">           
      <div class="card-body"style="text-align:center">
          <h5 class="card-title">Saldo</h5>
          <h3 class="card-title" style="text-align:center"><?php 


             if($saldoDelPrestamo >0){
              echo  $saldoDelPrestamo  ;
            } else{
              echo 0;
  }

              



          
          ?></h3>
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
    <table class="table table-striped table-bordered" style="width:100%; text-align:center" >
    <thead class= "thead-dark">
    <tr>
        <th colspan="1" rowspan="2">Fecha de Vencimiento</th>
        

    </tr>
    <tr>
        <th>Fecha de Pago</th>
        <th>Numero de Cuota</th>
        <th>Monto de Pago</th>
        <th>Id De Pago</th>
        <th>Dias de Atraso </th>
        <th>Saldo Abierto</th>
        <th>Numero de Deposito </th>
        <th>ID Prestamo</th>        
        <th>Banco Deposito</th>
        <th>Acciones</th>
       
        
                         

        
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
    <td><?php $idDePago= $pagosTabla['PAYMENT_ID'];  echo number_format($idDePago) ?></td>

    <td><?php echo number_format($pagosTabla['ARREAR'],2) ?></td>
    <td>
     <?php 
     $montoPendiente = $pagosTabla['CUOTA']-$pagosTabla['SUMA_TOTAL_PAGADO'];

     if($montoPendiente<0){
       $montoPendiente = 0;
       echo $montoPendiente ;
     }else{
      echo $montoPendiente; 
     }
      ?>
    </td>
    <td><?php echo $pagosTabla['PAYMENT_REFERENCE'] ?></td>
    <td><?php echo $pagosTabla['LOAN_ID'] ?></td>
    <td><?php echo $pagosTabla['FINANCIAL_INSTITUTION'] ?></td>


    <td><a class="" type="" href="#modalPendiente" numLinea=<?php echo 
     $pagosTabla['AMORT_TABLE_ID']; ?>  numCuota=<?php echo  $pagosTabla['NUM_PAGO']; ?> 
     prestamoID=<?php echo $pagosTabla['LOAN_ID']  ?> 
     cuota= "<?php echo number_format($pagosTabla['SALDO_PAGO_ABIERTO'],2) ?>"  
     multa="<?php echo $multaAPagar1 ?>"  data-toggle="modal" 
     monto="<?php echo $montoPendiente; ?>" saldoPagar = "<?php echo $pagosTabla['SALDO_ABIERTO_AMORT']?>"
     intPorPagar =  "<?php echo $pagosTabla['SALDO_ABIERTO_INTERES']?>"
     
     
     >Registrar Pago |</a >
     

     <a class= "" name="borrar" id="borrar" type="" href="#modalBorrarPago" numLinea=<?php echo 
     $pagosTabla['AMORT_TABLE_ID']; ?>  numCuota=<?php echo  $pagosTabla['NUM_PAGO']; ?> 
     prestamoID=<?php echo $pagosTabla['LOAN_ID']  ?> identPago= "<?php echo ($idDePago)?>"
     cuota= "<?php echo number_format($pagosTabla['SALDO_PAGO_ABIERTO'],2) ?>"  
     multa="<?php echo $multaAPagar1 ?>"  data-toggle="modal" 
     monto="<?php echo $pagosTabla['CUOTA']-$pagosTabla['SUMA_TOTAL_PAGADO']?>"
     paymentAmt = "<?php echo $pagosTabla['PAYMENT_AMOUNT'] ?>"
     >
     Borrar Pago   </a >
     
     </td>
    
    

    
    </tr>



<?php } ?>


<script type="text/javascript">
    $(function () {
            $("a").click(function (e) {
                e.preventDefault();
                var id = $(this).attr('monto');
               var id1= $(".ids").html(id);
               var multa = $(this).attr('multa');
               var cuota =  $(this).attr('cuota');
               var prestamoID = $(this).attr('prestamoID');
               var numCuota = $(this).attr('numCuota');
               var tableID = $(this).attr('numLinea');
               var idPago1 = $(this).attr('identPago');
               var paymentAmt = $(this).attr('paymentAmt');
               var saldoAPagar = $(this).attr('saldoPagar');
               var interesAPagar = $(this).attr('intPorPagar');

              
                $(".pendiente").html(id);
                $(".pendiente").val(id);
                $(".multa").html(multa);
                $(".cuota").html(id);
                $(".prestamoID").html(prestamoID);
                $(".numCuota").html(numCuota);
                $("#cuotaNumPen").val(numCuota);
                $(".cuotaNumPen").val(numCuota)
                $('#multaPago').val(multa);
                $('#idPrestamoPen').val(prestamoID);
                $('#lineaPendiente').val(tableID);
                $('.lineaPendiente').val(tableID);
                $('#pendiente').val(id);
                $('.pagoid').html(idPago1);
                $('.pagoid').val(idPago1);
                $('.paymentAmt').val(paymentAmt);
                $('.interesPorPagar').val(interesAPagar);
                $('.saldoPorPagar').val(saldoAPagar);
               


                // console.log(id);
               
                // return id;

              
            })
        })




        $(function () {
            $(".borrar").click(function (e) {
                e.preventDefault();
                
               var idPago1 = $(this).attr('idpago');
              
                
                $('.pagoid').val(idpago1);

                alert("hola");
               
                return id;

              
            })
        })
    </script>



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
        

        if($saldoDelPrestamo >0){
          echo  $saldoDelPrestamo  ;
        } else{
          echo 0;
}

?> </td>                    
      </tr>

      <tr>
      <th scope="row">Cuotas Pendientes</th>
      <td>
      <?php  
      
      $cuotasPorPagar=0;
      while($cuotasAbiertas = mysqli_fetch_array($query26)){
        if($cuotasAbiertas['PAYMENT_AMOUNT'] >=0){
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
        $lateAmount2= number_format( $lateAmount2,2);
        while($payDateAmounts2 = mysqli_fetch_array($query28)){

          if($payDateAmounts2['ARREAR']>0){
            $lateAmount2 = $lateAmount2 + $payDateAmounts2['CUOTA'];

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
    <form method='post'>
    <div class="container mb-5 mt-3 col-lg-12">
    <table class="table table-striped table-bordered  " style="width:100%; text-align:center" >
    <thead class= "thead-dark">
    <tr>
        <th colspan="1" rowspan="2">Fecha de Pago</th>
      

    </tr>
    <tr>
        <th>Num Cuota</th>
        <th>Monto Cuota</th>
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
    <td><?php echo number_format( $tablaPendientes['NUM_PAGO'],0) ?></td>
    <td><?php echo number_format( $tablaPendientes['CUOTA'],2) ?></td>

    
                                 
    <td>
    <?php
      if ($tablaPendientes['ARREAR']>0){

       
          $multaporcentaje = $tasaInteres/100;
          
          $multaAPagar = $tablaPendientes['CUOTA']*$multaporcentaje;
          
          // echo $tasaInteres;
          echo number_format($multaAPagar,0);
      }else{
        echo 0;
      }

    ?>
    </td>

    <td>
    <?php

    if($tablaPendientes['ARREAR']>0){
      $multaporcentaje1 = $tasaMulta/100;
      $multaAPagar1 = $tablaPendientes['CUOTA']*$multaporcentaje;
      $totales1 = $tablaPendientes['CUOTA']+$multaAPagar;
      echo number_format($totales1,2);

    }
    else {
    
      $multaAPagar1 = 0;
      $totales1= $tablaPendientes['CUOTA'];
      echo number_format($totales1,2);
    }
    
  
    
    
    ?>
    </td>
    <td><?php echo $tablaPendientes['CUSTOMER_ID'] ?></td>
    <td><?php echo $tablaPendientes['LOAN_ID'] ?></td>
    <td><?php echo $tablaPendientes['ARREAR'] ?></td>
    <td>
    <a type="" href="#exampleModal" numLinea=<?php echo  $tablaPendientes['AMORT_TABLE_ID']; ?>  numCuota=<?php echo  $tablaPendientes['NUM_PAGO']; ?> prestamoID=<?php echo $tablaPendientes['LOAN_ID']  ?> cuota= "<?php echo $tablaPendientes['CUOTA'] ?>"  multa="<?php echo $multaAPagar1 ?>"  data-toggle="modal" monto="<?php echo $totales1 ?>">Registrar Pago </a >
    </td>
    </tr>

      <?php }}?>

      <script type="text/javascript">
    $(function () {
            $("a").click(function (e) {
                e.preventDefault();
                var id = $(this).attr('monto');
               var id1= $(".ids").html(id)
               var multa = $(this).attr('multa');
               var cuota =  $(this).attr('cuota');
               var prestamoID = $(this).attr('prestamoID');
               var numCuota = $(this).attr('numCuota');
               var tableID = $(this).attr('numLinea');
              
                $(".ids").html(id);
                $(".multa").html(multa);
                $(".multa").val(multa);
                $(".cuota").html(cuota);
                $(".prestamoID").html(prestamoID);
                $(".numCuota").html(numCuota);
                $("#cuotaNum").val(numCuota);
                $('#multaPago').val(multa);
                $('#idPrestamo').val(prestamoID);
                $('#linea').val(tableID);

                // console.log(id);
               
                // return id;

              
            })
        })
    </script>


    

    
    </table><hr>
    </form>
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