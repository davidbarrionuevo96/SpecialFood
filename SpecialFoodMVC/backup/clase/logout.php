<?php
  session_destroy();
  
  setcookie("idusuario",'',time()-3600);
  
  header("Location: http://localhost/index.php");
?>

