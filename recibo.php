<!doctype html>
    <html lang="en">

    <?php
    include  ('conexion.php');
    include  ('enviarPago.php');
    include  ('enviarComentario.php');

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

    $query12 = mysqli_query($conn, "SELECT sum(PAYMENT_AMOUNT) FROM  amortization WHERE LOAN_ID = $loan_id");
    
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
    
    $query25 = mysqli_query($conn,"SELECT payments.PAYMENT_ID, payments.CUSTOMER_ID_NUMBER, payments.PAYMENT_AMOUNT, payments.PAYMENT_DATE, payments.PAYMENT_METHOD, payments.FINANCIAL_INSTITUTION, payments.PAYMENT_REFERENCE,
    payments.CUSTOMER_ID, amortization.PAYMENT_DATE,  amortization.ARREAR, amortization.LOAN_ID, amortization.SALDO_PAGO_ABIERTO, amortization.PAY_DATE_RECEIVED FROM payments AS payments INNER JOIN amortization AS AMORTIZATION 
    ON payments.AMORT_TABLE_ID = amortization.AMORT_TABLE_ID WHERE payments.LOAN_ID = $loan_id ");

    $query26 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query27 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query28 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    
    $query29 = mysqli_query($conn, "SELECT  * FROM  amortization WHERE LOAN_ID = $loan_id");

    $query30= mysqli_query($conn, "SELECT  * FROM  comentarios WHERE LOAN_ID = $loan_id ORDER BY TIME_STAMP DESC");

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
    $monto= $row1['LOAN_AMOUNT'];
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
    <title>Sidebar 07</title>
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

    <div class="container col-lg-12">
    <div class="row">
    <div class="col-sm">
    <h1>Recibo  #<?php  echo $loan_id ?></h1><hr>
    </div>




    <div class="container col-md-12"  >
    <div class="row">
      <div class="col-sm">

      <form style="justify:center;width:60% ">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Pago Id</label>
            <div class="col-sm-10">
            <label for="staticEmail" class="col-sm-2 col-form-label">12345</label>
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Numero Cedula</label>
            <div class="col-sm-10">
            <label for="staticEmail" class="col-sm-2 col-form-label">12345</label>
            </div>
        </div><div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre del Cliente</label>
            <div class="col-sm-10">
            <label for="staticEmail" class="col-sm-2 col-form-label">Julio Peraza</label>
            </div>
        </div><div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Monto de Pago</label>
            <div class="col-sm-10">
            <label for="staticEmail" class="col-sm-2 col-form-label">1111</label>
            </div>
        </div><div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Referencia Bancaria</label>
            <div class="col-sm-10">
            <label for="staticEmail" class="col-sm-2 col-form-label">12345</label>
            </div>
        </div><div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Metodo de Pago</label>
            <div class="col-sm-10">
            <label for="staticEmail" class="col-sm-2 col-form-label">12345</label>
            </div>
        </div><div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Banco/Institucion</label>
            <div class="col-sm-10">
            <label for="staticEmail" class="col-sm-2 col-form-label">12345</label>
            </div>
        </div><div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Cliente ID</label>
            <div class="col-sm-10">
            <label for="staticEmail" class="col-sm-2 col-form-label">12345</label>
            </div>
        </div>

        </div><div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Prestamo ID</label>
            <div class="col-sm-10">
            <label for="staticEmail" class="col-sm-2 col-form-label">12345</label>
            </div>
        </div>
       
        </form>

    </div>
    </div><br>
    
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