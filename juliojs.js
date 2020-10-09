
var monto = document.getElementById('montoPrestamo');
var tasa = document.getElementById('tasa');
var tiempo = document.getElementById('periodo');
var btnCalcular = document.getElementById('calcular1');

// const llenarTable = document.querySelector('#lista-tabla tbody');
const pagoDeInteres= document.querySelector('#pagoAlMes1');
const CuotaDeInteres= document.querySelector('#cuotaInteres');
const tasaInt = document.querySelector('#tasaMes');
const montoDelPrestamo = document.querySelector('#montoPrestamosJs');
const plazoEnMeses = document.querySelector('#plazoMeses');



;




 $('#calcular1').one('click',(function(e){
        e.preventDefault()
 }));


btnCalcular.addEventListener('click', ()=>{

    
    
    // calcularCuota(monto.value, tasa.value, tiempo.value);
    CuotaTotal(monto.value, tasa.value, tiempo.value);
    CuotaInteres(monto.value, tasa.value, tiempo.value);
    TasaDeInteres( tasa.value);
    montoAPrestar(monto.value);
    plazoPrestamo(tiempo.value);

    
   



})


function CuotaTotal(monto,tasa,tiempo){
    var cuotaCompleta = parseFloat( monto * (Math.pow(1+tasa/100, tiempo)*tasa/100)/( Math.pow (1+tasa/100,tiempo)-1));
    
    const linea = document.createElement('p');
    linea.innerHTML = `
    <h4>Cuota Interes mas Amortizacion</h4> 
    <h3> ${cuotaCompleta.toFixed(2)}</h3>        

    `;
 
    pagoDeInteres.appendChild((linea));
    
}
    
function CuotaInteres(monto,tasa){
    var pagoIntereses1 = parseFloat(monto*(tasa/100).toFixed(2));
    const linea1 = document.createElement('p');
    linea1.innerHTML = `
    <h4>Cuota Solo Interes</h4> 
    <h3> ${pagoIntereses1.toFixed(0)}</h3>        

    `;

    CuotaDeInteres.appendChild(linea1);
    console.log(typeof(pagoIntereses1));
}

        
function TasaDeInteres(tasa){
    
    var tasa1 = parseFloat(tasa)
    var tasa2 = parseFloat(tasa1)+'%'
    const linea2 = document.createElement('p');
    linea2.innerHTML = `
    <h4>Tasa de Interes</h4> 
    <h3>${tasa1.toFixed(2)}%</h3>        

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
    <h6>${tiempo1}  meses</h6>        

    `;

    plazoEnMeses.appendChild(linea4);
    
}



 