<?php
session_start();
include_once('DBconfig.php');
include_once('header.php');
if(isset($_GET['page']) && $_GET['page'] != ''){
  $pages = ['adminpanel', 'home', 'userpanel',  'klacht_add', 'klachten'];
  if(in_array($_GET['page'], $pages)){
    include_once("page/".$_GET['page'].'.php');
  } else {
    include_once('404.php');
  }
} else {
  include_once('page/home.php');
}
include_once('footer.php');
?>
