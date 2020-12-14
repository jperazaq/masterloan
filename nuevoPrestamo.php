<html lang="en">


<?php 



include  ('enviarNuevoPrestamo.php');
include  ('enviarTablaDinamica.php');

include  ('conexion.php');
$query = mysqli_query($conn, "SELECT * FROM  customers");
$query2 = mysqli_query($conn, "SELECT * FROM  users");

      
session_start();  
$varsession = $_SESSION['emailsess'];




$querySes = mysqli_query($conn, "SELECT `idUSERS`, `ID_NUMBER`, `FIRST_NAME`, `LAST_NAME`, `SECOND_LAST_NAME`, `USER_USER`, `PHONE_NUMBER`, `EMAIL_NUMBER`, `DATE_OF_BIRTH`, `AGE`, `JOB`, `NOMBRE_EMPRESA`,`ID_EMPRESA`, `USER_PASSWORD`
 FROM `users` WHERE EMAIL_NUMBER = '$varsession'");
$rowses = mysqli_fetch_array($querySes);
$nombrein = $rowses['FIRST_NAME'];
$idEmpreasSess= $rowses['ID_EMPRESA'];


if ($varsession == NULL || $varsession = ""){
  header("LOCATION: nuevo.php")
  ;
  die();

}

?>
<head>

<title>Crear Nuevo Prestamo</title>
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



      
      <div class="wrapper d-flex align-items-stretch"    >
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
        
        <div id="content" class="p-4 p-md-5" style="margin-top:0px; width:100%;background-color:#FFFDF7" >

          <!-- <nav class="navbar navbar-expand-lg " style="background-color:#eeeeee "> -->
            <div class="container-fluid"    >          

      
              
          <div class="container col-lg-12" >
            
            <h1 >Nuevo Credito</h1><hr>                
                  
         <div class="container" style=""> 

        <form id="prestamoForm" name= "prestamoForm" method ='post' action="nuevoPrestamo.php">
          <div class="form-group row">
          
            
                <label for="cedula" class="col-sm-2 col-form-label">Ciente</label>
               
                <div class="col-sm-10">                               

            <select class="custom-select my-1 mr-sm-2" id="clienteId" name="clienteId" required>
                <option selected>Seleccione...</option>
                <?php 
                  while($datos = mysqli_fetch_array($query)){                                    
                ?>
                <option value="<?php echo $datos['CUSTOMER_ID']?>"requiered> <?php echo $datos['FIRST_NAME'], ' ', $datos['LAST_NAME']  ?> </option>
                <?php 
                  };
                ?>
                  
            </select>

                
                                            

            </div>         

            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Monto del Prestamo</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="montoPrestamo" name= "montoPrestamo" placeholder=" Ejemplo: 1 000 000 " required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Periodo en meses</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="periodo" name = "periodo" placeholder="Ejemplo: 36"required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tasa mensual del Prestamo</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="tasa" name = "tasa"placeholder="Ejemplo:3%" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Multa</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="multa" name = "multa"placeholder="Ejemplo:3%" required>
                </div>
            </div>

            

            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Cobrador</label>
                                <div class="col-sm-10">

                                

                                <select  class="custom-select my-1 mr-sm-2" id="cobrador_cliente" name="cobrador_cliente" required>
                                    <option selected>Seleccione...</option>
                                    <?php 
                                      while($datos = mysqli_fetch_array($query2)){                                    
                                    ?>
                                    <option value="<?php echo $datos['idUSERS']?>"> <?php echo $datos['FIRST_NAME'], ' ', $datos['LAST_NAME']  ?> </option>
                                    <?php 
                                      }
                                    ?>
                                       
                                </select>                             
                                     
                                                                
                               
                            </div>         
                        </div>

                        

                <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tipo de cuota</label>
                <div class="col-sm-10">
                <div class="form-check">

                    <input requiered class="form-check-input" type="radio" name="radioCuota" id="tipoCuota" value="cuotaSoloIntereses" required  >
                    <label class="form-check-label" for="exampleRadios1">
                     Solo Intereses
                    </label>
                  </div>
                  <div class="form-check" >
                    <input class="form-check-input" type="radio" name="radioCuota" id="tipoCuota" value="cuota_completa"required>
                    <label class="form-check-label" for="exampleRadios2"  >
                      Intereses mas amortizacion (Tipo Bancario)
                    </label>
                  </div>

                  <div class="form-check" >
                    <input class="form-check-input" type="radio" name="radioCuota" id="tipoCuota" value="cuota_plana"required>
                    <label class="form-check-label" for="exampleRadios2"  >
                      Cuota Plana
                    </label><br>
                    <small>Monto principal entre el periodo del prestamo mas el monto de interes mensual calculado sobre el principal</small>
                  </div>

                  
                  <div class="form-check" >
                    <input class="form-check-input" type="hidden" name="idEmpresa" id="idEmpresa" value="<?php echo $idEmpreasSess ?>"required>
                    
                    
                  </div>

                </div>

                
                
            </div>
            

            <div>
            <div class="form-group row"  >
                <label for="inputPassword3" class="col-sm-2 col-form-label">Moneda</label>
                <div class="col-sm-10">
                <div class="form-check">

                    <input class="form-check-input" type="radio" name="radioMoneda" id="moneda" value="colones" required >
                    <label class="form-check-label" for="exampleRadios1">
                    Colones
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioMoneda" id="modeda" value="dolares" required>
                    <label class="form-check-label" for="exampleRadios2">
                      Dolares
                    </label>
                  </div>

                </div>
                </div>
              </div>
              
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Guardar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esta seguro de crear el credito?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary"id="guardar" name="guardar">Guardar Credito</button>
      </div>
    </div>
  </div>
</div>
              
          </form>
          
          <div class="button-box col-lg-12" margin=12px>
              <button type=""  class="btn btn-primary" data-target="#exampleModal" data-toggle="modal" >Guardar Credito</button>
              <button type="" id= "calcular1" class="btn btn-primary">Calcular</button>
              </div>
            <p id="pagoAlMes"></p>
            <div class="card">
                <div class="card-header">
                <h5 class="card-title"> Resumen del credito</h5> 
                </div>
                <div class="card-body" >


                <div name="montoPrestamo">
                    
                    <h6 id="montoPrestamosJs" >
                    
                   </h6> 

                   </div>
                <div name="pagoAlMes">
                    
                    <h6 id="pagoAlMes1">
                    
                   </h6> 

                   </div>
                   
                   <div name="CuotaInteres">
                  
                    <h6 id="cuotaInteres">
                    
                   </h6> 

                   </div>

                   <div name="tasaMes">
              
                    <h6 id="tasaMes">
                    
                   </h6> 

                   </div>

                   <div name="plazo">
                   
                    <h6 id="plazoMeses">
                    
                   </h6> 

                   </div>              
                   </blockquote>
                </div>
                </div>
            
        <div>
    </div><hr>
               

    <!-- Tabla de amortizacion -->
    <div class="col-xs-12">
    <div class="text-center" style="position:center  ">
    <h2>Cuadro de Amortizacion</h2>
    <h5>En caso de que el cliente solo cancele los intereses, favor referirse al resumen de credito "Cuota Solo Intereses"</h5>
    </div>
    </div>
    <form id="tablaPrestamo" name="tablaPrestamo">
    <table id ='lista-tabla' name="tablaPrestamo" class="table table-striped table-bordered myDataTable " style="width:100%; text-align:center" >
              <thead class= "thead-dark">
                  <tr>
                                  
                      
                      
                      <th>Fecha de Pago </th>
                      <th>Cuota </th>
                      <th>Capital </th>
                      <th>Interes </th>
                      <th>Saldo</th>
                             
                   </tr>
                  
              </thead>
                  
              <tbody></tbody>           
            
            

            
            
             
            </form>
            </div>   
              
              

              

              </table>
            </div>

        </div>
      </div>  
  </div>
</div>





<script src="moment.js"></script>

<script src="juliojs.js"></script>

    
    </body>
  </html>