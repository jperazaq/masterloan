<!doctype html>
    <html lang="en">

    <?php
    include  ('conexion.php');
    include  ('enviarPago.php');
    include  ('enviarComentarioCliente.php');

    $query = mysqli_query($conn,"SELECT * FROM users");
    


    ?>
    
<head>
    <title> Cliente- <?php    

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

    <div class="wrapper d-flex align-items-stretch" >
    <nav id="sidebar" class="active " style="background-color:#222831" >
    
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
    <h1>Detalle del Cliente</h1><hr>
    </div>





    <div class="container col-lg-12">
    <div class="row">
      <div class="col-sm">
      <?php 
    while($datos = mysqli_fetch_array($query)){  
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

    <tr>  
                                                                
              <td>Prestamos Activos</td>
              
              <td><?php echo $prestamosActivos?></td>    
                        
            </tr>                    
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