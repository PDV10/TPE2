"use strict"

let cerrar = document.querySelector("#btnCerrar");
let abrir = document.querySelector("#btnAbrirModal")
if(cerrar){
    cerrar.addEventListener("click", cerrarModal);
}
if(abrir){
    abrir.addEventListener("click", abrirModal);
}

let modal = document.querySelector(".modal");
let modalC = document.querySelector(".contenedor-modal");

function cerrarModal(){
    modal.classList.add("cerrar-transform");
    setTimeout(() => {
        modalC.classList.remove("mostrar-modal");
        modalC.classList.add("esconder-modal");
    }, 300);
   
}

function abrirModal(e){
    e.preventDefault();
    modal.classList.remove("cerrar-transform");
    modalC.classList.add("mostrar-modal");
    modalC.classList.remove("esconder-modal");
}

 window.addEventListener("click", (e)=>{
    if(e.target == modalC){
        cerrarModal();
    }
}); 