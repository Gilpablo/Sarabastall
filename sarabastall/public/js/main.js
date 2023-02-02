

function confirmar(e){
    var res = confirm('¿Estas seguro de que quieres borrar ese usuario?');
    if(res == false){
        e.preventDefault();
  }
}