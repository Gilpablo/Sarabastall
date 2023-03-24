
    <?php include 'inc/header_inicio_sesion.php'?>

    <div class="container col-12">
<div class="container">
  
</div>
<section class="cookies">
      <h2 class="cookies__titulo">¿Aceptas nuestras Cookies?</h2> 
      <p class="cookies__texto">Usamos cookies para mejorar tu experiencia en la web.</p>
      <div class="cookies__botones">
          <button class="cookies__boton boton_no">No</button>
          <button class="cookies__boton boton_si">Si</button>
      </div>
    </section>
<h5 class="text-center mt-3">Nuestros Proyectos</h5>
<div class="container col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 ">

<div id="carouselExampleDark" class="carousel carousel-dark slide shadow " data-bs-ride="carousel">
<div class="carousel-indicators mt-2">
<button type="button"  data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
</div>

<div class="carousel-inner">
<div class="carousel-item active" data-bs-interval="4000">
<div class="card col-12 pb-sm-3 pd-5">
    <img src="imagenes/Becas-estudios.jpg" class="card-img-top" >
    <div class="card-body">
      <h5 class="card-title">Becas</h5>
      <p class="card-text mb-3">
        De los programas de cooperación que la Fundación Sarabastall ha puesto en marcha y está desarrollando en el Valle de Hushé, tal vez el más importante y uno de los que más nos satisface, es el programa de becas, destinado a que los niños/as puedan completar sus estudios elementales y secundarios, de tal forma que tengan una mayor preparación para la vida,
        y que en el futuro los mejor preparados puedan continuar sus estudios universitarios, y todos se conviertan en motor de desarrollo de su sociedad.
      </p>
    </div>
  </div>
</div>
<div class="carousel-item" data-bs-interval="4000">
 
<div class="card col-12">
    <img src="imagenes/Formacion-maestros.jpg" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">Formacion de Profesores y Sanitarios</h5>
      <p class="card-text mb-3">
        El proyecto de formación a maestros se plantea tras el estudio y valoración de las escuelas del valle, y del análisis del nivel de formación de sus profesionales. Además, siempre ha estado ligado con la mejora de la sanidad, la higiene y la calidad de vida en la zona. Y no hay mejor camino para conseguirlo que mejorar la salud de todos los habitantes.
      </p>
      <br>
    </div>
  </div>
</div>
<div class="carousel-item " data-bs-interval="4000">
<div class="card col-12 " >
    <img src="imagenes/Invernaderos.jpg" class="card-img-top" >
    <div class="card-body">
      <h5 class="card-title">Invernaderos</h5>
      <p class="card-text mb-5">
        Los proyectos de agricultura siempre han sido otro de los objetivos prioritarios de los proyectos desarrollados en Hushé, por la Fundación Sarabastall, convencidos que la mejora de la agricultura, permitía mejorar la alimentación, y por tanto la salud de los habitantes del valle. Y además el incremento de producción servía para apoyar los ingresos mínimos que las familias tienen.
      </p>
    </div>
  </div>
</div> 

</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>
</div>
</div> 

  

    

    <?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

<script>
let cookies = () => {
   

    const seccionCookie = document.querySelector('section.cookies');
    const cookieSi = document.querySelector('.boton_si');
    const cookieNo = document.querySelector('.boton_no');
 


    function ocultarCookie() {
        // Borra la sección de cookies en el HTML
        seccionCookie.remove();
    }

    
    function aceptarCookies() {
        // Oculta el HTML de cookies
        ocultarCookie();
        // Guarda que ha aceptado
        localStorage.setItem('cookie', true);
        // Tu codigo a ejecutar si aceptan las cookies
        ejecutarSiAcepta();
    }

    
    function denegarCookies() {
        // Oculta el HTML de cookies
        ocultarCookie();
        // Guarda que ha aceptado
        localStorage.setItem('cookie', false);
    }

    function ejecutarSiAcepta() {
      const datos=<?php echo json_encode($datos['usuarioSesion'])?>;
      let expires = "expires=" + 0;
      document.cookie = "username="+datos.Username+"; path=/;" +expires;
      document.cookie = "clave="+datos.Clave +"; path=/;" +expires;
    }

    
    function iniciar() {
        // Comprueba si en el pasado el usuario ha marcado una opción
        if (localStorage.getItem('cookie') !== null) {
            if(localStorage.getItem('cookie') === 'true') {
                // Aceptó
                aceptarCookies();
            } else {
                // No aceptó
                denegarCookies();
            }
        }
    }

    cookieSi.addEventListener('click',aceptarCookies, false);
    cookieNo.addEventListener('click',denegarCookies, false);

    return {
        iniciar: iniciar
        //console.log(iniciar);
    }
}

cookies().iniciar();
// if (localStorage.clickcount) {
//   localStorage.clickcount = Number(localStorage.clickcount) + 1;
// } else {
//   localStorage.clickcount = 1;
// }
// const datos=<?php// echo json_encode($datos['usuarioSesion'])?>;
// localStorage.setItem("Nombre", "El nombre la persona que ha accecido a la pagina es - "+datos.Nombre+"");
// console.log(localStorage.clickcount);
</script> 



</body>

</html>