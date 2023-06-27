<?php 
setcookie('user','',time()-3600);
unset($_COOKI['user']);
header("Location: template_login.php");
 exit();
?>