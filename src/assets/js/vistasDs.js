/**
 * visitasDS.js
 *
 * scripts que mandan visitas virtuales a google según el tamaño del contenedor de item
 *
 * Angel Cachon / tellme@angelcachon.es
 * version 0.1.1
 *
 */

var urlOriginal = window.location.href;
var nombre = sacarNombre(urlOriginal);
var patron = /^[\w]+\.[a-z]{3,4}$/;
var visitas = 0;
var nuevaUrl = window.location.origin + window.location.pathname;
if (patron.test(nombre)) {
  // $("#home").attr("href", urlOriginal);
} else {
  nuevaUrl = window.location.origin + window.location.pathname;
  var estado = { url: nuevaUrl };
  window.history.pushState(estado, "rewriteURL", nuevaUrl);
  // if(!patron.test(sacarNombre(nuevaUrl))){
  //     nuevaUrl+= "index.html" ;
  //     window.history.pushState = (nuevaUrl,"rewriteURL", nuevaUrl);
  //     urlOriginal = nuevaUrl;
  // }

  $("#home").attr("href", nuevaUrl);
  //se hace una redirección
  // window.location = nuevaUrl;

  // o se hace una reescritura de la url de la ventana del navegador
  window.history.pushState(estado, "rewriteURL", nuevaUrl);
}

function sacarNombre(url) {
  var piezas = url.split("/").length;
  var nombre = url.split("/")[piezas - 1];
  return nombre;
}

function pageView() {
  var path = "/virtual/" + document.URL;
  // Esto es lo único necesario para generar una vista de página
  window.ga("gtm1.send", "pageview", path);
  window.ga("gtm2.send", "pageview", path);
  console.log("Se envió a google: " + path);
  visitas++;
}

$(document).ready(function() {
  // uso el ancho de la ventana para calcular el alto de la imagen de fondo de la cabecera de la versión desktop
  var alto = window.innerWidth * 0.6145;
  $("#imagenFondo").css("height", alto);
  $("#imagenFondo").css("background-size", "cover");
  if (alto < 800) alto = 800;
  $("#imagenFondoAbajo").css("height", alto);
  $("#imagenFondoAbajo").css("background-size", "cover");
  $("#imagenFondoAbajo > .container > .row").css("height", alto);
  $("#imagenFondoAbajo > .container > .row").css("background-size", "cover");

  //fixing photo author
  // setTimeout(widthCalc, 5000);
  // moveFirma();

  // monitorizo el evento scroll y llamo a la función que verifica posiciones y en su caso al envido con pageview() la visita a google
  $(window).scroll(pageVirtualViews);
});

function pageVirtualViews() {
  var windowHeight = $(document).scrollTop();
  windowHeight = windowHeight + 100;
  var nodes = $(".item");

  for (var i = 0; i < nodes.length; i++) {
    let mielemento = nodes[i];
    let mielementoPos = $(".item:nth(" + i + ")")
      .parent()
      .offset().top;
    let mielementoAltura = $(".item:nth(" + i + ")")
      .parent()
      .height();

    if (windowHeight > mielementoPos && windowHeight <= mielementoPos + mielementoAltura) {
      var nombre = $(".item:nth(" + i + ")").text();
      nombre = nombre.split(" ").join("-");
      if (window.history.state != nuevaUrl + "#" + nombre) {
        window.history.pushState(nuevaUrl + "#" + nombre, "pageview", nuevaUrl + "#" + nombre);
        pageView();
      }
    }
  }
}
