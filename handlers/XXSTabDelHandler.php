<!-- ********************************* -->
<!-- ОБРАБОТЧИК УДАЛЕНИЯ ТАБЛИЦЫ В XSS -->
<!-- ********************************* -->
<?php    
    $login=$_COOKIE['user'];
    $password =$_COOKIE['userPass'];    

    $mysql = new mysqli('localhost','root','root','register_bd');    
    
    // Находим запись пользователя из таблицы по логину и паролю(Хэшированному)
    $result = $mysql->query(
        "SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'"
    );
    // Конвертируем запись о пользователе в массив и помещаем в переменную user
    $user = $result->fetch_assoc();
    // Соберём название для пользовательской таблицы
    $tablename = "table"."_".$user['id'];
    // От имени админа создаём личную таблицу юзеру
    $mysql->query(        
        "DROP TABLE $tablename;"        
    );
    echo " nice";
    $mysql->close();

    header('Location: /site/choosing.php');
?>