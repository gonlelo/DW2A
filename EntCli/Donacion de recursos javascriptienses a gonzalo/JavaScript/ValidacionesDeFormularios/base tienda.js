


function convertirMayusculas(id){
    let texto = document.getElementById(id).value;
    let textoMayusculas = texto.toUpperCase();
    document.getElementById(id).value = textoMayusculas;
}
let pedido = [[],[],[]];
function anadirLinea() {
    
    let nombre = document.getElementById('producto').options[document.getElementById('producto').selectedIndex].textContent;
    let costo = document.getElementById('producto').value;
    let cantidad = parseInt(document.getElementById('cantidad').value) ;
    let esta =false;

    if (costo == "noDisponible") {
        alert("Por favor, selecciona un producto válido.");
        return false;
    }else if(cantidad<=0){
        alert("Por favor, selecciona una cantidad mayor que 0.");
    }else{

    for (let i = 0; i < pedido[0].length; i++) {
        if (nombre == pedido[0][i]) {
            pedido[2][i] += cantidad;
            esta = true;
        }
    }
    
    if (!esta) { 
        pedido[0].push(nombre);
        pedido[1].push(costo);
        pedido[2].push(cantidad);
    }
}

}
function validarFecha(fecha) {
    
    let partes = fecha.split('/');
    

    if (partes.length !== 3) {
        return false;
    }

    let dia = parseInt(partes[0]);
    let mes = parseInt(partes[1]) - 1;
    let año = parseInt(partes[2]);
    let fechaActual=new Date();

    if (isNaN(dia) || isNaN(mes) || isNaN(año)) {
        return false;
    }
    let fechaValida = new Date(año, mes, dia);

    if (fechaValida<fechaActual) {
        return false;
    }
    return fechaValida.getDate() === dia && fechaValida.getMonth() === mes && fechaValida.getFullYear() === año;
}

function metodoDePago(){
    let radios = document.getElementsByName("fpago");
let fpago = "";

for (let i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
        fpago = radios[i].value;
        return fpago;
    }
}
}

function mostrarCompra(){
    let total=0;
    let compraDetalles='';
    for (let i = 0; i < pedido[0].length; i++) {
        let precio=pedido[1][i]*pedido[2][i];
        compraDetalles+="<br>Producto: "+pedido[0][i]+" Cantidad: "+pedido[2][i]+" Total Linea: "+precio;
        total+=precio;
    }
    compraDetalles+="<br>Total pedido: "+total+"<br>";
    return compraDetalles;
}

function openWindow() {
    let altura = screen.height/2-100;
    let anchura = screen.width/2-100;
            
    let nombre= document.getElementById("nombre").value;
    let apellidos= document.getElementById("apellidos").value;
    let direccion= document.getElementById("direccion").value;
    let codigo= document.getElementById("codigo").value;
    let provincia= document.getElementById("provincia").value;
    let telefono = document.getElementById("telefono").value;
    let email= document.getElementById("email").value;
    let fpago= metodoDePago();
    

   let myWindow =  window.open('', '', 'width=500, height=500, top='+altura+', left='+anchura);
   myWindow.document.write(`
    <h1>Resumen del pedido:</h1><br>
    Nombre: ${nombre}<br>
    Apellidos: ${apellidos}<br>
    Direccion: ${direccion}<br>
    Codigo postal: ${codigo}<br>
    Provincia: ${provincia}<br>
    Telefono: ${telefono}<br>
    Email: ${email}<br>
    Forma de pago: ${fpago}<br>
    <hr>
    <br>
    <h3>Productos pedidos:</h3>
    ${mostrarCompra()}
       <button id='b1'>Es correcto</button>
        <button id='b2'>No es correcto</button>
        <script>
            function correcto() {
                alert('Compra realizada');
                window.close();
            }
            function incorrecto() {
                alert('Intente realizar el pedido de nuevo');
                window.close();
            }
            document.getElementById('b1').onclick = correcto;
            document.getElementById('b2').onclick = incorrecto;
        <\/script>
        </html>
   `
   );
   }
function validarFormulario() {

    // Verifica si el valor del select es el predeterminado
     if(document.getElementById("provincia").value == "noDisponible"){
        alert("Por favor, selecciona una provincia válida.");
        return false;
    }else if(!/^\d{5}$/.test(document.getElementById("codigo").value)){
        alert("Por favor, introduce un codigo postal valido.");
        return false;
    }else if(!/^[A-Za-z0-9!#$%^&*()_+{}\[\]:;"'<>,.?\/\\~|-]+@[A-Za-z0-9!#$%^&*()_+{}\[\]:;"'<>,.?\/\\~|-]+\.[A-Za-z0-9]{2,}$/.test(document.getElementById("email").value)){
        alert("Por favor, introduce un email valido.");
        return false;
    }else if(!/^[679][0-9]{8,8}$/.test(document.getElementById("telefono").value)){
        alert("Por favor, introduce un telefono valido.");
        return false;
    }else if(pedido[0][0]==null){
        alert("Por favor, introduce alguna linea de pedido.");
        return false;
    }else if(!/^[A-Za-z0-9!#$%^&*()_+{}\[\]:;"'<>,.?\/\\~|-]+@[A-Za-z0-9!#$%^&*()_+{}\[\]:;"'<>,.?\/\\~|-]+\.[A-Za-z0-9]{2,}$/.test(document.getElementById("email").value)){
        alert("Por favor, introduce un email valido.");
        return false;
    }else if(!validarFecha(document.getElementById("fecha").value)){
        alert("Por favor, introduce una fecha valida.");
        return false;
    }else{
        openWindow();
        return true;
        
    }
        
    
}

document.addEventListener("DOMContentLoaded", function() {

    document.getElementById('producto').required = true;
    document.getElementById('cantidad').required = true;
    document.getElementById('apellidos').required = true;
    document.getElementById('nombre').required = true;
    document.getElementById('direccion').required = true;
    document.getElementById('codigo').required = true;
    document.getElementById('provincia').required = true;
    document.getElementById('telefono').required = true;
    document.getElementById('email').required = true;
    document.getElementById('fecha').required = true;
    document.getElementById('fpago1').required = true;
    document.getElementById('terminos').required = true;
    
    
    document.getElementById('producto').options[0].value = "noDisponible";
    document.getElementById('provincia').options[0].value = "noDisponible";
});
