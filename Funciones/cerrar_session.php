<?php
session_start();
session_unset();
session_destroy();
unset($_COOKIE["id_usuario"]);
setcookie("id_usuario",null,time()-3600);
header("Location: ../index.php");
?>