<!doctype html>
    <html lang="en">
    <meta name="viewport" content="width=device-width, user-scalable=yes">


    <?php
    include  ('conexion.php');
    include  ('enviarPago.php');
    include  ('enviarComentarioCliente.php');

    session_start();  
    $varsession = $_SESSION['emailsess'];
  
    $sql =   $querySes = mysqli_query($conn, "SELECT * from carteras");
    ?>

<head>
    <title> Carteras

    
    
  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">





    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleTable.css">
    <link rel="stylesheet" href="cartera.css">


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
    <h1>Detalle de Carteras</h1><hr>
    </div>  



    </div>
    </div><br>

    <div class="container-fluid">
    
    
  <div class="row align-items-start ">

    <div class="col-md-3" style="width:0px">
    <div class="form-group ">
                <label for="inputPassword3" class="col-sm-12 col-form-label">Fecha Inicial<label><br>
                <div class="col-sm-12   ">
                <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" placeholder=""required>
                </div>
            </div>
    
    
    </div>
    <div class="col-sm-4">
    
    <div class="form-group ">
                <label for="inputPassword3" class="col-sm-12 col-form-label">Fecha Final<label><br>
                <div class="col-sm-12 ">
                <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" placeholder=""required>
                
                </div>
            </div>
            
    </div>
  
 
  </div>
<div>
<button type="submit" class="btn btn-primary"id="consultaCartera" name="consultaCartera"  style="margin-left:10px;" >Consultar</button>
</div>
  
  <hr>
    


<div class="container-flex" >


<table id="dtOrderExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Cod Cartera
      </th>
      <th class="th-sm">Identificacion
      </th>
      <th class="th-sm">Fecha de Apertura
      </th>
      <th class="th-sm">Nombre
      </th>
      <th class="th-sm">Primer Apellido
      </th>
      <th class="th-sm">Segundo Apellido
      </th>
      <th class="th-sm">Monto de la Cartera
      </th>
      <th class="th-sm">Monto Colocado
      </th>
      <th class="th-sm">Rendimiento
      </th>
      <th class="th-sm">Acciones
      </th>
    </tr>
  </thead>
  <tbody>
  <?php 
  while($cartera = mysqli_fetch_array($sql)){

    $idnumber = $cartera["CARTERA_ID"];

  
  ?>
    <tr>
      <td><?php echo $cartera['CARTERA_ID']?></td>
      <td><?php echo $cartera['ID_NUMBER']?></td>
      <td><?php echo $cartera['FECHA_REG']?></td>
      <td><?php echo $cartera['FIRST_NAME']?></td>
      <td><?php echo $cartera['LAST_NAME']?></td>
      <td><?php echo $cartera['SECOND_LAST_NAME']?></td>
      <td><?php echo number_format($cartera['MONTO_CARTERA'])?></td>
      <td>$320,800</td>
      <td>$320,800</td>
      <td> <?php echo "<a href='detalleCartera.php?&ID_NUMBER=$idnumber'>Ver Detalles</a>"?></td>
    </tr>
  <?php } ?>
  </tbody>
  <tfoot>
  <th class="th-sm">Cod Cartera
      </th>
      <th class="th-sm">Identificacion
      </th>
      <th class="th-sm">Fecha de Apertura
      </th>
      <th class="th-sm">Nombre
      </th>
      <th class="th-sm">Primer Apellido
      </th>
      <th class="th-sm">Segundo Apellido
      </th>
      <th class="th-sm">Monto de la Cartera
      </th>
      <th class="th-sm">Monto Colocado
      </th>
      <th class="th-sm">Rendimiento
      </th>
      <th class="th-sm">Acciones
      </th>
  </tfoot>
</table>




</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.min.js" integrity="sha512-T970v+zvIZu3UugrSpRoyYt0K0VknTDg2G0/hH7ZmeNjMAfymSRoY+CajxepI0k6VMFBXxgsBhk4W2r7NFg6ag==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>

<script src="cartera.js"></script>



    </body>
    </html>