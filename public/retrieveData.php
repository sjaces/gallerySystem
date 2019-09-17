<?php 
      $json = file_get_contents("./data/data.json");
      $obj = json_decode($json);
      $texto = $obj->newspaper->titleH1;
      $PRODUCTION = $obj->newspaper->production;
      $titleh1 = str_replace(" ", "-", $texto);
      echo "<!-- $titleh1 -->";
      echo "<!-- $PRODUCTION -->";

      $URLBASE = str_split($obj->newspaper->URL, strpos($obj->newspaper->URL, "index.php")-1)[0];

      $keywords = "";
      foreach ($obj->newspaper->keywords as $v) { $keywords .= " $v ,";  }
      $keywords = substr($keywords, 0, -2);

      $authors = "";
      foreach ($obj->newspaper->authors as $v) { $authors .= " $v->name ,";  }
      $authors = substr($authors, 0, -2);

?>

