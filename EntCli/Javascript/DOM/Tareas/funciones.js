let columnas = document.getElementsByClassName("tasks");
let porhacer = columnas[0];
let enproceso = columnas[1];
let hecho = columnas[2];
let contadorId = 0;

function crearTarea(texto) {
    let tarea = document.createElement("div");
    let contenido = document.createElement("p");
    let botonCerrar = document.createElement("p");
    
    contenido.innerHTML = texto;
    botonCerrar.innerHTML = "X";
    botonCerrar.className = "close";
    
    tarea.className = "tarea";
    tarea.id = "tarea_" + contadorId;
    contadorId++;
    tarea.appendChild(contenido);
    tarea.appendChild(botonCerrar);
    configurarArrastre(tarea);    //lo hace draggable 
    
    botonCerrar.addEventListener("click", function() {
        this.parentElement.remove();
    });
    
    return tarea;
}

function configurarArrastre(elemento) {
    elemento.setAttribute("draggable", "true");
    
    elemento.addEventListener("dragstart", function(ev) {
        ev.dataTransfer.setData("id", ev.target.id);
    });
    
    elemento.addEventListener("dragend", function(ev) {
        ev.preventDefault();
    });
}

function configurarZonasSoltar() {
    let zonas = [porhacer, enproceso, hecho];
    
    zonas.forEach(zona => {
        zona.addEventListener("dragover", function(ev) {
            ev.preventDefault();
        });
        
        zona.addEventListener("drop", function(ev) {
            ev.preventDefault();
            let idTarea = ev.dataTransfer.getData("id");
            zona.appendChild(document.getElementById(idTarea));
        });
    });
}

document.getElementById("boton").addEventListener("click", function() {
    let textoTarea = document.getElementById("tareaAnadir").value;
    
    if (textoTarea == "") {
        alert("No se puede crear una tarea vacía");
        return;
    }
    
    let nuevaTarea = crearTarea(textoTarea);
    porhacer.appendChild(nuevaTarea);
    document.getElementById("tareaAnadir").value = "";   //para que se borre el input text
});

let tarea1 = document.querySelector(".tarea");
    tarea1.id = "tarea_" + contadorId++;
    configurarArrastre(tarea1);
    
    let botonCerrar1 = tarea1.querySelector(".close");
    botonCerrar1.addEventListener("click", function() {
        this.parentElement.remove();
    });

configurarZonasSoltar();
