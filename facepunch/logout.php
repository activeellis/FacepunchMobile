<?php
function Logout(){
ob_start();
setcookie('session','',time()-3600);
setcookie('loggedin','',time()-3600);
setcookie('username','',time()-3600);
setcookie('password','',time()-3600);
header('Location: ./index.php');
ob_end_flush();
}
Logout();

?>