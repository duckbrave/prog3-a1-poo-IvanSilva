<?php


require_once 'classes/Sessao.php';

Sessao::destruir();
header("Location: login.php");
exit();

?>