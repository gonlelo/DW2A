// Se debe definir una clase llamada „alumno‟ que tendrá un constructor que recibe como
// parámetros los valores iniciales de cada propiedad (nombre, apellidos, foto, aficiones,
// paginaWeb y correo) y un método „visualiza‟ que carga los datos del alumno
// seleccionado.
// Para almacenar la información de todos los alumnos se debe crear un array de objetos
// „TablaAlumnos‟.
// La carga de los datos de alumnos se hará inicializando el array de objetos, es decir, no
// se le piden al usuario los datos.
// El campo “Aficiones” contiene el nombre de las aficiones del alumno separadas por una
// coma (en caso de tener varias).
// El botón “Buscar Alumnos por Aficiones” nos pedirá una afición y mostrará el nombre
// de los alumnos que tengan dicha afición


class Alumno {
    constructor(nombre, apellidos, foto, aficiones, paginaWeb, correo) {
        this.nombre= nombre;
        this.apellidos= apellidos;
        this.foto= foto;
        this.aficiones= aficiones;
        this.paginaWeb= paginaWeb;
        this.correo= correo;

        TablaAlumnos.push(this);

    }
    /**
     * 
     */
    visualiza() {
                document.getElementById('nombre').value=this.nombre+' '+this.apellidos;
                document.getElementById('aficiones').value=this.aficiones;
                document.getElementById('enlace').href=this.paginaWeb;
                document.getElementById('foto').src=this.foto;
           }
}
let TablaAlumnos = [];
// Se crean 5 objetos de la clase Alumno con los siguientes datos:
Pedro = new Alumno('Pedro','Ramirez Ramos','https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Bar%C3%A7a_-_Napoli_-_20140806_-_Pedro_Rodriguez_%28cropped%29.jpg/640px-Bar%C3%A7a_-_Napoli_-_20140806_-_Pedro_Rodriguez_%28cropped%29.jpg','futbol,volley,baloncesto','https://www.pedro.com','pedro@gmail.com');
Victor = new Alumno('Victor','Manuel Rivas Santos','https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Victor_Hugo_by_%C3%89tienne_Carjat_1876_-_full.jpg/1200px-Victor_Hugo_by_%C3%89tienne_Carjat_1876_-_full.jpg','escritura','https://www.victor.com','victor@gmail.com');
Gustavo = new Alumno('Gustavo','Romero Lopez','https://yt3.googleusercontent.com/Ttwu2f5aNN9KZ4rEh6EjLAjb3bbj8J6X-6ogV66Ffh5aQRZAbzsz6zuEwNx1TX5hvsqOyr_X=s900-c-k-c0x00ffffff-no-rj','futbol','https://www.gustavo.com','gustavo@gmail.com');
Jesús = new Alumno('Jesús','Gonzalez Peñalver','https://cdn.shopify.com/s/files/1/0605/9828/8499/files/different-cultures-interpretation-of-jesus2.webp','futbol,escritura','https://www.jesus.com','gustavo@gmail.com');
Alvaro = new Alumno('Alvaro','Locual Gancho','https://image.europafm.com/clipping/cmsimages02/2022/02/02/251AF87F-F842-4FBC-8338-B49C9A509893/alvaro-soler-presenta-contracorriente-david-bisbal_104.jpg?crop=2270,2270,x0,y0&width=1200&height=1200&optimize=low&format=webply','parchis,leer','https://www.alvaro.com','gustavo@gmail.com');

let select = document.getElementById('sel');
// Llenar el select con los nombres de los alumnos
TablaAlumnos.forEach((alumno, index) => {
    let option = document.createElement('option');
    option.value = index; // El valor será el índice
    option.textContent = alumno.nombre + ' ' + alumno.apellidos; // Texto visible
    select.appendChild(option);
});

function Buscar() {
    aficionIntro=prompt('introduce la aficion');
    let mensaje='';
    if (!aficionIntro) return;
    for (let i = 0; i < TablaAlumnos.length; i++) { 
        let arrayAficiones=TablaAlumnos[i].aficiones.split(',');
        if (arrayAficiones.includes(aficionIntro.trim())) {
            mensaje+=TablaAlumnos[i].nombre+' '+TablaAlumnos[i].apellidos+', ';
        }
    }
    alert(mensaje);
}

document.getElementById('sel').addEventListener('change', function () {
    const seleccionado = this.value; // Obtener el índice del elemento seleccionado
    if (seleccionado !== '') {
    TablaAlumnos[seleccionado].visualiza(); // Llamar al método visualiza del Alumno correspondiente
    }
});