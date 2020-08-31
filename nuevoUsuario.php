<!doctype html>
  <html lang="en">
    <head>

    <?php
      include  ("conexion.php");
      include  ("enviarNuevoCliente.php");
      
  
    ?>
    
      <title>Registrar Usuario</title>
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

          <script>
     if (window.history.replaceState){
    window.history.replaceState(null,null,window.location.nuevoUsuario.php);
  }
    
    </script>
          
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

           

      
              
          <div class="container col-lg-12" >
            
            <h1 >Usuarios</h1><hr>
                   
                  
                  



            <div class="container" style="">
            <form action ="" method="post">
            <h3>Crear Nuevo Usuario</h3><br><hr>
            <p>Datos Personales</p><hr>
            <div class="form-group row">
            
                <label for="cedula" class="col-sm-2 col-form-label">Cedula</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="cedula_usuario" name="cedula_user" placeholder="Ejemplo: 102340567">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder=" Ejemplo: Juan ">
                </div>
            </div>

         

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Primer Apellido</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="papellido_usuario"  name="papellido_usuario" placeholder="Ejemplo: Perez">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Segundo Apellido</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="sapellido_usuario" name="sapellido_usuario" placeholder="Ejemplo: Rojas">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre Usuario</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="usuario_usuario" name="usuario_usuario" placeholder=" Ejemplo: Juan ">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="usuario_usuario" name="password_usuario" placeholder=" ">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="usuario_usuario" name="confirm_password_usuario" placeholder=" ">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="correo_usuario" name="correo_usuario" placeholder="Ejemplo: correo@correo.com">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ejemplo: 555 555 55">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="nacimiento_usuario" name="nacimiento_usuario" placeholder="">
                </div>
            </div>




                           
                        

                        <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Rol</label>
                        <div class="col-sm-10">

                        <select class="custom-select my-1 mr-sm-2" id="rol_usuario" name="rol_usuario">
                            <option selected>Seleccione...</option>
                                
                            <option value="Administrador">Administrador</option>
                            <option value="Analista">Analista</option>
                            <option value="Consultor">Consultor</option>
                            
                            
                        </select>
                </div>
            </div>         
        <div>
    </div><hr>
               
             
          
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
        Esta seguro de crear el Usuario?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary"id="guardarUsuario" name="guardarUsuario">Guardar Usuario</button>
      </div>
    </div>
  </div>
</div>

            </form>
            </div>        
            <div class="container">             
            
                <div class="col-sm-10">
                <button type=""  class="btn btn-primary" id="crear_usuario" data-target="#exampleModal" data-toggle="modal" >Crear</button>
                </div>
            
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
     if (window.history.replaceState){
    window.history.replaceState('','',window.location.nuevoUsuario.php);
  }
  </script>
    
    </body>
  </html>