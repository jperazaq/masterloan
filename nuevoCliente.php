<!doctype html>
  <html lang="en">
    <head>
    <?php
       include  ("conexion.php");
       include  ("enviarNuevoUser.php");

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
      

       $query = mysqli_query($conn, "SELECT * FROM  users");

      
      
    ?>

      <title>Registrar Cliente</title>
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
 
          <script>
     if (window.history.replaceState){
    window.history.replaceState(null,null,window.location.nuevoCliente.php);
  }
    
    </script>
    </head>
    <body>

    < <div class= "wrapper " >
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

  <script> 
 
  
  
  </script>
      
      <div class="wrapper d-flex align-items-stretch"    >
        <nav id="sidebar" class="active " style="background-color:#222831; margin-top:25px" >
          <h1><a href="index.html" class="logo">ML</a></h1>
          <ul class="list-unstyled components mb-5"  style=" position: fixed">
            <li class="active" >
              <a href="dashboard.php"><span class="fa fa-home"></span> Dashboard</a>
            </li>
            
            <li class="active" >
             
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
        
        <div id="content" class="p-4 p-md-5" style="margin-top:0px; width:100%;background-color:#FFFDF7" >

          <!-- <nav class="navbar navbar-expand-lg " style="background-color:#eeeeee "> -->
            <div class="container-fluid"    >

           

      
              
          <div class="container col-lg-12" >
            
            <h1 >Clientes</h1><hr>
                   
                  
                  <a href="#" class="btn btn-primary">Crear nuevo credito</a><br>

                



            <div class="container" style="">
            <form action ="nuevoCliente.php" method="post">

           
            <h3>Crear Nuevo Cliente</h3><br><hr>
            
            <p>Datos Personales</p><hr>
            <div class="form-group row">
            
                <label for="cedula" class="col-sm-2 col-form-label">Cedula</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="cedula_cliente" id="cedula_cliente" name="cedula_cliente" placeholder="Ejemplo: 102340567" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder=" Ejemplo: Juan " required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Primer Apellido</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="papellido_cliente" name="papellido_cliente" placeholder="Ejemplo: Perez" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Segundo Apellido</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="sapellido_cliente" name="sapellido_cliente" placeholder="Ejemplo: Rojas" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" placeholder="Ejemplo: 555 55 55" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="email_cliente" name="email_cliente" placeholder="Ejemplo: email@email.com" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="nacimiento_cliente" name="nacimiento_cliente" placeholder=""required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Provincia</label>
                <div class="col-sm-10">

                <select class="custom-select my-1 mr-sm-2" id="provincia_cliente" name="provincia_cliente" required>
                    <option selected>Seleccione...</option>
                        
                    <option value="Cartago">Cartago</option>
                    <option value="Guanacaste">Guanacaste</option>
                    <option value="Heredia">Heredia</option>
                    <option value="Limon">Limon</option>
                    <option value="Puntarenas">Puntarenas</option>
                    <option value="San Jose">San Jose</option>
                </select>
                
            </div>         
        </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Canton</label required>
                <div class="col-sm-10">

                <select class="custom-select my-1 mr-sm-2" id="canton_cliente" name="canton_cliente">
                    <option selected>Seleccione...</option>
                    <option value="Abangares">Abangares</option>
                    <option value="Acosta"> Acosta </option>
                    <option value="Alajuela"> Alajuela </option>
                    <option value="Alajuelita"> Alajuelita </option>
                    <option value="Alvarado"> Alvarado </option>
                    <option value="Aserrí"> Aserrí </option>
                    <option value="Atenas"> Atenas </option>
                    <option value="Bagaces">Bagaces </option>
                    <option value="Barva"> Barva </option>
                    <option value="Belén"> Belén </option>
                    <option value="Buenos Aires"> Buenos Aires </option>
                    <option value="Cañas">Cañas </option>
                    <option value="Carrillo"> Carrillo </option>
                    <option value="Cartago"> Cartago </option>
                    <option value="Corredores"> Corredores </option>
                    <option value="Coto Brus"> Coto Brus </option>
                    <option value="Curridabat"> Curridabat </option>
                    <option value="Desamparados">Desamparados </option>
                    <option value="Dota">Dota </option>
                    <option value="El Guarco">El Guarco </option>
                    <option value="Escazú"> Escazú </option>
                    <option value="Esparza"> Esparza </option>
                    <option value="Flores">Flores </option>
                    <option value="Garabito">Garabito</option>
                    <option value="Goicoechea"> Goicoechea </option>
                    <option value="Golfito"> Golfito </option>
                    <option value="Grecia"> Grecia </option>
                    <option value="Guácimo"> Guácimo </option>
                    <option value="Guatuso"> Guatuso </option>
                    <option value="Heredia">Heredia </option>
                    <option value="Hojancha"> Hojancha </option>
                    <option value="Jiménez">Jiménez </option>
                    <option value="La Cruz">La Cruz </option>
                    <option value="La Unión"> La Unión </option>
                    <option value="León Cortés"> León Cortés </option>
                    <option value="Liberia"> Liberia </option>
                    <option value="Limón"> Limón </option>
                    <option value="Los Chiles"> Los Chiles </option>
                    <option value="Matina">Matina </option>
                    <option value="Montes de Oca "> Montes de Oca </option>
                    <option value="Montes de Oro"> Montes de Oro </option>
                    <option value="Mora"> Mora </option>
                    <option value="Moravia"> Moravia </option>
                    <option value="Nandayure">Nandayure </option>
                    <option value="Naranjo"> Naranjo </option>
                    <option value="Nicoya"> Nicoya </option>
                    <option value="Oreamuno">Oreamuno </option>
                    <option value="Orotina"> Orotina </option>
                    <option value="Osa"> Osa </option>
                    <option value="Palmares">Palmares </option>
                    <option value="Paraíso"> Paraíso </option>
                    <option value="Parrita"> Parrita </option>
                    <option value="Pérez Zeledón"> Pérez Zeledón </option>
                    <option value="Poás"> Poás </option>
                    <option value="Pococí"> Pococí </option>
                    <option value="Puntarenas"> Puntarenas </option>
                    <option value="Puriscal"> Puriscal </option>
                    <option value="Quepos">Quepos </option>
                    <option value="Río Cuarto">Río Cuarto </option>
                    <option value="San Carlos">San Carlos </option>
                    <option value="San Isidro"> San Isidro </option>
                    <option value="San José"> San José </option>
                    <option value="San Mateo"> San Mateo </option>
                    <option value="San Pablo"> San Pablo </option>
                    <option value="San Rafael"> San Rafael </option>
                    <option value="San Ramón"> San Ramón </option>
                    <option value="Santa Ana "> Santa Ana </option>
                    <option value="Santa Bárbara"> Santa Bárbara </option>
                    <option value="Santa Cruz"> Santa Cruz </option>
                    <option value="Santo Domingo"> Santo Domingo </option>
                    <option value="Sarapiquí"> Sarapiquí </option>
                    <option value="Sarchí"> Sarchí </option>
                    <option value="Siquirres"> Siquirres </option>
                    <option value="Talamanca">Talamanca </option>
                    <option value=""> Tarrazú </option>
                    <option value="Tibás"> Tibás </option>
                    <option value="Tilarán"> Tilarán </option>
                    <option value="Turrialba"> Turrialba </option>
                    <option value="Turrubares"> Turrubares </option>
                    <option value="Upala"> Upala </option>
                    <option value="Vázquez de Coronado ">Vázquez de Coronado </option>
                    <option value="Zarcero">Zarcero </option>

                </select>

                
                
            </div>

            

                    </div>

                    <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label" required>Distrito</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="distrito_cliente" name="distrito_cliente" placeholder="Merced" required>
                                </div>
                </div>

                    <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Pais</label>
                                    <div class="col-sm-10">

                                    <select class="custom-select my-1 mr-sm-2" id="pais_cliente" name="pais_cliente" required>
                                        <option selected>Seleccione...</option>
                                            
                                   
                                    <option value="Afganistán" id="AF">Afganistán</option>
                                    <option value="Albania" id="AL">Albania</option>
                                    <option value="Alemania" id="DE">Alemania</option>
                                    <option value="Andorra" id="AD">Andorra</option>
                                    <option value="Angola" id="AO">Angola</option>
                                    <option value="Anguila" id="AI">Anguila</option>
                                    <option value="Antártida" id="AQ">Antártida</option>
                                    <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                                    <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                                    <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
                                    <option value="Argelia" id="DZ">Argelia</option>
                                    <option value="Argentina" id="AR">Argentina</option>
                                    <option value="Armenia" id="AM">Armenia</option>
                                    <option value="Aruba" id="AW">Aruba</option>
                                    <option value="Australia" id="AU">Australia</option>
                                    <option value="Austria" id="AT">Austria</option>
                                    <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
                                    <option value="Bahamas" id="BS">Bahamas</option>
                                    <option value="Bahrein" id="BH">Bahrein</option>
                                    <option value="Bangladesh" id="BD">Bangladesh</option>
                                    <option value="Barbados" id="BB">Barbados</option>
                                    <option value="Bélgica" id="BE">Bélgica</option>
                                    <option value="Belice" id="BZ">Belice</option>
                                    <option value="Benín" id="BJ">Benín</option>
                                    <option value="Bermudas" id="BM">Bermudas</option>
                                    <option value="Bhután" id="BT">Bhután</option>
                                    <option value="Bielorrusia" id="BY">Bielorrusia</option>
                                    <option value="Birmania" id="MM">Birmania</option>
                                    <option value="Bolivia" id="BO">Bolivia</option>
                                    <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                                    <option value="Botsuana" id="BW">Botsuana</option>
                                    <option value="Brasil" id="BR">Brasil</option>
                                    <option value="Brunei" id="BN">Brunei</option>
                                    <option value="Bulgaria" id="BG">Bulgaria</option>
                                    <option value="Burkina Faso" id="BF">Burkina Faso</option>
                                    <option value="Burundi" id="BI">Burundi</option>
                                    <option value="Cabo Verde" id="CV">Cabo Verde</option>
                                    <option value="Camboya" id="KH">Camboya</option>
                                    <option value="Camerún" id="CM">Camerún</option>
                                    <option value="Canadá" id="CA">Canadá</option>
                                    <option value="Chad" id="TD">Chad</option>
                                    <option value="Chile" id="CL">Chile</option>
                                    <option value="China" id="CN">China</option>
                                    <option value="Chipre" id="CY">Chipre</option>
                                    <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
                                    <option value="Colombia" id="CO">Colombia</option>
                                    <option value="Comores" id="KM">Comores</option>
                                    <option value="Congo" id="CG">Congo</option>
                                    <option value="Corea" id="KR">Corea</option>
                                    <option value="Corea del Norte" id="KP">Corea del Norte</option>
                                    <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
                                    <option value="Costa Rica" id="CR">Costa Rica</option>
                                    <option value="Croacia" id="HR">Croacia</option>
                                    <option value="Cuba" id="CU">Cuba</option>
                                    <option value="Dinamarca" id="DK">Dinamarca</option>
                                    <option value="Djibouri" id="DJ">Djibouri</option>
                                    <option value="Dominica" id="DM">Dominica</option>
                                    <option value="Ecuador" id="EC">Ecuador</option>
                                    <option value="Egipto" id="EG">Egipto</option>
                                    <option value="El Salvador" id="SV">El Salvador</option>
                                    <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
                                    <option value="Eritrea" id="ER">Eritrea</option>
                                    <option value="Eslovaquia" id="SK">Eslovaquia</option>
                                    <option value="Eslovenia" id="SI">Eslovenia</option>
                                    <option value="España" id="ES">España</option>
                                    <option value="Estados Unidos" id="US">Estados Unidos</option>
                                    <option value="Estonia" id="EE">Estonia</option>
                                    <option value="c" id="ET">Etiopía</option>
                                    <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
                                    <option value="Filipinas" id="PH">Filipinas</option>
                                    <option value="Finlandia" id="FI">Finlandia</option>
                                    <option value="Francia" id="FR">Francia</option>
                                    <option value="Gabón" id="GA">Gabón</option>
                                    <option value="Gambia" id="GM">Gambia</option>
                                    <option value="Georgia" id="GE">Georgia</option>
                                    <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
                                    <option value="Ghana" id="GH">Ghana</option>
                                    <option value="Gibraltar" id="GI">Gibraltar</option>
                                    <option value="Granada" id="GD">Granada</option>
                                    <option value="Grecia" id="GR">Grecia</option>
                                    <option value="Groenlandia" id="GL">Groenlandia</option>
                                    <option value="Guadalupe" id="GP">Guadalupe</option>
                                    <option value="Guam" id="GU">Guam</option>
                                    <option value="Guatemala" id="GT">Guatemala</option>
                                    <option value="Guayana" id="GY">Guayana</option>
                                    <option value="Guayana francesa" id="GF">Guayana francesa</option>
                                    <option value="Guinea" id="GN">Guinea</option>
                                    <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                                    <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                                    <option value="Haití" id="HT">Haití</option>
                                    <option value="Holanda" id="NL">Holanda</option>
                                    <option value="Honduras" id="HN">Honduras</option>
                                    <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                                    <option value="Hungría" id="HU">Hungría</option>
                                    <option value="India" id="IN">India</option>
                                    <option value="Indonesia" id="ID">Indonesia</option>
                                    <option value="Irak" id="IQ">Irak</option>
                                    <option value="Irán" id="IR">Irán</option>
                                    <option value="Irlanda" id="IE">Irlanda</option>
                                    <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                                    <option value="Isla Christmas" id="CX">Isla Christmas</option>
                                    <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                                    <option value="Islandia" id="IS">Islandia</option>
                                    <option value="Islas Caimán" id="KY">Islas Caimán</option>
                                    <option value="Islas Cook" id="CK">Islas Cook</option>
                                    <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                                    <option value="Islas Faroe" id="FO">Islas Faroe</option>
                                    <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                                    <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
                                    <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                                    <option value="Islas Marshall" id="MH">Islas Marshall</option>
                                    <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
                                    <option value="Islas Palau" id="PW">Islas Palau</option>
                                    <option value="Islas Salomón" d="SB">Islas Salomón</option>
                                    <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                                    <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                                    <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
                                    <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
                                    <option value="Israel" id="IL">Israel</option>
                                    <option value="Italia" id="IT">Italia</option>
                                    <option value="Jamaica" id="JM">Jamaica</option>
                                    <option value="Japón" id="JP">Japón</option>
                                    <option value="Jordania" id="JO">Jordania</option>
                                    <option value="Kazajistán" id="KZ">Kazajistán</option>
                                    <option value="Kenia" id="KE">Kenia</option>
                                    <option value="Kirguizistán" id="KG">Kirguizistán</option>
                                    <option value="Kiribati" id="KI">Kiribati</option>
                                    <option value="Kuwait" id="KW">Kuwait</option>
                                    <option value="Laos" id="LA">Laos</option>
                                    <option value="Lesoto" id="LS">Lesoto</option>
                                    <option value="Letonia" id="LV">Letonia</option>
                                    <option value="Líbano" id="LB">Líbano</option>
                                    <option value="Liberia" id="LR">Liberia</option>
                                    <option value="Libia" id="LY">Libia</option>
                                    <option value="Liechtenstein" id="LI">Liechtenstein</option>
                                    <option value="Lituania" id="LT">Lituania</option>
                                    <option value="Luxemburgo" id="LU">Luxemburgo</option>
                                    <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                                    <option value="Madagascar" id="MG">Madagascar</option>
                                    <option value="Malasia" id="MY">Malasia</option>
                                    <option value="Malawi" id="MW">Malawi</option>
                                    <option value="Maldivas" id="MV">Maldivas</option>
                                    <option value="Malí" id="ML">Malí</option>
                                    <option value="Malta" id="MT">Malta</option>
                                    <option value="Marruecos" id="MA">Marruecos</option>
                                    <option value="Martinica" id="MQ">Martinica</option>
                                    <option value="Mauricio" id="MU">Mauricio</option>
                                    <option value="Mauritania" id="MR">Mauritania</option>
                                    <option value="Mayotte" id="YT">Mayotte</option>
                                    <option value="México" id="MX">México</option>
                                    <option value="Micronesia" id="FM">Micronesia</option>
                                    <option value="Moldavia" id="MD">Moldavia</option>
                                    <option value="Mónaco" id="MC">Mónaco</option>
                                    <option value="Mongolia" id="MN">Mongolia</option>
                                    <option value="Montserrat" id="MS">Montserrat</option>
                                    <option value="Mozambique" id="MZ">Mozambique</option>
                                    <option value="Namibia" id="NA">Namibia</option>
                                    <option value="Nauru" id="NR">Nauru</option>
                                    <option value="Nepal" id="NP">Nepal</option>
                                    <option value="Nicaragua" id="NI">Nicaragua</option>
                                    <option value="Níger" id="NE">Níger</option>
                                    <option value="Nigeria" id="NG">Nigeria</option>
                                    <option value="Niue" id="NU">Niue</option>
                                    <option value="Norfolk" id="NF">Norfolk</option>
                                    <option value="Noruega" id="NO">Noruega</option>
                                    <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                                    <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                                    <option value="Omán" id="OM">Omán</option>
                                    <option value="Panamá" id="PA">Panamá</option>
                                    <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                                    <option value="Paquistán" id="PK">Paquistán</option>
                                    <option value="Paraguay" id="PY">Paraguay</option>
                                    <option value="Perú" id="PE">Perú</option>
                                    <option value="Pitcairn" id="PN">Pitcairn</option>
                                    <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                                    <option value="Polonia" id="PL">Polonia</option>
                                    <option value="Portugal" id="PT">Portugal</option>
                                    <option value="Puerto Rico" id="PR">Puerto Rico</option>
                                    <option value="Qatar" id="QA">Qatar</option>
                                    <option value="Reino Unido" id="UK">Reino Unido</option>
                                    <option value="República Centroafricana" id="CF">República Centroafricana</option>
                                    <option value="República Checa" id="CZ">República Checa</option>
                                    <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
                                    <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
                                    <option value="República Dominicana" id="DO">República Dominicana</option>
                                    <option value="Reunión" id="RE">Reunión</option>
                                    <option value="Ruanda" id="RW">Ruanda</option>
                                    <option value="Rumania" id="RO">Rumania</option>
                                    <option value="Rusia" id="RU">Rusia</option>
                                    <option value="Samoa" id="WS">Samoa</option>
                                    <option value="Samoa occidental" id="AS">Samoa occidental</option>
                                    <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                                    <option value="San Marino" id="SM">San Marino</option>
                                    <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
                                    <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
                                    <option value="Santa Helena" id="SH">Santa Helena</option>
                                    <option value="Santa Lucía" id="LC">Santa Lucía</option>
                                    <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
                                    <option value="Senegal" id="SN">Senegal</option>
                                    <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                                    <option value="Sychelles" id="SC">Seychelles</option>
                                    <option value="Sierra Leona" id="SL">Sierra Leona</option>
                                    <option value="Singapur" id="SG">Singapur</option>
                                    <option value="Siria" id="SY">Siria</option>
                                    <option value="Somalia" id="SO">Somalia</option>
                                    <option value="Sri Lanka" id="LK">Sri Lanka</option>
                                    <option value="Suazilandia" id="SZ">Suazilandia</option>
                                    <option value="Sudán" id="SD">Sudán</option>
                                    <option value="Suecia" id="SE">Suecia</option>
                                    <option value="Suiza" id="CH">Suiza</option>
                                    <option value="Surinam" id="SR">Surinam</option>
                                    <option value="Svalbard" id="SJ">Svalbard</option>
                                    <option value="Tailandia" id="TH">Tailandia</option>
                                    <option value="Taiwán" id="TW">Taiwán</option>
                                    <option value="Tanzania" id="TZ">Tanzania</option>
                                    <option value="Tayikistán" id="TJ">Tayikistán</option>
                                    <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
                                    <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
                                    <option value="Timor Oriental" id="TP">Timor Oriental</option>
                                    <option value="Togo" id="TG">Togo</option>
                                    <option value="Tonga" id="TO">Tonga</option>
                                    <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                                    <option value="Túnez" id="TN">Túnez</option>
                                    <option value="Turkmenistán" id="TM">Turkmenistán</option>
                                    <option value="Turquía" id="TR">Turquía</option>
                                    <option value="Tuvalu" id="TV">Tuvalu</option>
                                    <option value="Ucrania" id="UA">Ucrania</option>
                                    <option value="Uganda" id="UG">Uganda</option>
                                    <option value="Uruguay" id="UY">Uruguay</option>
                                    <option value="Uzbekistán" id="UZ">Uzbekistán</option>
                                    <option value="Vanuatu" id="VU">Vanuatu</option>
                                    <option value="Venezuela" id="VE">Venezuela</option>
                                    <option value="Vietnam" id="VN">Vietnam</option>
                                    <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                                    <option value="Yemen" id="YE">Yemen</option>
                                    <option value="Zambia" id="ZM">Zambia</option>
                                    <option value="Zimbabue" id="ZW">Zimbabue</option>
                                    </select>
                                    
                                </div>         
                            </div>

                          
                           
                                          

                            <div class="form-group row">
                            
                            <label for="cedula" class="col-sm-2 col-form-label">Otras Señas</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="senas_cliente" name="senas_cliente" placeholder="Ejemplo: 222 metros este Escuela" required>
                            </div>
                        </div><hr>

                        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Cobrador</label>
                                <div class="col-sm-10">

                                

                                <select class="custom-select my-1 mr-sm-2" id="cobrador_cliente" name="cobrador_cliente" required>
                                    <option selected>Seleccione...</option>
                                    <?php 
                                      while($datos = mysqli_fetch_array($query)){                                    
                                    ?>
                                    <option value="<?php echo $datos['idUSERS']?>"> <?php echo $datos['FIRST_NAME'], ' ', $datos['LAST_NAME']  ?> </option>
                                    <?php 
                                      }
                                    ?>
                                       
                                </select>
                                
                                     
                                                                
                               
                            </div>         
                        </div>



                            <p>Datos Economicos</p><hr>

                            <div class="form-group row">
                            
                            <label for="cedula" class="col-sm-2 col-form-label">Ocupacion</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="ocupacion_cliente" name="ocupacion_cliente" placeholder="Ejemplo: Abogado, Trabajador independiente" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Ingreso Promedio Mensual</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="ingreso_cliente" name="ingreso_cliente" placeholder=" Ejemplo: 500 000 " required>
                            </div>
                        </div>

                        <div class="form-group row">
                           
                            <div class="col-sm-10">
                            <input type="" class="form-control" id="idEmpresa" name="idEmpresa" placeholder=" Ejemplo: 500 000 " value = "<?php echo $idEmpreasSess ?>">
                            </div>
                        </div>
                        

                        <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Tiempo de dedicarse a la actividad</label>
                        <div class="col-sm-10">

                        <select class="custom-select my-1 mr-sm-2" id="dedicacion_cliente" name="dedicacion_cliente" required>
                            <option selected>Seleccione...</option>
                                
                            <option value="Menos de un annio">Menos de un año</option>
                            <option value="2-3 Annios">De 1 a 3 años</option>
                            <option value="3-5 Annios">De 3 a 5 años</option>
                            <option value="Mas 5 Annios">Mas de 5 años</option>
                            
                        </select>
                </div>
            </div>         
        <div>
    </div><hr>
               
                            
            
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
        Esta seguro de crear el cliente?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary"id="crearCliente" name="crearCliente"   >Crear Cliente</button>
      </div>
    </div>
  </div>
            </div>        
            </form>
<div class="container">
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="" id="" name="" class="btn btn-primary" data-target="#exampleModal" data-toggle="modal">Crear</button>
                </div>
            </div>
            </div>
           
                    
           

        </div>
      </div>
      
        
          
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"></script>



      
    
    </body>
  </html>