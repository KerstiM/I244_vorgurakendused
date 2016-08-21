<?php
//veateadete sisse lülitamiseks faili algusesse
ini_set("display_errors", 1);

// siia kirjutan PHP koodi
$pildid = array (
  array("big"=>"http://enos.itcollege.ee/~kmiller/vorgurakendused/00KORDUSPROJEKT/img/aaredpiirid.jpg", "small"=>"http://enos.itcollege.ee/~kmiller/vorgurakendused/00KORDUSPROJEKT/thumb/aaredpiirid_thumb.jpg", "alt"=>"esimene"),
  array("big"=>"http://enos.itcollege.ee/~kmiller/vorgurakendused/00KORDUSPROJEKT/img/aaredpiiridkm.jpg", "small"=>"http://enos.itcollege.ee/~kmiller/vorgurakendused/00KORDUSPROJEKT/thumb/aaredpiiridkm_thumb.jpg", "alt"=>"teine"),
  array("big"=>"http://enos.itcollege.ee/~kmiller/vorgurakendused/00KORDUSPROJEKT/img/digigirls.png", "small"=>"http://enos.itcollege.ee/~kmiller/vorgurakendused/00KORDUSPROJEKT/thumb/digigirls_thumb.png", "alt"=>"kolmas")
 );

include_once ("view/7.head.html");
include ("view/7.gallery.html");
include_once ("view/7.foot.html");
?>
