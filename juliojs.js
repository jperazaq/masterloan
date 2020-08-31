var monto = document.getElementById('montoPrestamo');
var tasa = document.getElementById('tasa');
var tiempo = document.getElementById('periodo');
var btnCalcular = document.getElementById('calcular1');
var btnGuardar = document.getElementById('guardar');
const llenarTable = document.querySelector('#lista-tabla tbody');
const pagoDeInteres= document.querySelector('#pagoAlMes1');
const CuotaDeInteres= document.querySelector('#cuotaInteres');
const tasaInt = document.querySelector('#tasaMes');
const montoDelPrestamo = document.querySelector('#montoPrestamosJs');
const plazoEnMeses = document.querySelector('#plazoMeses');



;




 $('#calcular1').click(function(e){
        e.preventDefault()
    });

btnCalcular.addEventListener('click', ()=>{
    
    calcularCuota(monto.value, tasa.value, tiempo.value);
    CuotaTotal(monto.value, tasa.value, tiempo.value);
    CuotaInteres(monto.value, tasa.value, tiempo.value);
    TasaDeInteres( tasa.value);
    montoAPrestar(monto.value);
    plazoPrestamo(tiempo.value);

})


function calcularCuota (monto, tasa, tiempo){

    while(llenarTable.firstChild){
        llenarTable.removeChild(llenarTable.firstChild);           

    }

    while(pagoDeInteres.firstChild){
        pagoDeInteres.removeChild(pagoDeInteres.firstChild);           

    }

    while(CuotaDeInteres.firstChild){
        CuotaDeInteres.removeChild(CuotaDeInteres.firstChild);           

    }

    while(tasaInt.firstChild){
        tasaInt.removeChild(tasaInt.firstChild);           

    }

    while(montoDelPrestamo.firstChild){
        montoDelPrestamo.removeChild(montoDelPrestamo.firstChild);           

    }

    while(plazoEnMeses.firstChild){
        plazoEnMeses.removeChild(plazoEnMeses.firstChild);           

    }


    
    
    let fechas = [];
    let fechaActual = Date.now();
    let mes_actual = moment(fechaActual);

    let pagoInteres=0, pagoCapital=0,cuota=0;

        cuota = monto * (Math.pow(1+tasa/100, tiempo)*tasa/100)/( Math.pow (1+tasa/100,tiempo)-1);
console.log(cuota);
    
    for(let i=1; i<=tiempo;i++) {
        pagoIntereses = parseFloat(monto*(tasa/100));
        pagoCapital = cuota-pagoIntereses;
        monto= parseFloat(monto-pagoCapital);

        fechas[i] = mes_actual.format("DD-MM-YY");
        mes_actual.add (1,'month');           
        
        const row= document.createElement('tr');
        
        
        row.innerHTML = `
        <td>${fechas[i]}</td>
        <td>${cuota.toFixed(2)}</td>
        <td>${pagoCapital.toFixed(2)}</td>
        <td>${pagoIntereses.toFixed(2)}</td>
        <td>${monto.toFixed(2)}</td>
        `;
    
    llenarTable.appendChild((row));


    }


        guardar.addEventListener('click', ()=>{
           var datos = $('#lista-tabla').serialize();    
            console.log(datos)
    ;       $.ajax({
                 url: "enviarTablaDinamica.php", 
                type: "POST",                            
                data:{ datos:datos},
                success: function(r) {
    
                    if(r==1){
                        alert("todo super");        
                    }else{
                        alert("mamo");
                    } 
                    }
                        
                
                }) ;
                return false;
            });         
    
    

}

function CuotaTotal(monto,tasa,tiempo){
    var cuotaCompleta = parseFloat( monto * (Math.pow(1+tasa/100, tiempo)*tasa/100)/( Math.pow (1+tasa/100,tiempo)-1));
    
    const linea = document.createElement('p');
    linea.innerHTML = `
    <h4>Cuota Interes mas Amortizacion</h4> 
    <h3> ${cuotaCompleta.toFixed(0)}</h3>        

    `;

    pagoDeInteres.appendChild((linea));
}
    
function CuotaInteres(monto,tasa){
    var pagoIntereses1 = parseFloat(monto*(tasa/100));
    const linea1 = document.createElement('p');
    linea1.innerHTML = `
    <h4>Cuota Solo Interes</h4> 
    <h3> ${pagoIntereses1.toFixed(0)}</h3>        

    `;

    CuotaDeInteres.appendChild(linea1);
    console.log(typeof(pagoIntereses1));
}

        
function TasaDeInteres(tasa){
    
    var tasa1 = parseFloat((tasa-tasa)+tasa)
    var tasa2 = parseFloat(tasa1)+'%'
    const linea2 = document.createElement('p');
    linea2.innerHTML = `
    <h4>Tasa de Interes</h4> 
    <h3>${tasa1.toFixed(0)}%</h3>        

    `;

    tasaInt.appendChild(linea2);
    console.log(typeof(tasa1));
    
}

function montoAPrestar(monto){
    
    var monto1 = parseFloat((monto-monto)+monto);
    const linea3 = document.createElement('p');
    linea3.innerHTML = `
    <h4>Principal</h4> 
    <h3> ${monto1.toFixed(0)}</h3>        

    `;

    montoDelPrestamo.appendChild(linea3);
    console.log(typeof(monto1));
    
}

function plazoPrestamo(tiempo){
    
    var tiempo1 = parseFloat((tiempo-tiempo)+tiempo)
    const linea4 = document.createElement('p');
    linea4.innerHTML = `
    <h4>Plazo</h4> 
    <h3>${tiempo1.toFixed(0)}meses</h3>        

    `;

    plazoEnMeses.appendChild(linea4);
    
}



 