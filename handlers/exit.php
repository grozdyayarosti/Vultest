<?php
    // Куки удаляются
    setcookie('user', $user['name'], time() - 3600, "/");
    header('Location: /site/registration.php');
?>