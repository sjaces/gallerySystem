<?php 
      $json = file_get_contents("./data/data.json");
      $obj = json_decode($json);
      $texto = $obj->newspaper->titleH1;
      $titleh1 = str_replace(" ", "-", $texto);
      echo "<!-- $titleh1 -->";

      $keywords = "";
      foreach ($obj->newspaper->keywords as $v) { $keywords .= " $v ,";  }
      $keywords = substr($keywords, 0, -2);

      $authors = "";
      foreach ($obj->newspaper->authors as $v) { $authors .= " $v->name ,";  }
      $authors = substr($authors, 0, -2);

      include 'headersProduccion.php';
?>

<title><?=$obj->newspaper->title?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!--Una descripción del especial, necesario para buscadores. Rellenarlo sin espacios ni intros-->
    <meta name="description" content="<?=$obj->newspaper->description?>" />
    <!--Palabras claves del especial, necesario para buscadores. Separadas por comas.-->
    <meta name="keywords" content="<?=$keywords?>" />
    
    <!--El autor/autores del especial, separados por comas-->
    <meta name="author" content="<?=$authors?>" />

    <!--Twitter Cards-->  
    <meta name="twitter:card" content="summary_large_image">
    <!--El nombre del diario-->
    <meta name="twitter:site" content="<?=$obj->newspaper->name?>">
    <!--El nombre de usuario en TW del diario-->
    <meta name="twitter:creator" content="@<?=$obj->newspaper->twitterSite?>">
    <!--El título del especial para cuando se comparta en Twitter-->
    <meta name="twitter:title" content="<?=$obj->newspaper->titleH1?>">
    <!--Una descripción del especial. Rellenarlo sin espacios ni intros-->
    <meta name="twitter:description" content="<?=$obj->newspaper->shortDescription?>">
    <!--URL de la imagen con la que se va a compartir en TW el especial. Puede ser cualquiera del especial-->
    <meta name="twitter:image:src" content="<?=$obj->newspaper->URL?>data/imagenes/portada.jpg">  
    
    <!--FB Share-->
    <!--El título del especial  para cuando se comparta en Facebook-->
    <meta property="og:title" content="<?=$obj->newspaper->titleH1?>" />
    <meta property="og:type" content="article" />
    <!--Una descripción del especial. Rellenarlo sin espacios ni intros-->
    <meta property="og:description" content="<?=$obj->newspaper->shortDescription?>" />
    <!--Palabras claves del especial. Separadas por comas.-->
    <meta name="keywords" content="<?php 
    foreach ($obj->newspaper->keywords as $v) {echo " $v ,";  }?>" />
    <!--La URL del especial-->
    <meta property="og:url" content="<?=$obj->newspaper->URL?>/index.php" />
    <!--URL de la imagen con la que se va a compartir en FB el especial. Puede ser cualquiera del especial-->
    <meta property="og:image" content="<?=$obj->newspaper->URL?>/imagenes/portada.jpg" />

    <link rel="icon" href="<?=$obj->newspaper->URL?>/favicon.ico">