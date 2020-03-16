<?php session_start(); ?>
<?php
include 'inc/database.php';
require_once 'inc/functions.php';

switch ($_POST['attribut']) {  

  case  "attr1" :
    echo "exemple...";
    break;
    
  default:
    break;
}
?>