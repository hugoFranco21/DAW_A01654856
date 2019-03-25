<?php
session_start();
session_destroy();
echo "Esta siendo redirigido";
sleep(2);
header('Location: ./index.php');
?>
