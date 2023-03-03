
  <?php require_once RUTA_APP.'/vistas/inc/header_inicio_sesion.php';?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/">Home</a></li>
      <li class="breadcrumb-item active " aria-current="page">Usuarios</li>
    </ol>
  </nav>
  <div class="container">
 
  <h5 class="text-center">USUARIOS </h5>
  <a class="btn btn-primary mt-3 mb-3"  href="<?php echo RUTA_URL?>/usuario/add_usuario">Añadir Usuario</a>
  <form class="d-flex mb-3" role="search">
      <input class="form-control me-2" type="search" placeholder="Buscar usuarios por rol" id="buscador" aria-label="Search">
      <button class="btn btn-outline-success" type="submit" onclick="return searchUsuarios()" ><i class="bi bi-search"></i></button>
  </form>
    <ul class="list-group list-group-flush" id="usuarios">

    <!-- <?php foreach ($datos['usuariosActivos'] as $user) {?>
      
        <li class="list-group-item mb-2"><img class="rounded" style="width:30px;" src="img/usuario.png"> <?php echo $user->Nombre?>: <?php echo $user->NombreRol?> 
            <div class="mt-1 mb-1">
                <a class="btn btn-outline-success btn-sm" href="<?php echo RUTA_URL?>/usuario/ver_usuario/<?php echo $user->idPersona?>">
                  <i class="bi-eye"></i>
                </a>
                <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/usuario/borrar_usuario/<?php echo $user->idPersona?>">
                  <i class="bi-trash" ></i>
                </a>
            </div>
        </li>
        <?php } ?> -->

    </ul> 
    <div id="normal">
    <button onclick="prevPage()" id="btn_prev">Anterior</button>&nbsp;
    <span id="page"></span>
    <button onclick="nextPage()" id="btn_next">Siguiente</button><br>
    </div>

   
    


</body>

</html>

<script>

    
            const datosTabla=<?php echo json_encode($datos['usuariosActivos'])?>;

            const ordenT=datosTabla.sort((a,b) => a.NombreRol > b.NombreRol);
            
            //console.log(ordenT);
            document.getElementById("page").style="display:none";
            var current_page = 1;
            var obj_per_page = 4;

            function totNumPages(){
                
                return Math.ceil(datosTabla.length / obj_per_page);     
            }

            function prevPage(){
                
                if (current_page > 1) {
                    current_page--;
                    change(current_page);
                }
            }

            function nextPage(){
                if (current_page < totNumPages()) {
                    current_page++;
                    change(current_page);
                }
            }

            function change(page){

                //console.log(page);
                var btn_next = document.getElementById("btn_next");
                var btn_prev = document.getElementById("btn_prev");
                var listing_table = document.getElementById("usuarios");
                var page_span = document.getElementById("page");

                if (page < 1) {
                    page = 1;
                }

                if (page > totNumPages()) {
                    page = totNumPages();
                }

                listing_table.innerHTML = "";

                if (page * obj_per_page>datosTabla.length) {
                    for (var i = (page-1) * obj_per_page; i < datosTabla.length; i++) {
                        listing_table.innerHTML += '<li class="list-group-item mb-2"><img class="rounded" style="width:30px;" src="img/usuario.png">' + datosTabla[i].Nombre + ':' + datosTabla[i].NombreRol
                        +'<div class="mt-1 mb-1"><a class="btn btn-outline-success btn-sm" href="<?php echo RUTA_URL?>/usuario/ver_usuario/' + datosTabla[i].idPersona 
                        + '"><i class="bi-eye"></i> <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/usuario/borrar_usuario/' 
                        + datosTabla[i].idPersona + '"><i class="bi-trash" ></i></a></div></li>' ;

                    }
                }else{
                    for (var i = (page-1) * obj_per_page; i < (page * obj_per_page); i++) {

                        listing_table.innerHTML += '<li class="list-group-item mb-2"><img class="rounded" style="width:30px;" src="img/usuario.png">' + datosTabla[i].Nombre + ':' + datosTabla[i].NombreRol
                        +'<div class="mt-1 mb-1"><a class="btn btn-outline-success btn-sm" href="<?php echo RUTA_URL?>/usuario/ver_usuario/' + datosTabla[i].idPersona 
                        + '"><i class="bi-eye"></i> <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/usuario/borrar_usuario/' 
                        + datosTabla[i].idPersona + '"><i class="bi-trash" ></i></a></div></li>' ;
                        
                    }
                }
                
                page_span.innerHTML = page;

                if (page == 1) {
                    btn_prev.style.visibility = "hidden";
                } else {
                    btn_prev.style.visibility = "visible";
                }
                if (page == totNumPages()) {
                    btn_next.style.visibility = "hidden";
                } else {
                    btn_next.style.visibility = "visible";
                }
            }

            window.onload = function() {
                change(1);
            };
  
        
        
    function searchUsuarios(){

        document.getElementById("normal").style="display:none";
        var input = document.getElementById("buscador");

        var filter = input.value.toUpperCase();

       const datos=<?php echo json_encode($datos['usuariosActivos']) ?>


       const datosFil=datos.filter(e=>e.NombreRol.toUpperCase()==filter);
        console.log(datosFil);


        document.getElementById("usuarios").innerHTML="";
        datosFil.forEach(e => {


            var ul = document.getElementById("usuarios");

            var li = document.createElement('li');
            li.className= "list-group-item mb-2";
                                        
            var img = document.createElement('img');
            img.src="img/usuario.png";
            img.className="rounded";
            img.style="width:30px;";       

            var txt= document.createTextNode(" "+e.Nombre+ " : " + e.NombreRol);

            var div=document.createElement("div");
            div.className="mt-1 mb-1";

            var a=document.createElement("a");
            a.className="btn btn-outline-success btn-sm";
            a.setAttribute("href", "<?php echo RUTA_URL?>/usuario/ver_usuario/"+e.idPersona+"");

            var i = document.createElement("i");
            i.className="bi-eye";

            var a1=document.createElement("a");
            a1.className="btn btn-outline-danger btn-sm";
            a1.onclick=function(){
            confirmar(event);
            }
            a1.setAttribute("href", "<?php echo RUTA_URL?>/usuario/borrar_usuario/"+e.idPersona+"");
            var txt1= document.createTextNode(" ");
            var i1 = document.createElement("i");
            i1.className="bi-trash";

            a1.appendChild(i1);

            a.appendChild(i);
            div.appendChild(a);
            div.appendChild(txt1);
            div.appendChild(a1);       
            li.appendChild(img);
            li.appendChild(txt);
            li.appendChild(div);
            ul.appendChild(li);

            });


        return false;
    }


    function confirmar(e){
        var res = confirm('¿Estas seguro de que quieres borrar ese usuario?');
        if(res == false){
            e.preventDefault();
        }
    }
               
</script>