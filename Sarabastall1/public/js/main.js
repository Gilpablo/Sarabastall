function buscar(){
    let num_cols, display, input, mayusculas, tablaBody, tr, td, i, txtValue;   num_cols = 8;
     //Numero de fila en la que busca, la primera columna es la 0
    input = document.getElementById("buscador");
    //hace referencia al id del input del buscador 
    mayusculas = input.value.toUpperCase();
    //convierte a mayusculas
    tablaBody = document.getElementById("tbody"); 
    //Hace referencia al id del tbody
    tr = tablaBody.getElementsByTagName("tr");
    for(i=0; i< tr.length; i++){ 
        //recorre todos los tr
        display = "none";
        for(j=0; j < num_cols; j++){ 
            //recorre las columnas hasta num_cols
            td = tr[i].getElementsByTagName("td")[j]; 
            //devuelve la lista de elementos td
            if(td){ txtValue = td.textContent || td.innerText; 
                //Puede ser textContent(Representa el contenido de texto) o innerText (tiene en cuenta el estilo y cambia el estilo de la página)
                if(txtValue.toUpperCase().indexOf(mayusculas) > -1){
                    //Si el texto en mayusculas concuerda, lo muestra
                    display = "";
                }
            }
        }
        tr[i].style.display = display;
    }
}
