<?php 
setcookie('user','',time()-(3600*24));
unset($_COOKI['user']);
header("Location: template_login.php");
 exit();
?>