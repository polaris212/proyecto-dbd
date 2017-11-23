<!DOCTYPE html>
<html class=''>
<head>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js'></script>
<style class="cp-pen-styles">/* Resets */
body, ul {
  margin: 0;
  padding: 0;
}

/* Decor */
body {
  background: #7E8BA9;
}

/*barrita lateral*/
.drawer {
  position: absolute;
  z-index: 10;
  top: 0;
  left: 0;
  height: 100%;
  padding: .4em 0;
  background: #05153B;
  color: white;
  text-align: center;
  /* Remove 4px gap between <li> */
  font-size: 0;
}
.drawer li {
  pointer-events: none;
  position: relative;
  display: inline-block;
  vertical-align: middle;
  list-style: none;
  line-height: 100%;
  transform: translateZ(0);
}
.drawer a {
  pointer-events: auto;
  position: relative;
  display: block;
  min-width: 5em;
  margin-bottom: .4em;
  padding: .4em;
  line-height: 100%;
  /* Reset font-size */
  font-size: 16px;
  text-decoration: none;
  color: white;
  transition: background 0.3s;
}
.drawer a:active, .drawer a:focus {
  background: #0F4A00;
}
.drawer i {
  display: block;
  margin-bottom: .2em;
  font-size: 2em;
}
.drawer span {
  font-size: .625em;
  font-family: sans-serif;
  text-transform: uppercase;
}
.drawer li:hover ul {
  /* Open the fly-out menu */
  transform: translateX(0);
  background: #0F4A00;
  /* Enable this if you wish to replicate hoverIntent */
}
.drawer > li {
  display: block;
  /* Add a shadow to the top-level link */
  /* Show the shadow when the link is hovered over */
  /* Fly out menus */
}


.drawer > li > a {
  background: #142856;
}


.drawer > li:hover {
  z-index: 100;
}

/*ICONOS QUE SE DESPLIEGAN */
.drawer > li:hover a {
  background: #236C0F;
}

/*ICONO MOUSE ENCIMA*/
.drawer > li a:hover {
  background: #448F30;
}
.drawer > li > a:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 100%;
  width: 4px;
  opacity: 0;
  background: -moz-linear-gradient(left, rgba(0, 0, 0, 0.65) 0%, transparent 100%);
  background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(0, 0, 0, 0.65)), color-stop(100%, transparent));
  background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.65) 0%, transparent 100%);
  background: -o-linear-gradient(left, rgba(0, 0, 0, 0.65) 0%, transparent 100%);
  background: -ms-linear-gradient(left, rgba(0, 0, 0, 0.65) 0%, transparent 100%);
  background: linear-gradient(to right, rgba(0, 0, 0, 0.65) 0%, transparent 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=1 );
  transition: opacity 0.5s;
}
.drawer > li:hover a:after {
  opacity: 1;
}
.drawer > li ul {
  position: absolute;
  /* Stack below the top level */
  z-index: -1;
  top: 0;
  left: 100%;
  height: 100%;
  width: auto;
  white-space: nowrap;
  /* Close the menus */
  transform: translateX(-100%);
  background: #0F4A00;
  transition: 0.5s transform;
}

/**
 * Not required for demo
 */
@keyframes circle {
  50% {
    transform: scale(1.26923);
  }
}
@keyframes initials {
  50% {
    transform: translateY(-8px) translateZ(0);
  }
}
.ild-ident {
  position: absolute;
  right: 20px;
  bottom: 20px;
}
.ild-ident svg {
  overflow: visible;
  transform: translateZ(0);
}
.ild-ident svg .circle-holder {
  transform: translate(-7px, -7px);
}
/*circulo inferior*/
.ild-ident svg .circle {
  transform: translate(7px, 7px);
  fill: #0F4A00;
}
.ild-ident svg.active .i {
  animation: initials .4s ease-in-out;
}
.ild-ident svg.active .l {
  animation: initials .4s .2s ease-in-out;
}
.ild-ident svg.active .circle {
  animation: circle .5s .1s ease-in-out;
}
</style></head><body>
<ul class="drawer">
  <li>
   
    <a href="#">
      <i class="fa fa-folder"></i>
      <span>Perfil</span>
    </a>
    <ul>
      <li>
        <a href="https://ianlunn.github.io/Hover/" >
          <i class="fa fa-flash"></i>
          <span>Detalles</span>
        </a>
      </li>
      <li>
        <a href="/perfil">
          <i class="fa fa-ellipsis-h"></i>
          <span>Configurar Perfil</span>
        </a>
      </li>
      <li>
        <a href="https://ianlunn.co.uk/plugins/jquery-parallax/" >
          <i class="fa fa-dot-circle-o"></i>
          <span>Historial</span>
        </a>
      </li>
    </ul>
  </li>
  <li>
     <a href="#">
      <i class="fa fa-folder-open"></i>
    <span>Catástrofes</span>
    </a>
    <ul>
         <li>
        <a href="https://ianlunn.co.uk/" >
          <i class="fa fa-info-circle"></i>
          <span>Información</span>
        </a>
      </li>
      <li>
        <a href="https://ianlunn.co.uk/" >
          <i class="fa fa-question-circle"></i>
          <span>Centros de Acopio</span>
        </a>
      </li>
      <li>
        <a href="https://ianlunn.co.uk/about/" >
          <i class="fa fa-question-circle"></i>
          <span>Eventos a Beneficio</span>
        </a>
      </li>
      <li>
        <a href="https://ianlunn.co.uk/contact/" >
          <i class="fa fa-question-circle"></i>
          <span>Donaciones</span>
        </a>
      </li>
    </ul>
  </li>
  <li>
    <a href="#">
      <i class="fa fa-share-alt"></i>
      <span>Social</span>
    </a>
    <ul>
      
      <li>
        <a href="https://twitter.com/IanLunn/" >
          <i class="fa fa-twitter"></i>
          <span>Twitter</span>
        </a>
    </ul>
  </li>
</ul>

</body></html>