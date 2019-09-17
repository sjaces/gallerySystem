<!-- Begin comScore Tag -->
      <!-- <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "14621244" });
        (function() {
          var s = document.createElement("script"),
            el = document.getElementsByTagName("script")[0];
          s.async = true;
          s.src =
            (document.location.protocol == "https:" ? "https://sb" : "http://b") +
            ".scorecardresearch.com/beacon.js";
          el.parentNode.insertBefore(s, el);
        })();
      </script>
      <noscript>
        <img
          src="https://sb.scorecardresearch.com/p?c1=2&c2=14621244&cv=2.0&cj=1"
        />
      </noscript> -->
      <!-- End comScore Tag -->
  
      <!--DataLayer Analytics y AdServer-->
      <!-- <script>
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
      </script> -->
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
      <!-- <script>
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
      </script> -->
      <!-- End Google Tag Manager -->

      <!--Chartbeat head-->
      <!--La variable _sf_async_config.domain. Sustituir por la url del diario, sin www-->
      <!-- <script type="text/javascript">
        var _sf_async_config = _sf_async_config || {};
        /** CONFIGURATION START **/
        _sf_async_config.uid = 65808;
        _sf_async_config.domain = "<?=$obj->newspaper->domain?>";
        _sf_async_config.flickerControl = false;
        _sf_async_config.useCanonical = true;
        _sf_async_config.useCanonicalDomain = true;
        /** CONFIGURATION END **/
      </script>
      <script async src="//static.chartbeat.com/js/chartbeat_mab.js"></script> -->
      <!--End Chartbeat head-->