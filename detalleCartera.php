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

    $clienteId= $_GET['ID_NUMBER'];
   
    

    $query = mysqli_query($conn, "SELECT * FROM  carteras WHERE CARTERA_ID = $clienteId");

    $query2 = mysqli_query($conn, "SELECT * FROM  carteras WHERE CARTERA_ID = $clienteId");

    $query3 = mysqli_query($conn, "SELECT * FROM  carteras WHERE CARTERA_ID = $clienteId"); 
      

    ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleTable.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap.min.css" integrity="sha512-0YVVtCCoMlojS9USh8nXXYNhCxaeqJqTPJtJhBvtzrashDrRU8N9VWOxaBA5gfDlXYIDhbB/IxoMGZeZivOjew==" crossorigin="anonymous" />

<head>
    <title> Cartera- <?php    

while($datos = mysqli_fetch_array($query)){  
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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

    <div id="content" class="p-4 p-md-5" style="margin-top:50px; width:100%;background-color:#FFFDF7" >

    <!-- <nav class="navbar navbar-expand-lg " style="background-color:#eeeeee "> -->
    <div class="container-fluid"    >

    <div class="container col-lg-12">
    <div class="row">
    <div class="col-sm">
    <h1>Detalle de la Cartera</h1><hr>
    </div>





    <div class="container col-lg-12">
    <div class="row">
      <div class="col-sm-6">
      <?php 
    while($datos = mysqli_fetch_array($query3)){  
      ?>

        <h2><?php echo $datos['FIRST_NAME'],' ', $datos['LAST_NAME'], ' ', $datos['SECOND_LAST_NAME'] ?></h2>

        <div class="flex">
        <button type="button" class="btn btn-outline-primary"> Agregar Fondos</button>
        <button type="button" class="btn btn-outline-secondary">Retirar Fondos</button>
        <button type="button" class="btn btn-outline-success">Descargar PDF</button>
        
        </div>
        
       
    <?php }?> 
    

        <table class="table">
          <thead>
           
          </thead>
          <tbody>
      <?php
    while($datos = mysqli_fetch_array($query2)){   
        
                                
    ?>
            <tr><br>
              
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
              <td>Fecha de Inicio</td>
              <td><?php echo $datos['FECHA_REG'] ?></td>                            
            </tr>

            <tr>                                                     
              <td>Monto en Atraso</td>
              <td>0</td>                            
            </tr>

            <tr>                                                     
              <td>Dirrecion</td>
              <td><?php echo $datos['PROVINCIA'],' ',',',$datos['CANTON'],' ',',',$datos['DISTRITO'],' ',' ,',' ', $datos['SENAS'] ?></td>    
            </tr>

            <tr>                                                     
              <td><h4>Monto Inicial de la Cartera<h4></td>
              <td><h5> 50,000,000</h5></td>    
            </tr>

            <tr>                                                     
              <td><h4>Monto Colocado de la Cartera<h4></td>
              <td><h5> 10,000,000</h5></td>    
            </tr>

            <tr>                                                     
              <td><h4>Monto Disponible<h4></td>
              <td><h5><?php echo number_format( $datos['MONTO_CARTERA']) ?></h5></td>    
            </tr>
    <?php }?>    

    

          </tbody>
        </table>
      </div>
<hr>


    <div class="col-sm-6 mt-0" style="position:center;">
    
    <div class="card" class="col-sm-6">
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                <div class="card-body">
                 <h5>Rendimiento Mensual</h5>
                  
                 <canvas id="myChart" width="400" height="220"></canvas>
                        <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre','Noviembre','Diciembre'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [12, 19, 3, 5, 2, 3],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                        </script>
                
                  
                </div>
                
              </div>
              
            </div>  

      </div><br><br>
      

<div class="flex">
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Redimiento promedio Anual</h5>
        <h3 class="card-text"> 12%</h3>
       
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Rendimiento Promedio Mensual</h5>
        <h3 class="card-text" style= "text=align:center">25%</h3>
        
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Colocacion Promedio Mensual</h5>
        <h3 class="card-text">3.000,000</h3>
        
      </div>
    </div>
  </div>
</div>


</div> <br>



<div class="fluid" style = "background-color:black; width:100%;">
          <div class="col">
                        <h3 style="color:white; padding-top:10px;">Colocacion de la Cartera</h3>        
          
</div>

</div>

<br>
<br>

<div>




</div>
</div><br><br>




</div>

<div class="flex">

<table class="table">
  <thead class="black white-text">
    <tr>
      <th scope="col">Id Prestammo</th>
      <th scope="col">Monto del Prestamos</th>
      <th scope="col">Fondos Colocado de la cartera</th>
      <th scope="col">Pagos Recibidos</th>
      <th scope="col">Rendimiento Mensual del Prestamo</th>
      <th scope="col">Monto en Atraso</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>@fat</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>





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