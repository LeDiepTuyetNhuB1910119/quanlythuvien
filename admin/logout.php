<?php
    setcookie('email', "logout", time()-10, '/');
    header('Location: ../login.php');
?>