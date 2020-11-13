<!doctype html>
  <html lang="en">
    <head>
      <title>Masterloan - Dashboard</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



      <?php   
      
      include  ('conexion.php');
      

      
      
      
      session_start();  
      $varsession = $_SESSION['emailsess'];
    
      
      

      $querySes = mysqli_query($conn, "SELECT `idUSERS`, `ID_NUMBER`, `FIRST_NAME`, `LAST_NAME`, `SECOND_LAST_NAME`, `USER_USER`, `PHONE_NUMBER`, `EMAIL_NUMBER`, `DATE_OF_BIRTH`, `AGE`, `JOB`, 'NOMBRE_EMPRESA','ID_EMPRESA', `USER_PASSWORD`
       FROM `users` WHERE EMAIL_NUMBER = '$varsession'");
      $rowses = mysqli_fetch_array($querySes);
      $nombrein = $rowses['FIRST_NAME'];
      $idEmpreasSess= $rowses['ID_EMPRESA'];
     
     
      if ($varsession == NULL || $varsession = ""){
        header("LOCATION: nuevo.php")
        ;
        die();

      }


      $query1 = mysqli_query($conn, "SELECT * FROM  loans");
      $query2= mysqli_query($conn, "SELECT * FROM  loans");
      $query3 = mysqli_query($conn, "SELECT * FROM  loans");
      $query4 = mysqli_query($conn, "SELECT * FROM  loans");
      $query5 = mysqli_query($conn, "SELECT * FROM  loans");
      $query6 = mysqli_query($conn, "SELECT * FROM  loans");
      $query7 = mysqli_query($conn, "SELECT * FROM  loans");
      $query8 = mysqli_query($conn, "SELECT * FROM  loans");
      $query9 = mysqli_query($conn, "SELECT * FROM  loans");
      $query10 = mysqli_query($conn, "SELECT * FROM  loans");
      $query11 = mysqli_query($conn, "SELECT * FROM  loans");
      $query12 = mysqli_query($conn, "SELECT * FROM  loans");
      $query13 = mysqli_query($conn, "SELECT * FROM  amortization");
      $query14 = mysqli_query($conn, "SELECT sum(LOAN_AMOUNT) FROM  loans");
      $query15 = mysqli_query($conn, "SELECT count(*) FROM  loans");
      $query16 = mysqli_query($conn, "SELECT  AVG(LATE_DAYS) FROM  amortization ");
      $query17 = mysqli_query($conn, "SELECT  * FROM  amortization ");
      $query18 = mysqli_query($conn, "SELECT count(*) FROM  customers");

      $query19 = mysqli_query($conn, "SELECT distinct loans.USER_CLIENTE_ID, users.FIRST_NAME, users.SECOND_LAST_NAME, users.LAST_NAME, loans.LOAN_AMOUNT, loans.LOAN_ID, users.idUSERS  F
      ROM  loans INNER JOIN users WHERE loans.USER_CLIENTE_ID = users.idUSERS");
     
     $query20 = mysqli_query($conn, "SELECT  users.idUSERS, users.FIRST_NAME,users.FIRST_NAME,users.SECOND_LAST_NAME, users.LAST_NAME, sum(LOAN_AMOUNT) FROM
       users INNER JOIN loans WHERE users.idUSERS= loans.USER_CLIENTE_ID GROUP BY USER_CLIENTE_ID ");
      
      $query21 = mysqli_query($conn, " SELECT customers.FIRST_NAME, customers.LAST_NAME, customers.SECOND_LAST_NAME, customers.ID_NUMBER, customers.CUSTOMER_ID,
      loans.LOAN_ID, loans.STAR_DATE, loans.MONTO_CUOTA_TOTAL, loans.LOAN_AMOUNT, loans.MONTO_SOLO_INTERESES,loans.USER_CLIENTE_ID
        FROM customers AS customers
      INNER JOIN loans AS loans ON customers.CUSTOMER_ID = loans.CUSTOMER_ID ORDER BY loans.LOAN_ID ASC");

      $query22 = mysqli_query($conn, "SELECT  * FROM  amortization ");

      $query22 = mysqli_query($conn, "SELECT  MAX(ARREAR) FROM  amortization ");

      $query23 = mysqli_query($conn, "SELECT customers.CUSTOMER_ID,customers.ID_NUMBER, customers.FIRST_NAME,customers.LAST_NAME,customers.SECOND_LAST_NAME ,amortization.LOAN_ID, amortization.ARREAR, 
      amortization.CUOTA, amortization.LATE_DAYS FROM customers 
      INNER JOIN amortization WHERE customers.CUSTOMER_ID = amortization.CUSTOMER_ID AND amortization.ARREAR>0 ORDER BY amortization.ARREAR DESC");

      $row = mysqli_fetch_array($query14);
      $row2= mysqli_fetch_array($query15);
      $row3 = mysqli_fetch_array($query16);
      $row4 = mysqli_fetch_array($query18);
      $row5 = mysqli_fetch_array($query22);
      

      $totalPrestamos02= $row['sum(LOAN_AMOUNT)'];
      $CuentaDePrestamos= $row2['count(*)'];
      $promDias= $row3['AVG(LATE_DAYS)'];
      $totalClientes= $row4['count(*)'];
      

      $montoMesEnero=0;
      $montoMesFebrero=0;
      $montoMesMarzo=0;
      $montoMesAbril=0;
      $montoMesMayo=0;
      $montoMesJunio=0;
      $montoMesJulio=0;
      $montoMesAgosto=0;
      $montoMesSeptiembre=0;
      $montoMesOctubre=0;
      $montoMesNoviembre=0;
      $montoMesDicembre=0;

      
      $inicioMesEnero= "2020-01-01";
      $finalMesEnero="2020-01-31";
      $inicioMesFebrero= "2020-02-01";
      $finalMesFebrero="2020-02-29";
      $inicioMesMarzo= "2020-03-01";
      $finalMesMarzo="2020-03-30";
      $inicioMesAbril= "2020-04-01";
      $finalMesAbril="2020-04-30";
      $inicioMesMayo= "2020-05-01";
      $finalMesMayo="2020-05-30";
      $inicioMesJunio= "2020-06-01";
      $finalMesJunio="2020-06-30";
      $inicioMesJulio= "2020-07-01";
      $finalMesJulio="2020-07-30";
      $inicioMesAgosto= "2020-08-01";
      $finalMesAgosto="2020-08-30";
      $inicioMesSeptiembre= "2020-09-01";
      $finalMesSeptiembre="2020-09-30";
      $inicioMesOctubre= "2020-10-01";
      $finalMesOctubre="2020-10-30";
      $inicioMesNoviembre= "2020-11-01";
      $finalMesNoviembre="2020-11-30";
      $inicioMesDiciembre= "2020-12-01";
      $finalMesDiciembre="2020-12-30";
      
      while ($datos1=mysqli_fetch_array($query1)){

        if($datos1['STAR_DATE']>$inicioMesEnero && $datos1['STAR_DATE']<$finalMesEnero ){
          $montoMesEnero= $montoMesEnero+$datos1['LOAN_AMOUNT'];
        }
      }

      while ($datos2=mysqli_fetch_array($query2)){

        if($datos2['STAR_DATE']>$inicioMesFebrero && $datos2['STAR_DATE']<$finalMesFebrero ){
          $montoMesFebrero= $montoMesFebrero+$datos2['LOAN_AMOUNT'];
        }
      }

      while ($datos3=mysqli_fetch_array($query3)){

        if($datos3['STAR_DATE']>$inicioMesMarzo && $datos3['STAR_DATE']<$finalMesMarzo){
          $montoMesMarzo= $montoMesMarzo+$datos3['LOAN_AMOUNT'];
        }
      }

      while ($datos4=mysqli_fetch_array($query4)){

        if($datos4['STAR_DATE']>$inicioMesAbril && $datos4['STAR_DATE']<$finalMesAbril){
          $montoMesAbril= $montoMesAbril+$datos4['LOAN_AMOUNT'];
        }
      }

      
      while ($datos5=mysqli_fetch_array($query5)){

        if($datos5['STAR_DATE']>$inicioMesMayo && $datos5['STAR_DATE']<$finalMesMayo){
          $montoMesMayo= $montoMesMayo+$datos5['LOAN_AMOUNT'];
        }
      }

      while ($datos6=mysqli_fetch_array($query6)){

        if($datos6['STAR_DATE']>$inicioMesJunio && $datos6['STAR_DATE']<$finalMesJunio){
          $montoMesJunio= $montoMesJunio+$datos6['LOAN_AMOUNT'];
        }
      }

      while ($datos7=mysqli_fetch_array($query7)){

        if($datos7['STAR_DATE']>$inicioMesJulio && $datos7['STAR_DATE']<$finalMesJulio){
          $montoMesJulio= $montoMesJulio+$datos7['LOAN_AMOUNT'];
        }
      }

      while ($datos8=mysqli_fetch_array($query8)){

        if($datos8['STAR_DATE']>$inicioMesAgosto&& $datos8['STAR_DATE']<$finalMesAgosto ){
          $montoMesAgosto= $montoMesAgosto+$datos8['LOAN_AMOUNT'];
        }
      }

      while ($datos9=mysqli_fetch_array($query9)){

        if($datos9['STAR_DATE']>$inicioMesSeptiembre&& $datos9['STAR_DATE']<$finalMesSeptiembre){
          $montoMesSeptiembre= $montoMesSeptiembre+$datos9['LOAN_AMOUNT'];
        }
      }
      
      while ($datos10=mysqli_fetch_array($query10)){

        if($datos10['STAR_DATE']>$inicioMesOctubre&& $datos10['STAR_DATE']<$finalMesOctubre){
          $montoMesOctubre= $montoMesOctubre+$datos10['LOAN_AMOUNT'];
        }
      }

      while ($datos11=mysqli_fetch_array($query11)){

        if($datos11['STAR_DATE']>$inicioMesNoviembre&& $datos11['STAR_DATE']<$finalMesNoviembre){
          $montoMesNoviembre= $montoMesNoviembre+$datos11['LOAN_AMOUNT'];
        }
      }

      while ($datos12=mysqli_fetch_array($query12)){

        if($datos12['STAR_DATE']>$inicioMesDiciembre&& $datos12['STAR_DATE']<$finalMesDiciembre){
          $montoMesDicembre= $montoMesDicembre+$datos12['LOAN_AMOUNT'];
        }
      }

#Datos para grafico circular

$aldia= 0;
$unoTreinta=0;
$treintaSesenta=0;
$sesentanoventa = 0;
$over90=0;
$totalAPagar1=0;



while($aging01 = mysqli_fetch_array($query13) ){


  if($aging01['ARREAR']<0){
    $totalAPagar1 = $totalAPagar1+$aging01['CUOTA'];
    $aldia= $aldia+$aging01['CUOTA'];

  }elseif($aging01['ARREAR']>0 && $aging01['ARREAR']<=30){
    $totalAPagar1 = $totalAPagar1+$aging01['CUOTA'];
    $unoTreinta= $unoTreinta+$aging01['CUOTA'];

  }elseif($aging01['ARREAR']>30 && $aging01['ARREAR']<=60){
    $totalAPagar1 = $totalAPagar1+$aging01['CUOTA'];
    $treintaSesenta= $treintaSesenta+$aging01['CUOTA'];
  }
    elseif($aging01['ARREAR']>60 && $aging01['ARREAR']<=90){
      $totalAPagar1 = $totalAPagar1+$aging01['CUOTA'];
      $sesentanoventa= $sesentanoventa+$aging01['CUOTA'];
    }
    elseif($aging01['ARREAR']>60 && $aging01['ARREAR']>90){
      $totalAPagar1 = $totalAPagar1+$aging01['CUOTA'];
      $over90= $over90+$aging01['CUOTA'];

    
    }
  

  
}


$lateAmount1 = 0;
$lateAmount= number_format( $lateAmount1,2);
while($payDateAmounts = mysqli_fetch_array($query17)){

  if($payDateAmounts['ARREAR']>0){
    $lateAmount = $lateAmount + $payDateAmounts['CUOTA'];

  }


}




      $totalCartera= $montoMesEnero+$montoMesFebrero+$montoMesMarzo+$montoMesAbril+$montoMesMayo+$montoMesJunio+$montoMesJunio+$montoMesJulio+$montoMesAgosto+$montoMesSeptiembre+$montoMesOctubre+$montoMesNoviembre+$montoMesDicembre;
     
      
      ?>

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
      
      <div class="wrapper d-flex align-items-stretch" >
        
        <nav id="sidebar" class="active " style="background-color:#343a40; margin-top:50px;" >

        
         
          <ul class="list-unstyled components mb-5"  style=" position: fixed">
          <h1><a href="index.html" class="logo">ML</a></h1>
          <li class="active" >
             
            </li>

           
            <li>
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
              <a href="carteraIndex.php"><span class="fa fa-suitcase"></span> Cartera</a>
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
           
              
          <div class="container col-lg-12"  style="margin-top:55px">
            <h1  >DASHBOARD</h1><hr>
            
           
                  <!-- <table class="table" style="text-align:center; background-color:#e4e3e3">
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
                    <th ><?php echo number_format($aldia,2) ?></th>
                    <th scope="row"><?php echo number_format( ($aldia/$totalAPagar1)*100 ,0)?></th>
                    <th ><?php echo number_format($unoTreinta,2) ?></th>
                    <th scope="row"><?php echo number_format(($unoTreinta/$totalAPagar1)*100,0)  ?></th>
                    <th><?php echo number_format($treintaSesenta,2) ?></td>
                    <th scope="row"><?php echo number_format( ($treintaSesenta/$totalAPagar1)*100,0)  ?></th>
                    <th><?php echo number_format($sesentanoventa,2) ?></td>
                    <th scope="row"><?php echo number_format(($sesentanoventa/$totalAPagar1)*100,0)  ?></th>
                    <th><?php echo number_format($over90,2) ?></td>
                    <th scope="row"><?php echo number_format(($over90/$totalAPagar1)*100,0)  ?></th>
                      
                    </tr>
                   
                  </tbody>
                </table> -->
          
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
                  <h5>Total de la Cartera:</h5> <h4  style="color:#00adb5"> <?php echo number_format( $totalPrestamos02,2) ?></h4>
                  <h5>Creditos Otorgados:</h5> <h4  style="color:#00adb5"> <?php echo $CuentaDePrestamos ?></h4>
                  <h5>Dias de Pago promedio:</h5> <h4  style="color:#00adb5"> <?php echo number_format($promDias,0) ?></h4>
                  <h5>Total en Atraso</h5> <h4  style="color:#00adb5"> <?php echo number_format($lateAmount,0) ?></h4>
                  <h5>Cantidad de Clientes</h5> <h4  style="color:#00adb5"> <?php echo number_format($totalClientes,0) ?></h4><br>

                  <div class="container">
                      <div class="row">
                        <div class="col-sm-4">
                          <h5><a href="#" class="btn btn-primary">Ver Clientes</a></h5>
                          
                        </div>
                        <div class="col-sm-4">
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
                responsive:true,
                type: 'pie',
                data: {
                  labels: ["Al Dia","1-30","31-60","61-90","Sobre 90"],
                  datasets: [{ 
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                      data: [<?php echo  $aldia ?>,<?php echo  $unoTreinta?>,<?php echo  $treintaSesenta?>,<?php echo  $sesentanoventa?>,<?php echo  $over90?>,
                     
                     ],
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

            


<!-- 

BLOQUE DE COBRADORES -->


<div class="card-deck">
              <div class="card" class="col-lg-12">
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                <div class="card-body">
                  <h5 class="card-title">Carteras</h5>

                  <div class="container">
                      <div class="row">
                      <table class="table">
                      <tr>
                   <thead>
                       <tr>
                      <th>Nombre del Analista</th>
                      <th>Total de la Cartera </th>
                      
                        </thead>
                        </tr>

                      <?php 
                      $loans = 0;
                 
                      while ($cobradores = mysqli_fetch_array($query20)){                    
                      
                        
                      ?>          
                
                        
        

            
            
                     
                        <tbody>
                          <tr>
                          <td><?php echo $cobradores['FIRST_NAME'], ' ',$cobradores['LAST_NAME'], ' ',$cobradores['SECOND_LAST_NAME']?></td>
                          <td><?php echo number_format( $cobradores['sum(LOAN_AMOUNT)'],2)?></td>
                          
                          </tr>
                        
                        
                        </tbody>
            
                       
            
                      <?php 
                    
                    
                    }?>
                      </table>
                      </div>
                      
                     
                    </div>
                   
                  
                  
                </div>
              </div>
              <div class="card">
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                <div class="card-body">
                  <h5 class="card-title">Morosidad</h5><hr>
                  <div class="container">
                  <div class="row">
                  <table class="table">
                  <tr>
                   <thead>
                       <tr>
                      <th>Nombre</th>
                      <th>Monto en Atraso </th>
                      <th>Dias de Atraso </th>
                      <th>Acciones </th>
                        </thead>
                        </tr>

                 
                  <?php 
                      $saldoPendiente = 0;
                      
                      while ($morosos = mysqli_fetch_array($query23)){
                       if($morosos['ARREAR']>=0 && $morosos['LATE_DAYS']==NULL){
                         $saldoPendiente= $saldoPendiente+ $morosos['CUOTA'];
                         $id = $morosos['LOAN_ID'];                         
                         $customer_id= $morosos['CUSTOMER_ID'];
                         $idnumber = $morosos['ID_NUMBER'];


                       }

                       $countSaldos =0;
                       if($saldoPendiente>0){
                         $countSaldos= $countSaldos+1;
                      ?>   
                  

                  <div class="container">
                  <div class="row">
                 
                     
                     <tbody>
                    
                       <td>
                    
                       <?php
                       
                       
                        echo $morosos['FIRST_NAME'], ' ',$morosos['LAST_NAME'], ' ',$morosos['SECOND_LAST_NAME']
                         ?>

                      
                      
                       
                       </td>
                       <td><?php echo number_format( $saldoPendiente,2)?></td>

                       <td><?php echo number_format( $morosos['ARREAR'])?></td>
                       <?php
                    
                      
                      }
                      
                     ?>

                    <td><?php echo "<a href='prestamosdetalle.php?LOAN_ID=$id&ID_NUMBER=$idnumber&CUSTOMER_ID=$customer_id&LOANID=$id'>Ver Detalles</a>"?></td>
                       </tr>
                     
                     
                     </tbody>
       
         
        

                   <?php } ?>  
                    <?php 

                    ini_set( "display_errors", 0); 
                     if($countSaldos==0){
                      echo "No hay saldos pendientes a la fecha";
                    }
                    ?>
                    </table> 
                  </div>
</div>
                  
                </div><br>
                
               
                
  <!-- MAnipulacion de los graficos        -->
  <script>
            new Chart(document.getElementById("line-chart"), {
                responsive:true,
                type: 'line',
                data: {
                  labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                  datasets: [{ 
                      data: [<?php echo  $montoMesEnero ?>,<?php echo  $montoMesFebrero?>,<?php echo  $montoMesMarzo?>,<?php echo  $montoMesAbril?>,<?php echo  $montoMesMayo?>,
                      <?php echo  $montoMesJunio?>,<?php echo  $montoMesJulio?>,<?php echo  $montoMesAgosto ?>,<?php echo  $montoMesSeptiembre?>,<?php echo  $montoMesOctubre?>,
                      <?php echo  $montoMesNoviembre?>, <?php echo  $montoMesDicembre?>],
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

</div>


 

<!-- < -->

  



    
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
    </div> </div> 
    

   
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                <div class="card-body">

              <h1>Prestamos</h1><hr>

              <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
              
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
        
        <th>Total Atraso </th>
        
        <th>Acciones </th>

        

        
    </tr>
    
</thead>
    
<tbody>
<?php 
    while($datos = mysqli_fetch_array($query21)){   
      $id= $datos['LOAN_ID'];                     
      $idnumber= $datos['ID_NUMBER'];  
      $customer_id= $datos['CUSTOMER_ID']; 
                               
  ?>
<tr>
    <td><?php echo $datos['FIRST_NAME'], ' ', $datos['LAST_NAME']. ' ', $datos['SECOND_LAST_NAME']  ?></td>
    <td><?php echo $datos['ID_NUMBER']?></td>
    <td><?php echo number_format( $datos['LOAN_AMOUNT'])?></td>
    <td><?php echo $datos['LOAN_ID']?></td>
    <td><?php echo $datos['STAR_DATE']?></td>
    <td><?php echo number_format( $datos['MONTO_CUOTA_TOTAL'])?></td>
    <td><?php echo number_format($datos['MONTO_SOLO_INTERESES'])?></td> 
    <td><?php echo number_format ( $datos['MONTO_CUOTA_TOTAL']-$datos['MONTO_SOLO_INTERESES'])?></td>                  
    <td><?php echo $datos['USER_CLIENTE_ID']?></td>
    
    
    <td>
    <?php   
        
        $lateAmount1 = 0;
        while($payDateAmounts1 = mysqli_fetch_array($query22)){

          if($payDateAmounts1['ARREAR']>0){
            $lateAmount1 = $lateAmount1 + $payDateAmounts1['CUOTA'];

          }


        }
        
        echo number_format($lateAmount1,2);

?>
    
    
    </td>

    <td><?php echo "<a href='detalleCliente.php?LOAN_ID=$id&ID_NUMBER=$idnumber&CUSTOMER_ID=$customer_id&LOANID=$id'>Ver Detalles</a>"?></td>
    
    
      <?php 
    }
  ?>
   
    
    
</tr>

</td>




</tbody>
           
      
        
    


              
              
          
         
           
  </div><br>
</div>
    </body>
  </html>