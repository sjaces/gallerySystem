<?php 
      $json = file_get_contents("./data/data.json");
      $obj = json_decode($json);
      $texto = $obj->newspaper->titleH1;
      $title = $obj->newspaper->title;
      $PRODUCTION = $obj->newspaper->production;
      $titleh1 = str_replace(" ", "-", $texto);
      $URL= $obj->newspaper->URL;
      echo "<!-- $title -->";
      echo "<!-- $PRODUCTION -->";
      echo "<!-- URL $URL  -->";
      $pos = strpos($URL, "index.php")-1;
      if($pos!=-1){
          $URLBASE = (str_split($URL, $pos));
          $URLBASE = $URLBASE[0];
        }else{
            $URLBASE =  rtrim($URL, "/");
        }
      echo "<!-- URLBASE $URLBASE  -->";


      $keywords = "";
      foreach ($obj->newspaper->keywords as $v) { $keywords .= " $v ,";  }
      $keywords = substr($keywords, 0, -2);

      $authors = "";
      foreach ($obj->newspaper->authors as $v) { $authors .= " $v->name ,";  }
      $authors = substr($authors, 0, -2);

?>

