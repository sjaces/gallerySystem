 <!-- Google Tag Manager Body (noscript) -->

    <noscript>
      <iframe
        src="https://www.googletagmanager.com/ns.html?id=<?=$obj->newspaper->googleCode?>"
        height="0"
        width="0"
        style="display:none;visibility:hidden">
      </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!--Chartbeat Body-->
    <!--La variable _sf_async_config.authors. Sustituir por los Autores, separados por coma-->
    <!--La variable _sf_async_config.title. El título del especial, como aparecerá en Chartbeat-->
    <script type="text/javascript">
      (function() {
        /** CONFIGURATION START **/
        var _sf_async_config = (window._sf_async_config =
          window._sf_async_config || {});
        _sf_async_config.sections = "Especiales";
        _sf_async_config.authors = "<?=$authors?>";
        _sf_async_config.title = "<?=$obj->newspaper->titleH1?>";
        /** CONFIGURATION END **/
        function loadChartbeat() {
          var e = document.createElement("script");
          var n = document.getElementsByTagName("script")[0];
          e.type = "text/javascript";
          e.async = true;
          e.src = "//static.chartbeat.com/js/chartbeat.js";
          n.parentNode.insertBefore(e, n);
        }
        loadChartbeat();
      })();
    </script>
    <!--End Chartbeat Body-->
