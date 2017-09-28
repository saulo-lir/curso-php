<?php

session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    echo 'Acessou!';
}else{
    header('Location: login.php');
}


?>