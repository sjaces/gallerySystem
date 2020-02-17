    <?php
      include 'consent-publi.html';
    ?>
<!--Librería de publicidad-->
   <script>
        !function(){window.hb_now=Date.now();var e=document.getElementsByTagName("script")[0],t="https://hb.20m.es/stable/config/grupojoly.com/desktop.min.js";var n=document.createElement("script");n.async=!0,n.src=t,e.parentNode.insertBefore(n,e)}();
  </script>

 <!-- Begin comScore Tag -->
 <script>
    var _comscore = _comscore || [];
    var comscore_config = { c1: "2", c2: "14621244"};

    window.didomiOnReady.push(function (Didomi) {
        var consentStatus = Didomi.getUserConsentStatusForVendor('77');
        if (typeof consentStatus == 'undefined') {
            var comscore_config = { c1: "2", c2: "14621244"};
        } else if (consentStatus === true) {
            var comscore_config = { c1: "2", c2: "14621244", cs_ucfr: "1" };
        } else {
            var comscore_config = { c1: "2", c2: "14621244", cs_ucfr: "0" };
        }

        _comscore.push(comscore_config);
        (function () {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    });
</script>
<noscript>
    <img src="https://sb.scorecardresearch.com/p?c1=2&c2=14621244&cv=2.0&cj=1"/>
</noscript>
<!-- End comScore Tag -->

  
      <!--DataLayer Analytics y AdServer-->
      <script>
         //Calculamos el campo platform viendo si estamos visitando desde escritorio o móvil:
         var platform = 'Desktop';
         if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i))
              platform = 'Mobile';
  
        //Creamos el DataLayer
        window.dataLayer = window.dataLayer || [];
          window.dataLayer.push({
              'categoria': 'Especiales', 
              'subcategoria': '',
              'secundarias': '',
              'createdby': '',
              'layout': 'galeria',
              'titular': '<?=$titleh1?>', //Título del especial, con guiones en vez de espacios
              'fechapublicacion': '<?=$obj->newspaper->fechapublicacion?>',  //Fecha de publicación, en el formato AÑOMESDIA
              'keywords': '<?=$keywords?>',
              'noticia_id': '',
              'seotag': '',
              'platform': platform,
              'site': '<?=$obj->newspaper->site?>', //'dsv' para Diario de Sevilla, 'dca' para Diario de Cádiz, 'djr' para Diario de Jerez, 'sur' para Europa sur, 'edc' para El Día de Córdoba, 'grh' para Granada Hoy, 'dda' para Diario de Almería, 'hin' para Huelva Información, 'mhy' para Málaga Hoy, 'sun' para Saber Universidad
              'lastmodify': '',
              'title': '<?=$obj->newspaper->titleH1?>', //El título, con espacios
              'section': 'Especiales',
              'author': '<?=$authors?>', //El autor del especial. Si hay varios, separados por coma
              'user': '',
              'firma': '',
              'mediatype': '',
              'user_logged': '',
              'user_id': '',
              'gaid': '',
              'su': '',
              'kid': ''
          });
      </script>
      <!--Fin DataLayer Analytics y AdServer-->
  
      <!-- Google Tag Manager Header-->
      <!--El Código de TAG Manager del diario. Sustituir XXXXXXXXX por el código del diario. Los códigos son: 
        DDC: GTM-K9ZKMV
        DDJ: GTM-PBQVW9
        ES: GTM-5FV3C8
        DDS: GTM-W5GDNS
        EDC: GTM-TL84P7
        GH: GTM-57FMMR
        DDA: GTM-NFF8PB
        HI: GTM-M3F442
        MH: GTM-W2RC7Q
      -->
      <script>
        (function(w, d, s, l, i) {
          w[l] = w[l] || [];
          w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
          var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != "dataLayer" ? "&l=" + l : "";
          j.async = true;
          j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
          f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "<?=$obj->newspaper->googleCode?>");
      </script>
      <!-- End Google Tag Manager -->

      <!--Chartbeat head-->
      <!--La variable _sf_async_config.domain. Sustituir por la url del diario, sin www-->
      <script type="text/javascript">
        var _sf_async_config = _sf_async_config || {};
        /** CONFIGURATION START **/
        _sf_async_config.uid = 65808;
        _sf_async_config.domain = "<?=$obj->newspaper->domain?>";
        _sf_async_config.flickerControl = false;
        _sf_async_config.useCanonical = true;
        _sf_async_config.useCanonicalDomain = true;
        /** CONFIGURATION END **/
      </script>
      <script async src="//static.chartbeat.com/js/chartbeat_mab.js"></script>
      <!--End Chartbeat head-->

      

    

    <!--Una descripción del especial, necesario para buscadores. Rellenarlo sin espacios ni intros-->
    <meta name="description" content="<?=strip_tags($obj->newspaper->description)?>" />
    <!--Palabras claves del especial, necesario para buscadores. Separadas por comas.-->
    <meta name="keywords" content="<?=$keywords?>" />
    
    <!--El autor/autores del especial, separados por comas-->
    <meta name="author" content="<?=$authors?>" />

    <!--Twitter Cards-->  
    <meta name="twitter:card" content="summary_large_image">
    <!--El nombre del diario-->
    <meta name="twitter:site" content="<?=$obj->newspaper->name?>">
    <!--El nombre de usuario en TW del diario-->
    <meta name="twitter:creator" content="<?=$obj->newspaper->twitterSite?>">
    <!--El título del especial para cuando se comparta en Twitter-->
    <meta name="twitter:title" content="<?=$obj->newspaper->titleH1?>">
    <!--Una descripción del especial. Rellenarlo sin espacios ni intros-->
    <meta name="twitter:description" content="<?=strip_tags($obj->newspaper->shortDescription)?>">
    <!--URL de la imagen con la que se va a compartir en TW el especial. Puede ser cualquiera del especial-->
    <meta name="twitter:image:src" content="<?=$URLBASE?>/data/imagenes/portada.jpg">  
    
    <!--FB Share-->
    <!--El título del especial  para cuando se comparta en Facebook-->
    <meta property="og:title" content="<?=$obj->newspaper->titleH1?>" />
    <meta property="og:type" content="article" />
    <!--Una descripción del especial. Rellenarlo sin espacios ni intros-->
    <meta property="og:description" content="<?=strip_tags($obj->newspaper->shortDescription)?>" />
    <!--Palabras claves del especial. Separadas por comas.-->
    <meta name="keywords" content="<?php 
    foreach ($obj->newspaper->keywords as $v) {echo " $v ,";  }?>" />
    <!--La URL del especial-->
    <meta property="og:url" content="<?=$obj->newspaper->URL?>" />
    <!--URL de la imagen con la que se va a compartir en FB el especial. Puede ser cualquiera del especial-->
    <meta property="og:image" content="<?=$URLBASE?>/data/imagenes/portada.jpg" />

