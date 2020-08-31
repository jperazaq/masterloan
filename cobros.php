<!doctype html>
  <html lang="en">
    <head>
      <title>Sidebar 07</title>
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

           

              <!-- <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
              </button> -->
              <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-bars"></i>
              </button> -->
            <header >
           
              
          <div class="container col-lg-12" >
            <h1  >Prestamos</h1><hr>
            
            <h5 class="card-title"> Resumen de creditos</h5> 
                  <table class="table" style="text-align:center; background-color:#e4e3e3">
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
                      <th >¢ 90 000 000</th>
                      <th scope="row">90%</th>
                      <th >¢ 7 000 000</th>
                      <th scope="row">7%</th>
                      <td>¢ 1 000 000</td>
                      <th scope="row">1%</th>
                      <td>¢ 500 000</td>
                      <th scope="row">1%</th>
                      <td>¢ 112 000</td>
                      <th scope="row">0.5%</th>
                      
                    </tr>
                   
                  </tbody>
                </table>
          
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
                  <h5>Total de la Cartera:</h5> <h4  style="color:#00adb5"> ₡ 150 000 000</h4>
                  <h5>Creditos Otorgados:</h5> <h4  style="color:#00adb5"> ₡ 150 000 000</h4>
                  <h5>Dias de Pago promedio:</h5> <h4  style="color:#00adb5"> 43 dias</h4>
                  <h5>Total en Atraso</h5> <h4  style="color:#00adb5"> ₡ 2 650 000</h4>
                  <h5>Cantidad de Clientes</h5> <h4  style="color:#00adb5"> 175</h4>

                  <div class="container">
                      <div class="row">
                        <div class="col-lg">
                          <h5><a href="#" class="btn btn-primary">Ver Clientes</a></h5>
                          
                        </div>
                        <div class="col">
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

  <!-- MAnipulacion de los graficos        -->
  <script>
            new Chart(document.getElementById("line-chart"), {
                responsive:true,
                type: 'line',
                data: {
                  labels: ["Enero","Febrero","Marzo","Abril","Mayo","Julio","Julio","Agosto","Septiembre","Octubre"],
                  datasets: [{ 
                      data: [5500000,1200000,800000,5670000,9900000,1687899,5550700,2300000,7980214,6878543],
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


 

  <script>
            new Chart(document.getElementById("line-chart2"), {
                responsive: true,
                type: 'radar',
                data: {
                  labels: ["Al dia","1-30","31-60","61-90","Mas de 90 dias"],
                  datasets: [{ 
                      data: [5500000,1200000,800000,5670000,9900000],
                      label: "Prestamos",
                      borderColor: "#3e95cd",
                      fill: false
                    }
                  ]
                },
                options: {
                  
                  title: {
                    display: true,
                    text: 'Lista de Periodo de Atraso',
                  }
                  
                }
                
              });
    </script>

<script>
            new Chart(document.getElementById("pie-chart"), {
                responsive: true,
                type: 'pie',
                data: {
                  labels: ["Al dia","1-30","31-60","61-90","Mas de 90 dias"],
                  datasets: [{ 
                      data: [5500000,1200000,800000,5670000,9900000],
                      label: "Prestamos",
                      borderColor: "#3e95cd",
                      fill: false
                    }
                  ]
                },
                options: {
                  
                  title: {
                    display: true,
                    text: 'Lista de Periodo de Atraso',
                  }
                  
                }
                
              });
    </script>

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
                  type: 'pie',
                  data: {
                    labels: ["Al dia", "1-30", "31-60", "61-09", "Sobre 90"],
                    datasets: [{
                      label: "Analisis de Mora",
                      backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                      data: [2478,5267,734,784,433]
                    }]
                  },
                  options: {
                    title: {
                      display: true,
                      text: 'Atrasos por periodo'
                    }


                    
                  }
              });
              </script>
              


              <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
              
              <table class="table table-striped table-bordered myDataTable " style="width:100%; text-align:center" >
              <thead class= "thead-dark">
                  <tr>
                      <th colspan="1" rowspan="2">Nombre</th>
                      <!-- <th colspan="2" >Hr Information</th> -->
                      <!-- <th colspan="3">Contact</th> -->

                  </tr>
                  <tr>
                      
                      <th>Cedula</th>
                      <th>Monto del Prestamo </th>
                      <th>Prestamo ID </th>
                      <th>Fecha Apertura </th>
                      <th>Pago mensual </th>
                      <th>Fecha de Pago </th>
                      <th>Dias de Atraso </th>
                      <th>Total Atraso </th>
                      
                      <th>Acciones </th>

                      

                      
                  </tr>
                  
              </thead>
                  
              <tbody>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>

              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>121212</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>$320,800</td>
                  <td>$1090</td>
                  
                  <td><a href="prestamosdetalle.php">Detalles</a></td>
              </tr>


              
              </tbody>

              <!-- <tfoot>
              
                      <th>Nombre</th>
                      <th>Cedula</th>
                      <th>Monto del Prestamo </th>
                      <th>Fecha Apertura </th>
                      <th>Pago mensual </th>
                      <th>Fecha de Pago </th>
                      <th>Dias de Atraso </th>
                      <th>Acciones </th>

              </tfoot> -->

              </table>
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
      $('.myDataTable').DataTable({
          order:[[5,"desc"]],
          pagingType:'full_numbers'
          
      }); 
  </script>
    
    </body>
  </html>