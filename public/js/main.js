
// Recoge el boton para abrir el modal
const openModal = document.querySelector('#newDocument');

// Recoge el modal
const modal = document.querySelector('.modal');

// Recoge el boton para cerrar el modal
const closeModal = document.querySelector('.modal-close');

// Escuchar cuando se clickee el boton
openModal.addEventListener('click', (e)=>{

    e.preventDefault();

    //Añade la clase "modal--show" a "modal" que hace visible el modal
    modal.classList.add('modal--show');

});

closeModal.addEventListener('click', (e)=> {

    e.preventDefault();

    //Borra la clase "modal--show" a "modal" que hace que cierre/oculte el modal
    modal.classList.remove('modal--show');

});